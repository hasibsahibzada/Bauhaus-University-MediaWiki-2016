<?php

/**
 * Targets XRumer's ignorance of HTML comments. May have some false positives
 */

$wgHooks['EditPage::showEditForm:fields'][] = 'AntiBot_XRumerCommentBug::onEditFormFields';
$wgHooks['EditFilterMerged'][] = 'AntiBot_XRumerCommentBug::onEditFilterMerged';

class AntiBot_XRumerCommentBug {
	function onEditFormFields( &$editPage, &$wgOut ) {
		$name = AntiBot::getSecret( 'CommentBug' );
		$wgOut->addHTML( "\n<!--<input type=\"hidden\" name=\"$name\" value=\"\"/>-->" );
		return true;
	}

	function onEditFilterMerged( $editPage, $text, &$hookError ) {
		global $wgRequest;
		if ( $wgRequest->getVal( AntiBot::getSecret( 'CommentBug' ) ) !== null ){
			if ( AntiBot::trigger(__CLASS__) == 'fail' ) {
				return false;
			}
		}
		return true;
	}
}



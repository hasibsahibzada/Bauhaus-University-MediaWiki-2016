<?php

/**
 * Targets a bug in XRumer's cookie jar processing
 * It does a simple string search of all headers for Set-Cookie instead of 
 * parsing them properly.
 */

$wgHooks['EditPage::showEditForm:initial'][] = 'AntiBot_XRumerCookieBug::onEditForm';
$wgHooks['EditFilterMerged'][] = 'AntiBot_XRumerCookieBug::onEditFilterMerged';

class AntiBot_XRumerCookieBug {
	function onEditForm( &$editPage ) {
		header( 'X-' . AntiBot::getSecret( 'CookieBug1' ) . 
			'-Set-Cookie: ' . AntiBot::getSecret( 'CookieBug2' ) .
			'=' . AntiBot::getSecret( 'CookieBug3' )
		);
		return true;
	}

	function onEditFilterMerged( $editPage, $text, &$hookError ) {
		if ( isset( $_COOKIE[AntiBot::getSecret( 'CookieBug2' ) ] ) ) {
			if ( AntiBot::trigger(__CLASS__) == 'fail' ) {
				return false;
			}
		}
		return true;
	}
}


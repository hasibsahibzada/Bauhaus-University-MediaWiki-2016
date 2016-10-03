<?php
/*
Bauhaus University Medien Wiki skin
Adapted By Hasibullah Sahibzada from old skin of Michael Markert

Contact: hasibullah@sahibzada.org
*/

if ( ! defined( 'MEDIAWIKI' ) ) {
	die( -1 );
}//end if

# skin valid name
$wgValidSkinNames['bauhausmediawikiimm'] = 'BauhausMediaWikiimm';


//File removed on new mediawiki versions (1.24.1 at least).
//require_once('includes/SkinTemplate.php');
if(file_exists('includes/SkinTemplate.php')){
    require_once('includes/SkinTemplate.php');
}

/**
 * Inherit main code from SkinTemplate, set the CSS and template filter.
 * @package MediaWiki
 * @subpackage Skins
 */



class SkinBauhausMediaWikiimm extends SkinBauhausMediaWiki {

	/** Using Bootstrap */
	public $skinname 		= 'bauhaus-mediawikiimm';
	public $stylename 		= 'bauhaus-mediawikiimm';
	public $template 		= 'BauhausMediaWikiimmTemplate';
	public $useHeadElement 	= true;

}

/**
 * @package MediaWiki
 * @subpackage Skins
 */
class BauhausMediaWikiimmTemplate extends BauhausMediaWikiTemplate {
	/**
	 * @var Cached skin object
	 */
	/**
	 * Template filter callback for Bootstrap skin.
	 * Takes an associative array of data set from a SkinTemplate-based
	 * class, and a wrapper for MediaWiki's localization database, and
	 * outputs a formatted page.
	 *
	 * @access private
	 */

	function initPrfs() {
		
		$this->templPrefs['myUniWortmarke']		= 'uni_wortmarke.jpg';
		$this->templPrefs['myFakWortmarke']		= 'faculty_media.png';
		$this->templPrefs['myTitleLogo']		= 'media_art_design.png'; 
		$this->templPrefs['myTitle']			= 'Media Art & Design';
		$this->templPrefs['mySubtitle']			= 'Immersive Media / Prof.Micky Remann';
		$this->templPrefs['myFakLink'] 			= 'http://www.uni-weimar.de/medien/wiki/MME:Start';
		$this->templPrefs['myTitleLink']		= 'http://www.uni-weimar.de/de/kunst-und-gestaltung/start/';	// Link of $myTitle
		$this->templPrefs['myHomeURL']			= 'http://web.uni-weimar.de/medien/wiki/MME:Start'; // Link of $mySubtitle
		// Deutsch: de, de-at, de-ch, de-formal
		$this->templPrefs['myFakWortmarke_de']	= 'medien_wortmarke.jpg';
		$this->templPrefs['myTitleLogo_de']		= 'mediengestaltung.jpg';
		$this->templPrefs['myTitle_de']			= 'Medienkunst/Mediengestaltung';
		$this->templPrefs['mySubtitle_de']		= 'Immersive Medien / Prof.Micky Remann';
		// extra HTML
		$this->templPrefs['extraHTML']			= '';



		# skin indicator this should be exactly similar to the title of the sidbar menu of gmu
		$this->templPrefs['skin_indicator']		= '';
		$this->templPrefs['skin_indicator_en']	= 'Immersive Media';
		$this->templPrefs['skin_indicator_de']	= 'Immersive Medien';


		
	}
}

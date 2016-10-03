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
$wgValidSkinNames['bauhausmediawikikk'] = 'BauhausMediaWikikk';


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



class SkinBauhausMediaWikikk extends SkinBauhausMediaWiki {

	/** Using Bootstrap */
	public $skinname 		= 'bauhaus-mediawikikk';
	public $stylename 		= 'bauhaus-mediawikikk';
	public $template 		= 'BauhausMediaWikikkTemplate';
	public $useHeadElement 	= true;

	
}

/**
 * @package MediaWiki
 * @subpackage Skins
 */
class BauhausMediaWikikkTemplate extends BauhausMediaWikiTemplate {
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
		
		// Default images (English)

		$this->templPrefs['myUniWortmarke']		= 'uni_wortmarke.jpg';
		$this->templPrefs['myFakWortmarke']		= 'faculty_media.png';
		$this->templPrefs['myTitleLogo']		= 'media_art_design.png'; 
		$this->templPrefs['myTitle']			= 'Media Art & Design';
		$this->templPrefs['mySubtitle']			= 'Electroacoustic Composition and Sound Design / Prof. Robin Minard';
		$this->templPrefs['myFakLink'] 			= 'http://www.uni-weimar.de/de/medien/start/';
		$this->templPrefs['myTitleLink']		= 'http://www.uni-weimar.de/de/kunst-und-gestaltung/start/';	// Link of $myTitle
		$this->templPrefs['myHomeURL']			= 'http://web.uni-weimar.de/medien/wiki/EKK:Start'; // Link of $mySubtitle
		//$this->templPrefs['showCCLicense']		= false;
		$this->templPrefs['favicon']			= '/bauhausmedien/favicon_m.ico';
		// Deutsch: de, de-at, de-ch, de-formal
		$this->templPrefs['myFakWortmarke_de']	= 'medien_wortmarke.jpg';
		$this->templPrefs['myTitleLogo_de']		= 'mediengestaltung.jpg';
		$this->templPrefs['myTitle_de']			= 'Medienkunst/Mediengestaltung';
		$this->templPrefs['mySubtitle_de']		= 'Elektroakustische Komposition und Klanggestaltung / Prof. Robin Minard';


		// extra HTML
		$this->templPrefs['extraHTML']			= '';

		# skin indicator this should be exactly similar to the title of the sidbar menu of gmu
		$this->templPrefs['skin_indicator']		= '';
		$this->templPrefs['skin_indicator_en']	= 'Electroacoustic Composition';
		$this->templPrefs['skin_indicator_de']	= 'Elektroakustische Komposition';




	}

}

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
$wgValidSkinNames['bauhausmediawikigmu'] = 'BauhausMediaWikigmu';


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



class SkinBauhausMediaWikigmu extends SkinBauhausMediaWiki {

	/** Using Bootstrap */
	public $skinname 		= 'bauhaus-mediawikigmu';
	public $stylename 		= 'bauhaus-mediawikigmu';
	public $template 		= 'BauhausMediaWikigmuTemplate';
	public $useHeadElement 	= true;


}

/**
 * @package MediaWiki
 * @subpackage Skins
 */
class BauhausMediaWikigmuTemplate extends BauhausMediaWikiTemplate {
	/**
	 * @var Cached skin object
	 */
	//public $skin;

	function initPrfs() {
		
		$this->templPrefs['myUniWortmarke']		= 'uni_wortmarke_P368.png';
		$this->templPrefs['myFakWortmarke']		= 'faculty_media_P368.png';
		$this->templPrefs['myTitleLogo']		= 'media_art_design_P368.png';
		$this->templPrefs['myTitle']			= 'Media Art & Design';
		$this->templPrefs['mySubtitle']			= 'Medial Environments / Prof. Ursula Damm';
		$this->templPrefs['myFakLink'] 			= 'http://www.uni-weimar.de/de/medien/start/';
		$this->templPrefs['myTitleLink']		= 'http://www.uni-weimar.de/de/kunst-und-gestaltung/start/';	// Link of $myTitle
		$this->templPrefs['myTitleLink']		= 'http://www.uni-weimar.de/cms/medien/medienkunstmediengestaltung.html';	// Link of $myTitle
		$this->templPrefs['myHomeURL']			= 'http://www.uni-weimar.de/medien/umgebungen'; // Link of $mySubtitle
		//$this->templPrefs['showCCLicense']		= false;
		$this->templPrefs['favicon']			= '/bauhausmedien/favicon_gmu.ico';
		// Deutsch: de, de-at, de-ch, de-formal
		$this->templPrefs['myFakWortmarke_de']	= 'medien_wortmarke_P368.png';
		$this->templPrefs['myTitleLogo_de']		= 'mediengestaltung_P368.png';
		$this->templPrefs['myTitle_de']			= 'Medienkunst/Mediengestaltung';
		$this->templPrefs['mySubtitle_de']		= 'Gestaltung medialer Umgebungen / Prof. Ursula Damm';
		// extra HTML
		$this->templPrefs['extraHTML']			= '';

		# skin indicator this should be exactly similar to the title of the sidbar menu of gmu
		$this->templPrefs['skin_indicator']		= '';
		$this->templPrefs['skin_indicator_en']	= 'Media Environments';
		$this->templPrefs['skin_indicator_de']	= 'Gestaltung medialer Umgebungen';




	}

}

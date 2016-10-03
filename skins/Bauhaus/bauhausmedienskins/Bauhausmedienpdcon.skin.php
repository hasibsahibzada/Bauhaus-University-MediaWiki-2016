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
$wgValidSkinNames['bauhausmediawikipdcon'] = 'BauhausMediaWikipdcon';


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



class SkinBauhausMediaWikipdcon extends SkinBauhausMediaWiki {

	/** Using Bootstrap */
	public $skinname 		= 'bauhaus-mediawikipdcon';
	public $stylename 		= 'bauhaus-mediawikipdcon';
	public $template 		= 'BauhausMediaWikipdconTemplate';
	public $useHeadElement 	= true;

	/**
	 * initialize the page
	 */
	
}

/**
 * @package MediaWiki
 * @subpackage Skins
 */
class BauhausMediaWikipdconTemplate extends BauhausMediaWikiTemplate {
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
		
		$this->templPrefs['myUniWortmarke']     = 'pd-buw.png';
		$this->templPrefs['myFakWortmarke']		= 'pd-hfm.png';
		$this->templPrefs['myTitleLogo']		= 'pd-logo-350px.png';
		$this->templPrefs['myTitle']			= 'PureData Convention 2011';
		$this->templPrefs['mySubtitle']			= ''; 
		$this->templPrefs['myFakLink'] 			= 'http://www.uni-weimar.de/de/medien/start/';
		$this->templPrefs['myTitleLink']		= 'http://www.uni-weimar.de/de/kunst-und-gestaltung/start/';	// Link of $myTitle
		$this->templPrefs['myHomeURL']			= 'http://puredata.uni-weimar.de/'; // Link of $mySubtitle
		$this->templPrefs['favicon']			= '/bauhausmedien/pdcon/pd-favicon.ico';
		// Deutsch: de, de-at, de-ch, de-formal
		$this->templPrefs['myFakWortmarke_de']	= 'pd-hfm.png';
		$this->templPrefs['myTitleLogo_de']		= 'pd-logo-350px.png';
		$this->templPrefs['myTitle_de']			= 'PureData Convention 2011';
		$this->templPrefs['mySubtitle_de']		= '';
		// extra HTML
		$this->templPrefs['extraHTML']			= '';


		# skin indicator this should be exactly similar to the title of the sidbar menu of gmu
		$this->templPrefs['skin_indicator']		= '';
		$this->templPrefs['skin_indicator_en']	= 'Electroacoustic Composition';
		$this->templPrefs['skin_indicator_de']	= 'Elektroakustische Komposition';

    
		

    
    

	}
}

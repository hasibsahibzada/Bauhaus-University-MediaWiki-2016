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
$wgValidSkinNames['bauhausmediawikiradio'] = 'BauhausMediaWikiradio';


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



class SkinBauhausMediaWikiradio extends SkinBauhausMediaWiki {

	/** Using Bootstrap */
	public $skinname 		= 'bauhaus-mediawikiradio';
	public $stylename 		= 'bauhaus-mediawikiradio';
	public $template 		= 'BauhausMediaWikiradioTemplate';
	public $useHeadElement 	= true;

	
}

/**
 * @package MediaWiki
 * @subpackage Skins
 */
class BauhausMediaWikiradioTemplate extends BauhausMediaWikiTemplate {
	/**
	 * @var Cached skin object
	 */
	
	function initPrfs() {
		
		$this->templPrefs['myUniWortmarke']		= 'uni_wortmarke.jpg';
		$this->templPrefs['myFakWortmarke']		= 'faculty_media.png';
		$this->templPrefs['myTitleLogo']		= 'media_art_design.png';
		$this->templPrefs['myTitle']			= 'Media Art & Design';
		$this->templPrefs['mySubtitle']			= 'Experimental Radio / Prof. Nathalie Singer';
		$this->templPrefs['myFakLink'] 			= 'http://www.uni-weimar.de/de/medien/start/';
		$this->templPrefs['myTitleLink']		= 'http://www.uni-weimar.de/de/kunst-und-gestaltung/start/';	// Link of $myTitle
		$this->templPrefs['myHomeURL']			= 'http://www.uni-weimar.de/cms/medien/experimentelles-radio.html'; // Link of $mySubtitle
		// Deutsch: de, de-at, de-ch, de-formal
		$this->templPrefs['myFakWortmarke_de']	= 'medien_wortmarke.jpg';
		$this->templPrefs['myTitleLogo_de']		= 'mediengestaltung.jpg';
		$this->templPrefs['myTitle_de']			= 'Medienkunst/Mediengestaltung';
		$this->templPrefs['mySubtitle_de']		= 'Experimentelles Radio / Prof. Nathalie Singer';
		// extra HTML
		$this->templPrefs['extraHTML']			= '';


		# skin indicator this should be exactly similar to the title of the sidbar menu of gmu
		$this->templPrefs['skin_indicator']		= '';
		$this->templPrefs['skin_indicator_en']	= 'Experimental Radio';
		$this->templPrefs['skin_indicator_de']	= 'Experimentelles Radio';

    
		


	}

}

<?php
/**
 * Bootstrap - A basic MediaWiki skin based on Twitter's excellent Bootstrap CSS framework
 *
 * @Version 1.0.0
 * @Author Matthew Batchelder <borkweb@gmail.com>
 * @Copyright Matthew Batchelder 2012 - http://borkweb.com/
 * @License: GPLv2 (http://www.gnu.org/copyleft/gpl.html)
 */

/*
Bauhaus University Medien Wiki skin
Adapted By Hasibullah Sahibzada from Above mentioned skin (Bootstrap)

Contact: hasibullah@sahibzada.org
*/


if ( ! defined( 'MEDIAWIKI' ) ) {
	die( -1 );
}//end if

# skin valid name
$wgValidSkinNames['bauhausmediawiki'] = 'BauhausMediaWiki';


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



class SkinBauhausMediaWiki extends SkinTemplate {

	/** Using Bootstrap */
	public $skinname 		= 'bauhaus-mediawiki';
	public $stylename 		= 'bauhaus-mediawiki';
	public $template 		= 'BauhausMediaWikiTemplate';
	public $useHeadElement 	= true;

	/**
	 * initialize the page
	 */
	public function initPage(OutputPage $out ) {
		global $wgSiteJS;
		parent::initPage( $out );
		$out->addModuleScripts( 'bootstrap.bauhausmediawiki' );
		$out->addMeta( 'viewport', 'width=device-width, initial-scale=1, maximum-scale=1' );
	
		# add meta data 
		$out->addMeta("KEYWORDS","Design,concepts,design,information,Media,Interaction,digital,Mobile,Interfaces,based,Screen,areas,central,addressed,group,focus,Architecture,News,Medieninformatik,Mediengestaltung,Informatik,Webtechnologien,CSCW,Mediensysteme,Medienkultur,Medien,Space,Bauhaus,Bauhaus-Universität,University,Urban,corresponding,implement,develop,user,friendly,applications,Group,Interface,Methods,Research,main,interest,that,enable,requires,availability,adequate,Home,interfaces,ubiquitous,environments,facilitate,access,interactive,networked,Knowledge,Moden,Erscheinungsbilder,Umgebungen,Experimentelles Radio,Bauhaus,fm");
		
		# add copyright link
		$links = array("rel"=>"copyright", "href"=>"http://www.uni-weimar.de/web/impressum", "title"=>"Angaben zum Copyright");
		$out->addLink($links);
		//$out->addLink("copyright","")
		//<link rel="copyright" href="http://www.uni-weimar.de/web/impressum" title="Angaben zum Copyright" />
		//<meta name="KEYWORDS" content="Design,concepts,design,information,Media,Interaction,digital,Mobile,Interfaces,based,Screen,areas,central,addressed,group,focus,Architecture,News,Medieninformatik,Mediengestaltung,Informatik,Webtechnologien,CSCW,Mediensysteme,Medienkultur,Medien,Space,Bauhaus,Bauhaus-Universität,University,Urban,corresponding,implement,develop,user,friendly,applications,Group,Interface,Methods,Research,main,interest,that,enable,requires,availability,adequate,Home,interfaces,ubiquitous,environments,facilitate,access,interactive,networked,Knowledge,Moden,Erscheinungsbilder,Umgebungen,Experimentelles Radio,Bauhaus,fm" />
		//$title, $id

	}//end initPage

	/**
	 * prepares the skin's CSS
	 */
	public function setupSkinUserCss( OutputPage $out ) {
		global $wgSiteCSS;
		parent::setupSkinUserCss( $out );

		$out->addModuleStyles( 'bootstrap.bauhausmediawiki' );


	}//end setupSkinUserCss
}

/**
 * @package MediaWiki
 * @subpackage Skins
 */
class BauhausMediaWikiTemplate extends QuickTemplate {
	/**
	 * @var Cached skin object
	 */
	public $skin;

	/**
	 * Template filter callback for Bootstrap skin.
	 * Takes an associative array of data set from a SkinTemplate-based
	 * class, and a wrapper for MediaWiki's localization database, and
	 * outputs a formatted page.
	 *
	 * @access private
	 */

	var $templPrefs;

	function initPrfs() {
		
		// Default images (English)
		$this->templPrefs['myUniWortmarke']		= 'uni_wortmarke.jpg';
		$this->templPrefs['myFakWortmarke']		= 'faculty_media.png';
		$this->templPrefs['myTitleLogo']		= 'media_art_design.png';
		$this->templPrefs['myTitle']			= 'Media Art & Design';
		$this->templPrefs['mySubtitle']			= 'Media Wiki'; //z.B.: 'Interface Design / Prof. Jens Geelhaar';
		$this->templPrefs['myFakLink'] 			= 'http://www.uni-weimar.de/de/medien/start/';
		$this->templPrefs['myTitleLink']		= 'http://www.uni-weimar.de/de/kunst-und-gestaltung/start/';	// Link of $myTitle
		$this->templPrefs['myHomeURL']			= 'http://web.uni-weimar.de/medien/wiki'; // Link of $mySubtitle
		// Deutsch: de, de-at, de-ch, de-formal
		$this->templPrefs['myFakWortmarke_de']	= 'medien_wortmarke.jpg';
		$this->templPrefs['myTitleLogo_de']		= 'mediengestaltung.jpg';
		$this->templPrefs['myTitle_de']			= 'Medienkunst/Mediengestaltung';
		$this->templPrefs['mySubtitle_de']		= 'Medien Wiki'; //z.B.: 'Interface Design / Prof. Jens Geelhaar';
		// extra HTML
		$this->templPrefs['extraHTML']			= '';

		$this->templPrefs['skin_indicator']		= '';
		$this->templPrefs['skin_indicator_en']	= 'main';
		$this->templPrefs['skin_indicator_de']	= 'Haupt';

	}


	function getTemplatePrf($name) {
		if( array_count_values($this->templPrefs) <= 0 ) { $this->initPrfs(); }
		return $this->templPrefs[$name];
	}


	function setTemplatePrf($name, $value) {
		if( array_count_values($this->templPrefs) <= 0 ) { $this->initPrfs(); }
		$this->templPrefs[$name] = $value;
	}

	public function execute() {
		global $wgRequest, $wgUser, $wgSitename, $wgSitenameshort, $wgCopyrightLink, $wgCopyright, $wgBootstrap, $wgArticlePath, $wgGoogleAnalyticsID, $wgSiteCSS;
		global $wgEnableUploads;
		//global $wgLogo;
		global $wgTOCLocation;
		global $wgNavBarClasses;
		global $wgSubnavBarClasses;
		global $wgScriptPath;
		
		

		$this -> initPrfs();
	
		// get the logo path
		$myLogoPath 	= $wgScriptPath.'/skins/Bauhaus/site/logos/';

		// get images (en images)
		$myUniWortmarke = $this->getTemplatePrf('myUniWortmarke');
		$myFakWortmarke = $this->getTemplatePrf('myFakWortmarke');
		$myTitleLogo 	= $this->getTemplatePrf('myTitleLogo');

		// get text
		$myTitle	 	= $this->getTemplatePrf('myTitle');
		$mySubtitle 	= $this->getTemplatePrf('mySubtitle');
		$myHomeURL		= $this->getTemplatePrf('myHomeURL');

		// get links
		$myFakLink		= $this->getTemplatePrf('myFakLink');
		$myTitleLink	= $this->getTemplatePrf('myTitleLink');
		

		// Navigation bars
		$Sidebar_title  	= "Departments";
		$Sidebar_menu   	= "Navigations:Sidebar";

		$Top_Menu			= "Navigations:Topmenu";

		$Top_Subvav_menu	= "Navigation:Topsubnav_menu";

		# skin indicator
		$skin_indicator 	= $this->getTemplatePrf('skin_indicator_en');
		# set the skin indicator
		$this->setTemplatePrf('skin_indicator', $skin_indicator);


		// get selected language and override
		global $wgLang;
		$selectedLanguage = $wgLang->getCode();
		if($selectedLanguage == "de" || $selectedLanguage == "de-at" || $selectedLanguage == "de-ch" || $selectedLanguage == "de-formal") {
			$myFakWortmarke 	= $this->getTemplatePrf('myFakWortmarke_de');
			$myTitleLogo 		= $this->getTemplatePrf('myTitleLogo_de');
			$myTitle	 		= $this->getTemplatePrf('myTitle_de');
			$mySubtitle 		= $this->getTemplatePrf('mySubtitle_de');
			$Sidebar_title  	= "Abteilungen";
			$Sidebar_menu		= "Navigations:Sidebar_de";
			$Top_Menu			= "Navigations:Topmenu_de";
			$Top_Subvav_menu	= "Navigation:Topsubnav_menu_de";

			# skin indicator
			$skin_indicator 	= $this->getTemplatePrf('skin_indicator_de');
			# set the skin indicator
			$this->setTemplatePrf('skin_indicator', $skin_indicator);
		}
		// inject extraHTML Box (at the end)
		//$extraHTML 		= $this->getTemplatePrf('extraHTML');


		$this->skin = $this->data['skin'];
		$action = $wgRequest->getText( 'action' );
		$url_prefix = str_replace( '$1', '', $wgArticlePath );

		// Suppress warnings to prevent notices about missing indexes in $this->data
		wfSuppressWarnings();

		$this->html('headelement');

		
		// generate main html output
		require_once("Page_content.html.php");

	}
	//end execute

	/**
	 * Render one or more navigations elements by name, automatically reveresed
	 * when UI is in RTL mode
	 */
	private function nav( $nav ) {
		$output = '';
		$skin_indicator	= $this->getTemplatePrf('skin_indicator');

		foreach ( $nav as $topItem ) {
			$pageTitle = Title::newFromText( $topItem['link'] ?: $topItem['title'] );
			if ( array_key_exists( 'sublinks', $topItem ) ) {
			
				# Get the Namespace 
				$namespace = explode(":", $pageTitle)[0];

				//echo $namespace;
				# compare with the current skin
				if( $skin_indicator == $namespace){
					//$output .= '<ul class="current">';

					$output .= '<li class="dropdown open" >';
					$output .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown" id="active_namespace">' . $topItem['title'] . ' <b class="caret"></b></a>';
					$output .= '<ul class="dropdown-menu" >';


				}else{

					$output .= '<li class="dropdown">';
					$output .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown">' . $topItem['title'] . ' <b class="caret"></b></a>';
					$output .= '<ul class="dropdown-menu">';
				}
				
				foreach ( $topItem['sublinks'] as $subLink ) {
					if ( 'divider' == $subLink ) {
						$output .= "<li class='divider'></li>\n";
					} elseif ( $subLink['textonly'] ) {
						$output .= "<li class='nav-header'>{$subLink['title']}</li>\n";
					} else {
						//echo $pageTitle."\n";

						if( $subLink['local'] && $pageTitle = Title::newFromText( $subLink['link'] ) ) {
							
							$href = $pageTitle->getLocalURL();

						} else {
							$href = $subLink['link'];

						}//end else

						$slug = strtolower( str_replace(' ', '-', preg_replace( '/[^a-zA-Z0-9 ]/', '', trim( strip_tags( $subLink['title'] ) ) ) ) );
						$output .= "<li {$subLink['attributes']}><a href='{$href}' class='{$subLink['class']} {$slug}'>{$subLink['title']}</a>";
					}//end else
				}
				$output .= '</ul>';
				$output .= '</li>';
			} else {
				if( $pageTitle ) {
					$output .= '<li' . ($this->data['title'] == $topItem['title'] ? ' class="active"' : '') . '><a href="' . ( $topItem['external'] ? $topItem['link'] : $pageTitle->getLocalURL() ) . '">' . $topItem['title'] . '</a></li>';
				}//end if
			}//end else
		}//end foreach
		return $output;
	}//end nav

	/**
	 * Render one or more navigations elements by name, automatically reveresed
	 * when UI is in RTL mode
	 */
	private function nav_select( $nav ) {
		$output = '';
		foreach ( $nav as $topItem ) {
			$pageTitle = Title::newFromText( $topItem['link'] ?: $topItem['title'] );
			$output .= '<optgroup label="'.strip_tags( $topItem['title'] ).'">';
			if ( array_key_exists( 'sublinks', $topItem ) ) {
				foreach ( $topItem['sublinks'] as $subLink ) {
					if ( 'divider' == $subLink ) {
						$output .= "<option value='' disabled='disabled' class='unclickable'>----</option>\n";
					} elseif ( $subLink['textonly'] ) {
						$output .= "<option value='' disabled='disabled' class='unclickable'>{$subLink['title']}</option>\n";
					} else {
						if( $subLink['local'] && $pageTitle = Title::newFromText( $subLink['link'] ) ) {
							$href = $pageTitle->getLocalURL();
						} else {
							$href = $subLink['link'];
						}//end else

						$output .= "<option value='{$href}'>{$subLink['title']}</option>";
					}//end else
				}//end foreach
			} elseif ( $pageTitle ) {
				$output .= '<option value="' . $pageTitle->getLocalURL() . '">' . $topItem['title'] . '</option>';
			}//end else
			$output .= '</optgroup>';
		}//end foreach

		return $output;
	}//end nav_select

	private function get_page_links( $source ) {
		$titleBar = $this->getPageRawText( $source );
		$nav = array();
		foreach(explode("\n", $titleBar) as $line) {
			if(trim($line) == '') continue;
			if( preg_match('/^\*\*\s*divider/', $line ) ) {
				$nav[ count( $nav ) - 1]['sublinks'][] = 'divider';
				continue;
			}//end if

			$sub = false;
			$link = false;
			$external = false;

			if(preg_match('/^\*\s*([^\*]*)\[\[:?(.+)\]\]/', $line, $match)) {
				$sub = false;
				$link = true;
			}elseif(preg_match('/^\*\s*([^\*\[]*)\[([^\[ ]+) (.+)\]/', $line, $match)) {
				$sub = false;
				$link = true;
				$external = true;
			}elseif(preg_match('/^\*\*\s*([^\*\[]*)\[([^\[ ]+) (.+)\]/', $line, $match)) {
				$sub = true;
				$link = true;
				$external = true;
			}elseif(preg_match('/\*\*\s*([^\*]*)\[\[:?(.+)\]\]/', $line, $match)) {
				$sub = true;
				$link = true;
			}elseif(preg_match('/\*\*\s*([^\* ]*)(.+)/', $line, $match)) {
				$sub = true;
				$link = false;
			}elseif(preg_match('/^\*\s*(.+)/', $line, $match)) {
				$sub = false;
				$link = false;
			}

			if( strpos( $match[2], '|' ) !== false ) {
				$item = explode( '|', $match[2] );
				$item = array(
					'title' => $match[1] . $item[1],
					'link' => $item[0],
					'local' => true,
				);
			} else {
				if( $external ) {
					$item = $match[2];
					$title = $match[1] . $match[3];
				} else {
					$item = $match[1] . $match[2];
					$title = $item;
				}//end else

				if( $link ) {
					$item = array('title'=> $title, 'link' => $item, 'local' => ! $external , 'external' => $external );
				} else {
					$item = array('title'=> $title, 'link' => $item, 'textonly' => true, 'external' => $external );
				}//end else
			}//end else

			if( $sub ) {
				$nav[count( $nav ) - 1]['sublinks'][] = $item;
			} else {
				$nav[] = $item;
			}//end else
		}

		return $nav;
	}//end get_page_links

	private function get_array_links( $array, $title, $which ) {
		$nav = array();
		$nav[] = array('title' => $title );
		foreach( $array as $key => $item ) {
			$link = array(
				'id' => Sanitizer::escapeId( $key ),
				'attributes' => $item['attributes'],
				'link' => htmlspecialchars( $item['href'] ),
				'key' => $item['key'],
				'class' => htmlspecialchars( $item['class'] ),
				'title' => htmlspecialchars( $item['text'] ),
			);

			if( 'page' == $which ) {
				switch( $link['title'] ) {
				case 'Page': $icon = 'file'; break;
				case 'Discussion': $icon = 'comment'; break;
				case 'Edit': $icon = 'pencil'; break;
				case 'History': $icon = 'clock-o'; break;
				case 'Delete': $icon = 'remove'; break;
				case 'Move': $icon = 'arrows'; break;
				case 'Protect': $icon = 'lock'; break;
				case 'Watch': $icon = 'eye-open'; break;
				case 'Unwatch': $icon = 'eye-slash'; break;
				}//end switch

				$link['title'] = '<i class="fa fa-' . $icon . '"></i> ' . $link['title'];
			} elseif( 'user' == $which ) {
				switch( $link['title'] ) {
				case 'My talk': $icon = 'comment'; break;
				case 'My preferences': $icon = 'cog'; break;
				case 'My watchlist': $icon = 'eye-close'; break;
				case 'My contributions': $icon = 'list-alt'; break;
				case 'Log out': $icon = 'off'; break;
				default: $icon = 'user'; break;
				}//end switch

				$link['title'] = '<i class="fa fa-' . $icon . '"></i> ' . $link['title'];
			}//end elseif

			$nav[0]['sublinks'][] = $link;
		}//end foreach

		return $this->nav( $nav );
	}//end get_array_links

	function getPageRawText($title) {
		global $wgParser, $wgUser;
		$pageTitle = Title::newFromText($title);
		if(!$pageTitle->exists()) {
			return 'Create the page [[Bootstrap:TitleBar]]';
		} else {
			$article = new Article($pageTitle);
			$wgParserOptions = new ParserOptions($wgUser);
			// get the text as static wiki text, but with already expanded templates,
			// which also e.g. to use {{#dpl}} (DPL third party extension) for dynamic menus.
			$parserOutput = $wgParser->preprocess($article->getContent(), $pageTitle, $wgParserOptions );
			return $parserOutput;
		}
	}

	function includePage($title) {
		global $wgParser, $wgUser;
		$pageTitle = Title::newFromText($title);
		if(!$pageTitle->exists()) {
			echo 'The page [[' . $title . ']] was not found.';
		} else {
			$article = new Article($pageTitle);
			$wgParserOptions = new ParserOptions($wgUser);
			$parserOutput = $wgParser->parse($article->getContent(), $pageTitle, $wgParserOptions);
			echo $parserOutput->getText();
		}
	}

	public static function link() { }
}

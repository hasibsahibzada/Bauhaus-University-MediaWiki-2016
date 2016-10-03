<?php
//Orifice Software's (Fergal's) flash video and swf player for mediawiki.
//Add to the end of LocalSettings.php: require_once("extensions/oflash/orificeflash.php");

//adding hook
$wgExtensionFunctions[]='wfOrificeFlashExtension';
$wgExtensionCredits['parserhook'][]=array(
	'name'=>'Orifice Flash',
	'author'=>'Fergal Hainey',
	'url'=>'http://bfot.co.uk/orifice/',
	'description'=>'Easy syntax for inserting Flash SWFs and FLV videos.'
);

//hook callback
function wfOrificeFlashExtension() {
	global $wgParser;
	//install parser hook for <oflash> tags
	$wgParser->sethook('oflash','doOFlash');
}

//parser hook callback
function doOFlash($input,$argv,&$parser) {
	if (!$parser) $parser =& $GLOBALS['wgParser'];
	global $wgOutputEncoding;
	$DefaultEncoding='ISO-8859-1';
	
	//get parameters from argv
	$file=htmlspecialchars(@$argv['file']);
	$width=htmlspecialchars(@$argv['width']);
	$height=htmlspecialchars(@$argv['height'])+20;
	$thumb=htmlspecialchars(@$argv['thumb']);
	$caption=$parser->recursiveTagParse(@$argv['caption']);
	$flashvars=htmlspecialchars(@$argv['flashvars']);
	
	if (strtolower(substr($file,-4,4))=='.swf') {
		$height-=20;
		$oflashswf=true;
	}
	
	if ($thumb=='false') unset($thumb);
	
	if ($thumb) {
		$out='<div class="thumb tright"><div class="thumbinner" style="width:182px;">';
		if (!$oflashswf) { $height-=20; }
		$height=round((180/$width)*$height);
		if (!$oflashswf) { $height+=20; }
		$width=180;
	}
	
	if ($oflashswf) {
		$out.="<object type=\"application/x-shockwave-flash\" data=\"$file\" width=\"$width\" height=\"$height\"><param name=\"movie\" value=\"$file\"><param name=\"FlashVars\" value=\"$flashvars\"><p>This is supposed to be a flash animation. You'll need the flash plugin and a browser that supports it to view it.</object>";
	}
	else {
		global $wgScriptPath;
		$out.="<object type=\"application/x-shockwave-flash\" data=\"$wgScriptPath/extensions/oflash/jwplayer.swf\" width=\"$width\" height=\"$height\"><param name=\"movie\" value=\"$wgScriptPath/extensions/oflash/jwplayer.swf\"><param name=\"FlashVars\" value=\"file=$file\"><param name=\"allowfullscreen\" value=\"true\"><param name=\"allowscriptaccess\" value=\"always\"><p>This is supposed to be a flash video. You'll need the flash plugin and a browser that supports it to view to it.</p></object>";
	}
	if ($thumb&&$caption) $out.="<div class=\"thumbcaption\">$caption</div>";
	if (!$GLOBALS['oflashAlready']) $out.="<div style=\"height:0;outline;0;padding:0;margin:0;overflow:hidden;\"><object type=\"application/x-shockwave-flash\" width=\"1\" height=\"1\" codebase=\"http://download.macromedia.com
/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0\"><param name=\"pluginspage\" value=\"http://www.macromedia.com/go/getflashplayer\"></object></div>";
	if ($thumb) {
		$out.='</div></div>';
	}
	
	$GLOBALS['oflashAlready']=true;
	
	return $out;
}
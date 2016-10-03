<?php

/*
Bauhaus University Medien Wiki
Configured by:
Hasibullah Sahibzada  (hasibullah@sahibzada.org)
*/

########################## SkinPerNamepace #####################################
require_once( "$IP/extensions/SkinPerNamespace/SkinPerNamespace.php" );



##################################### Video players ################################

# 1) EmbedVideo extenion (newer)
wfLoadExtension("EmbedVideo");


# 2) videoflash extention (old extention)
require_once( "$IP/extensions/VideoFlash/VideoFlash.php" );


# Advanced editor 
#Download link from : https://github.com/Mediawiki-wysiwyg/WYSIWYG-CKeditor
#wfLoadExtension( 'WYSIWYG' );

# good editor
#wfLoadExtension( 'WikiEditor' );		# this extension is required for WYSIWYG extention

# upload multiple files at once
wfLoadExtension( 'MsUpload' );

#language selecto
//require_once "$IP/extensions/LanguageSelector/LanguageSelector.php";

#PDFhandler (by default in 1.27.0)
wfLoadExtension( 'PdfHandler' );

# pdf embed tool
require("$IP/extensions/PDFEmbed/PDFEmbed.php");

#Cite
require_once "$IP/extensions/Cite/Cite.php";

# SyntaxHighlighter
require_once("$IP/extensions/SyntaxHighlight_GeSHi/SyntaxHighlight_GeSHi.php");

# Confirm edit prevents from spambot attacks
require_once "$IP/extensions/ConfirmEdit/ConfirmEdit.php";

#ImageMap
require_once "$IP/extensions/ImageMap/ImageMap.php";

#AntiBot
require_once "$IP/extensions/AntiBot/AntiBot.php";

#UserThrottle
require_once("$IP/extensions/UserThrottle/UserThrottle.php");

#checkEmailAddress
require_once("$IP/extensions/CheckEmailAddress/CheckEmailAddress.php");

#emaildomaincheck 
//require_once "$IP/extensions/EmailDomainCheck/EmailDomainCheck.php";

#map defaul google map
require_once "$IP/extensions/MultiMaps/MultiMaps.php";

# of-flash
# downloaded from http://bfot.co.uk/orifice/oflash/
require_once("$IP/extensions/oflash/orificeflash.php");

#flashmp3 player
# combination of two sources and made it functional
# original plugin from https://www.mediawiki.org/wiki/Extension:FlashMP3
# audio-player.js and player.swf downloaded from http://wpaudioplayer.com/download/
require_once("$IP/extensions/FlashMP3/flashmp3.php");

#random images
require_once "$IP/extensions/RandomImage/RandomImage.php";


#fancy thumbs
require_once("$IP/extensions/FancyBoxThumbs/FancyBoxThumbs.php");


#require_once "$IP/extensions/MobileFrontend/MobileFrontend.php";
wfLoadExtension('MobileFrontend');


# lingo extension
wfLoadExtension('Lingo');



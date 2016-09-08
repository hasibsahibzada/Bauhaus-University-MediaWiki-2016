<?php

$bootstrapDirParts = explode( DIRECTORY_SEPARATOR, __DIR__ );

$bootstrapDir =  array_pop( $bootstrapDirParts);


$wgResourceModules['bootstrap.bauhausmediawiki'] = array(
	'styles' => array(
		$bootstrapDir . '/bootstrap/css/bootstrap.min.css'            => array( 'media' => 'all' ),
		$bootstrapDir . '/google-code-prettify/prettify.css'          => array( 'media' => 'all' ),
		$bootstrapDir . '/style.css'                                  => array( 'media' => 'all' ),
		$bootstrapDir . '/font-awesome/css/font-awesome.min.css'      => array( 'media' => 'all' ),
		$bootstrapDir . '/sidebar/sidebar.css'      				  => array( 'media' => 'all' ),
	),
	'scripts' => array(
		$bootstrapDir . '/bootstrap/js/bootstrap.min.js',
		$bootstrapDir . '/google-code-prettify/prettify.js',
		$bootstrapDir . '/js/jquery.ba-dotimeout.min.js',
		$bootstrapDir . '/js/behavior.js',
	),
	'dependencies' => array(
		'jquery',
		'jquery.mwExtension',
		'jquery.client',
		'jquery.cookie',
	),
	'remoteBasePath' => &$GLOBALS['wgStylePath'],
	'localBasePath'  => &$GLOBALS['wgStyleDirectory'],
);

if ( isset( $wgSiteJS ) ) {
	$wgResourceModules['bootstrap.bauhausmediawiki']['scripts'][] = $bootstrapDir . '/' . $wgSiteJS;
}//end if

if ( isset( $wgSiteCSS ) ) {
	$wgResourceModules['bootstrap.bauhausmediawiki']['styles'][] = $bootstrapDir . '/' . $wgSiteCSS;
}//end if


?>
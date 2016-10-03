<?php

/**
 * A simple text response that matches XRumer's definition of success
 */

$wgAntiBotPluginTypes['fakeSuccess'] = array( 'AntiBot_XRumerFakeSuccess', 'fakeSuccess' );

class AntiBot_XRumerFakeSuccess {
	static function fakeSuccess() {
		echo "gracis por firmar edit rejected\n";
		exit;
	}
}


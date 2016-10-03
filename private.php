<?php

/*
Bauhaus University Medien Wiki
Configured by:
Hasibullah Sahibzada  (hasibullah@sahibzada.org)
*/



################################ Database settings ################################
$wgDBtype 			= "mysql";
$wgDBserver 		= "localhost";
$wgDBname 			= "";
$wgDBuser 			= "";
$wgDBpassword 		= "";


# MySQL specific settings
$wgDBprefix 		= "wki_";



# MySQL table options to use during installation or update
$wgDBTableOptions 	= "ENGINE=InnoDB, DEFAULT CHARSET=binary";


#Experimental charset support for MySQL 5.0.
$wgDBmysql5 		= false;


################################ Media Wiki Keys ################################



$wgSecretKey 		= "ec89f001fd3a8bfac97f3e87f05f99f6c97fd0aae7ccba65817d48f081995814";

# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
$wgUpgradeKey 		= "c79de8a94c28d2a1";


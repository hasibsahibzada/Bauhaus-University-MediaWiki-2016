<?php
/**
 * Extension checks that registering users
 * are from a specific email domain
 * during account creation.
 *
 * @package MediaWiki
 * @subpackage Extensions
 * @author wookienz <wookienz@gmail.com>
 */

/**
 * email domain that user must come from
 */

// Check if we are being called directly
if ( !defined( 'MEDIAWIKI' ) ) {
        die( 'This file is an extension to MediaWiki and thus not a valid entry point.' );
}

// Tell the whereabouts of the other files
$wgExtensionMessagesFiles['EmailDomainCheck'] = dirname(__FILE__) . '/EmailDomainCheck.i18n.php';

// Extension credits that will show up on Special:Version
$wgExtensionCredits['other'][] = array(
       'path' => __FILE__,
       'name' => 'Email Domain Check',
       'author' => 'Wookienz',
       'version' => '0.3.1',
       'url' => 'https://www.mediawiki.org/wiki/Extension:EmailDomainCheck',
       'descriptionmsg' => 'emaildomaincheck-desc',
);

// Register hooks
$wgHooks['AbortNewAccount'][] = 'onAbortNewAccount';

/**
 * Hooks the account creation process,
 * will cancel the prcoess if the dmain is not correct.
 *
 * @param User $user User object being created
 * @param string $error Reference to the error message to show
 * @return bool
 */

// Do the extension's job
/* From http://stackoverflow.com/questions/834303/php-startswith-and-endswith-functions */
function efEndsWith($haystack, $needle)
{
    return $needle === "" || substr($haystack, -strlen($needle)) === $needle;
}

function onAbortNewAccount( $user, &$message ) {
        global $wgEmailDomain;
        if ( isset( $wgEmailDomain ) ) {

              $delim = '@';
              $intNumberOfListItems = 2;

              var_dump($user->getEmail());
              //list($name, $host) = array_pad(explode($delim, $user->getEmail(), $intNumberOfListItems ), $intNumberOfListItems , null);
              list( $name, $host ) = explode( "@", $user->getEmail() );

              //var_dump($user->getEmail());
             // list( $name, $host ) = explode( "@", $user->getEmail() );

                //if ( efEndsWith( $host, $wgEmailDomain ) ) { // use this line to allow subdomains of $wgEmailDomain
                
                if (in_array($host,$wgEmailDomain)) {
                        return true;
                } else {
                        $message = wfMessage( 'emaildomaincheck-error', $wgEmailDomain );
                        return false;
                }
        }
}



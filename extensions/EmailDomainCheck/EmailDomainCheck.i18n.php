<?php
/**
 * Internationalisation file for extension EmailDomainCheck
 *
 * @addtogroup Extensions
 */

$messages = array();

/** English
 * @author Wookienz
 */
$messages['en'] = array(
        'emaildomaincheck-desc'  => 'Enforces a specific email domain during registration',
        'emaildomaincheck-error' => 'Your email domain is invalid. Your email address must end in $1.',
);

/** German (Deutsch)
 * @author SVG
 * @author kghbln
 */
$messages['de'] = array(
        'emaildomaincheck-desc'  => 'Erzwingt bei der Registrierung eine bestimmte E-Mail-Domain',
        'emaildomaincheck-error' => 'Die Domain deiner E-Mail-Adresse ist ungültig. Deine E-Mail-Adresse muss mit $1 enden.',
);

/** German (formal address) (Deutsch (Sie-Form))
 * @author SVG
 * @author kghbln
 */
$messages['de-formal'] = array(
        'emaildomaincheck-error' => 'Die Domain Ihrer E-Mail-Adresse ist ungültig. Ihre E-Mail-Adresse muss mit $1 enden.',
);
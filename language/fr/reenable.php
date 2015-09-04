<?php
/**
*
* Reenable extensions extension for the phpBB Forum Software package.
* French translation by Galixte (http://www.galixte.com)
*
* @copyright (c) 2015 LavIgor
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ « » “ ” …
//

$lang = array_merge($lang, array(
	'ACP_REENABLE'					=> 'Réactiver les extensions',
	'ACP_REENABLE_EXPLAIN'			=> 'Permet de rafraichir rapidement le cache des fichiers et des paramètres des extensions. Très pratique pour les développeurs en permettant de réaliser plusieurs actions en un clic. Il est aussi possible de réinstaller en un clic.<br />Merci de prendre note qu’il est important de connaitre le processus d’activation et de désactivation d’extensions et des résultats obtenus.',
	'ACP_REENABLE_LIST'				=> 'Réactiver les extensions',
	'EXTENSION_REENABLE'			=> 'Réactiver',
	'EXTENSION_REENABLE_EXPLAIN'	=> 'Permet de réactiver une extension en la désactivant puis, en l’activant tout en rafraichissant le cache des fichiers et paramètres de cette extension.',
	'EXTENSION_REINSTALL'			=> 'Réinstaller',
	'EXTENSION_REINSTALL_EXPLAIN'	=> 'Permet de réinstaller une extension en la désactivant puis, en supprimant ses données enfin, en l’activant tout en rafraichissant le cache des fichiers et paramètres de cette extension.',
	'LOG_EXT_REENABLE'				=> '<strong>Extension réactivée</strong><br />» %s',
	'LOG_EXT_REINSTALL'				=> '<strong>Extension réinstallée</strong><br />» %s',
));

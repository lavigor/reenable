<?php
/**
 *
 * @package Reenable Extensions
 * @copyright (c) 2014 LavIgor
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

/**
* @ignore
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

$lang = array_merge($lang, array(
	'ACP_REENABLE'					=> 'Reenable extensions',
	'ACP_REENABLE_EXPLAIN'			=> 'Reenabling extensions lets you quickly refresh files and settings of extensions to add new functionality. It is useful for extension developers as it transforms the standard six-clicks way into a single click. Additionally you can reinstall extensions with a single click instead of standard nine clicks.<br />NOTE: You need to be sure that you know the process of enabling and disabling extensions and probable results of it.',
	'ACP_REENABLE_LIST'				=> 'Reenable extensions',
	'EXTENSION_REENABLE'			=> 'Reenable',
	'EXTENSION_REENABLE_EXPLAIN'	=> 'Reenabling an extension disables and enables it to refresh files and settings of the extension.',
	'EXTENSION_REINSTALL'			=> 'Reinstall',
	'EXTENSION_REINSTALL_EXPLAIN'	=> 'Reinstalling an extension disables it, deletes data of the extension and then enables it to refresh files and settings of the extension.',
));

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
	'ACP_REENABLE'					=> 'Перезапуск расширений',
	'ACP_REENABLE_EXPLAIN'			=> 'Перезапуск расширений позволяет вам быстро обновить файлы и настройки расширений, чтобы добавить новый функционал. Перезапуск полезен для разработчиков расширений, поскольку он преобразует стандартный подход из шести кликов в один клик.<br />ПРИМЕЧАНИЕ: Вы должны быть уверены, что вы ознакомлены с процессом включения и выключения расширений и возможными результатами данного процесса.',
	'ACP_REENABLE_LIST'				=> 'Перезапуск расширений',
	'EXTENSION_REENABLE'			=> 'Перезапустить',
	'EXTENSION_REENABLE_EXPLAIN'	=> 'Перезапуск расширения выключает и включает его, обновляя файлы и настройки расширения.',
));

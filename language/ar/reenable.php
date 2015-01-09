<?php
/**
 *
 * @package Reenable Extensions
 * @copyright (c) 2014 LavIgor
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 * Translated By : Basil Taha Alhitary - www.alhitary.net
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
	'ACP_REENABLE'					=> 'إعادة تفعيل الإضافات',
	'ACP_REENABLE_EXPLAIN'			=> 'إعادة تفعيل الإضافات تعطيك امكانية تجديد الملفات والإعدادات الخاصة بالإضافة بطريقة سريعة من أجل إضافة خصائص جديدة. وهي مفيدة لمبرمجي الإضافة لأنها تختصر طريقة التحديث ذات ال6 نقرات إلى نقرة واحدة. وأيضاً تستطيع إعادة تنصيب الإضافة بنقرة واجدة فقط بدلاً من الـ 9 نقرات.<br />ملاحظة : يجب أن تكون على معرفة بعملية تعطيل و تفعيل الإضافات والنتائج المتوقعة من ذلك.',
	'ACP_REENABLE_LIST'				=> 'إعادة تفعيل الإضافات',
	'EXTENSION_REENABLE'			=> 'إعادة التفعيل',
	'EXTENSION_REENABLE_EXPLAIN'	=> 'إعادة تفعيل الإضافة تعني تعطيل و تفعيل الإضافة لكي يتم تجديد الملفات والإعدادات الخاصة بها.',
	'EXTENSION_REINSTALL'			=> 'إعادة التنصيب',
	'EXTENSION_REINSTALL_EXPLAIN'	=> 'إعادة تنصيب الإضافة تعني تعطيل و حذف بيانات الإضافة ومن ثم تفعيلها لكي يتم تجديد الملفات والإعدادات الخاصة بها.',
	'LOG_EXT_REENABLE'				=> '<strong>تم إعادة تفعيل الإضافة بنجاح</strong><br />» %s',
	'LOG_EXT_REINSTALL'				=> '<strong>تم إعادة تنصيب الإضافة بنجاح</strong><br />» %s',
));

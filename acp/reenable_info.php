<?php
/**
 *
 * @package Reenable Extensions
 * @copyright (c) 2014 LavIgor
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace lavigor\reenable\acp;

/**
* @package module_install
*/
class reenable_info
{
	function module()
	{
		return array(
			'filename'	=> '\lavigor\reenable\acp\reenable_module',
			'title'		=> 'ACP_REENABLE',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'list'				=> array(
					'title' => 'ACP_REENABLE_LIST',
					'auth' => 'ext_lavigor/reenable && acl_a_extensions',
					'cat' => array('ACP_EXTENSION_MANAGEMENT')),
			),
		);
	}

	function install()
	{
	}

	function uninstall()
	{
	}
}

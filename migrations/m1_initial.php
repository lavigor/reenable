<?php
/**
 *
 * @package Reenable Extensions
 * @copyright (c) 2014 LavIgor
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace lavigor\reenable\migrations;

class m1_initial extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['reenable_extensions_version']) && version_compare($this->config['reenable_extensions_version'], '1.0.0', '>=');
	}

	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v310\dev');
	}

	public function update_data()
	{
		return array(
			array('module.add', array('acp', 'ACP_EXTENSION_MANAGEMENT', array(
				'module_basename'	=> '\lavigor\reenable\acp\reenable_module',
				'module_auth'		=> 'ext_lavigor/reenable && acl_a_extensions',
			))),
			array('config.add', array('reenable_extensions_version', '1.0.0')),
		);
	}
}

<?php
/**
 *
 * @package Reenable Extensions
 * @copyright (c) 2014 LavIgor
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace lavigor\reenable\acp;

class reenable_module
{
	var $u_action;

	private $db;
	private $config;
	private $template;
	private $user;
	private $cache;
	private $log;
	private $request;

	function main()
	{
		// Start the page
		global $config, $user, $template, $request, $phpbb_extension_manager, $db, $phpbb_root_path, $phpEx, $phpbb_log, $cache;

		$this->db = $db;
		$this->config = $config;
		$this->template = $template;
		$this->user = $user;
		$this->cache = $cache;
		$this->request = $request;
		$this->log = $phpbb_log;

		$user->add_lang(array('install', 'acp/extensions', 'migrator'));
		$user->add_lang_ext('lavigor/reenable', 'reenable');

		$this->page_title = 'ACP_REENABLE';

		$action = $request->variable('action', 'list');
		$ext_name = $request->variable('ext_name', '');

		// What is a safe limit of execution time? Half the max execution time should be safe.
		$safe_time_limit = (ini_get('max_execution_time') / 2);
		$start_time = time();

		// If they've specified an extension, let's load the metadata manager and validate it.
		if ($ext_name)
		{
			$md_manager = $phpbb_extension_manager->create_extension_metadata_manager($ext_name, $template);

			try
			{
				$md_manager->get_metadata('all');
			}
			catch(\phpbb\extension\exception $e)
			{
				trigger_error($e, E_USER_WARNING);
			}
		}

		// What are we doing?
		switch ($action)
		{
			case 'list':
			default:
				$this->list_enabled_exts($phpbb_extension_manager, $ext_name);

				$this->template->assign_vars(array(
					'U_VERSIONCHECK_FORCE' 	=> $this->u_action . '&amp;action=list&amp;versioncheck_force=1',
					'FORCE_UNSTABLE'		=> $config['extension_force_unstable'],
					'U_ACTION' 				=> $this->u_action,
				));

				$this->tpl_name = 'acp_ext_reenable';
				break;

			case 'reenable':
			case 'reinstall':
				if (!$phpbb_extension_manager->is_enabled($ext_name))
				{
					redirect($this->u_action);
				}
				// We do not want too many logs for reinstallation
				$this->log->disable('admin');

				while ($phpbb_extension_manager->disable_step($ext_name))
				{
					// Are we approaching the time limit? If so we want to pause the update and continue after refreshing
					if ((time() - $start_time) >= $safe_time_limit)
					{
						$template->assign_var('S_NEXT_STEP', true);

						meta_refresh(0, $this->u_action . '&amp;action='.$action.'&amp;ext_name=' . urlencode($ext_name));
					}
				}

				if ($action == 'reinstall')
				{
					try
					{
						while ($phpbb_extension_manager->purge_step($ext_name))
						{
							// Are we approaching the time limit? If so we want to pause the update and continue after refreshing
							if ((time() - $start_time) >= $safe_time_limit)
							{
								$template->assign_var('S_NEXT_STEP', true);

								meta_refresh(0, $this->u_action . '&amp;action='.$action.'&amp;ext_name=' . urlencode($ext_name));
							}
						}
					}
					catch (\phpbb\db\migration\exception $e)
					{
						$template->assign_var('MIGRATOR_ERROR', $e->getLocalisedMessage($user));
					}
				}

				if (!$md_manager->validate_dir())
				{
					trigger_error($user->lang['EXTENSION_DIR_INVALID'] . adm_back_link($this->u_action), E_USER_WARNING);
				}

				if (!$md_manager->validate_enable())
				{
					trigger_error($user->lang['EXTENSION_NOT_AVAILABLE'] . adm_back_link($this->u_action), E_USER_WARNING);
				}

				try
				{
					while ($phpbb_extension_manager->enable_step($ext_name))
					{
						// Are we approaching the time limit? If so we want to pause the update and continue after refreshing
						if ((time() - $start_time) >= $safe_time_limit)
						{
							$template->assign_var('S_NEXT_STEP', true);

							meta_refresh(0, $this->u_action . '&amp;action='.$action.'&amp;ext_name=' . urlencode($ext_name));
						}
					}
				}
				catch (\phpbb\db\migration\exception $e)
				{
					$template->assign_var('MIGRATOR_ERROR', $e->getLocalisedMessage($user));
				}

				$this->log->enable('admin');
				if ($action == 'reinstall')
				{
					$this->log->add('admin', $user->data['user_id'], $user->ip, 'LOG_EXT_REINSTALL', time(), array($ext_name));
				}
				else
				{
					$this->log->add('admin', $user->data['user_id'], $user->ip, 'LOG_EXT_REENABLE', time(), array($ext_name));
				}

				redirect($this->u_action . '&amp;action=list&amp;ext_name=' . urlencode($ext_name));
				break;
		}
	}

	/**
	 * Lists all the enabled extensions and dumps to the template
	 *
	 * @param  $phpbb_extension_manager     An instance of the extension manager
	 * @param  $ext_name                    Name of the reenabled extension
	 * @return null
	 */
	public function list_enabled_exts(\phpbb\extension\manager $phpbb_extension_manager, $ext_name)
	{
		$enabled_extension_meta_data = array();

		foreach ($phpbb_extension_manager->all_enabled() as $name => $location)
		{
			$md_manager = $phpbb_extension_manager->create_extension_metadata_manager($name, $this->template);

			try
			{
				$meta = $md_manager->get_metadata('all');
				$enabled_extension_meta_data[$name] = array(
					'META_DISPLAY_NAME' => $md_manager->get_metadata('display-name'),
					'META_VERSION' => $meta['version'],
				);

				if ($name == $ext_name)
				{
					$enabled_extension_meta_data[$name]['REENABLED'] = true;
				}

				$force_update = $this->request->variable('versioncheck_force', false);
				$updates = $this->version_check($md_manager, $force_update, !$force_update);

				$enabled_extension_meta_data[$name]['S_UP_TO_DATE'] = empty($updates);
				$enabled_extension_meta_data[$name]['S_VERSIONCHECK'] = true;
			}
			catch(\phpbb\extension\exception $e)
			{
				$this->template->assign_block_vars('disabled', array(
					'META_DISPLAY_NAME'		=> $this->user->lang('EXTENSION_INVALID_LIST', $name, $e),
					'S_VERSIONCHECK'		=> false,
				));
			}
			catch (\RuntimeException $e)
			{
				$enabled_extension_meta_data[$name]['S_VERSIONCHECK'] = false;
			}
		}

		uasort($enabled_extension_meta_data, array($this, 'sort_extension_meta_data_table'));

		foreach ($enabled_extension_meta_data as $name => $block_vars)
		{
			$this->template->assign_block_vars('enabled', $block_vars);

			$this->output_actions('enabled', array(
				'REENABLE'		=> $this->u_action . '&amp;action=reenable&amp;ext_name=' . urlencode($name),
				'REINSTALL'		=> $this->u_action . '&amp;action=reinstall&amp;ext_name=' . urlencode($name),
			));
		}
	}

	/**
	 * Output actions to a block
	 *
	 * @param string $block
	 * @param array $actions
	 */
	private function output_actions($block, $actions)
	{
		foreach ($actions as $lang => $url)
		{
			$this->template->assign_block_vars($block . '.actions', array(
				'L_ACTION'			=> $this->user->lang('EXTENSION_' . $lang),
				'L_ACTION_EXPLAIN'	=> (isset($this->user->lang['EXTENSION_' . $lang . '_EXPLAIN'])) ? $this->user->lang('EXTENSION_' . $lang . '_EXPLAIN') : '',
				'U_ACTION'			=> $url,
			));
		}
	}

	/**
	 * Check the version and return the available updates.
	 *
	 * @param \phpbb\extension\metadata_manager $md_manager The metadata manager for the version to check.
	 * @param bool $force_update Ignores cached data. Defaults to false.
	 * @param bool $force_cache Force the use of the cache. Override $force_update.
	 * @return string
	 * @throws RuntimeException
	 */
	protected function version_check(\phpbb\extension\metadata_manager $md_manager, $force_update = false, $force_cache = false)
	{
		$meta = $md_manager->get_metadata('all');

		if (!isset($meta['extra']['version-check']))
		{
			throw new \RuntimeException($this->user->lang('NO_VERSIONCHECK'), 1);
		}

		$version_check = $meta['extra']['version-check'];

		if (version_compare($this->config['version'], '3.1.1', '>'))
		{
			$version_helper = new \phpbb\version_helper($this->cache, $this->config, new \phpbb\file_downloader(), $this->user);
		}
		else
		{
			$version_helper = new \phpbb\version_helper($this->cache, $this->config, $this->user);
		}
		$version_helper->set_current_version($meta['version']);
		$version_helper->set_file_location($version_check['host'], $version_check['directory'], $version_check['filename']);
		$version_helper->force_stability($this->config['extension_force_unstable'] ? 'unstable' : null);

		return $updates = $version_helper->get_suggested_updates($force_update, $force_cache);
	}

	/**
	 * Sort helper for the table containing the metadata about the extensions.
	 */
	protected function sort_extension_meta_data_table($val1, $val2)
	{
		return strnatcasecmp($val1['META_DISPLAY_NAME'], $val2['META_DISPLAY_NAME']);
	}
}

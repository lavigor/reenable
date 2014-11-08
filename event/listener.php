<?php
/**
 *
 * @package Reenable Extensions
 * @copyright (c) 2014 LavIgor
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace lavigor\reenable\event;

/**
* Event listener
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	public function __construct(\phpbb\user $user)
	{
		$this->user = $user;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.get_logs_modify_type'	=> 'load_language_for_logs',
		);
	}

	/**
	 * @param object $event The event object
	 * @return null
	 * @access public
	 */
	public function load_language_for_logs($event)
	{
		$this->user->add_lang_ext('lavigor/reenable', 'reenable');
	}
}

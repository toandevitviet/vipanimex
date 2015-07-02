<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_whosonline
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Helper for mod_whosonline
 *
 * @since  1.5
 */
class ModAdvsHelper
{
	public static function getAdvs()
	{
		$db = JFactory::getDbo();
		$result	     = array();
		$query = $db->getQuery(true)
			->select('*')
			->from('#__advertisement_advs');
		$db->setQuery($query);
		$result = $db->loadObjectList();
		return $result;
	}
}

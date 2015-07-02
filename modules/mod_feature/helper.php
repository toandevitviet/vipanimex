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
 * Helper for 
 *
 * @since  1.5
 */
class ModFeatureHelper
{
	public static function getProducts()
	{
		$db = JFactory::getDbo();
		$result	     = array();
		$query = $db->getQuery(true)
			->select('*')
			->from('#__content');
		$db->setQuery($query); 
		$result = $db->loadObjectList();
		return $result;
	}
}

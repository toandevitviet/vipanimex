<?php
/**
 * @version $Id: djcatalog2.php 196 2013-11-04 08:19:22Z michal $
 * @package DJ-Catalog2
 * @copyright Copyright (C) 2012 DJ-Extensions.com LTD, All rights reserved.
 * @license http://www.gnu.org/licenses GNU/GPL
 * @author url: http://dj-extensions.com
 * @author email contact@dj-extensions.com
 * @developer Michal Olczyk - michal.olczyk@design-joomla.eu
 *
 * DJ-Catalog2 is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * DJ-Catalog2 is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with DJ-Catalog2. If not, see <http://www.gnu.org/licenses/>.
 *
 */

defined('_JEXEC') or die('Restricted access');

require_once(JPATH_BASE.DS.'administrator'.DS.'components'.DS.'com_djcatalog2'.DS.'lib'.DS.'categories.php');

class Djcatalog2Helper {
	static $params = null;
	
	public static function getParams($reload = false) {
		if (!self::$params || $reload == true) {
			$app		= JFactory::getApplication();
			
			// our params
			$params = new JRegistry();
			
			// component's global params
			$cparams = JComponentHelper::getParams( 'com_djcatalog2' );
			
			// current params - all
			$aparams = $app->getParams();
			
			// curent params - djc2 only
			$mparams = $app->getParams('com_djcatalog2'); 
			
			// first let's use all current params
			$params->merge($aparams);
			
			// then override them with djc2 global settings - in case some other extension share's the same parameter name
			$params->merge($cparams);
			
			// finally, override settings with current params, but only related to djc2.
			$params->merge($mparams);
			
			// ...and then, override with category specific params
			$option = $app->input->get('option');
			$view = $app->input->get('view');
			
			if ($option = 'com_djcatalog2' && ($view = 'item' || $view = 'items')) {
				$categories = Djc2Categories::getInstance();
				$category = $categories->get((int) $app->input->get('cid',0,'int'));
				if (!empty($category)) {
					$catpath = array_reverse($category->getPath());
					foreach($catpath as $k=>$v) {
						$parentCat = $categories->get((int)$v);
						if (!empty($parentCat) && !empty($category->params)) {
							$catparams = new JRegistry($parentCat->params); 
							$params->merge($catparams);
						}
					}
				}
			}
			
			$listLayout = $app->input->get('l', $app->getUserState('com_djcatalog2.list_layout', null), 'cmd');
			if ($listLayout == 'items') {
				$app->setUserState('com_djcatalog2.list_layout', 'items');
				$params->set('list_layout', 'items');
			} else if ($listLayout == 'table') {
				$app->setUserState('com_djcatalog2.list_layout', 'table');
				$params->set('list_layout', 'table');
			}
			
			$catalogMode = $app->input->get('cm', null, 'int');
			$indexSearch = $app->input->get('ind', null, 'string');
			
			$globalSearch = urldecode($app->input->get( 'search','','string' ));
			$globalSearch = trim(JString::strtolower( $globalSearch ));
			if (substr($globalSearch,0,1) == '"' && substr($globalSearch, -1) == '"') { 
				$globalSearch = substr($globalSearch,1,-1);
			}
			if (strlen($globalSearch) > 0 && (strlen($globalSearch)) < 3 || strlen($globalSearch) > 20) {
				 $globalSearch = null;
			}
			if ($catalogMode === 0 || $globalSearch || $indexSearch) {
				$params->set('product_catalogue','0');
				// set 'filtering' variable in REQUEST
				// so we could hide for example sub-categories 
				// when searching/filtering is performed
				$app->input->set('filtering', true);
			}
			
			self::$params = $params;
		}
		return self::$params;
	}
}
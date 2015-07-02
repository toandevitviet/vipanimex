<?php
/**
 * @version $Id: mod_djc2producers.php 168 2013-10-17 05:59:45Z michal $
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

defined ('_JEXEC') or die('Restricted access');

if (!defined('DS')) {
	define('DS', DIRECTORY_SEPARATOR);
}

require_once(dirname(__FILE__).DS.'helper.php');
require_once(JPATH_BASE.DS.'components'.DS.'com_djcatalog2'.DS.'helpers'.DS.'route.php');
require_once(JPATH_BASE.DS.'components'.DS.'com_djcatalog2'.DS.'helpers'.DS.'theme.php');
require_once(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_djcatalog2'.DS.'lib'.DS.'categories.php');
$app = JFactory::getApplication();

DJCatalog2ThemeHelper::setThemeAssets();
$lang = JFactory::GetLanguage();
$lang->load('com_djcatalog2');
$p = new DJCatalog2ModProducer();

$cid = null;

if ($app->input->getInt('cid',0) != 0 && !$params->get('filter')) {
	$cid = $app->input->get('cid',0, 'string');
}
else $cid = 0;

$producers = $p->getProducers($cid);

$order = $app->input->get('order','i.ordering','default','string');
$orderDir = $app->input->get('dir','asc','cmd');
$prod_id = $app->input->get('pid', 0, 'string');
$search = $app->input->get('search', '', 'string');

$Itemid = $app->input->get('Itemid', 0, 'int');

require(JModuleHelper::getLayoutPath('mod_djc2producers', $params->get('layout', 'default')));

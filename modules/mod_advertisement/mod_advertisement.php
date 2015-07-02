<?php

defined('_JEXEC') or die;

// Include the partner functions only once
require_once __DIR__ . '/helper.php';

$avds = ModAdvsHelper::getAdvs($params); 
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
require JModuleHelper::getLayoutPath('mod_advertisement', $params->get('layout', 'default'));

<?php

/**
 * @version     1.0.0
 * @package     com_partner
 * @copyright   Toanlm
 * @license     Toanlm
 * @author      Toanlm <gep2a76@gmail.com> - http://
 */
// No direct access
defined('_JEXEC') or die;

/**
 * Partner helper.
 */
class PartnerHelper {

    /**
     * Configure the Linkbar.
     */
    public static function addSubmenu($vName = '') {
        		JHtmlSidebar::addEntry(
			JText::_('COM_PARTNER_TITLE_PARTNERS'),
			'index.php?option=com_partner&view=partners',
			$vName == 'partners'
		);

    }

    /**
     * Gets a list of the actions that can be performed.
     *
     * @return	JObject
     * @since	1.6
     */
    public static function getActions() {
        $user = JFactory::getUser();
        $result = new JObject;

        $assetName = 'com_partner';

        $actions = array(
            'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
        );

        foreach ($actions as $action) {
            $result->set($action, $user->authorise($action, $assetName));
        }

        return $result;
    }


}

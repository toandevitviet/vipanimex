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

jimport('joomla.application.component.controllerform');

/**
 * Partner controller class.
 */
class PartnerControllerPartner extends JControllerForm
{

    function __construct() {
        $this->view_list = 'partners';
        parent::__construct();
    }

}
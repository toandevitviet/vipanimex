<?php
/**
 * @version     1.0.0
 * @package     com_advertisement
 * @copyright   Toanlm
 * @license     Toanlm
 * @author      Toanlm <gep2a76@gmail.com> - http://
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Advertisement controller class.
 */
class AdvertisementControllerAdvertisement extends JControllerForm
{

    function __construct() {
        $this->view_list = 'advertisements';
        parent::__construct();
    }

}
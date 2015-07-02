<?php
/**
 * @Copyright
 *
 * @package    BLS - Backend Language Switcher
 * @author     Viktor Vogel <admin@kubik-rubik.de>
 * @version    3-3 - 2015-02-02
 * @link       https://joomla-extensions.kubik-rubik.de/bls-backend-language-switcher
 *
 * @license    GNU/GPL
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
defined('_JEXEC') or die('Restricted access');

class ModBackendLanguageSwitcherHelper extends JObject
{
    function __construct()
    {
        $backendlanguage = JFactory::getApplication()->input->get('backendlanguage');

        if(!empty($backendlanguage))
        {
            $this->setLanguage($backendlanguage);
        }
    }

    private function setLanguage($backendlanguage)
    {
        $session = JFactory::getSession()->get('registry');
        $message = JText::_('MOD_BACKENDLANGUAGESWITCHER_LANGUAGECHANGED');

        if(!JLanguage::exists($backendlanguage))
        {
            $backendlanguage = 'en-GB';
            $message = JText::_('MOD_BACKENDLANGUAGESWITCHER_LANGUAGENOTFOUND');
        }

        $session->set('application.lang', $backendlanguage);

        $url = preg_replace('@[?|&]backendlanguage=(.+)$@', '', JUri::getInstance()->toString());
        JFactory::getApplication()->redirect($url, $message, 'notice');
    }

    public function createLanguageList()
    {
        $session = JFactory::getSession()->get('registry');
        $language_activated = $session->get('application.lang');

        if(empty($language_activated))
        {
            $language_activated = JFactory::getLanguage()->getTag();
        }

        $languages = JLanguageHelper::createLanguageList($language_activated);
        $url = JUri::getInstance()->toString();

        if(preg_match('@\?@', $url))
        {
            $url = $url.'&backendlanguage=';
        }
        else
        {
            $url = $url.'?backendlanguage=';
        }

        $output = '<ul class="nav pull-right"><li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">'.$language_activated.' <span class="caret"></span></a><ul class="dropdown-menu">';

        foreach($languages as $language)
        {
            if($language['value'] == $language_activated)
            {
                $output .= '<li><a href="'.$url.$language['value'].'"><strong>'.$language['text'].'</strong></a></li>';
            }
            else
            {
                $output .= '<li><a href="'.$url.$language['value'].'">'.$language['text'].'</a></li>';
            }
        }

        $output .= '</ul></li></ul>';

        return $output;
    }
}

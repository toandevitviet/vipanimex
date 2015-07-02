<?php
/**
 * @version $Id: default.php 178 2013-10-24 12:27:01Z michal $
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

defined('_JEXEC') or die('Restricted access'); ?>

<form action="index.php" method="post" name="adminForm">
<?php if(!empty( $this->sidebar)): ?>
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10">
	<?php else: ?>
	<div id="j-main-container">
	<?php endif;?>
		<div class="djc_control_panel clearfix">
			<div class="cpanel-left">
				<div class="cpanel">
						<div class="icon">
							<a href="index.php?option=com_djcatalog2&amp;view=items">
								<img alt="<?php echo JText::_('COM_DJCATALOG2_ITEMS'); ?>" src="<?php echo JURI::base(); ?>components/com_djcatalog2/assets/images/icon-48-item.png" />
								<span><?php echo JText::_('COM_DJCATALOG2_ITEMS'); ?></span>
							</a>
						</div>
						<div class="icon">
							<a href="index.php?option=com_djcatalog2&amp;view=categories">
								<img alt="<?php echo JText::_('COM_DJCATALOG2_CATEGORIES'); ?>" src="<?php echo JURI::base(); ?>components/com_djcatalog2/assets/images/icon-48-category.png" />
								<span><?php echo JText::_('COM_DJCATALOG2_CATEGORIES'); ?></span>
							</a>
						</div>
						<div class="icon">
							<a href="index.php?option=com_djcatalog2&amp;view=producers">
								<img alt="<?php echo JText::_('COM_DJCATALOG2_PRODUCERS'); ?>" src="<?php echo JURI::base(); ?>components/com_djcatalog2/assets/images/icon-48-producer.png" />
								<span><?php echo JText::_('COM_DJCATALOG2_PRODUCERS'); ?></span>
							</a>
						</div>
						<div class="icon">
							<a href="index.php?option=com_djcatalog2&amp;view=fieldgroups">
								<img alt="<?php echo JText::_('COM_DJCATALOG2_FIELDGROUPS'); ?>" src="<?php echo JURI::base(); ?>components/com_djcatalog2/assets/images/icon-48-fieldgroups.png" />
								<span><?php echo JText::_('COM_DJCATALOG2_FIELDGROUPS'); ?></span>
							</a>
						</div>
						<div class="icon">
							<a href="index.php?option=com_djcatalog2&amp;view=fields">
								<img alt="<?php echo JText::_('COM_DJCATALOG2_FIELDS'); ?>" src="<?php echo JURI::base(); ?>components/com_djcatalog2/assets/images/icon-48-extrafields.png" />
								<span><?php echo JText::_('COM_DJCATALOG2_FIELDS'); ?></span>
							</a>
						</div>
						
						<div style="clear: both"></div>
						
						<div class="icon">
							<a href="index.php?option=com_djcatalog2&amp;task=item.add">
								<img alt="<?php echo JText::_('COM_DJCATALOG2_NEW_ITEM'); ?>" src="<?php echo JURI::base(); ?>components/com_djcatalog2/assets/images/new_product.png" />						
								<span><?php echo JText::_('COM_DJCATALOG2_NEW_ITEM'); ?></span>
							</a>
						</div>
						<div class="icon">
							<a href="index.php?option=com_djcatalog2&amp;task=category.add">
								<img alt="<?php echo JText::_('COM_DJCATALOG2_NEW_CATEGORY'); ?>" src="<?php echo JURI::base(); ?>components/com_djcatalog2/assets/images/new_category.png" />
								<span><?php echo JText::_('COM_DJCATALOG2_NEW_CATEGORY'); ?></span>
							</a>
						</div>
						<div class="icon">
							<a href="index.php?option=com_djcatalog2&amp;task=producer.add">
								<img alt="<?php echo JText::_('COM_DJCATALOG2_NEW_PRODUCER'); ?>" src="<?php echo JURI::base(); ?>components/com_djcatalog2/assets/images/new_producer.png" />
								<span><?php echo JText::_('COM_DJCATALOG2_NEW_PRODUCER'); ?></span>
							</a>
						</div>
						<div class="icon">
							<a href="index.php?option=com_djcatalog2&amp;task=fieldgroup.add">
								<img alt="<?php echo JText::_('COM_DJCATALOG2_NEW_FIELDGROUP'); ?>" src="<?php echo JURI::base(); ?>components/com_djcatalog2/assets/images/new_fieldgroup.png" />
								<span><?php echo JText::_('COM_DJCATALOG2_NEW_FIELDGROUP'); ?></span>
							</a>
						</div>
						<div class="icon">
							<a href="index.php?option=com_djcatalog2&amp;task=field.add">
								<img alt="<?php echo JText::_('COM_DJCATALOG2_NEW_FIELD'); ?>" src="<?php echo JURI::base(); ?>components/com_djcatalog2/assets/images/new_extrafield.png" />
								<span><?php echo JText::_('COM_DJCATALOG2_NEW_FIELD'); ?></span>
							</a>
						</div>
						
						<div style="clear: both"></div>
						
						<div class="icon">
							<a href="index.php?option=com_djcatalog2&amp;view=thumbs">
								<img alt="<?php echo JText::_('COM_DJCATALOG2_IMAGES_MANAGER'); ?>" src="<?php echo JURI::base(); ?>components/com_djcatalog2/assets/images/icon-48-resize.png" />
								<span><?php echo JText::_('COM_DJCATALOG2_IMAGES_MANAGER'); ?></span>
							</a>
						</div>
						<div class="icon">
							<?php
							$juri = JUri::getInstance();
							$return_url = base64_encode($juri->toString());
							?>
							<a href="index.php?option=com_config&amp;view=component&amp;component=com_djcatalog2&amp;path=&amp;return=<?php echo urlencode($return_url); ?>">
								<img alt="<?php echo JText::_('JOPTIONS'); ?>" src="<?php echo JURI::base(); ?>components/com_djcatalog2/assets/images/icon-48-config.png" />
								<span><?php echo JText::_('JOPTIONS'); ?></span>
							</a>
						</div>
						<div class="icon">
							<a href="http://dj-extensions.com/extensions/dj-catalog2" target="_blank">
								<img alt="<?php echo JText::_('COM_DJCATALOG2_DOCUMENTATION'); ?>" src="<?php echo JURI::base(); ?>components/com_djcatalog2/assets/images/icon-48-documentation.png" />
								<span><?php echo JText::_('COM_DJCATALOG2_DOCUMENTATION'); ?></span>
							</a>
						</div>
						
						<div style="clear: both"></div>
				</div>
			</div>
			<div class="cpanel-right">
				<div class="djlic_cpanel cpanel">
					<div style="float:right;">
						<?php 
						$user = JFactory::getUser();
						if ($user->authorise('core.admin', 'com_djcatalog2')){
							echo DJLicense::getSubscription(); 
						}?>
					</div>
				</div>
			</div>
		</div>

	<input type="hidden" name="option" value="com_djcatalog2" />
	<input type="hidden" name="c" value="cpanel" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="view" value="cpanel" />
	<input type="hidden" name="boxchecked" value="0" />
	<?php echo JHTML::_( 'form.token' ); ?>
</div>
</form>
<div style="clear: both" class="clr"></div>
<?php echo DJCATFOOTER; ?>
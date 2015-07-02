<?php
/**
 * @version $Id: default.php 141 2013-09-16 08:09:56Z michal $
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
?>
<?php if ($this->params->get( 'show_page_heading', 1) && $this->params->get('page_heading')) : ?>
<h1 class="componentheading<?php echo $this->params->get( 'pageclass_sfx' ) ?>">
	<?php echo $this->escape($this->params->get('page_heading')); ?>
</h1>
<?php endif; ?>

<div id="djcatalog" class="djc_producers<?php echo $this->params->get( 'pageclass_sfx' ).' djc_theme_'.$this->params->get('theme','default') ?>">
	<table width="100%" cellpadding="0" cellspacing="0" class="djc_items_table djc_producers_table jlist-table category table table-condensed" id="djc_items_table">
		<thead>
			<tr>
				<?php if ((int)$this->params->get('image_link_producer') != -1) { ?>
					<th class="djc_thead djc_th_image">&nbsp;</th>
				<?php } ?>
				<?php if ((int)$this->params->get('show_producer_name','1') > 0 ) {?>
					<th class="djc_thead djc_th_title" nowrap="nowrap">
						<?php echo JText::_('COM_DJCATALOG2_PRODUCER'); ?>
			        </th>
		        <?php } ?>
				<?php if ($this->params->get('producers_show_intro', '0')) {?>
	                <th class="djc_thead djc_th_intro" nowrap="nowrap">
	                    <?php echo JText::_('COM_DJCATALOG2_DESCRIPTION'); ?>
	                </th>
				<?php } ?>
		            </tr>
	            </thead>
	            <tbody>
	        <?php
		$k = 1;
		foreach($this->items as $item){
			$item->slug = (!empty($item->alias)) ? $item->id.':'.$item->alias : $item->id;
			$k = 1 - $k;
			?>
	        <tr class="cat-list-row<?php echo $k;?> djc_row<?php echo $k;?>">
	            <?php if ((int)$this->params->get('image_link_producer') != -1) { ?>
		            <td class="djc_image">
		                <?php if ($item->item_image) { ?>
			        	<div class="djc_image_in">
			        		<?php if ((int)$this->params->get('image_link_producer') == 1) { ?>
								<a rel="lightbox-djitem" title="<?php echo $item->image_caption; ?>" href="<?php echo DJCatalog2ImageHelper::getImageUrl($item->image_fullpath,'fullscreen'); ?>"><img class="img-polaroid" alt="<?php echo $item->image_caption; ?>" src="<?php echo DJCatalog2ImageHelper::getImageUrl($item->image_fullpath,'medium'); ?>"/></a>
							<?php } else { ?>
								<a href="<?php echo JRoute::_(DJCatalogHelperRoute::getProducerRoute($item->slug)); ?>"><img class="img-polaroid" alt="<?php echo $item->image_caption; ?>" src="<?php echo DJCatalog2ImageHelper::getImageUrl($item->image_fullpath,'medium'); ?>"/></a>
				        	<?php } ?>
			        	</div>
					<?php } ?>
		            </td>
	            <?php } ?>
	            <?php if ((int)$this->params->get('show_producer_name','1') > 0 ) { ?>
					<td class="djc_td_title">
		           		<?php 
				        if ((int)$this->params->get('show_producer_name','1') == 2 ) {
				        	echo $item->name;
				        } else {
				        	echo JHTML::link(JRoute::_(DJCatalogHelperRoute::getProducerRoute($item->slug)), $item->name);
				        } 
				        ?>
		            </td>
	            <?php } ?>
			<?php if ($this->params->get('producers_show_intro', '0')) {?>
			<td class="djc_introtext">
				<?php if ($this->params->get('producers_intro_length', $this->params->get('items_intro_length')) > 0 ) {
						echo DJCatalog2HtmlHelper::trimText($item->description, $this->params->get('producers_intro_length', $this->params->get('items_intro_length')));
					}
					else {
						echo $item->description; 
					}
				?>
			 </td>
			<?php } ?>
	        </tr>
		<?php } ?>
		</tbody>
	</table>
</div>
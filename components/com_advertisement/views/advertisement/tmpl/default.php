<?php
/**
 * @version     1.0.0
 * @package     com_advertisement
 * @copyright   Toanlm
 * @license     Toanlm
 * @author      Toanlm <gep2a76@gmail.com> - http://
 */
// no direct access
defined('_JEXEC') or die;

$canEdit = JFactory::getUser()->authorise('core.edit', 'com_advertisement.' . $this->item->id);
if (!$canEdit && JFactory::getUser()->authorise('core.edit.own', 'com_advertisement' . $this->item->id)) {
	$canEdit = JFactory::getUser()->id == $this->item->created_by;
}
?>
<?php if ($this->item) : ?>

    <div class="item_fields">
        <table class="table">
            <tr>
			<th><?php echo JText::_('COM_ADVERTISEMENT_FORM_LBL_ADVERTISEMENT_ID'); ?></th>
			<td><?php echo $this->item->id; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_ADVERTISEMENT_FORM_LBL_ADVERTISEMENT_CREATED_BY'); ?></th>
			<td><?php echo $this->item->created_by_name; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_ADVERTISEMENT_FORM_LBL_ADVERTISEMENT_ADVS_NAME'); ?></th>
			<td><?php echo $this->item->advs_name; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_ADVERTISEMENT_FORM_LBL_ADVERTISEMENT_ADVS_IMAGE'); ?></th>
			<td><?php echo $this->item->advs_image; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_ADVERTISEMENT_FORM_LBL_ADVERTISEMENT_ADVS_LINK'); ?></th>
			<td><?php echo $this->item->advs_link; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_ADVERTISEMENT_FORM_LBL_ADVERTISEMENT_ADVS_DESCRIPTION'); ?></th>
			<td><?php echo $this->item->advs_description; ?></td>
</tr>

        </table>
    </div>
    <?php if($canEdit): ?>
		<a class="btn" href="<?php echo JRoute::_('index.php?option=com_advertisement&task=advertisement.edit&id='.$this->item->id); ?>"><?php echo JText::_("COM_ADVERTISEMENT_EDIT_ITEM"); ?></a>
	<?php endif; ?>
								<?php if(JFactory::getUser()->authorise('core.delete','com_advertisement.advertisement.'.$this->item->id)):?>
									<a class="btn" href="<?php echo JRoute::_('index.php?option=com_advertisement&task=advertisement.remove&id=' . $this->item->id, false, 2); ?>"><?php echo JText::_("COM_ADVERTISEMENT_DELETE_ITEM"); ?></a>
								<?php endif; ?>
    <?php
else:
    echo JText::_('COM_ADVERTISEMENT_ITEM_NOT_LOADED');
endif;
?>

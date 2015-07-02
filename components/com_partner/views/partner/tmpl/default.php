<?php
/**
 * @version     1.0.0
 * @package     com_partner
 * @copyright   Toanlm
 * @license     Toanlm
 * @author      Toanlm <gep2a76@gmail.com> - http://
 */
// no direct access
defined('_JEXEC') or die;

$canEdit = JFactory::getUser()->authorise('core.edit', 'com_partner.' . $this->item->id);
if (!$canEdit && JFactory::getUser()->authorise('core.edit.own', 'com_partner' . $this->item->id)) {
	$canEdit = JFactory::getUser()->id == $this->item->created_by;
}
?>
<?php if ($this->item) : ?>

    <div class="item_fields">
        <table class="table">
            <tr>
			<th><?php echo JText::_('COM_PARTNER_FORM_LBL_PARTNER_ID'); ?></th>
			<td><?php echo $this->item->id; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_PARTNER_FORM_LBL_PARTNER_CREATED_BY'); ?></th>
			<td><?php echo $this->item->created_by_name; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_PARTNER_FORM_LBL_PARTNER_PARTNER_NAME'); ?></th>
			<td><?php echo $this->item->partner_name; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_PARTNER_FORM_LBL_PARTNER_PARTNER_IMAGE'); ?></th>
			<td><?php echo $this->item->partner_image; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_PARTNER_FORM_LBL_PARTNER_PARTNER_LINK'); ?></th>
			<td><?php echo $this->item->partner_link; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_PARTNER_FORM_LBL_PARTNER_PARTNER_DESCRIPTION'); ?></th>
			<td><?php echo $this->item->partner_description; ?></td>
</tr>

        </table>
    </div>
    <?php if($canEdit): ?>
		<a class="btn" href="<?php echo JRoute::_('index.php?option=com_partner&task=partner.edit&id='.$this->item->id); ?>"><?php echo JText::_("COM_PARTNER_EDIT_ITEM"); ?></a>
	<?php endif; ?>
								<?php if(JFactory::getUser()->authorise('core.delete','com_partner.partner.'.$this->item->id)):?>
									<a class="btn" href="<?php echo JRoute::_('index.php?option=com_partner&task=partner.remove&id=' . $this->item->id, false, 2); ?>"><?php echo JText::_("COM_PARTNER_DELETE_ITEM"); ?></a>
								<?php endif; ?>
    <?php
else:
    echo JText::_('COM_PARTNER_ITEM_NOT_LOADED');
endif;
?>

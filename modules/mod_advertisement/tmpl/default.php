<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_whosonline
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<?php if (count($avds) > 0)  : ?>
	<ul  class="abc">
	<?php foreach ($avds as $adv) : ?>
		<li>
			<img src="<?php echo $adv->advs_image; ?>" />
		</li>
	<?php endforeach;  ?>
	</ul>
<?php endif;

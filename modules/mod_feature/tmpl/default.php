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

<?php if (count($products) > 0)  : ?>
	<h2 class="new-product">Sản phẩm mới</h2>
	<ul  class="list-feature">
	<?php 
		$rootURL = rtrim(JURI::base(),'/');
        $subpathURL = JURI::base(true);
        if(!empty($subpathURL) && ($subpathURL != '/')) {
            $rootURL = substr($rootURL, 0, -1 * strlen($subpathURL));
        }
        $it = 0; 
		foreach ($products as $product) : 
		$images = json_decode($product->images);
		$link = $url = $rootURL.JRoute::_(ContentHelperRoute::getArticleRoute(  $product->id,  $product->catid ));
		
		if($images->image_intro != "") : 
			if (++$it == 11) break; // limit 10 product
		?>
			<li>
				<a class="image" href="<?php echo $link; ?>">
					<img src="<?php echo $images->image_intro;?>" width="160" height="160">
				</a>
				<div class="right">
					<a class="title" href="<?php echo $link; ?>">
						<?php echo $product->title; ?>
					</a>
					<div class="intro">
						<?php echo substr($product->introtext, 0, 1000); ?>
					</div>
				</div>
			</li>
		<?php endif; endforeach;  ?>
	</ul>
<?php endif;

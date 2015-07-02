<?php if (count($partners) > 0)  : ?>
	<!-- <h2 class="partner">Các tổ chức hợp tác</h2> -->
	<marquee onmouseover="this.stop();" onmouseout="this.start();">
	<ul  class="list-nav">
	<?php foreach ($partners as $partner) :?>
		<li>
			<a href="<?php echo $partner->partner_link; ?>" alt="<?php echo $partner->partner_name; ?>" title="<?php echo $partner->partner_name; ?>">
				<img src="<?php echo $partner->partner_image; ?>" />
			</a>
		</li>
	<?php endforeach;  ?>
	</ul> </marquee>
<?php endif;

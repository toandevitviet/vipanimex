<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$cparams = JComponentHelper::getParams('com_media');

jimport('joomla.html.html.bootstrap');
?>
<div class="contact<?php echo $this->pageclass_sfx?>" itemscope itemtype="http://schema.org/Person">
	<?php //echo $this->loadTemplate('address'); ?>
	
	<div class="map">
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript">
		    var geocoder = new google.maps.Geocoder();

		    function geocodePosition(pos) {
		        geocoder.geocode({
		            latLng: pos
		        }, function (responses) {
		            if (responses && responses.length > 0) {
		                updateMarkerAddress(responses[0].formatted_address);
		            } else {
		                updateMarkerAddress('Cannot determine address at this location.');
		            }
		        });
		    }


		    function initialize() {
		        var latLng = new google.maps.LatLng(21.010774, 105.804393);
		        var image_maps = '../../images/maps.png';
		        var map = new google.maps.Map(document.getElementById('mapCanvas'), {
		            zoom: 14,
		            center: latLng,
		            mapTypeId: google.maps.MapTypeId.ROADMAP
		        });
		        
		        var marker = new google.maps.Marker({
		            position: latLng,
		            title: 'VietPan',
		            map: map,
		            icon: image_maps
		        });
				
		    }

		// Onload handler to fire off the app.
		    google.maps.event.addDomListener(window, 'load', initialize);
		</script>
		<style> #mapCanvas {width: 100%; height: 400px;}</style>

		<div id="mapCanvas"></div>

	</div>
	<!-- end map -->


	<dl class="contact-address dl-horizontal" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
		<?php if (($this->params->get('address_check') > 0) &&
			($this->contact->address || $this->contact->suburb  || $this->contact->state || $this->contact->country || $this->contact->postcode)) : ?>
			<?php if ($this->params->get('address_check') > 0) : ?>
				<dt>
					<span class="<?php echo $this->params->get('marker_class'); ?>" >
						<?php echo $this->params->get('marker_address'); ?>
					</span>
				</dt>
			<?php endif; ?>

			<?php if ($this->contact->address && $this->params->get('show_street_address')) : ?>
				<dd>
					<span class="contact-street" itemprop="streetAddress">
						<?php echo nl2br($this->contact->address) . '<br />'; ?>
					</span>
				</dd>
			<?php endif; ?>

			<?php if ($this->contact->suburb && $this->params->get('show_suburb')) : ?>
				<dd>
					<span class="contact-suburb" itemprop="addressLocality">
						<?php echo $this->contact->suburb . '<br />'; ?>
					</span>
				</dd>
			<?php endif; ?>
			<?php if ($this->contact->state && $this->params->get('show_state')) : ?>
				<dd>
					<span class="contact-state" itemprop="addressRegion">
						<?php echo $this->contact->state . '<br />'; ?>
					</span>
				</dd>
			<?php endif; ?>
			<?php if ($this->contact->postcode && $this->params->get('show_postcode')) : ?>
				<dd>
					<span class="contact-postcode" itemprop="postalCode">
						<?php echo $this->contact->postcode . '<br />'; ?>
					</span>
				</dd>
			<?php endif; ?>
			<?php if ($this->contact->country && $this->params->get('show_country')) : ?>
			<dd>
				<span class="contact-country" itemprop="addressCountry">
					<?php echo $this->contact->country . '<br />'; ?>
				</span>
			</dd>
			<?php endif; ?>
		<?php endif; ?>

	<?php if ($this->contact->email_to && $this->params->get('show_email')) : ?>
		<dt>
			<span class="<?php echo $this->params->get('marker_class'); ?>" itemprop="email">
				<?php echo nl2br($this->params->get('marker_email')); ?>
			</span>
		</dt>
		<dd>
			<span class="contact-emailto">
				<?php echo $this->contact->email_to; ?>
			</span>
		</dd>
	<?php endif; ?>

	<?php if ($this->contact->telephone && $this->params->get('show_telephone')) : ?>
		<dt>
			<span class="<?php echo $this->params->get('marker_class'); ?>" >
				<?php echo $this->params->get('marker_telephone'); ?>
			</span>
		</dt>
		<dd>
			<span class="contact-telephone" itemprop="telephone">
				<?php echo nl2br($this->contact->telephone); ?>
			</span>
		</dd>
	<?php endif; ?>
	<?php if ($this->contact->fax && $this->params->get('show_fax')) : ?>
		<dt>
			<span class="<?php echo $this->params->get('marker_class'); ?>">
				<?php echo $this->params->get('marker_fax'); ?>
			</span>
		</dt>
		<dd>
			<span class="contact-fax" itemprop="faxNumber">
			<?php echo nl2br($this->contact->fax); ?>
			</span>
		</dd>
	<?php endif; ?>
	<?php if ($this->contact->mobile && $this->params->get('show_mobile')) :?>
		<dt>
			<span class="<?php echo $this->params->get('marker_class'); ?>" >
				<?php echo $this->params->get('marker_mobile'); ?>
			</span>
		</dt>
		<dd>
			<span class="contact-mobile" itemprop="telephone">
				<?php echo nl2br($this->contact->mobile); ?>
			</span>
		</dd>
	<?php endif; ?>
	<?php if ($this->contact->webpage && $this->params->get('show_webpage')) : ?>
		<dt>
			<span class="<?php echo $this->params->get('marker_class'); ?>" >
			</span>
		</dt>
		<dd>
			<span class="contact-webpage">
				<a href="<?php echo $this->contact->webpage; ?>" target="_blank" itemprop="url">
				<?php echo JStringPunycode::urlToUTF8($this->contact->webpage); ?></a>
			</span>
		</dd>
	<?php endif; ?>
	</dl>

	<?php  echo $this->loadTemplate('form');  ?>
</div>

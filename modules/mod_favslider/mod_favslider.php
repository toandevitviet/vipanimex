<?php

/**
*   FavSlider
*
*   Responsive and customizable Joomla!3 module, slideshow based on FlexSlider 2
*
*   @version        1.7
*   @link           http://extensions.favthemes.com/favslider
*   @author         FavThemes - http://www.favthemes.com
*   @copyright      Copyright (C) 2015 FavThemes.com (WooThemes for the original script). All Rights Reserved.
*   @license        Licensed under GNU/GPLv3, see http://www.gnu.org/licenses/gpl-3.0.html
*/

// no direct access

defined('_JEXEC') or die;

include_once(JPATH_BASE.'/modules/'.$module->module.'/'.$module->module.'.inc');

$sliderType                           = $params->get('sliderType');
$jqueryLoad                           = $params->get('jqueryLoad');
$slideHeight                          = $params->get('slideHeight');
$thumbHeight                          = $params->get('thumbHeight');
$arrowNavStyle                        = $params->get('arrowNavStyle');
$linkTarget                           = $params->get('linkTarget');
$animationEffect                      = $params->get('animationEffect');
$slideshowSpeed                       = $params->get('slideshowSpeed');
$slideshow                            = $params->get('slideshow');
$arrownav                             = $params->get('arrowNav');
$controlnav                           = $params->get('controlNav');
$keyboardnav                          = $params->get('keyboardNav');
$mousewheel                           = $params->get('mousewheel');
$randomize                            = $params->get('randomize');
$animationloop                        = $params->get('animationLoop');
$pauseonhover                         = $params->get('pauseOnHover');

$captionHide                          = $params->get('captionHide');
$layoutEffect                         = $params->get('layoutEffect');
$captionTextAlign                     = $params->get('captionTextAlign');
$captionStyle                         = $params->get('captionStyle');
$captionBgStyle                       = $params->get('captionBgStyle');
$captionWidth                         = $params->get('captionWidth');
$captionHeight                        = $params->get('captionHeight');
$captionTitleGoogleFont               = $params->get('captionTitleGoogleFont');
$captionTitleFontSize                 = $params->get('captionTitleFontSize');
$captionTitleTextTransform            = $params->get('captionTitleTextTransform');
$captionTitlePadding                  = $params->get('captionTitlePadding');
$captionTitleMargin                   = $params->get('captionTitleMargin');
$captionDescriptionGoogleFont         = $params->get('captionDescriptionGoogleFont');
$captionDescriptionFontSize           = $params->get('captionDescriptionFontSize');
$captionReadMoreColor                 = $params->get('captionReadMoreColor');
$captionReadMoreBgColor               = $params->get('captionReadMoreBgColor');
$captionReadMoreGoogleFont            = $params->get('captionReadMoreGoogleFont');
$captionReadMorePadding               = $params->get('captionReadMorePadding');
$captionReadMoreMargin                = $params->get('captionReadMoreMargin');

$rand = rand(10000,20000);
$has_video = false;

// Module CSS
JHTML::stylesheet('modules/mod_favslider/theme/css/favslider.css');

// Module Scripts
if ($jqueryLoad) {JHtml::_('jquery.framework'); }
JHTML::script('modules/mod_favslider/theme/js/jquery.flexslider.js');
JHTML::script('modules/mod_favslider/theme/js/jquery.mousewheel.js');
JHTML::script('modules/mod_favslider/theme/js/jquery.fitvids.js');
JHTML::script('modules/mod_favslider/theme/js/favslider.js');
JHTML::script('modules/mod_favslider/theme/js/viewportchecker/viewportchecker.js');

// Google Font
JHTML::stylesheet('//fonts.googleapis.com/css?family='.$captionTitleGoogleFont);
JHTML::stylesheet('//fonts.googleapis.com/css?family='.$captionDescriptionGoogleFont);
JHTML::stylesheet('//fonts.googleapis.com/css?family='.$captionReadMoreGoogleFont);
JHTML::stylesheet('//fonts.googleapis.com/css?family=Open+Sans:400');

for ($i=1;$i<=10;$i++) {

  ${'file'.$i} = $params->get('file'.$i);
  ${'file'.$i.'active'} = $params->get('file'.$i.'active');
  ${'file'.$i.'type'} = $params->get('file'.$i.'type');

  if (${'file'.$i.'type'} == 'video') { $has_video = true; }

  ${'file'.$i.'link'} = $params->get('file'.$i.'link');
  ${'file'.$i.'alt'} = $params->get('file'.$i.'alt');
  ${'file'.$i.'favtitle'} = $params->get('file'.$i.'favtitle');
  ${'file'.$i.'favdescription'} = $params->get('file'.$i.'favdescription');
  ${'file'.$i.'favreadmore'} = $params->get('file'.$i.'favreadmore');

}

if ($has_video) { $slideshow = 0; $pauseonhover = 1; } ?>

<script type="text/javascript">
  jQuery(document).ready(function() {
  jQuery('#slider-<?php echo $rand; ?> .layout-effect').addClass("favhide").viewportChecker({
    classToAdd: 'favshow <?php echo $layoutEffect; ?>', // Class to add to the elements when they are visible
    offset: 100
    });
  });
</script>

<?php if ($sliderType == "basic" || $sliderType == "thumbnav") {

echo '<!--[if (IE 7)|(IE 8)]><style type= text/css>.fav-control-thumbs li {width: 24.99%!important;}</style><![endif]-->

<script type="text/javascript">
  jQuery(window).load(function(){
    jQuery(\'#slider-'.$rand.'\').favslider({
	   animationEffect: "'.$animationEffect.'",
	   directionNav: '.$arrownav.',
	   keyboardNav: '.$keyboardnav.',
	   mousewheel: '.$mousewheel.',
	   slideshow: '.$slideshow.',
	   slideshowSpeed: '.$slideshowSpeed.',
	   randomize: '.$randomize.',
	   animationLoop: '.$animationloop.',
	   pauseOnHover: '.$pauseonhover.',';

if ($sliderType == "basic") { echo 'controlNav: '.$controlnav.','; } elseif ($sliderType == "thumbnav") { echo 'controlNav: "thumbnails",'; }

echo '
      start: function(slider){
        jQuery(\'body\').removeClass(\'loading\');
      }
    });
  });
</script> '; }

if ($sliderType == "slidernav") {

echo '<style type= text/css>#carousel-'.$rand.' {margin-top: 3px;}</style>
<script type="text/javascript">
  jQuery(window).load(function(){
    jQuery(\'#carousel-'.$rand.'\').favslider({
      animation: "slide",
      controlNav: false,
	    directionNav: '.$arrownav.',
	    mousewheel: '.$mousewheel.',
      animationLoop: false,
      slideshow: false,
      itemWidth: 210,
	    minItems: 2,
	    maxItems: 4,
      asNavFor: \'#slider-'.$rand.'\'
    });

    jQuery(\'#slider-'.$rand.'\').favslider({
      animationEffect: "'.$animationEffect.'",
	    directionNav: '.$arrownav.',
	    mousewheel: '.$mousewheel.',
	    slideshow: '.$slideshow.',
	    slideshowSpeed: '.$slideshowSpeed.',
	    randomize: '.$randomize.',
	    animationLoop: '.$animationloop.',
	    pauseOnHover: '.$pauseonhover.',
      controlNav: false,
      sync: "#carousel-'.$rand.'",
      start: function(slider){
        jQuery(\'body\').removeClass(\'loading\');
      }
    });
  });
</script>'; }

if ($sliderType == "carousel") {

echo '<script type="text/javascript">
  jQuery(window).load(function(){
    jQuery(\'#carousel-'.$rand.'\').favslider({
      animation: "slide",
      animationLoop: false,
      itemWidth: 210,
      minItems: 2,
      maxItems: 4,
	    controlNav: '.$controlnav.',
	    directionNav: '.$arrownav.',
	    keyboardNav: '.$keyboardnav.',
	    mousewheel: '.$mousewheel.',
      start: function(carousel){
        jQuery(\'body\').removeClass(\'loading\');
      }
    });
  });


</script>'; } ?>

<?php if (!empty($slideHeight)) { ?>
<style type="text/css">
.favslider .favs li.fav-slider-main, .favslider .favs li.fav-slider-main iframe, .favslider .favs li.fav-slider-main img { height: <?php echo $slideHeight; ?>px!important; }
</style>
<?php } ?>

<?php if (!empty($thumbHeight)) { ?>
<style type="text/css">
.favslider .fav-viewport .favs li, .favslider .fav-control-thumbs li, .favslider .fav-viewport .favs li img, .favslider .fav-viewport .favs li iframe, .favslider .fav-control-thumbs li img { height: <?php echo $thumbHeight; ?>px!important; }
</style>
<?php } ?>

<?php if ($sliderType == "carousel") { ?>

		<div id="carousel-<?php echo $rand; ?>" class="favslider <?php echo $arrowNavStyle; ?>" <?php if (!$controlnav) {echo 'style="margin: 0!important;"';}?>>

		  <ul class="favs">

        <?php for ($i=1;$i<=10;$i++) { if (${'file'.$i} && ${'file'.$i.'active'} && ${'file'.$i} != " ") { ?>

		    	<li class="<?php if (${'file'.$i.'type'} == 'video') { ?>fav-video<?php } ?>"<?php if ($i>1) { ?> style="margin-left: 3px;"<?php } ?>>

            <?php if (${'file'.$i.'type'} == 'image') { ?>

		    		<?php if (${'file'.$i.'link'}) { ?>

              <a href="<?php echo ${'file'.$i.'link'}; ?>" target="_<?php echo $linkTarget ?>">

                <img src="<?php echo ${'file'.$i}; ?>" alt="<?php echo ${'file'.$i.'alt'}; ?>" />

              </a>

            <?php } else { ?>

                <img src="<?php echo ${'file'.$i}; ?>" alt="<?php echo ${'file'.$i.'alt'}; ?>" />

            <?php } ?>

            <?php } elseif (${'file'.$i.'type'} == 'video') { echo generate_video_iframe(${'file'.$i}); } ?>

            <?php if (${'file'.$i.'type'} == 'image') { ?>

		    		<?php if (${'file'.$i.'favtitle'} || ${'file'.$i.'favdescription'} || ${'file'.$i.'favreadmore'}) { ?>

                <div id="fav-caption" class="<?php echo $captionHide; ?> <?php echo $captionTextAlign; ?> <?php echo $captionStyle; ?> <?php echo $captionBgStyle; ?> layout-effect" style="width:<?php echo $captionWidth; ?>; height:<?php echo $captionHeight; ?>;">

        		    		<?php if (${'file'.$i.'favtitle'}) { ?>
                      <h3 class="favtitle" style="font-family: <?php echo $captionTitleGoogleFont; ?>; font-size: <?php echo $captionTitleFontSize; ?>; text-transform: <?php echo $captionTitleTextTransform; ?>; padding: <?php echo $captionTitlePadding; ?>; margin: <?php echo $captionTitleMargin; ?>;">
                        <?php echo ${'file'.$i.'favtitle'}; ?>
                      </h3>
                    <?php } ?>

        		    		<?php if (${'file'.$i.'favdescription'}) { ?>
                      <p class="favdescription" style="font-family: <?php echo $captionDescriptionGoogleFont; ?>; font-size: <?php echo $captionDescriptionFontSize; ?>;">
                        <?php echo ${'file'.$i.'favdescription'}; ?>
                      </p>
                    <?php } ?>

                    <?php if (${'file'.$i.'link'}) { ?>

                      <a href="<?php echo ${'file'.$i.'link'}; ?>" target="_<?php echo $linkTarget ?>">

                    <?php } ?>

                      <?php if (${'file'.$i.'favreadmore'}) { ?>
                        <p class="favreadmore btn" style="color: #<?php echo $captionReadMoreColor; ?>; background-color: #<?php echo $captionReadMoreBgColor; ?>; font-family: <?php echo $captionReadMoreGoogleFont; ?>; padding: <?php echo $captionReadMorePadding; ?>; margin: <?php echo $captionReadMoreMargin; ?>;">
                          <?php echo ${'file'.$i.'favreadmore'}; ?>
                        </p>
                      <?php } ?>

                      <?php if (${'file'.$i.'link'}) { ?>

                        </a>

                      <?php } ?>

                </div>

            <?php } } ?>

		    	</li>

        <?php } } ?>

		  </ul>

		</div>

<?php } elseif ($sliderType == "slidernav") { ?>

		<div id="slider-<?php echo $rand; ?>" class="favslider <?php echo $arrowNavStyle; ?>" style="margin: 0!important;">

		  <ul class="favs">

			  <?php for ($i=1;$i<=10;$i++) { if (${'file'.$i} && ${'file'.$i.'active'} && ${'file'.$i} != " ") { ?>

  		    <li class="fav-slider-main<?php if (${'file'.$i.'type'} == 'video') { ?> fav-video<?php } ?>">

            <?php if (${'file'.$i.'type'} == 'image') { ?>

  		    	<?php if (${'file'.$i.'link'}) { ?>

              <a href="<?php echo ${'file'.$i.'link'}; ?>" target="_<?php echo $linkTarget ?>">

                <img src="<?php echo ${'file'.$i}; ?>" alt="<?php echo ${'file'.$i.'alt'}; ?>" />

              </a>

            <?php } else { ?>

                <img src="<?php echo ${'file'.$i}; ?>" alt="<?php echo ${'file'.$i.'alt'}; ?>" />

            <?php } ?>

            <?php } elseif (${'file'.$i.'type'} == 'video') { echo generate_video_iframe(${'file'.$i}); } ?>

            <?php if (${'file'.$i.'type'} == 'image') { ?>

            <?php if (${'file'.$i.'favtitle'} || ${'file'.$i.'favdescription'} || ${'file'.$i.'favreadmore'}) { ?>

                <div id="fav-caption" class="<?php echo $captionHide; ?> <?php echo $captionTextAlign; ?> <?php echo $captionStyle; ?> <?php echo $captionBgStyle; ?> layout-effect" style="width:<?php echo $captionWidth; ?>; height:<?php echo $captionHeight; ?>;">

                    <?php if (${'file'.$i.'favtitle'}) { ?>
                      <h3 class="favtitle" style="font-family: <?php echo $captionTitleGoogleFont; ?>; font-size: <?php echo $captionTitleFontSize; ?>; text-transform: <?php echo $captionTitleTextTransform; ?>; padding: <?php echo $captionTitlePadding; ?>; margin: <?php echo $captionTitleMargin; ?>;">
                        <?php echo ${'file'.$i.'favtitle'}; ?>
                      </h3>
                    <?php } ?>

                    <?php if (${'file'.$i.'favdescription'}) { ?>
                      <p class="favdescription" style="font-family: <?php echo $captionDescriptionGoogleFont; ?>; font-size: <?php echo $captionDescriptionFontSize; ?>;">
                        <?php echo ${'file'.$i.'favdescription'}; ?>
                      </p>
                    <?php } ?>

                    <?php if (${'file'.$i.'link'}) { ?>
                      <a href="<?php echo ${'file'.$i.'link'}; ?>" target="_<?php echo $linkTarget ?>">
                    <?php } ?>

                      <?php if (${'file'.$i.'favreadmore'}) { ?>
                        <p class="favreadmore btn" style="color: #<?php echo $captionReadMoreColor; ?>; background-color: #<?php echo $captionReadMoreBgColor; ?>; font-family: <?php echo $captionReadMoreGoogleFont; ?>; padding: <?php echo $captionReadMorePadding; ?>; margin: <?php echo $captionReadMoreMargin; ?>;">
                          <?php echo ${'file'.$i.'favreadmore'}; ?>
                        </p>
                      <?php } ?>

                      <?php if (${'file'.$i.'link'}) { ?>
                        </a>
                      <?php } ?>

                </div>

            <?php } } ?>

  		    </li>

        <?php } } ?>

		  </ul>

		</div>

		<div id="carousel-<?php echo $rand; ?>" class="favslider <?php echo $arrowNavStyle; ?>">

      <ul class="favs">

        <?php for ($i=1;$i<=10;$i++) { if (${'file'.$i} && ${'file'.$i.'active'} && ${'file'.$i} != " ") { ?>

          <li<?php if ($i>1) { ?> style="margin-left: 3px;"<?php } ?>>

            <?php if (${'file'.$i.'type'} == 'image') { ?>

            <img src="<?php echo ${'file'.$i}; ?>" />

            <?php } elseif (${'file'.$i.'type'} == 'video') { echo generate_video_iframe(${'file'.$i},'videothumb'); } ?>

          </li>

        <?php } } ?>

      </ul>

    </div>

<?php } else { ?>

	<div id="slider-<?php echo $rand; ?>" class="favslider <?php echo $arrowNavStyle; ?>">

		<ul class="favs">

			<?php for ($i=1;$i<=10;$i++) { if (${'file'.$i} && ${'file'.$i.'active'} && ${'file'.$i} != " ") { ?>

		    <li class="fav-slider-main<?php if (${'file'.$i.'type'} == 'video') { ?> fav-video<?php } ?>"<?php if ($sliderType == "thumbnav") { ?> data-thumb="<?php if (${'file'.$i.'type'} == 'image') { echo JURI::base().${'file'.$i}; } elseif (${'file'.$i.'type'} == 'video') { echo generate_video_iframe(${'file'.$i},'videothumburl'); } ?>"<?php } ?>>

            <?php if (${'file'.$i.'type'} == 'image') { ?>

		    	  <?php if (${'file'.$i.'link'}) { ?>

              <a href="<?php echo ${'file'.$i.'link'}; ?>" target="_<?php echo $linkTarget ?>">

                <img src="<?php echo ${'file'.$i}; ?>" alt="<?php echo ${'file'.$i.'alt'}; ?>" />

              </a>

            <?php } else { ?>

                <img src="<?php echo ${'file'.$i}; ?>" alt="<?php echo ${'file'.$i.'alt'}; ?>" />

            <?php } ?>

            <?php } elseif (${'file'.$i.'type'} == 'video') { echo generate_video_iframe(${'file'.$i}); } ?>

            <?php if (${'file'.$i.'type'} == 'image') { ?>

            <?php if (${'file'.$i.'favtitle'} || ${'file'.$i.'favdescription'} || ${'file'.$i.'favreadmore'}) { ?>

                <div id="fav-caption" class="<?php echo $captionHide; ?> <?php echo $captionTextAlign; ?> <?php echo $captionStyle; ?> <?php echo $captionBgStyle; ?> layout-effect" style="width:<?php echo $captionWidth; ?>; height:<?php echo $captionHeight; ?>;">

                    <?php if (${'file'.$i.'favtitle'}) { ?>
                      <h3 class="favtitle" style="font-family: <?php echo $captionTitleGoogleFont; ?>; font-size: <?php echo $captionTitleFontSize; ?>; text-transform: <?php echo $captionTitleTextTransform; ?>; padding: <?php echo $captionTitlePadding; ?>; margin: <?php echo $captionTitleMargin; ?>;">
                        <?php echo ${'file'.$i.'favtitle'}; ?>
                      </h3>
                    <?php } ?>

                    <?php if (${'file'.$i.'favdescription'}) { ?>
                      <p class="favdescription" style="font-family: <?php echo $captionDescriptionGoogleFont; ?>; font-size: <?php echo $captionDescriptionFontSize; ?>;">
                        <?php echo ${'file'.$i.'favdescription'}; ?>
                      </p>
                    <?php } ?>

                    <?php if (${'file'.$i.'link'}) { ?>

                      <a href="<?php echo ${'file'.$i.'link'}; ?>" target="_<?php echo $linkTarget ?>">

                    <?php } ?>

                      <?php if (${'file'.$i.'favreadmore'}) { ?>
                        <p class="favreadmore btn" style="color: #<?php echo $captionReadMoreColor; ?>; background-color: #<?php echo $captionReadMoreBgColor; ?>; font-family: <?php echo $captionReadMoreGoogleFont; ?>; padding: <?php echo $captionReadMorePadding; ?>; margin: <?php echo $captionReadMoreMargin; ?>;">
                          <?php echo ${'file'.$i.'favreadmore'}; ?>
                        </p>
                      <?php } ?>

                      <?php if (${'file'.$i.'link'}) { ?>

                        </a>

                      <?php } ?>

                </div>

            <?php } ?>

            <?php } ?>

		    </li>

      <?php } } ?>

		</ul>

	</div>

<?php } ?>

</section>
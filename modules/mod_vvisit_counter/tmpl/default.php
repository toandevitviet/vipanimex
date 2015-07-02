<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

if(JDEBUG) {
	$startTime = microtime();
}

// new Counter Clazz
$vcounter = new modVisitCounterHelper($params);

// Default Sorted Method
$arr_methods = array ( $vcounter->renderPRE(),
                       $vcounter->renderDigitCounter(),
                       $vcounter->renderPeopleTable(),
                       $vcounter->renderHighestVisitsDay(),
                       $vcounter->renderStatistikImage(),
                       $vcounter->renderIP(),
                       $vcounter->renderIPCountryCode(),
                       $vcounter->renderIPCountry(),
                       $vcounter->renderIPFlag(),
                       $vcounter->renderLoggedInUserCount(),
                       $vcounter->renderGuestCount(),
                       $vcounter->renderRegisteredUserCount(),
                       $vcounter->renderRegisteredTodayUserCount(),
                       $vcounter->renderLoggedInUserNamens(),
                       $vcounter->renderRegisteredTodayUserNamens(),
                       $vcounter->renderPOST()
					   );

// Array with Custon Sort
// $arr_sort = explode( ";", $params->get( 'the_order', '1;2;3;4;5;6;7;8;9;10;11;12;13;14;15' ) , 15 );
$arr_sort = explode( ";", $params->get( 'the_order', '1;2;3;4;5;6;7;8;9;10;11;12;13;14;15;16' ) );

// Link on a View
$linkonviewView = $params->get('linkonviewView', '');
$linkonviewLink = $params->get('linkonviewLink', '');
$linkonviewTarget = $params->get('linkonviewTarget', '');

$link = NULL;
$arr_linkviews = NULL;
if ( !empty($linkonviewView) && !empty($linkonviewLink) ) {
	// views
	$arr_linkviews = explode( ";", $linkonviewView );
	// link
	$link = '<a href="' . $linkonviewLink . '" class="mvc_mainlink" ' ;
	if ( !empty($linkonviewTarget) ) {
		$link .= ' target="' . $linkonviewTarget . '"';
	}
	$link .= '>';
}

// Outer Div
$m_content = '<div class="mvc_main' . $params->get( 'moduleclass_sfx' ) . '">';

// out all with Order
for ( $i=0; $i < count($arr_sort) ; $i++){
    if( is_numeric( $arr_sort[$i] ) ){
	  // check to set link on a view
      if ( !empty($arr_linkviews) &&
	         !empty($link) &&
		       in_array( $arr_sort[$i], $arr_linkviews  ) ) {

      	 $m_content .= $link . $arr_methods[ $arr_sort[$i] - 1 ] . '</a>' ;
      }
      else {
        $m_content .= $arr_methods[ $arr_sort[$i] - 1 ] ;
      }
    }
    else {
      $m_content .= $vcounter->renderSpacer();
    }
}

// Close Outer Div
$m_content .= '</div>';

if(JDEBUG) {
  list($old_usec, $old_sec) = explode(' ', $startTime );
  list($new_usec, $new_sec) = explode(' ', microtime());
  $old_mt = ((float)$old_usec + (float)$old_sec);
  $new_mt = ((float)$new_usec + (float)$new_sec);
  $m_content .= "<div class=\"profiler\"><b>DEBUG</b><br/>Time:[" . ($new_mt - $old_mt) . "sec]</div>";
}

// Never delete This !
echo $m_content;
?>

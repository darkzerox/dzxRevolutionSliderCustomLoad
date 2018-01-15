<?php
/*
Plugin Name: DZX Custom Load Revolution Slider 
Plugin URI: https://www.darkxee.com
Description: custom load revolution slider mobile/desktop
Version: 1.0
Author: Darkxee
Author URI:https://www.darkxee.com
License: Plugin comes under GPL Licence.
*/

function check_mobile() {
	//exclude ipad
	if ( 
		! empty($_SERVER['HTTP_USER_AGENT']) 
		&& false !== strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')		
		) return false;
    return wp_is_mobile();
	}


	function revo_slide($atts){  
		$atts = shortcode_atts(
			array(
				'mobile' => '',
				'desktop' => '',					
			), $atts ,'revo_slide' 
		); 
		if (check_mobile()){
			echo do_shortcode( '[rev_slider alias="'.$atts['mobile'].'"]' );
		}else{
			echo do_shortcode( '[rev_slider alias="'.$atts['desktop'].'"]' );
		}
		
	}
	add_shortcode('revo_slide', 'revo_slide');
?>
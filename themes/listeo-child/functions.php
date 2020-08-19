<?php 
add_action( 'wp_enqueue_scripts', 'listeo_enqueue_styles');

function listeo_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css',array('bootstrap','listeo-icons','listeo-woocommerce') ); 
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/css/cristian_style.css');
    //wp_enqueue_style( 'child-style-2', get_stylesheet_directory_uri() . '/css/sahil_style.css');
    
} 
add_action( 'wp_enqueue_scripts', 'listeo_cristian_behind_scripts', 9999);
function listeo_cristian_behind_scripts() {
	//dequeue frontend js because send message with widget has error
	//wp_dequeue_script('listeo_core-frontend');
    //wp_deregister_script('listeo_core-frontend');
    //wp_register_script( 'listeo_core-frontend', get_stylesheet_directory_uri() . '/js/frontend.js', array( 'jquery' ));
	//wp_enqueue_script('listeo_core-frontend');
    
	wp_dequeue_script('daterangerpicker');
    wp_deregister_script('daterangerpicker');
    wp_register_script( 'daterangerpicker', 'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js', array( 'jquery','moment' ) );
	wp_enqueue_script('daterangerpicker');  
    
	wp_register_script( 'cristian_script', get_stylesheet_directory_uri() . '/js/cristian_script.js', array( 'jquery' ));
	wp_enqueue_script('cristian_script');
} 

function remove_parent_theme_features() {
   	
}
add_action( 'after_setup_theme', 'remove_parent_theme_features', 10 );

function listing_category_slider(){
	$termArray = get_terms( array(
	    'taxonomy' => 'listing_category',
	    'hide_empty' => false,
	) );
	$html  = '<link rel="stylesheet" href="'.site_url() . '/wp-content/themes/listeo-child/css/flexslider.css"/>
				<script type="text/javascript" src="'.site_url(). '/wp-content/themes/listeo-child/js/jquery.flexslider-min.js"></script>	
	<div class="flexslider">
  			<ul class="slides">';
	foreach ($termArray as $singleTerm) {
		$metaData = get_term_meta($singleTerm->term_id);
		$coverImageID = $metaData['_cover'][0];
		$coverImage = wp_get_attachment_image_src($coverImageID, array('784','500'));
		if ($coverImage) : 
			$html .='<li><img src="'.$coverImage[0].'" /></li>';		
		endif; 
	}
	
	$html .='</ul></div>';
	$html .= '<script>
jQuery(window).load(function() {
  jQuery(".flexslider").flexslider({
    animation: "slide",
    controlNav: false
  });
});</script>';
	return $html;
}
add_shortcode( 'listing-category', 'listing_category_slider' );
if (!is_admin()) {
    add_filter( 'script_loader_tag', function ( $tag, $handle ) {    
        if ( strpos( $tag, "jquery-migrate.min.js" ) || strpos( $tag, "jquery.js") ) {
            return $tag;
        }
        return str_replace( ' src', ' defer src', $tag );
    }, 10, 2 );

}

function mz_footer(){
	
	if(isset($_GET['page_id']) && $_GET['page_id'] == 71){
		
	?>

	<script>
		
		jQuery(document).ready(function(){

			setTimeout(function(){

				jQuery('p#_gallery-description').html('Photo are the first thing that guests will see. We recommend adding 10 or more high quality photos.<br>Photo requirments:<br><ul><li>High resolution - Atleast 1,000 pixels wide</li><li>Horizontal orientation - No vertical photos</li><li>Color photos - No block & white</li><li>Mics. - No collages, screenshots, No watermarks</li></ul>');

			},200);

		});

	</script>

<?php
		
	}

	if(is_page(66)){
	    ?>
	    <script>
	        jQuery(document).ready(function() {
	        	if(jQuery(".message-content").length){
				    jQuery(".message-content").animate({ 
				        scrollTop: jQuery('.message-content').get(0).scrollHeight 
				    }, 2000);
				}
			});
	    </script>
	    <?php
	}
}

add_action('wp_footer','mz_footer');

function whero_limit_image_size($file) {

	// Calculate the image size in KB
	$image_size = $file['size']/1024;

	// File size limit in KB
	$limit = 200;

	// Check if it's an image
	$is_image = strpos($file['type'], 'image');

	if ( ( $image_size > $limit ) && ($is_image !== false) )
        	$file['error'] = 'Your picture is too large. It has to be smaller than '. $limit .'KB';

	return $file;

}
/**
 * Commented this code, as client does not want such restriction
 **/
//add_filter('wp_handle_upload_prefilter', 'whero_limit_image_size');

/*----------------------------------------------------*/
/*  START : Time Picker - Drop Down List
/*----------------------------------------------------*/
function time_picker_script() {
?>
<script>
(function($){	

	//Append 12 hr format list
	$("input.time-picker.flatpickr-input.active").focus(function(){

 	var time_picker=jQuery(".flatpickr-calendar.hasTime.noCalendar.animate.showTimeInput.arrowTop.open");
 	jQuery("div.flatpickr-time").hide();

 	if ($( "#time_pickr_list" ).length) {
  		return;
	}

	var toAppend='<select id="time_pickr_list" name="time_pickr_list" size="10" style="height:300px;">';

   	for (var hr=0;hr<24;hr++)
   	{
       		var hrStr=hr.toString().padStart(2,"0")+":";
      
      		var append1=" am";

	      	if(parseInt(hrStr)>=12)
	      	{
			append1=" pm";
			hrStr=parseInt(hrStr)-12;
			if(hrStr<=9)
			{
				hrStr="0"+hrStr;
			}
			if(parseInt(hrStr)==0)
			{
				hrStr="12";
			}
			hrStr=hrStr+":";
      		}
             
	      var val=hrStr+"00"+append1;   	

	       toAppend=toAppend+'<option class="time_pickr_item" style="height:30px;" val='+val+'>'+val+'</option>';

	       val=hrStr+"30"+append1;
	      toAppend=toAppend+'<option class="time_pickr_item" style="height:30px;" val='+val+'>'+val+'</option>';
   	} 
   	toAppend=toAppend+'</select>';
   	time_picker.append(toAppend);
  
	});
	
	// update time-picker values and trigger onChange() function
	$('body').on('click', '.time_pickr_item', function(evt) {
	  	evt.stopPropagation();
	  	var time_12hr=$(this).val();    
	    	$('input.time-picker.flatpickr-input').val(time_12hr);
		
		var arr=time_12hr.split(/[ :]+/);
		
		if(arr[2]=="pm" && arr[0]!=12){
			arr[0]=parseInt(arr[0])+12;
		}
		var time_24hr=arr[0]+":"+arr[1];
		time_24hr=time_24hr.toString();
		
		const fp_element = document.querySelector("input.time-picker.flatpickr-input");
		fp_element._flatpickr.setDate(time_24hr, true,"h:i");
	});
})( jQuery );	
</script>
 <?php
}
add_action('wp_footer','time_picker_script');
/*----------------------------------------------------*/
/*  END : Time Picker - Drop Down List
/*----------------------------------------------------*/

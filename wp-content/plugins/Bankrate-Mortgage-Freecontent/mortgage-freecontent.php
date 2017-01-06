<?php
/*
Plugin Name: Bankrate Mortgage Calculator
Plugin URI: http://www.bankrate.com/free-content/mortgage/calculators/wordpress-mortgage-calculator/
Description: Trusted by the personal finance community, Bankrate.com offers the simplest and most effective mortgage calculator for WordPress.  To get started: 1) Click "Activate", 2) click on the Bankrate Mortgage Calculator link on the left rail of this page, 3) Configure your calculator and follow the instructions for placing this calculator in your site.
Version: 1.3
Author: Bankrate
Author URI: http://www.bankrate.com/
*/
/**
 * Class Freecontent start here
 */
class Freecontent extends WP_Widget {
    /** constructor */
    function Freecontent() {
        parent::WP_Widget(false, $name = 'Mortgage Freecontent');
	$widget_ops = array( 'classname' => 'freecontent', 'description' => __('The Bankrate mortgage calculator for WordPress', 'freecontent') ); 
        $this->WP_Widget( 'freecontent-widget', __('Bankrate Mortgage Calculator', 'freecontent'), $widget_ops, $control_ops );
    		
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
        $size = apply_filters('widget_size', $instance['size']);
        $color = apply_filters('widget_color', $instance['color']);
        $ftype = apply_filters('widget_font', $instance['font']);
        
                 echo $before_widget; 
                 if ( $size ) :
                        include 'maincal.php';
                 endif; 
		 echo $after_widget; 
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
	$instance = $old_instance;
	$instance['size']  =  strip_tags($new_instance['size']);
        $instance['color'] =  strip_tags($new_instance['color']);
        $instance['font']  =  strip_tags($new_instance['font']);   
        return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
		$size  = esc_attr($instance['size']);
		$color = esc_attr($instance['color']);
		$font  = esc_attr($instance['font']);

                
		include 'settings.php'; ?>



			<div id="lighthead"> 
			

			   <input alt="#TB_inline?height=205&amp;width=<?php echo $size; ?>&amp;inlineId=contentnow<?php echo $this->get_field_id(id); ?>" 
			   title="My Calculator View" class="thickbox" type="button" value="Preview Calculator" 
                           onClick="return viewonthis('<?php echo $this->get_field_id('font'); ?>','<?php echo $this->get_field_id('size'); ?>','<?php echo $this->get_field_name('color'); ?>','<?php echo $this->get_field_id(id); ?>');" id="swami<?php echo $this->get_field_id(id); ?>"  />  
			</div>
			<div id="contentnow<?php echo $this->get_field_id(id); ?>" style="display:none;"><?php include 'maincal.php'; ?></div>
	<?php }

} // class Freecontent end


// Creating function for short code.
function Bankratemortgagecalculator_func($atts) {


		$widsize=array("200","225","250","275","300","325","350");
 		$widget_key=array_search($atts['size'], $widsize);
		if($widget_key){
		if($atts['size'] > 350): $atts['size']=350;endif;
		}else{
                $atts['size']=200;
                } 

		if($atts['size'] > 350): $atts['size']=350;endif;
                 $widsize=array("200","225","250","275","300","325","350");
		 $widcolor = array("color1","color2","color3","color4");
		 $widfont = array("Arial","Times New Roman","Verdana");

		 $colorlow=strtolower($atts['color']);
                 $fontucup=ucwords(strtolower($atts['fonttype']));    
	
                for($i=0;$i<count($widsize);$i++){ if($atts['size'] <= $widsize[$i]){ $realwsize=  $widsize[$i]; break;}}
		if(array_search($colorlow,$widcolor)):$realwcolor=$colorlow;else:$realwcolor=$widcolor['0'];endif; 
       		if(array_search($fontucup,$widfont)):$realfont=$fontucup;else:$realfont=$widfont['0'];endif; 
 

		 $color=$realwcolor;
		 $ftype=$realfont;
		 $size=$realwsize;
 
		 include 'cssarray.php';
		 include 'mortgage-left-widget.php';
}
add_shortcode('Bankratemortgagecalculator', 'Bankratemortgagecalculator_func');
add_action('widgets_init', create_function('', 'return register_widget("Freecontent");'));
add_action('init', 'init_theme_method');
function init_theme_method() { add_thickbox(); }


function bankrate_menu(){
add_menu_page('Bankrate','Bankrate', 'bankrate-cap', 'add-menu-page-only-child-allowed','feencontent_create_shortcode',WP_PLUGIN_URL.'/Bankrate-Mortgage-Freecontent/images/bankrate.gif');
add_submenu_page('add-menu-page-only-child-allowed', 'Bankrate FCC Mortgage Calc', '<span style="font-size:10px;font-family:Arial;">Mortgage calculator</span>', 'manage_options', 'bankrate-mortgage', 'feencontent_create_shortcode');
}
add_action('admin_menu','bankrate_menu');

	function feencontent_create_shortcode() { ?>

   <script type="text/javascript" src="<?php echo WP_PLUGIN_URL.'/Bankrate-Mortgage-Freecontent'; ?>/scripts/myshortcode.js"></script>
   <script type="text/javascript" src="<?php echo WP_PLUGIN_URL.'/Bankrate-Mortgage-Freecontent'; ?>/scripts/ZeroClipboard.js"></script>
   <link rel="stylesheet" href="<?php echo WP_PLUGIN_URL.'/Bankrate-Mortgage-Freecontent'; ?>/style/main-width-style.css" type="text/css">
   <link rel="stylesheet" href="<?php echo WP_PLUGIN_URL.'/Bankrate-Mortgage-Freecontent'; ?>/style/admin-setting.css" type="text/css">
   <input type="hidden" value="<?php echo WP_PLUGIN_URL.'/Bankrate-Mortgage-Freecontent'; ?>/scripts/" id="hiddenval"> 

	<div id="main_container">
		<div id="container_left">
		<div><img src="<?php echo WP_PLUGIN_URL.'/Bankrate-Mortgage-Freecontent'; ?>/images/bankrate_top.jpg" alt="bankrate" /></div>
		<div class="fcc_middlebg">
			<div class="fcc-buttonmain">
				<div id="fccid">
					<div class="fcc-buttonleft"></div>
					<div class="fcc-button_middle"><?php echo _e('Customize calculator'); ?></div>
					<div class="fcc-buttonright"></div>
				</div>
			</div>
					<div class="widget_below"><?php echo _e('Choose your font,color and size below'); ?></div>
		<div id="inner_table">
			<div class="inner_top">
			<?php require ('admin-widget-settings.php'); ?>
				<div id="inner_boxmiddle">
					<div class="boxmiddlew" id="widgetpadding">
					<?php require ('admin-widget.php'); ?>
					</div>
				</div>
						<div class="inner_boxbottom">
						<?php echo _e('All changes made will be relfected in the code below in Option #1 and Option #2.'); ?>
						</div>
			</div>
				<div class="fcc-buttonmain">
					<div id="fccopt1">
						<div class="fcc-buttonleft"></div>
						<div class="fcc-button_middle" style="width:302px;"><?php echo _e('Option #1: Add calculator to your post'); ?></div>
						<div class="fcc-buttonright"></div>
					</div>
				</div>
		<div  id="option1_inner">
				<div class="option1_leftimage"><img src="<?php echo WP_PLUGIN_URL.'/Bankrate-Mortgage-Freecontent'; ?>/images/fcc_01.jpg" /></div>
		<div class="option1_rightmain">
			<div class="option1_righttop_text"><?php echo _e('Cut and Paste “Short Code” into the proper section of<br />your post or page.'); ?></div>
			<?php require ('admin-widget-shortcode.php'); ?>
		</div>
		</div>
			<div class="fcc-buttonmain">
				<div id="fccopt2">
					<div class="fcc-buttonleft"></div>
					<div class="fcc-button_middle" style="width:462px;">
					<?php echo _e('Option #2: Add calculator to your footer or right/left rail'); ?>
					</div>
					<div class="fcc-buttonright"></div>
				</div>
			</div>
			<div  id="option1_inner">
				<div class="option1_leftimage"><img src="<?php echo WP_PLUGIN_URL.'/Bankrate-Mortgage-Freecontent'; ?>/images/fcc_02.jpg" /></div>
				<div class="option1_righttop_text">
				<?php echo _e('Add this calculator to your footer or right rail:'); ?>
				</div>
			</div>
			<div id="bottom_main">
				<div class="appearance"><img src="<?php echo WP_PLUGIN_URL.'/Bankrate-Mortgage-Freecontent'; ?>/images/fcc_03.jpg" /></div>
				<div class="arrow"><?php echo _e('Click on the “Widgets” link in the Appearance section of Wordpress'); ?><br />
				<img src="<?php echo WP_PLUGIN_URL.'/Bankrate-Mortgage-Freecontent'; ?>/images/fcc_04.jpg" /></div>
				<div class="wedget"><img src="<?php echo WP_PLUGIN_URL.'/Bankrate-Mortgage-Freecontent'; ?>/images/fcc_05.jpg" /></div>
				<div class="wedget_area"><?php echo _e('Drag the “Bankrate Mortgage Calculator” into your desired Widget Area.'); ?></div>
			</div>
			<div style="clear:both;"><img src="<?php echo WP_PLUGIN_URL.'/Bankrate-Mortgage-Freecontent'; ?>/images/fcc_06.jpg" /></div>
		</div>
		</div>

		<div id="container_right">
				<?php require ('admin-right-rail.php'); ?>
		</div>
	</div>
<?php } ?>

<?php
/*
Plugin Name: Calculated Fields Form
Plugin URI: http://wordpress.dwbooster.com/forms/calculated-fields-form
Description: Create forms with field values calculated based in other form field values.
Version: 1.0.126
Text Domain: calculated-fields-form 
Author: CodePeople.net
Author URI: http://codepeople.net
License: GPL
*/


/* initialization / install / uninstall functions */

function cp_calculatedfieldsf_get_site_url( $admin = false )
{
	$blog = get_current_blog_id();
	if( $admin ) $url = get_admin_url( $blog );		
	else $url = get_site_url( $blog );		
	return rtrim( $url, '/' );
}

// Calculated Fields Form constants
define('CP_SCHEME', ( is_ssl() ) ? 'https://' : 'http://' );
define('CP_CALCULATEDFIELDSF_DEFAULT_DEFER_SCRIPTS_LOADING', (get_option('CP_CFF_LOAD_SCRIPTS',"0") == "1"?true:false) );
define('CP_CALCULATEDFIELDSF_USE_CACHE', 1 );

define('CP_CALCULATEDFIELDSF_DEFAULT_CURRENCY_SYMBOL','$');
define('CP_CALCULATEDFIELDSF_GBP_CURRENCY_SYMBOL',chr(163)); 
define('CP_CALCULATEDFIELDSF_EUR_CURRENCY_SYMBOL_A','EUR ');
define('CP_CALCULATEDFIELDSF_EUR_CURRENCY_SYMBOL_B',chr(128));

define('CP_CALCULATEDFIELDSF_DEFAULT_form_structure', '[[{"name":"fieldname2","index":0,"title":"Number","predefined":"5","ftype":"fnumber","userhelp":"","csslayout":"","required":false,"size":"small","min":"","max":"","dformat":"digits","formats":["digits","number"]},{"name":"separator1","index":1,"title":"The field below will show the double of the number above.","userhelp":"","ftype":"fSectionBreak","csslayout":""},{"name":"fieldname1","index":2,"title":"Calculated Value","eq":"fieldname2*2","ftype":"fCalculated","userhelp":"","csslayout":"","predefined":"","required":false,"size":"medium","readonly":true}],[{"title":"Calculated Form","description":"Starting form. Basic calculated fields sample. ","formlayout":"top_aligned"}]]');
define('CP_CALCULATEDFIELDSF_DEFAULT_form_structure1', '[[{"name":"fieldname5","index":0,"title":"Simple Sum of two numbers","userhelp":"","ftype":"fSectionBreak","csslayout":""},{"name":"fieldname2","index":1,"title":"First Number","userhelp":"","dformat":"number","min":"","max":"","predefined":"3","ftype":"fnumber","csslayout":"","required":false,"size":"small","formats":["digits","number"]},{"name":"fieldname6","index":2,"title":"Second Number","predefined":"2","ftype":"fnumber","userhelp":"","csslayout":"","required":false,"size":"small","min":"","max":"","dformat":"digits","formats":["digits","number"]},{"name":"fieldname4","index":3,"readonly":true,"title":"Sum","predefined":"","userhelp":"Note: Sum of First Number + Second Number","eq":"fieldname2+fieldname6","ftype":"fCalculated","csslayout":"","required":false,"size":"medium"},{"name":"fieldname7","index":4,"title":"Sum of selected fields","userhelp":"","ftype":"fSectionBreak","csslayout":""},{"choices":["Item A: $10","Item B: $20","Item C: $40"],"choiceSelected":[true,true,false],"name":"fieldname8","index":5,"title":"Select/un-select some items","ftype":"fcheck","userhelp":"","csslayout":"","layout":"one_column","required":false},{"name":"fieldname9","index":6,"title":"Sum of selected items","eq":"fieldname8","ftype":"fCalculated","userhelp":"","csslayout":"","predefined":"","required":false,"size":"medium","readonly":false}],[{"title":"Simple Operations","description":"Below you can test two simple and frequent operations.","formlayout":"top_aligned"}]]');
define('CP_CALCULATEDFIELDSF_DEFAULT_form_structure2', '[[{"name":"fieldname1","index":0,"title":"Check-in","ftype":"fdate","userhelp":"","csslayout":"","predefined":"","size":"medium","required":false,"dformat":"mm/dd/yyyy","showDropdown":false,"dropdownRange":"-10:+10","formats":["mm/dd/yyyy","dd/mm/yyyy"]},{"name":"fieldname2","index":1,"title":"Check-out","ftype":"fdate","userhelp":"","csslayout":"","predefined":"","size":"medium","required":false,"dformat":"mm/dd/yyyy","showDropdown":false,"dropdownRange":"-10:+10","formats":["mm/dd/yyyy","dd/mm/yyyy"]},{"choices":["Parking - $10","Breakfast - $20","Premium Internet Access - $3"],"choiceSelected":[false,false,false],"name":"fieldname3","index":2,"title":"Optional Services","ftype":"fcheck","userhelp":"","csslayout":"","layout":"one_column","required":false,"choicesVal":["10","20","3"]},{"name":"fieldname4","index":3,"title":"","userhelp":"Note: The cost of the optional services are per each night.","ftype":"fSectionBreak","csslayout":""},{"name":"fieldname5","index":4,"title":"Total Cost","eq":"abs(fieldname2-fieldname1) * (fieldname3+50)","userhelp":"The formula is: (checkout - checkin) * (optionals + base rate)<br />Without the optional services the formula would be: (checkout-checkin) * base rate","ftype":"fCalculated","csslayout":"","predefined":"","required":false,"size":"medium","readonly":false}],[{"title":"Calculation with Dates","description":"The form below gives a quote for a stay in a hotel based in the check-in date, check-out date and some optional services. The base rate used is $50 per night.","formlayout":"top_aligned"}]]');
define('CP_CALCULATEDFIELDSF_DEFAULT_form_structure3', '[[{"name":"fieldname2","index":0,"title":"Height","userhelp":"In centimeters","dformat":"number","min":"30","max":"250","predefined":"180","ftype":"fnumber","csslayout":"","required":false,"size":"small","formats":["digits","number"]},{"choices":["Male","Female"],"name":"fieldname3","index":1,"choiceSelected":"Male","title":"Sex","ftype":"fdropdown","userhelp":"","csslayout":"","size":"medium","required":false},{"name":"fieldname5","index":2,"title":"Ideal Weight","userhelp":"Formula used:<br />Men: (height - 100)*0.90<br />Woman: (height - 100)*0.85","ftype":"fSectionBreak","csslayout":""},{"name":"fieldname4","index":3,"readonly":true,"title":"Ideal Weight","predefined":"","userhelp":"Note: Based in the above data and formula","eq":"(fieldname2-100)*(fieldname3==\'Male\'?0.90:0.85)","ftype":"fCalculated","csslayout":"","required":false,"size":"medium"}],[{"title":"Ideal Weight Calculator","description":"This sample uses a simple formula but with a conditional rule (if male or female).  The conditional expression is built using the JavaScript ternary operator. It\'s basically as follows: <em>condition ? value_if_true : value_if_false</em>.","formlayout":"top_aligned"}]]');
define('CP_CALCULATEDFIELDSF_DEFAULT_form_structure4', '[[{"name":"fieldname1","index":0,"title":"Enter the first day of last menstrual period","ftype":"fdate","userhelp":"","csslayout":"","predefined":"01/01/2013","size":"medium","required":false,"dformat":"mm/dd/yyyy","showDropdown":false,"dropdownRange":"-10:+10","formats":["mm/dd/yyyy","dd/mm/yyyy"]},{"name":"fieldname4","index":1,"title":"","userhelp":"Note: The dates below are approximate calculations. The real date may be slightly different.","ftype":"fSectionBreak","csslayout":""},{"name":"fieldname5","index":2,"title":"Conception Date","eq":"cdate(fieldname1+14)","userhelp":"","ftype":"fCalculated","csslayout":"","predefined":"","required":false,"size":"medium","readonly":false},{"name":"fieldname6","index":3,"title":"Due Date","eq":"cdate(fieldname1+40*7)","ftype":"fCalculated","userhelp":"","csslayout":"","predefined":"","required":false,"size":"medium","readonly":false}],[{"title":"Pregnancy Calculator","description":"The form below calculates the conception date and due date based in the first day of last menstrual period. The calculated values are converted to date again after the calculation.","formlayout":"top_aligned"}]]');
define('CP_CALCULATEDFIELDSF_DEFAULT_form_structure5', '[[{"name":"fieldname2","index":0,"title":"Loan Amount","userhelp":"","dformat":"number","min":"","max":"","predefined":"20000","ftype":"fnumber","csslayout":"","required":false,"size":"small","formats":["digits","number"]},{"name":"fieldname6","index":1,"title":"Residual Value","userhelp":"","predefined":"10000","ftype":"fnumber","csslayout":"","required":false,"size":"small","min":"","max":"","dformat":"number","formats":["digits","number"]},{"name":"fieldname7","index":2,"predefined":"7.5","title":"Interest Rate %","ftype":"fnumber","userhelp":"","csslayout":"","required":false,"size":"small","min":"","max":"","dformat":"number","formats":["digits","number"]},{"name":"fieldname8","index":3,"title":"Number of Months","dformat":"number","predefined":"36","ftype":"fnumber","userhelp":"","csslayout":"","required":false,"size":"small","min":"","max":"","formats":["digits","number"]},{"name":"fieldname5","index":4,"title":"","userhelp":"Results based in the data entered above:","ftype":"fSectionBreak","csslayout":""},{"name":"fieldname4","index":5,"readonly":true,"title":"Monthly Payment","predefined":"","userhelp":"","eq":"prec((fieldname2*fieldname7/1200*pow(1+fieldname7/1200,fieldname8)-fieldname6*fieldname7/1200)/(pow(1+fieldname7/1200,fieldname8)-1),2)","ftype":"fCalculated","csslayout":"","required":false,"size":"medium","dformat":"number"},{"name":"fieldname9","index":6,"title":"Total Payment","readonly":true,"eq":"prec(fieldname4*fieldname8,2)","ftype":"fCalculated","userhelp":"","csslayout":"","predefined":"","required":false,"size":"medium"},{"name":"fieldname10","index":7,"title":"Interest Amount","eq":"prec(fieldname6+fieldname9-fieldname2,2)","ftype":"fCalculated","userhelp":"","csslayout":"","predefined":"","required":false,"size":"medium","readonly":false}],[{"title":"Lease Calculator","description":"This sample uses a more complex formula for a lease calculator. It includes the \"power\" (pow) and \"precision\" (prec) functions.","formlayout":"top_aligned"}]]');

define('CP_CALCULATEDFIELDSF_DEFAULT_fp_subject', 'Contact from the blog...');
define('CP_CALCULATEDFIELDSF_DEFAULT_fp_inc_additional_info', 'true');
define('CP_CALCULATEDFIELDSF_DEFAULT_fp_return_page', cp_calculatedfieldsf_get_site_url().'/' );
define('CP_CALCULATEDFIELDSF_DEFAULT_fp_message', "The following contact message has been sent:\n\n<%INFO%>\n\n");

define('CP_CALCULATEDFIELDSF_DEFAULT_cu_enable_copy_to_user', 'true');
define('CP_CALCULATEDFIELDSF_DEFAULT_cu_user_email_field', '');
define('CP_CALCULATEDFIELDSF_DEFAULT_cu_subject', 'Confirmation: Message received...');
define('CP_CALCULATEDFIELDSF_DEFAULT_cu_message', "Thank you for your message. We will reply you as soon as possible.\n\nThis is a copy of the data sent:\n\n<%INFO%>\n\nBest Regards.");
define('CP_CALCULATEDFIELDSF_DEFAULT_email_format','text');

define('CP_CALCULATEDFIELDSF_DEFAULT_vs_use_validation', 'true');

define('CP_CALCULATEDFIELDSF_DEFAULT_vs_text_is_required', 'This field is required.');
define('CP_CALCULATEDFIELDSF_DEFAULT_vs_text_is_email', 'Please enter a valid email address.');

define('CP_CALCULATEDFIELDSF_DEFAULT_vs_text_datemmddyyyy', 'Please enter a valid date with this format(mm/dd/yyyy)');
define('CP_CALCULATEDFIELDSF_DEFAULT_vs_text_dateddmmyyyy', 'Please enter a valid date with this format(dd/mm/yyyy)');
define('CP_CALCULATEDFIELDSF_DEFAULT_vs_text_number', 'Please enter a valid number.');
define('CP_CALCULATEDFIELDSF_DEFAULT_vs_text_digits', 'Please enter only digits.');
define('CP_CALCULATEDFIELDSF_DEFAULT_vs_text_max', 'Please enter a value less than or equal to {0}.');
define('CP_CALCULATEDFIELDSF_DEFAULT_vs_text_min', 'Please enter a value greater than or equal to {0}.');


define('CP_CALCULATEDFIELDSF_DEFAULT_cv_enable_captcha', 'true');
define('CP_CALCULATEDFIELDSF_DEFAULT_cv_width', '180');
define('CP_CALCULATEDFIELDSF_DEFAULT_cv_height', '60');
define('CP_CALCULATEDFIELDSF_DEFAULT_cv_chars', '5');
define('CP_CALCULATEDFIELDSF_DEFAULT_cv_font', 'font-1.ttf');
define('CP_CALCULATEDFIELDSF_DEFAULT_cv_min_font_size', '25');
define('CP_CALCULATEDFIELDSF_DEFAULT_cv_max_font_size', '35');
define('CP_CALCULATEDFIELDSF_DEFAULT_cv_noise', '200');
define('CP_CALCULATEDFIELDSF_DEFAULT_cv_noise_length', '4');
define('CP_CALCULATEDFIELDSF_DEFAULT_cv_background', 'ffffff');
define('CP_CALCULATEDFIELDSF_DEFAULT_cv_border', '000000');
define('CP_CALCULATEDFIELDSF_DEFAULT_cv_text_enter_valid_captcha', 'Please enter a valid captcha code.');


define('CP_CALCULATEDFIELDSF_DEFAULT_ENABLE_PAYPAL', 1);
define('CP_CALCULATEDFIELDSF_DEFAULT_PAYPAL_MODE', 'production');
define('CP_CALCULATEDFIELDSF_DEFAULT_PAYPAL_RECURRENT', '0');
define('CP_CALCULATEDFIELDSF_DEFAULT_PAYPAL_IDENTIFY_PRICES', '0');
define('CP_CALCULATEDFIELDSF_DEFAULT_PAYPAL_ZERO_PAYMENT', '0');
define('CP_CALCULATEDFIELDSF_DEFAULT_PAYPAL_EMAIL','put_your@email_here.com');
define('CP_CALCULATEDFIELDSF_DEFAULT_PRODUCT_NAME','Reservation');
define('CP_CALCULATEDFIELDSF_DEFAULT_COST','25');
define('CP_CALCULATEDFIELDSF_DEFAULT_CURRENCY','USD');
define('CP_CALCULATEDFIELDSF_DEFAULT_PAYPAL_LANGUAGE','EN');

// database
define('CP_CALCULATEDFIELDSF_FORMS_TABLE', 'cp_calculated_fields_form_settings');

define('CP_CALCULATEDFIELDSF_DISCOUNT_CODES_TABLE_NAME_NO_PREFIX', "cp_calculated_fields_form_discount_codes");
define('CP_CALCULATEDFIELDSF_DISCOUNT_CODES_TABLE_NAME', @$wpdb->prefix ."cp_calculated_fields_form_discount_codes");

define('CP_CALCULATEDFIELDSF_POSTS_TABLE_NAME_NO_PREFIX', "cp_calculated_fields_form_posts");
define('CP_CALCULATEDFIELDSF_POSTS_TABLE_NAME', @$wpdb->prefix ."cp_calculated_fields_form_posts");
// end Calculated Fields Form constants

// Defined general texts
$cpcff_default_texts_array = array(
    'page_of_text' => array( 
                             'label' => 'Page X of Y (text)',
                             'text' => 'Page {0} of {0}'
                            ),
	'errors' => array(
						'maxlength' => array( 
										 'label' => '"Max length/characters" text',
										 'text' => 'Please enter no more than {0} characters.'
										),
						'minlength' => array( 
										 'label' => '"Min length/characters" text',
										 'text' => 'Please enter at least {0} characters.'
										),
						'equalTo' => array( 
										 'label' => '"Equal to" text',
										 'text' => 'Please enter the same value again.'
										),
						'accept' => array( 
										 'label' => '"Accept these file extensions" text',
										 'text' => 'Please enter a value with a valid extension.'
										),
						'upload_size' => array( 
										 'label' => '"Maximun upload size in kB" text',
										 'text' => 'The file you\'ve chosen is too big, maximum is {0} kB.'
										)				
					)
);

// Global variables to maintain an incremental number to identify the forms on page
$CP_CFF_global_form_count_number = 0;
$CP_CFF_global_form_count = "_".$CP_CFF_global_form_count_number;

require_once 'cp_session.php';
// Start Session
CP_SESSION::session_start();

if( !function_exists( 'array_replace_recursive' ) )
{
    function array_replace_recursive($array1, $array2)
    {
        foreach( $array2 as $key1 => $val1 )
        {
            if( isset( $array1[ $key1 ] ) )
            {
                if( is_array( $val1 ) )
                {
                    foreach( $val1 as $key2 => $val2)
                    {
                        $array1[ $key1 ][ $key2 ] = $val2;
                    }
                }
                else
                {
                    $array1[ $key1 ] = $val1;
                }
            }
            else
            {
                $array1[ $key1 ] = $val1;
            }
        }
        return $array1; 
    }
}

// code initialization, hooks
// -----------------------------------------
function cp_calculated_fields_form_load_plugin_textdomain() {
    load_plugin_textdomain( 'calculated-fields-form', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'cp_calculated_fields_form_load_plugin_textdomain' );

register_activation_hook(__FILE__,'cp_calculatedfieldsf_install');
add_action( 'init', 'cp_calculated_fields_form_load_resources_and_shortcodes', 1 );
function cp_calculated_fields_form_load_resources_and_shortcodes()
{
	if( !is_admin() )
	{
		if( isset( $_REQUEST[ 'cp_cff_resources' ] ) )
		{
			require_once dirname( __FILE__ ).'/js/fbuilder-loader-public.php';
			exit;
		}
		add_shortcode( 'CP_CALCULATED_FIELDS', 'cp_calculatedfieldsf_filter_content' );        
		add_shortcode( 'CP_CALCULATED_FIELDS_VAR', 'cp_calculatedfieldsf_create_var' );
	}
	elseif( isset( $_REQUEST[ 'cp_cff_resources' ] ) )
	{
		require_once dirname( __FILE__ ).'/js/fbuilder-loader-admin.php';
		exit;
	}	
}
	
add_action( 'init', 'cp_calculated_fields_form_check_posted_data', 11 );
    
if ( is_admin() ) {
    add_action('media_buttons', 'set_cp_calculatedfieldsf_insert_button', 100);
    add_action('admin_enqueue_scripts', 'set_cp_calculatedfieldsf_insert_adminScripts', 1);
    add_action('admin_menu', 'cp_calculatedfieldsf_admin_menu');    

    $plugin = plugin_basename(__FILE__);
    add_filter("plugin_action_links_".$plugin, 'cp_calculatedfieldsf_links');

    function cp_calculatedfieldsf_admin_menu() {
		add_options_page('Calculated Fields Form Options', 'Calculated Fields Form', 'manage_options', 'cp_calculated_fields_form', 'cp_calculatedfieldsf_html_post_page' );
	}
}


// functions
//------------------------------------------

add_action( 'wpmu_new_blog', 'cp_calculatedfieldsf_new_blog', 10, 6);        
 
function cp_calculatedfieldsf_new_blog($blog_id, $user_id, $domain, $path, $site_id, $meta ) {
    global $wpdb;
 
    if (is_plugin_active_for_network('calculated-fields-form/cp_calculatedfieldsf.php')) {
        $old_blog = $wpdb->blogid;
        switch_to_blog($blog_id);
        _cp_calculatedfieldsf_install();
        switch_to_blog($old_blog);
    }
}

function cp_calculatedfieldsf_install($networkwide)  {
	global $wpdb;

	if (function_exists('is_multisite') && is_multisite()) {
		// check if it is a network activation - if so, run the activation function for each blog id
		if ($networkwide) {
	                $old_blog = $wpdb->blogid;
			// Get all blog ids
			$blogids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
			foreach ($blogids as $blog_id) {
				switch_to_blog($blog_id);
				_cp_calculatedfieldsf_install();
			}
			switch_to_blog($old_blog);
			return;
		}
	}
	_cp_calculatedfieldsf_install();
}

function _cp_calculatedfieldsf_install() {
    global $wpdb;
    
	if( !defined( 'CP_CALCULATEDFIELDSF_DEFAULT_fp_from_email' ) ) define('CP_CALCULATEDFIELDSF_DEFAULT_fp_from_email', get_the_author_meta('user_email', get_current_user_id()) );
    if( !defined( 'CP_CALCULATEDFIELDSF_DEFAULT_fp_destination_emails' ) ) define('CP_CALCULATEDFIELDSF_DEFAULT_fp_destination_emails', CP_CALCULATEDFIELDSF_DEFAULT_fp_from_email);

    $table_name = $wpdb->prefix.CP_CALCULATEDFIELDSF_FORMS_TABLE;

    $sql = "CREATE TABLE IF NOT EXISTS ".$wpdb->prefix.CP_CALCULATEDFIELDSF_POSTS_TABLE_NAME_NO_PREFIX." (
         id mediumint(9) NOT NULL AUTO_INCREMENT,
         formid INT NOT NULL,
         time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
         ipaddr VARCHAR(32) DEFAULT '' NOT NULL,
         notifyto VARCHAR(250) DEFAULT '' NOT NULL,
         data mediumtext,
         paypal_post mediumtext,
         paid INT DEFAULT 0 NOT NULL,
         UNIQUE KEY id (id)
         );";
    $wpdb->query($sql);

    $sql = "CREATE TABLE IF NOT EXISTS ".$wpdb->prefix.CP_CALCULATEDFIELDSF_DISCOUNT_CODES_TABLE_NAME_NO_PREFIX." (
         id mediumint(9) NOT NULL AUTO_INCREMENT,
         form_id mediumint(9) NOT NULL DEFAULT 1,
         code VARCHAR(250) DEFAULT '' NOT NULL,
         discount VARCHAR(250) DEFAULT '' NOT NULL,
         expires datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,       
         availability int(10) unsigned NOT NULL DEFAULT 0,
         used int(10) unsigned NOT NULL DEFAULT 0,
         UNIQUE KEY id (id)
         );";             
    $wpdb->query($sql); 


    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
         id mediumint(9) NOT NULL AUTO_INCREMENT,

         form_name VARCHAR(250) DEFAULT '' NOT NULL,

         form_structure mediumtext,

         fp_from_email VARCHAR(250) DEFAULT '' NOT NULL,
         fp_destination_emails text,
         fp_subject VARCHAR(250) DEFAULT '' NOT NULL,
         fp_inc_additional_info VARCHAR(10) DEFAULT '' NOT NULL,
         fp_return_page VARCHAR(250) DEFAULT '' NOT NULL,
         fp_message mediumtext,
         fp_emailformat VARCHAR(10) DEFAULT '' NOT NULL,

         cu_enable_copy_to_user VARCHAR(10) DEFAULT '' NOT NULL,
         cu_user_email_field VARCHAR(250) DEFAULT '' NOT NULL,
         cu_subject VARCHAR(250) DEFAULT '' NOT NULL,
         cu_message mediumtext,
         cu_emailformat VARCHAR(10) DEFAULT '' NOT NULL,

         vs_use_validation VARCHAR(10) DEFAULT '' NOT NULL,
         vs_text_is_required VARCHAR(250) DEFAULT '' NOT NULL,
         vs_text_is_email VARCHAR(250) DEFAULT '' NOT NULL,
         vs_text_datemmddyyyy VARCHAR(250) DEFAULT '' NOT NULL,
         vs_text_dateddmmyyyy VARCHAR(250) DEFAULT '' NOT NULL,
         vs_text_number VARCHAR(250) DEFAULT '' NOT NULL,
         vs_text_digits VARCHAR(250) DEFAULT '' NOT NULL,
         vs_text_max VARCHAR(250) DEFAULT '' NOT NULL,
         vs_text_min VARCHAR(250) DEFAULT '' NOT NULL,
         vs_text_submitbtn VARCHAR(250) DEFAULT '' NOT NULL,
         vs_text_previousbtn VARCHAR(250) DEFAULT '' NOT NULL,
         vs_text_nextbtn VARCHAR(250) DEFAULT '' NOT NULL,         
         vs_all_texts text DEFAULT '' NOT NULL,         
         
         enable_paypal varchar(10) DEFAULT '' NOT NULL,
         paypal_email varchar(255) DEFAULT '' NOT NULL ,
         request_cost varchar(255) DEFAULT '' NOT NULL ,
         paypal_product_name varchar(255) DEFAULT '' NOT NULL,
         currency varchar(10) DEFAULT '' NOT NULL,
         paypal_language varchar(10) DEFAULT '' NOT NULL,
         paypal_mode varchar(20) DEFAULT '' NOT NULL ,
         paypal_recurrent varchar(20) DEFAULT '' NOT NULL ,
         paypal_identify_prices varchar(20) DEFAULT '' NOT NULL ,
         paypal_zero_payment varchar(10) DEFAULT '' NOT NULL ,

         cv_enable_captcha VARCHAR(20) DEFAULT '' NOT NULL,
         cv_width VARCHAR(20) DEFAULT '' NOT NULL,
         cv_height VARCHAR(20) DEFAULT '' NOT NULL,
         cv_chars VARCHAR(20) DEFAULT '' NOT NULL,
         cv_font VARCHAR(20) DEFAULT '' NOT NULL,
         cv_min_font_size VARCHAR(20) DEFAULT '' NOT NULL,
         cv_max_font_size VARCHAR(20) DEFAULT '' NOT NULL,
         cv_noise VARCHAR(20) DEFAULT '' NOT NULL,
         cv_noise_length VARCHAR(20) DEFAULT '' NOT NULL,
         cv_background VARCHAR(20) DEFAULT '' NOT NULL,
         cv_border VARCHAR(20) DEFAULT '' NOT NULL,
         cv_text_enter_valid_captcha VARCHAR(200) DEFAULT '' NOT NULL,

         UNIQUE KEY id (id)
         );";
    $wpdb->query($sql);

	$alterate_columns = array(
		'form_structure' 	=> "mediumtext",
		'fp_message' 		=> "mediumtext",
		'cu_message' 		=> "mediumtext"
	);
	
	foreach( $alterate_columns as $column_name => $column_structure )
	{
		$sql = "ALTER TABLE  `".$table_name."` MODIFY `".$column_name."` ".$column_structure; 
		$wpdb->query($sql);
	}
	
	// Correct the tables structures
	$columns = $wpdb->get_results("SHOW columns FROM `".$table_name."`");    
	$columns_list = array();
	foreach( $columns as $column )
		$columns_list[] = $column->Field;
    
	$new_columns = array(
		'vs_text_previousbtn' 		=> "varchar(250) NOT NULL default ''",
		'vs_text_nextbtn' 			=> "varchar(250) NOT NULL default ''",
		'vs_all_texts' 				=> "text NOT NULL default ''"
	);
	
	foreach( $new_columns as $column_name => $column_structure )
	{
		if( !in_array( $column_name, $columns_list ) )
		{	
			$sql = "ALTER TABLE  `".$table_name."` ADD `".$column_name."` ".$column_structure; 
			$wpdb->query($sql);
		}	
	}
	
    $count = $wpdb->get_var(  "SELECT COUNT(id) FROM ".$table_name  );
    if (!$count)
    {   
		$values = array( 'fp_from_email' => CP_CALCULATEDFIELDSF_DEFAULT_fp_from_email,
                         'fp_destination_emails' => CP_CALCULATEDFIELDSF_DEFAULT_fp_destination_emails,
                         'fp_subject' => CP_CALCULATEDFIELDSF_DEFAULT_fp_subject,
                         'fp_inc_additional_info' => CP_CALCULATEDFIELDSF_DEFAULT_fp_inc_additional_info,
                         'fp_return_page' => CP_CALCULATEDFIELDSF_DEFAULT_fp_return_page,
                         'fp_message' => CP_CALCULATEDFIELDSF_DEFAULT_fp_message,
                         'fp_emailformat' => CP_CALCULATEDFIELDSF_DEFAULT_email_format,

                         'cu_enable_copy_to_user' => CP_CALCULATEDFIELDSF_DEFAULT_cu_enable_copy_to_user,
                         'cu_user_email_field' => CP_CALCULATEDFIELDSF_DEFAULT_cu_user_email_field,
                         'cu_subject' => CP_CALCULATEDFIELDSF_DEFAULT_cu_subject,
                         'cu_message' => CP_CALCULATEDFIELDSF_DEFAULT_cu_message,
                         'cu_emailformat' => CP_CALCULATEDFIELDSF_DEFAULT_email_format,

                         'vs_use_validation' => CP_CALCULATEDFIELDSF_DEFAULT_vs_use_validation,
                         'vs_text_is_required' => CP_CALCULATEDFIELDSF_DEFAULT_vs_text_is_required,
                         'vs_text_is_email' => CP_CALCULATEDFIELDSF_DEFAULT_vs_text_is_email,
                         'vs_text_datemmddyyyy' => CP_CALCULATEDFIELDSF_DEFAULT_vs_text_datemmddyyyy,
                         'vs_text_dateddmmyyyy' => CP_CALCULATEDFIELDSF_DEFAULT_vs_text_dateddmmyyyy,
                         'vs_text_number' => CP_CALCULATEDFIELDSF_DEFAULT_vs_text_number,
                         'vs_text_digits' => CP_CALCULATEDFIELDSF_DEFAULT_vs_text_digits,
                         'vs_text_max' => CP_CALCULATEDFIELDSF_DEFAULT_vs_text_max,
                         'vs_text_min' => CP_CALCULATEDFIELDSF_DEFAULT_vs_text_min,
                         'vs_text_submitbtn' => 'Submit',
                         'vs_text_previousbtn' => 'Previous',
                         'vs_text_nextbtn' => 'Next',                         
                         
                         'enable_paypal' => CP_CALCULATEDFIELDSF_DEFAULT_ENABLE_PAYPAL,
                         'paypal_email' => CP_CALCULATEDFIELDSF_DEFAULT_PAYPAL_EMAIL,
                         'request_cost' => CP_CALCULATEDFIELDSF_DEFAULT_COST,
                         'paypal_product_name' => CP_CALCULATEDFIELDSF_DEFAULT_PRODUCT_NAME,
                         'currency' => CP_CALCULATEDFIELDSF_DEFAULT_CURRENCY,
                         'paypal_language' => CP_CALCULATEDFIELDSF_DEFAULT_PAYPAL_LANGUAGE,                                      
                         'paypal_mode' => CP_CALCULATEDFIELDSF_DEFAULT_PAYPAL_MODE,
                         'paypal_recurrent' => CP_CALCULATEDFIELDSF_DEFAULT_PAYPAL_RECURRENT,
                         'paypal_identify_prices' => CP_CALCULATEDFIELDSF_DEFAULT_PAYPAL_IDENTIFY_PRICES,
                         'paypal_zero_payment' => CP_CALCULATEDFIELDSF_DEFAULT_PAYPAL_ZERO_PAYMENT,

                         'cv_enable_captcha' => CP_CALCULATEDFIELDSF_DEFAULT_cv_enable_captcha,
                         'cv_width' => CP_CALCULATEDFIELDSF_DEFAULT_cv_width,
                         'cv_height' => CP_CALCULATEDFIELDSF_DEFAULT_cv_height,
                         'cv_chars' => CP_CALCULATEDFIELDSF_DEFAULT_cv_chars,
                         'cv_font' => CP_CALCULATEDFIELDSF_DEFAULT_cv_font,
                         'cv_min_font_size' => CP_CALCULATEDFIELDSF_DEFAULT_cv_min_font_size,
                         'cv_max_font_size' => CP_CALCULATEDFIELDSF_DEFAULT_cv_max_font_size,
                         'cv_noise' => CP_CALCULATEDFIELDSF_DEFAULT_cv_noise,
                         'cv_noise_length' => CP_CALCULATEDFIELDSF_DEFAULT_cv_noise_length,
                         'cv_background' => CP_CALCULATEDFIELDSF_DEFAULT_cv_background,
                         'cv_border' => CP_CALCULATEDFIELDSF_DEFAULT_cv_border,
                         'cv_text_enter_valid_captcha' => CP_CALCULATEDFIELDSF_DEFAULT_cv_text_enter_valid_captcha
                        );
        $values['id'] = 1;
        $values['form_name'] = 'Simple Operations';
        $values['form_structure'] = CP_CALCULATEDFIELDSF_DEFAULT_form_structure1;
        $wpdb->insert( $table_name, $values );   
        $values['id'] = 2;
        $values['form_name'] = 'Calculation with Dates';
        $values['form_structure'] = CP_CALCULATEDFIELDSF_DEFAULT_form_structure2;
        $wpdb->insert( $table_name, $values );   
        $values['id'] = 3;
        $values['form_name'] = 'Ideal Weight Calculator';
        $values['form_structure'] = CP_CALCULATEDFIELDSF_DEFAULT_form_structure3;
        $wpdb->insert( $table_name, $values );
        $values['id'] = 4;
        $values['form_name'] = 'Pregnancy Calculator';
        $values['form_structure'] = CP_CALCULATEDFIELDSF_DEFAULT_form_structure4;
        $wpdb->insert( $table_name, $values );     
        $values['id'] = 5;
        $values['form_name'] = 'Lease Calculator';
        $values['form_structure'] = CP_CALCULATEDFIELDSF_DEFAULT_form_structure5;
        $wpdb->insert( $table_name, $values );
    }    
}

/**
 * Add the attribute: property="stylesheet" to the link tag if has not been defined.
 */
function cp_calculatedfieldsf_link_tag( $tag )
{
	if( preg_match( '/property\\s*=/i', $tag ) == 0 )
	{
		return str_replace( '/>', ' property="stylesheet" />', $tag );
	}	
	return $tag;
} // End cp_calculatedfieldsf_link_tag

/**
 * Check if the page is visited from crawlers, and the plugin is configured to prevent the shortcodes replacement when the website is visited by crawlers 
 */ 
function cp_calculatedfieldsf_is_crawler()
{
	if(
		isset( $_SERVER['HTTP_USER_AGENT'] ) && 
		preg_match( '/bot|crawl|slurp|spider/i', $_SERVER[ 'HTTP_USER_AGENT' ] ) &&
		get_option( 'CP_CALCULATEDFIELDSF_EXCLUDE_CRAWLERS', false )
	)
	{
		return true;
	}
	return false;
}// End cp_calculatedfieldsf_is_crawler

/**
 * Create a javascript variable, from: Post, Get, Session or Cookie 
 */
function cp_calculatedfieldsf_create_var( $atts ) {
	
	if( cp_calculatedfieldsf_is_crawler() ) return '';
		
	if( isset( $atts[ 'name' ] ) )
	{
		$var = trim( $atts[ 'name' ] );
		if( !empty( $var ) )
		{
			if( isset( $atts[ 'value' ] ) )
			{
				$value = json_encode( $atts[ 'value' ] );
			}
			else
			{	
				$from = '_';
				if( isset( $atts[ 'from' ] ) ) $from .= strtoupper( trim( $atts[ 'from' ] ) );
				if( in_array( $from, array( '_POST', '_GET', '_SESSION', '_COOKIE' ) ) )
				{	
					if( isset( $GLOBALS[ $from ][ $var ] ) ){
						if( $from == '_COOKIE' )
						{
							$cookie_var = 1; 
							$value = 'fbuilder_get_cookie("'.$var.'")';
						}else $value = json_encode($GLOBALS[ $from ][ $var ]);
					} 	
					elseif( isset( $atts[ 'default_value' ] ) ) $value = json_encode($atts[ 'default_value' ]);
				}
				else
				{	
					if( isset( $_POST[ $var ] ) ) 				$value = json_encode($_POST[ $var ]);
					elseif( isset( $_GET[ $var ] ) ) 			$value = json_encode($_GET[ $var ]);
					elseif( isset( $_SESSION[ $var ] ) )		$value = json_encode($_SESSION[ $var ]); 
					elseif( isset( $_COOKIE[ $var ] ) ){ 
																$cookie_var = 1; 
																$value = 'fbuilder_get_cookie("'.$var.'")';
					}											
					elseif( isset( $atts[ 'default_value' ] ) ) $value = json_encode($atts[ 'default_value' ]);
				}
			}
			if( isset( $value ) )
			{
				$js_script  = '';
				global $calculated_fields_form_cookie_var;
				if( isset($cookie_var) && empty($calculated_fields_form_cookie_var) )
				{
					$calculated_fields_form_cookie_var  = 1;
					$js_script .= 'function fbuilder_get_cookie( name ){
										var re = new RegExp(name + "=([^;]+)");
										var value = re.exec(document.cookie);
										return (value != null) ? decodeURIComponent(value[1].replace(/\+/g, "%20")) : null;
									};';
				}	
				return '
				<script>
					try{
					'.$js_script.'	
					window["'.$var.'"]='.$value.';
					}catch( err ){}
				</script>
				';
			}	
		}	
	}	
} // End cp_calculatedfieldsf_create_var

// Used in forms previews
function cp_calculatedfieldsf_filter_content( $atts ) {
	
	if( cp_calculatedfieldsf_is_crawler() ) return '';
		
    global $wpdb, $CP_CFF_global_form_count;
	
	/** 
	 * Filters applied before generate the form, 
	 * is passed as parameter an array with the forms attributes, and return the list of attributes
	 */
	$atts = apply_filters( 'cpcff_pre_form',  $atts );

    if( empty( $atts[ 'id' ] ) )
	{
        $atts[ 'id' ] = '';
    }
    ob_start();  
    cp_calculatedfieldsf_get_public_form($atts[ 'id' ]);
    $buffered_contents = ob_get_contents();
    if( count( $atts ) > 1 )
    {
        $buffered_contents .= '<script>'; 
        foreach( $atts as $i => $v )
        {
            if( $i != 'id' && !is_numeric( $i ) )
            {
				$nV = ( is_numeric( $v ) ) ? $v : json_encode( $v );
                $buffered_contents .= $i.'='.$nV.';';
                $buffered_contents .= 'if(typeof '.$i.'_arr == "undefined") '.$i.'_arr={}; '.$i.'_arr["'.$CP_CFF_global_form_count.'"]='.$nV.';';
            }
        }
        $buffered_contents .= '</script>';
    }
    ob_end_clean();
		
	/** 
	 * Filters applied after generate the form, 
	 * is passed as parameter the HTML code of the form with the corresponding <LINK> and <SCRIPT> tags, 
	 * and returns the HTML code to includes in the webpage
	 */
	$buffered_contents = apply_filters( 'cpcff_the_form', $buffered_contents,  $atts[ 'id' ] );
	
    return $buffered_contents;
}

function cp_calculatedfieldsf_available_templates(){	
	global $CP_CFF_global_templates;
	
	if( empty( $CP_CFF_global_templates ) )
	{
		// Get available designs
		$tpls_dir = dir( plugin_dir_path( __FILE__ ).'templates' );
		$CP_CFF_global_templates = array();
		while( false !== ( $entry = $tpls_dir->read() ) ) 
		{    
			if ( $entry != '.' && $entry != '..' && is_dir( $tpls_dir->path.'/'.$entry ) && file_exists( $tpls_dir->path.'/'.$entry.'/config.ini' ) )
			{
				if( ( $ini_array = parse_ini_file( $tpls_dir->path.'/'.$entry.'/config.ini' ) ) != false || 
					( $ini_array = parse_ini_string( file_get_contents( $tpls_dir->path.'/'.$entry.'/config.ini' ) ) ) != false ) 
				{
					if( !empty( $ini_array[ 'file' ] ) ) $ini_array[ 'file' ] = plugins_url( 'templates/'.$entry.'/'.$ini_array[ 'file' ], __FILE__ );
					if( !empty( $ini_array[ 'js' ] ) ) $ini_array[ 'js' ] = plugins_url( 'templates/'.$entry.'/'.$ini_array[ 'js' ], __FILE__ );					
					if( !empty( $ini_array[ 'thumbnail' ] ) ) $ini_array[ 'thumbnail' ] = plugins_url( 'templates/'.$entry.'/'.$ini_array[ 'thumbnail' ], __FILE__ );
					$CP_CFF_global_templates[ $ini_array[ 'prefix' ] ] = $ini_array;
				}
			}			
		}
	}
		
	return $CP_CFF_global_templates;
}

function cp_calculatedfieldsf_get_public_form($id) {
    global $wpdb, $cpcff_default_texts_array;
    global $CP_CFF_global_form_count;
    global $CP_CFF_global_form_count_number;
    
    $CP_CFF_global_form_count_number++;
    $CP_CFF_global_form_count = "_".$CP_CFF_global_form_count_number;    
    if ( !defined('CP_AUTH_INCLUDE') ) define('CP_AUTH_INCLUDE', true); 
    
    if ($id != '')
        $myrows = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix.CP_CALCULATEDFIELDSF_FORMS_TABLE." WHERE id=%d",$id ) );
    else
        $myrows = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix.CP_CALCULATEDFIELDSF_FORMS_TABLE );
    
    $previous_label = cp_calculatedfieldsf_get_option('vs_text_previousbtn', 'Previous',$id);
    $previous_label = ( $previous_label=='' ? 'Previous' : $previous_label );
    $next_label = cp_calculatedfieldsf_get_option('vs_text_nextbtn', 'Next',$id);
    $next_label = ( $next_label == '' ? 'Next' : $next_label );    
    
    $cpcff_texts_array = cp_calculatedfieldsf_get_option( 'vs_all_texts', $cpcff_default_texts_array, $id );
    $cpcff_texts_array = array_replace_recursive( 
        $cpcff_default_texts_array, 
        ( is_string( $cpcff_texts_array ) && is_array( unserialize( $cpcff_texts_array ) ) ) 
            ? unserialize( $cpcff_texts_array ) 
            : ( ( is_array( $cpcff_texts_array ) ) ? $cpcff_texts_array : array() )
    );
    $page_of_label = $cpcff_texts_array[ 'page_of_text' ][ 'text' ];
	$maxlength_error_text = $cpcff_texts_array[ 'errors' ][ 'maxlength' ][ 'text' ];
	$minlength_error_text = $cpcff_texts_array[ 'errors' ][ 'minlength' ][ 'text' ];
	$equalTo_error_text   = $cpcff_texts_array[ 'errors' ][ 'equalTo' ][ 'text' ];
	$accept_error_text   = $cpcff_texts_array[ 'errors' ][ 'accept' ][ 'text' ];
	$upload_size_error_text   = $cpcff_texts_array[ 'errors' ][ 'upload_size' ][ 'text' ];
    
	$public_js_path = ( file_exists( rtrim( dirname( __FILE__ ), '/' ).'/js/cache/all.js' ) && get_option( 'CP_CALCULATEDFIELDSF_USE_CACHE', CP_CALCULATEDFIELDSF_USE_CACHE ) ) ? plugins_url('/js/cache/all.js', __FILE__) : cp_calculatedfieldsf_get_site_url().( ( strpos( cp_calculatedfieldsf_get_site_url(),'?' ) === false ) ? '/?' : '&' ).'cp_cff_resources=public&min='.get_option( 'CP_CALCULATEDFIELDSF_USE_CACHE', CP_CALCULATEDFIELDSF_USE_CACHE );
	
	if (CP_CALCULATEDFIELDSF_DEFAULT_DEFER_SCRIPTS_LOADING)
    {        
        wp_deregister_script('query-stringify');
        wp_register_script('query-stringify', plugins_url('/js/jQuery.stringify.js', __FILE__));
        
        wp_deregister_script('cp_calculatedfieldsf_validate_script');
        wp_register_script('cp_calculatedfieldsf_validate_script', plugins_url('/js/jquery.validate.js', __FILE__));
        
        wp_enqueue_script( 'cp_calculatedfieldsf_buikder_script', $public_js_path, array("jquery","jquery-ui-core","jquery-ui-button","jquery-ui-datepicker","jquery-ui-widget","jquery-ui-position","jquery-ui-tooltip","query-stringify","cp_calculatedfieldsf_validate_script", "jquery-ui-slider"), '1.0.126', true );    

        if ($id == '') $id = $myrows[0]->id;
		$obj = array(
			"pub"=>true,
			"identifier"=>$CP_CFF_global_form_count,
			"messages"=> array(
				"required" => cp_calculatedfieldsf_get_option('vs_text_is_required', CP_CALCULATEDFIELDSF_DEFAULT_vs_text_is_required,$id),
        	    "email" => cp_calculatedfieldsf_get_option('vs_text_is_email', CP_CALCULATEDFIELDSF_DEFAULT_vs_text_is_email,$id),
        	    "datemmddyyyy" => cp_calculatedfieldsf_get_option('vs_text_datemmddyyyy', CP_CALCULATEDFIELDSF_DEFAULT_vs_text_datemmddyyyy,$id),
				"dateddmmyyyy" => cp_calculatedfieldsf_get_option('vs_text_dateddmmyyyy', CP_CALCULATEDFIELDSF_DEFAULT_vs_text_dateddmmyyyy,$id),
				"number" => cp_calculatedfieldsf_get_option('vs_text_number', CP_CALCULATEDFIELDSF_DEFAULT_vs_text_number,$id),
				"digits" => cp_calculatedfieldsf_get_option('vs_text_digits', CP_CALCULATEDFIELDSF_DEFAULT_vs_text_digits,$id),
				"max" => cp_calculatedfieldsf_get_option('vs_text_max', CP_CALCULATEDFIELDSF_DEFAULT_vs_text_max,$id),
				"min" => cp_calculatedfieldsf_get_option('vs_text_min', CP_CALCULATEDFIELDSF_DEFAULT_vs_text_min,$id),
				"previous" => $previous_label,
				"next" => $next_label,
				"pageof" => $page_of_label,
				"minlength" => $minlength_error_text,
				"maxlength" => $maxlength_error_text,
				"equalTo" => $equalTo_error_text,
				"accept" => $accept_error_text,
				"upload_size" => $upload_size_error_text
			)
		);
        wp_localize_script('cp_calculatedfieldsf_buikder_script', 'cp_calculatedfieldsf_fbuilder_config'.$CP_CFF_global_form_count, array('obj' => json_encode( $obj )));    
    }  
    else
    {
        wp_enqueue_script( "jquery" );
        wp_enqueue_script( "jquery-ui-core" );
        wp_enqueue_script( "jquery-ui-datepicker" );        
		wp_enqueue_script( "jquery-ui-slider" );
    }   
    $codes = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM '.CP_CALCULATEDFIELDSF_DISCOUNT_CODES_TABLE_NAME.' WHERE `form_id`=%d', $id ) );
    @include dirname( __FILE__ ) . '/cp_calculatedfieldsf_public_int.inc.php';
    if (!CP_CALCULATEDFIELDSF_DEFAULT_DEFER_SCRIPTS_LOADING)
    {              
        if( !defined( 'CP_CALCULATEDFIELDSF_SCRIPTS_LOADED' ) ) // Load the scripts only one time
		{
			define( 'CP_CALCULATEDFIELDSF_SCRIPTS_LOADED', true );
			// This code won't be used in most cases. This code is for preventing problems in wrong WP themes and conflicts with third party plugins.
			$plugin_url = plugins_url('', __FILE__); 
			$prefix_ui = '';
			if ( @file_exists( dirname( __FILE__ ).'/../../../wp-includes/js/jquery/ui/jquery.ui.core.min.js' ) )
			$prefix_ui = 'jquery.ui.';
		?>
			<script> if( typeof jQuery != 'undefined' ) var jQueryBK = jQuery.noConflict(); </script>
			<script type='text/javascript' src='<?php echo $plugin_url.'/../../../wp-includes/js/jquery/jquery.js'; ?>'></script>
			<script type='text/javascript' src='<?php echo $plugin_url.'/../../../wp-includes/js/jquery/ui/'.$prefix_ui.'core.min.js'; ?>'></script>
			<script type='text/javascript' src='<?php echo $plugin_url.'/../../../wp-includes/js/jquery/ui/'.$prefix_ui.'datepicker.min.js'; ?>'></script>
			<script type='text/javascript' src='<?php echo $plugin_url.'/../../../wp-includes/js/jquery/ui/'.$prefix_ui.'widget.min.js'; ?>'></script>
			<script type='text/javascript' src='<?php echo $plugin_url.'/../../../wp-includes/js/jquery/ui/'.$prefix_ui.'position.min.js'; ?>'></script> 
			<script type='text/javascript' src='<?php echo $plugin_url.'/../../../wp-includes/js/jquery/ui/'.$prefix_ui.'tooltip.min.js'; ?>'></script>
			<script type='text/javascript' src='<?php echo $plugin_url.'/../../../wp-includes/js/jquery/ui/'.$prefix_ui.'mouse.min.js'; ?>'></script>
			<script type='text/javascript' src='<?php echo $plugin_url.'/../../../wp-includes/js/jquery/ui/'.$prefix_ui.'slider.min.js'; ?>'></script>
			<script> 
				if( typeof fbuilderjQuery == 'undefined') var fbuilderjQuery = jQuery.noConflict( ); 
				if( typeof jQueryBK != 'undefined' ) jQuery = jQueryBK;
			</script>
			<script type='text/javascript' src='<?php echo plugins_url('js/jQuery.stringify.js', __FILE__); ?>'></script>
			<script type='text/javascript' src='<?php echo plugins_url('js/jquery.validate.js', __FILE__); ?>'></script>
			<script type='text/javascript' src='<?php echo $public_js_path.(( strpos( $public_js_path, '?' ) == false ) ? '?' : '&' ).'ver=1.0.126'; ?>'></script>
		<?php
		}
		?>	
		<script type='text/javascript'>     
			/* <![CDATA[ */
			<?php
				$fbuilder_config = new stdClass;
				$fbuilder_config->obj = new stdClass;
				$fbuilder_config->obj->pub = true;
				$fbuilder_config->obj->identifier = $CP_CFF_global_form_count;
				$fbuilder_config->obj->messages = new stdClass;
				$fbuilder_config->obj->messages->required = cp_calculatedfieldsf_get_option('vs_text_is_required', CP_CALCULATEDFIELDSF_DEFAULT_vs_text_is_required,$id);
				$fbuilder_config->obj->messages->email = cp_calculatedfieldsf_get_option('vs_text_is_email', CP_CALCULATEDFIELDSF_DEFAULT_vs_text_is_email,$id);
				$fbuilder_config->obj->messages->datemmddyyyy = cp_calculatedfieldsf_get_option('vs_text_datemmddyyyy', CP_CALCULATEDFIELDSF_DEFAULT_vs_text_datemmddyyyy,$id);
				$fbuilder_config->obj->messages->dateddmmyyyy = cp_calculatedfieldsf_get_option('vs_text_dateddmmyyyy', CP_CALCULATEDFIELDSF_DEFAULT_vs_text_dateddmmyyyy,$id);
				$fbuilder_config->obj->messages->number = cp_calculatedfieldsf_get_option('vs_text_number', CP_CALCULATEDFIELDSF_DEFAULT_vs_text_number,$id);
				$fbuilder_config->obj->messages->digits = cp_calculatedfieldsf_get_option('vs_text_digits', CP_CALCULATEDFIELDSF_DEFAULT_vs_text_digits,$id);
				$fbuilder_config->obj->messages->max = cp_calculatedfieldsf_get_option('vs_text_max', CP_CALCULATEDFIELDSF_DEFAULT_vs_text_max,$id);
				$fbuilder_config->obj->messages->min = cp_calculatedfieldsf_get_option('vs_text_min', CP_CALCULATEDFIELDSF_DEFAULT_vs_text_min,$id);
				$fbuilder_config->obj->messages->previous = $previous_label;
				$fbuilder_config->obj->messages->next = $next_label;
				$fbuilder_config->obj->messages->pageof = $page_of_label;
				$fbuilder_config->obj->messages->minlength = $minlength_error_text;
				$fbuilder_config->obj->messages->maxlength = $maxlength_error_text;
				$fbuilder_config->obj->messages->equalTo = $equalTo_error_text;
				
				print 'var cp_calculatedfieldsf_fbuilder_config'.$CP_CFF_global_form_count.'='.json_encode( $fbuilder_config );
			?>
			/* ]]> */
		</script>     
		<?php
    }    
}

function cp_calculatedfieldsf_links($links) {
	array_unshift(
		$links, 
		'<a href="http://wordpress.dwbooster.com/contact-us">'.__('Request custom changes').'</a>',
		'<a href="options-general.php?page=cp_calculated_fields_form">'.__('Settings').'</a>',
		'<a href="http://wordpress.dwbooster.com/forms/calculated-fields-form">'.__('Help').'</a>'
	);
	return $links;
}

function set_cp_calculatedfieldsf_insert_button() {
    print '<a href="javascript:cp_calculatedfieldsf_insertForm();" title="'.esc_attr__('Insert Calculated Fields Form', 'calculated-fields-form').'"><img src="'.plugins_url('/images/cp_form.gif', __FILE__).'" alt="'.esc_attr__('Insert Calculated Fields Form', 'calculated-fields-form').'" /></a><a href="javascript:cp_calculatedfieldsf_insertVar();" title="'.esc_attr__('Create a JavaScript var from POST, GET, SESSION, or COOKIE var', 'calculated-fields-form').'"><img src="'.plugins_url('/images/cp_var.gif', __FILE__).'" alt="'.esc_attr__('Create a JavaScript var from POST, GET, SESSION, or COOKIE var', 'calculated-fields-form').'" /></a>';
}


function cp_calculatedfieldsf_html_post_page() {
    if (isset($_GET["cal"]) && $_GET["cal"] != '')
    {
        @include_once dirname( __FILE__ ) . '/cp_calculatedfieldsf_admin_int.php';
    }    
    else
        @include_once dirname( __FILE__ ) . '/cp_calculatedfieldsf_admin_int_list.inc.php';        
}


function set_cp_calculatedfieldsf_insert_adminScripts($hook) {
    if ( isset($_GET["page"]) && $_GET["page"] == "cp_calculated_fields_form" )
    {        
		wp_enqueue_script( "jquery" );
		wp_enqueue_script( "jquery-ui-core" );
		wp_enqueue_script( "jquery-ui-sortable" );
		wp_enqueue_script( "jquery-ui-tabs" );
		wp_enqueue_script( "jquery-ui-droppable" );
		wp_enqueue_script( "jquery-ui-button" );
		wp_enqueue_script( "jquery-ui-datepicker" );
        wp_deregister_script('query-stringify');
        wp_register_script('query-stringify', plugins_url('/js/jQuery.stringify.js', __FILE__));
		wp_enqueue_script( "query-stringify" );

		//ULR to the admin resources
		$admin_resources = admin_url( "options-general.php?page=cp_calculated_fields_form&cp_cff_resources=admin" );
        wp_enqueue_script( 'cp_calculatedfieldsf_buikder_script', $admin_resources, array("jquery","jquery-ui-core","jquery-ui-sortable","jquery-ui-tabs","jquery-ui-droppable","jquery-ui-button","jquery-ui-datepicker","query-stringify") );
		wp_enqueue_script( 'cp_calculatedfieldsf_buikder_script_caret', plugins_url('/js/jquery.caret.js', __FILE__),array("jquery"));
        wp_enqueue_style('jquery-style', CP_SCHEME.'ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
    }    

    if( 'post.php' != $hook  && 'post-new.php' != $hook )
        return;
    wp_enqueue_script( 'cp_calculatedfieldsf_script', plugins_url('/cp_calculatedfieldsf_scripts.js', __FILE__) );
}


function cp_calculatedfieldsf_cleanJSON($str)
{
    // $str = str_replace('&qquot;','"',$str);
    $str = str_replace('	',' ',$str);
    $str = str_replace("\n",'\n',$str);
    $str = str_replace("\r",'',$str);    
    return $str;
}


function cp_calculated_fields_form_check_posted_data() {
    
    global $wpdb;
        
    if ( 'POST' == $_SERVER['REQUEST_METHOD'] && isset( $_POST['cp_calculatedfieldsf_post_options'] ) && is_admin() )
    {
        cp_calculatedfieldsf_save_options();
		if( isset( $_POST[ 'preview' ] ) )
		{
			print '<!DOCTYPE html><html><head><meta charset="UTF-8"></head><body>'; 
			print( cp_calculatedfieldsf_filter_content( array( 'id' => $_POST[ 'cp_calculatedfieldsf_id' ] ) ));
			wp_footer();
			print '</body></html>';
			exit;
		}	
		return;
    }
}            

/**
 * Unserialize the form's structure, and returns the object or false
 */
function cp_calculatedfieldsf_form_structure_obj( $str, $stripcslashes = true )
{
	try{
		$str = cp_calculatedfieldsf_cleanJSON( $str );
		if( $stripcslashes ) $str = stripcslashes( $str );
		$obj = json_decode( $str );
		if( empty( $obj ) )
		{
			$json = new JSON;
			$obj = $json->unserialize( $str );
		}		
	}
	catch( Exception $err ){}
	return ( !empty( $obj ) ) ? $obj : false;
}

function cp_calculatedfieldsf_save_options() 
{
	check_admin_referer( 'session_id_'.CP_SESSION::session_id(), '_cpcff_nonce' );
    global $wpdb;
    if (!defined('CP_CALCULATEDFIELDSF_ID'))
        define ('CP_CALCULATEDFIELDSF_ID',$_POST["cp_calculatedfieldsf_id"]);    

	$error_occur = false;
	if( isset( $_POST[ 'form_structure' ] ) ) 
    {
		// Remove bom characters
		$bom = pack('H*','EFBBBF');
		$_POST[ 'form_structure' ] = preg_replace("/$bom/", '', $_POST[ 'form_structure' ]);
		
		$form_structure_obj = cp_calculatedfieldsf_form_structure_obj( $_POST[ 'form_structure' ] );
		if( !empty( $form_structure_obj ) )
		{	
			global $cpcff_default_texts_array;
			$cpcff_text_array = '';
				
			if( isset( $_POST[ 'cpcff_text_array' ] ) )
			{
				foreach( $_POST[ 'cpcff_text_array' ] as $cpcff_text_index => $cpcff_text_attr )
				{
					if( $cpcff_text_index  == 'errors')
					{
						foreach( $_POST[ 'cpcff_text_array' ][ $cpcff_text_index ] as $cpcff_text_sub_index => $cpcff_text_sub_attr )
						{
							$_POST[ 'cpcff_text_array' ][ $cpcff_text_index ][$cpcff_text_sub_index][ 'text' ] = stripcslashes( $cpcff_text_sub_attr[ 'text' ] );
						}
					}
					else
					{
						$_POST[ 'cpcff_text_array' ][ $cpcff_text_index ][ 'text' ] = stripcslashes( $cpcff_text_attr[ 'text' ] );
					}	
				}
				$cpcff_text_array = $_POST[ 'cpcff_text_array' ];
				unset( $_POST[ 'cpcff_text_array' ] );
			}
				
			foreach ($_POST as $item => $value)    
				$_POST[$item] = stripcslashes($value);

			$data = array(
						  'form_structure' => $_POST['form_structure'],

						  'fp_from_email' => $_POST['fp_from_email'],
						  'fp_destination_emails' => $_POST['fp_destination_emails'],
						  'fp_subject' => $_POST['fp_subject'],
						  'fp_inc_additional_info' => $_POST['fp_inc_additional_info'],
						  'fp_return_page' => $_POST['fp_return_page'],
						  'fp_message' => $_POST['fp_message'],
						  'fp_emailformat' => $_POST['fp_emailformat'],

						  'cu_enable_copy_to_user' => $_POST['cu_enable_copy_to_user'],
						  'cu_user_email_field' => (isset($_POST['cu_user_email_field'])?$_POST['cu_user_email_field']:''),
						  'cu_subject' => $_POST['cu_subject'],
						  'cu_message' => $_POST['cu_message'],
						  'cu_emailformat' => $_POST['cu_emailformat'],
						  
						  'enable_paypal' => @$_POST["enable_paypal"],
						  'paypal_email' => $_POST["paypal_email"],
						  'request_cost' => $_POST["request_cost"],
						  'paypal_product_name' => $_POST["paypal_product_name"],
						  'currency' => $_POST["currency"],
						  'paypal_language' => $_POST["paypal_language"],
						  'paypal_mode' => $_POST["paypal_mode"],
						  'paypal_recurrent' => $_POST["paypal_recurrent"],
						  'paypal_identify_prices' => (isset($_POST['paypal_identify_prices'])?$_POST['paypal_identify_prices']:'0'),
						  'paypal_zero_payment' => $_POST["paypal_zero_payment"],

						  'vs_use_validation' => $_POST['vs_use_validation'],
						  'vs_text_is_required' => $_POST['vs_text_is_required'],
						  'vs_text_is_email' => $_POST['vs_text_is_email'],
						  'vs_text_datemmddyyyy' => $_POST['vs_text_datemmddyyyy'],
						  'vs_text_dateddmmyyyy' => $_POST['vs_text_dateddmmyyyy'],
						  'vs_text_number' => $_POST['vs_text_number'],
						  'vs_text_digits' => $_POST['vs_text_digits'],
						  'vs_text_max' => $_POST['vs_text_max'],
						  'vs_text_min' => $_POST['vs_text_min'],
						  'vs_text_previousbtn' => $_POST['vs_text_previousbtn'],
						  'vs_text_nextbtn' => $_POST['vs_text_nextbtn'],
						  'vs_all_texts' => serialize( $cpcff_text_array ),

						  'cv_enable_captcha' => $_POST['cv_enable_captcha'],
						  'cv_width' => $_POST['cv_width'],
						  'cv_height' => $_POST['cv_height'],
						  'cv_chars' => $_POST['cv_chars'],
						  'cv_font' => $_POST['cv_font'],
						  'cv_min_font_size' => $_POST['cv_min_font_size'],
						  'cv_max_font_size' => $_POST['cv_max_font_size'],
						  'cv_noise' => $_POST['cv_noise'],
						  'cv_noise_length' => $_POST['cv_noise_length'],
						  'cv_background' => $_POST['cv_background'],
						  'cv_border' => $_POST['cv_border'],
						  'cv_text_enter_valid_captcha' => $_POST['cv_text_enter_valid_captcha']
			);
			$_update_result = $wpdb->update ( 
				$wpdb->prefix.CP_CALCULATEDFIELDSF_FORMS_TABLE, 
				$data, 
				array( 'id' => CP_CALCULATEDFIELDSF_ID ),
				array( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s' ),
				array( '%d' )
			);
			if( $_update_result === false )
			{
				global $cff_structure_error;
				$cff_structure_error = __('<div class="error-text">The data cannot be stored in database because has occurred an error with the database structure. Please, go to the plugins section and Deactivate/Activate the plugin to be sure the structure of database has been checked, and corrected if needed. If the issue persist, please <a href="http://wordpress.dwbooster.com/support">contact us</a></div>', 'calculated-fields-form' );
			}
		}
		else
		{
			$error_occur = true;
		}	
	}
	else
    {
		$error_occur = true;
    }
	
	if( $error_occur )
	{
		global $cff_structure_error;
        $cff_structure_error = __('<div class="error-text">The data cannot be stored in database because has occurred an error with the form structure. Please, try to save the data again. If have been copied and pasted data from external text editors, the data can contain invalid characters. If the issue persist, please <a href="http://wordpress.dwbooster.com/support">contact us</a></div>', 'calculated-fields-form' );
	}	
}


// cp_calculatedfieldsf_get_option:
$cp_calculatedfieldsf_option_buffered_item = false;
$cp_calculatedfieldsf_option_buffered_id = -1;

function cp_calculatedfieldsf_get_option ($field, $default_value, $id = '')
{
	$value = '';
    if (!defined("CP_CALCULATEDFIELDSF_ID"))
        define ("CP_CALCULATEDFIELDSF_ID", 1);
    if ($id == '') 
        $id = CP_CALCULATEDFIELDSF_ID;         
    global $wpdb, $cp_calculatedfieldsf_option_buffered_item, $cp_calculatedfieldsf_option_buffered_id;
    if ($cp_calculatedfieldsf_option_buffered_id == $id)
	{	
        if( property_exists( $cp_calculatedfieldsf_option_buffered_item, $field ) ) $value = @$cp_calculatedfieldsf_option_buffered_item->$field;
	}	
    else
    {
		$myrows = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix.CP_CALCULATEDFIELDSF_FORMS_TABLE." WHERE id=%d", $id ) );
		if( !empty( $myrows ) )
		{ 
			if( property_exists( $myrows[0], $field ) )
			{	
				$value = @$myrows[0]->$field;
			}	
			else
			{
				$value = $default_value;
			}	
			$cp_calculatedfieldsf_option_buffered_item = $myrows[0];
			$cp_calculatedfieldsf_option_buffered_id  = $id;
		}
		else
		{
			$value = $default_value;
		}	
    }
	
	if( $field == 'form_structure'  && !is_array( $value ) )
	{
		$form_data = cp_calculatedfieldsf_form_structure_obj( $value, false );
		$value = $cp_calculatedfieldsf_option_buffered_item->form_structure = ( !is_null( $form_data ) ) ? $form_data : '';
	}
    
    if ( ( $field == 'vs_all_texts' && empty( $value ) ) || ( $value == '' && $cp_calculatedfieldsf_option_buffered_item->form_structure == '' ) )
        $value = $default_value;
        
	/** 
	 * Filters applied before returning a form option, 
	 * use three parameters: The value of option, the name of option and the form's id 
	 * returns the new option's value
	 */
    $value = apply_filters( 'cpcff_get_option', $value, $field, $id );    

    return $value;
}

//----------------------------------

if( !class_exists( 'JSON' ) )
{	
	/*
	***************************************************************************
	*   Copyright (C) 2007 by Cesar D. Rodas                                  *
	*   crodas@phpy.org                                                       *
	*                                                                         *
	*   Permission is hereby granted, free of charge, to any person obtaining *
	*   a copy of this software and associated documentation files (the       *
	*   "Software"), to deal in the Software without restriction, including   *
	*   without limitation the rights to use, copy, modify, merge, publish,   *
	*   distribute, sublicense, and/or sell copies of the Software, and to    *
	*   permit persons to whom the Software is furnished to do so, subject to *
	*   the following conditions:                                             *
	*                                                                         *
	*   The above copyright notice and this permission notice shall be        *
	*   included in all copies or substantial portions of the Software.       *
	*                                                                         *
	*   THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,       *
	*   EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF    *
	*   MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.*
	*   IN NO EVENT SHALL THE AUTHORS BE LIABLE FOR ANY CLAIM, DAMAGES OR     *
	*   OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, *
	*   ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR *
	*   OTHER DEALINGS IN THE SOFTWARE.                                       *
	***************************************************************************
	*/

	/**
	 *    Serialize and Unserialize PHP Objects and array
	 *    into JSON notation. 
	 *
	 *    @category   Javascript
	 *    @package    JSON
	 *    @author     Cesar D. Rodas <crodas@phpy.org>
	 *    @copyright  2007 Cesar D. Rodas
	 *    @license    http://www.opensource.org/licenses/bsd-license.php  BSD License
	 *    @version    1.0
	 *    @link       http://cesars.users.phpclasses.org/json 
	 */

	define('CP_CF_IN_NOWHERE',0);
	define('CP_CF_IN_STRING',1);
	define('CP_CF_IN_OBJECT',2);
	define('CP_CF_IN_ATOMIC',3);
	define('CP_CF_IN_ASSIGN',4);
	define('CP_CF_IN_ENDSTMT',5);
	define('CP_CF_IN_ARRAY',6);

	/**
	 *  JSON
	 *
	 *    This class serilize an PHP OBJECT or an ARRAY into JSON
	 *    notation. Also convert a JSON text into a PHP OBJECT or
	 *    array.
	 *
	 *    @category   Javascript
	 *    @package    JSON
	 *    @author     Cesar D. Rodas <crodas@phpy.org>
	 *    @copyright  2007 Cesar D. Rodas
	 *    @license    http://www.opensource.org/licenses/bsd-license.php  BSD License
	 *    @version    1.0
	 *    @link       http://cesars.users.phpclasses.org/json 
	 */
	class JSON
	{
		 /**
		 *    Was parsed with an error?
		 *    
		 *    var bool
		 *    @access private
		 */
		var $error;
		
		function __construct() {
			$this->error = false;
		}
		
		/**
		 *    Serialize
		 *
		 *    Serialize a PHP OBJECT or an ARRAY into 
		 *    JSON notation.
		 *
		 *    param mixed $obj Object or array to serialize
		 *    return string JSON.
		 */
		function serialize($obj) {
			if ( is_object($obj) ) {
				$e = get_object_vars($obj);
				/* bug reported by Ben Rowe */
				/* Adding default empty array if the */
				/* object doesn't have any property */
				$properties = array();
				foreach ($e as $k => $v) {
					$properties[] = $this->_serialize( $k,$v );
				}
				return "{".implode(",",$properties)."}";
			} else if ( is_array($obj) ) {
				return $this->_serialize('',$obj);
			}
		}
		
		/**
		 *    UnSerialize
		 *
		 *    Transform an JSON text into a PHP object
		 *    and return it.
		 *    @access public 
		 *    @param string $text JSON text
		 *    @return mixed PHP Object, array or false.
		 */
		function unserialize( $text ) {
			$this->error = false;
			
			return !$this->error ? $this->_unserialize($text) : false;
		}
		
		/**
		 *    UnSerialize
		 *
		 *    Transform an JSON text into a PHP object
		 *    and return it.
		 *    @access private 
		 *    @param string $text JSON text
		 *    @return mixed PHP Object, array or false.
		 */
		function _unserialize($text) {
			$ret = new stdClass;
			 
			while (  $f = $this->getNextToken($text,$i,$type)  ) {
				switch ( $type ) {
					case CP_CF_IN_ARRAY:
						$tmp = $this->_unserializeArray($text);
						$ret = $tmp[0];
						break;
					case CP_CF_IN_OBJECT:
						$g=0;
						do  {
							$varName = $this->getNextToken($f,$g,$xType);
							if ( $xType != CP_CF_IN_STRING )  {
								return false; /* error parsing */
							}
							$this->getNextToken($f,$g,$xType);
							if ( $xType != CP_CF_IN_ASSIGN) return false;
							$value = $this->getNextToken($f,$g,$xType);
							
							if ( $xType == CP_CF_IN_OBJECT) {
								$ret->$varName = $this->unserialize( "{".$value."}" );
								$g--;
							} else if ($xType == CP_CF_IN_ARRAY) {
								$ret->$varName = $this->_unserializeArray( $value);
								$g--;
							} else
								$ret->$varName = $value;
							
							$this->getNextToken($f,$g,$xType);
						} while ( $xType == CP_CF_IN_ENDSTMT);
						break;
					default:
						$this->error = true;
						break 2;
				}
			}
			return $ret;
		}
		
		/**
		 *    JSON Array Parser
		 *
		 *    This method transform an json-array into a PHP 
		 *    array
		 *    @access private
		 *    @param string $text String to parse
		 *    @return Array PHP Array
		 */
		function _unserializeArray($text) {
			$r = array();
			do {
				$f = $this->getNextToken($text,$i,$type);
				switch ( $type ) {
					case CP_CF_IN_STRING:
					case CP_CF_IN_ATOMIC:
						$r[] = $f;
						break;
					case CP_CF_IN_OBJECT:
						$r[] = $this->unserialize("{".$f."}");
						$i--;
						break;
					case CP_CF_IN_ARRAY: 
						$r[] = $this->_unserializeArray($f);
						$i--;
						break;
						
				}
				$this->getNextToken($text,$i,$type);
			} while ( $type == CP_CF_IN_ENDSTMT);
			
			return $r;
		}
		
		/**
		 *  Tokenizer
		 *
		 *  Return to the Parser the next valid token and the type     
		 *  of the token. If the tokenizer fails it returns false.
		 *    
		 *    @access private
		 *  @param string $e Text to extract token
		 *  @param integer $i  Start position to search next token
		 *  @param integer $state Variable to get the token type
		 *  @return string|bool Token in string or false on error.
		 */
		function getNextToken($e, &$i, &$state) {
			$state = CP_CF_IN_NOWHERE;
			$end = -1;
			$start = -1;
			$i = ( !empty( $i ) ) ? $i : 0;
			while ( $i < strlen($e) && $end == -1 ) {
				switch( $e[$i] ) {
					/* objects */
					case "{":
					case "[":
						$_tag = $e[$i]; 
						$_endtag = $_tag == "{" ? "}" : "]";
						if ( $state == CP_CF_IN_NOWHERE ) {
							$start = $i+1;
							switch ($state) {
								case CP_CF_IN_NOWHERE:
									$aux = 1; /* for loop objects */
									$state = $_tag == "{" ? CP_CF_IN_OBJECT : CP_CF_IN_ARRAY;
									break;
								default:
									break 2; /* exit from switch and while */
							}
							while ( ++$i && $i < strlen($e) && $aux != 0 ) {
								switch( $e[$i] ) {
									case $_tag:
										$aux++;
										break;
									case $_endtag:
										$aux--;
										break;
								}
							}
							$end = $i-1;
						}
						break;
					
					case '"':
					case "'":
						$state = CP_CF_IN_STRING;
						$buf = "";
						while ( ++$i && $i < strlen($e) && $e[$i] != '"' ) {
							if ( $e[$i] == "\\") 
								$i++;
							$buf .= $e[$i];
						}
						$i++;
						return eval('return "'.str_replace('"','\"',$buf).'";');
						break;
					case ":":
						$state = CP_CF_IN_ASSIGN;
						$end = 1;
						break;
					case "n":
						if ( substr($e,$i,4) == "null" ) {
							$i=$i+4;
							$state = CP_CF_IN_ATOMIC;
							return NULL;
						}
						else break 2; /* exit from switch and while */
					case "t":
						if ( substr($e,$i,4) == "true") {
							$state = CP_CF_IN_ATOMIC;
							$i=$i+4;
							return true;
						}else break 2; /* exit from switch and while */
						break;
					case "f":
						if ( substr($e,$i,4) == "false") {
							$state = CP_CF_IN_ATOMIC;
							$i=$i+4;
							return false;
						}
						else break 2; /* exit from switch and while */
						break;    
					case ",":
						$state = CP_CF_IN_ENDSTMT;
						$end = 1;
						break;
					case " ":
					case "\t":
					case "\r":
					case "\n":
						break;
					case "+":
					case "-":
					case 0:
					case 1:
					case 2:
					case 3:
					case 4:
					case 5:
					case 6:
					case 7:
					case 8:
					case 9:
					case '.':
						$state = CP_CF_IN_ATOMIC;
						$start = (int)$i;
						if ( $e[$i] == "-" || $e[$i] == "+")
							$i++;
						for ( ;  $i < strlen($e) && (is_numeric($e[$i]) || $e[$i] == "." || strtolower($e[$i]) == "e") ;$i++){
							$n = $i+1 < strlen($e) ? $e[$i+1] : "";
							$a = strtolower($e[$i]);
							if ( $a == "e" && ($n == "+" || $n == "-"))
								$i++;
							else if ( $a == "e") 
								$this->error=true;
						}
						
						$end = $i;
						break 2; /* break while too */
					default: 
						$this->error = true;
						
				}
				$i++;
			}
			
			return $start == -1 || $end == -1 ? false : substr($e, $start, $end - $start);
		}
		
		/** 
		 *    Internal Serializer
		 *
		 *    @param string $key Variable name
		 *    @param mixed $value Value of the variable
		 *    @access private
		 *    @return string Serialized variable
		 */
		function _serialize (  $key = '', &$value ) {
			$r = '';
			if ( $key != '')$r .= "\"${key}\" : ";
			if ( is_numeric($value) ) {
				$r .= ''.$value.'';
			} else if ( is_string($value) ) {
				$r .= '"'.$this->toString($value).'"';
			} else if ( is_object($value) ) {
				$r .= $this->serialize($value);
			} else if ( is_null($value) ) {
				$r .= "null";
			} else if ( is_bool($value) ) {
				$r .= $value ? "true":"false";
			} else if ( is_array($value) ) {
				foreach($value as $k => $v)
					$f[] = $this->_serialize('',$v);
				$r .= "[".implode(",",$f)."]";
				unset($f);
			}
			return $r;
		}
		
		/** 
		 *    Convert String variables
		 *
		 *    @param string $e Variable with an string value
		 *    @access private
		 *    @return string Serialized variable
		 */
		function toString($e) {
			$rep = array("\\","\r","\n","\t","'",'"');
			$val = array("\\\\",'\r','\n','\t','\'','\"');
			$e = str_replace($rep, $val, $e);
			return $e;
		}
	}
}
?>
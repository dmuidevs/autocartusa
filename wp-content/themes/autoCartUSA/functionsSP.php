<?php

add_filter('wp_link_pages_args', 'wp_link_pages_args_prevnext_add');
/**
 * Add prev and next links to a numbered link list
 */
function wp_link_pages_args_prevnext_add($args)
{
    global $page, $numpages, $more, $pagenow;

    if (!$args['next_or_number'] == 'next_and_number')
        return $args; # exit early

    $args['next_or_number'] = 'number'; # keep numbering for the main part
    if (!$more)
        return $args; # exit early

    if($page-1) # there is a previous page
        $args['before'] .= _wp_link_page($page-1)
        . $args['link_before']. $args['previouspagelink'] . $args['link_after'] . '</a>'
    ;

    if ($page<$numpages) # there is a next page
        $args['after'] = _wp_link_page($page+1)
        . $args['link_before'] . $args['nextpagelink'] . $args['link_after'] . '</a>'
        . $args['after']
    ;

    return $args;
}

add_action('after_setup_theme', 'blankslate_setup');
function blankslate_setup()
{
load_theme_textdomain('blankslate', get_template_directory() . '/languages');
add_theme_support('automatic-feed-links');
add_theme_support('post-thumbnails');
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'blankslate' ) )
);
}

function adspot_top_routine($args) {
	// $args = array('key1' => 'value1', 'key2' => 'value2')
	$return = '<div id="adBetwnCont"></div>';

	return $return;
}
add_shortcode('adspot_top', 'adspot_top_routine');

function adspot_right_routine($args) {
	// $args = array('key1' => 'value1', 'key2' => 'value2')
	$return = '<div id="rightAds"></div>';

	return $return;
}
add_shortcode('adspot_right', 'adspot_right_routine');

add_action('wp_enqueue_scripts', 'blankslate_load_scripts');
function blankslate_load_scripts()
{
wp_enqueue_script('jquery');
}
add_action('comment_form_before', 'blankslate_enqueue_comment_reply_script');
function blankslate_enqueue_comment_reply_script()
{
if (get_option('thread_comments')) { wp_enqueue_script('comment-reply'); }
}
add_filter('the_title', 'blankslate_title');
function blankslate_title($title) {
if ($title == '') {
return '&rarr;';
} else {
return $title;
}
}


add_filter('wp_title', 'blankslate_filter_wp_title');
function blankslate_filter_wp_title($title)
{
return $title . esc_attr(get_bloginfo('name'));
}
add_action('widgets_init', 'blankslate_widgets_init');
function blankslate_widgets_init()
{
register_sidebar( array (
'name' => __('Sidebar', 'blankslate'),
'id' => 'primary-sidebar',
'before_widget' => '<div class="widgetbox">',
'after_widget' => "</div>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar(array('name'=>'Tweets',
'before_widget' => '<div class="widget_box">',
'after_widget' => '</div>',
'before_title' => '<h3 style="display:none;">',
'after_title' => '</h3>',
));
register_sidebar(array('name'=>'About Us',
'before_widget' => '<div class="widget_box">',
'after_widget' => '</div>',
'before_title' => '<h3 style="display:none;">',
'after_title' => '</h3>',
));

}
function blankslate_custom_pings($comment)
{
$GLOBALS['comment'] = $comment;
?>

<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php 
}
add_filter('get_comments_number', 'blankslate_comments_number');
function blankslate_comments_number($count)
{
if (!is_admin()) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count($comments_by_type['comment']);
} else {
return $count;
}
}


function the_excerpt_max_charlength($charlength) {
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		//echo '[...]';
	} else {
		echo $excerpt;
	}
}
?>
<?php add_filter('single_template', create_function('$t', 'foreach( (array) get_the_category() as $cat ) { if ( file_exists(TEMPLATEPATH . "/single-{$cat->term_id}.php") ) return TEMPLATEPATH . "/single-{$cat->term_id}.php"; } return $t;' )); 
if ( ! function_exists( 'twentyten_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentyten_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'twentyten' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
            <div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'twentyten' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?></em>
			<br />
            
		<?php endif; ?>

		

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'twentyten' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;
function new_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');




function get_breadcrumbs()
{
    global $wp_query;

    if ( !is_home() ){

        // Start the UL
        echo '<ul class="breadcrumbs">';
        // Add the Home link
        echo '<li><a href="'. get_settings('home') .'">Home</a></li>';

        if ( is_category() )
        {
            $catTitle = single_cat_title( "", false );
            $cat = get_cat_ID( $catTitle );
            echo "<li class='catlist1'>  ". get_category_parents( $cat, TRUE, "  " ) ."</li>";
        }
        elseif ( is_archive() && !is_category() )
        {
            echo "<li class='lastitem1'>  Archives</li>";
        }
        elseif ( is_search() ) {

            echo "<li class='lastitem1'>  Search Results</li>";
        }
        elseif ( is_404() )
        {
            echo "<li class='lastitem1'>  404 Not Found</li>";
        }
        elseif ( is_single() )
        {
            $category = get_the_category();
            $category_id = get_cat_ID( $category[0]->cat_name );

            echo '<li class="lastitem1">  '. get_category_parents( $category_id, TRUE, "  " );
            echo '<span>'.the_title('','', FALSE) ."</span></li>";
        }
        elseif ( is_page() )
        {
            $post = $wp_query->get_queried_object();

            if ( $post->post_parent == 0 ){

                echo "<li class='lastitem1'>  ".the_title('','', FALSE)."</li>";

            } else {
                $title = the_title('','', FALSE);
                $ancestors = array_reverse( get_post_ancestors( $post->ID ) );
                array_push($ancestors, $post->ID);

                foreach ( $ancestors as $ancestor ){
                    if( $ancestor != end($ancestors) ){
                        echo '<li>  <a href="'. get_permalink($ancestor) .'">'. strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) .'</a></li>';
                    } else {
                        echo '<li class="lastitem1">  '. strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) .'</li>';
                    }
                }
            }
        }

        // End the UL
        echo "</ul>";
    }
}
add_filter( 'request', 'my_request_filter' );
function my_request_filter( $query_vars ) {
    if( isset( $_GET['s'] ) && empty( $_GET['s'] ) ) {
        $query_vars['s'] = " ";
    }
    return $query_vars;
}
if (function_exists('st_makeEntries')){
add_shortcode('sharethis', 'st_makeEntries');
}
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
?>
<?php
// create custom plugin settings menu
add_action('admin_menu', 'theme_create_menu');

function theme_create_menu() {

	//create new top-level menu
	add_menu_page('Email List', 'Email List', 'administrator', __FILE__, 'theme_settings_page', get_bloginfo('template_directory') . '/images/list-icon.png');
wp_enqueue_script('jquery');
	//call register settings function
	//add_action( 'admin_init', 'register_mysettings' );
	//add_action( 'admin_init', 'register_mysettings' );
}
function pw_loading_scripts_wrong() {
	echo '<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>';
}
add_action('admin_head', 'pw_loading_scripts_wrong');

	function getAdData($arbData) {
		$request = $_REQUEST;
		$customer_id = '8CU2O810Y';//getCustomerId($urlType);
		$request_url= get_permalink(0,false);
		$keyword = '';
		if(isset($arbData['kw'])){
			$keyword = $arbData['kw'];
		}else if(isset($request['q'])){
			$keyword = $request['q'];
		} else{
			$request_url=trim($request_url,"/");
			$temp = explode("/", $request_url);
			$keyword = $temp[(count($temp))-1];
		}
		$logHash="";
		if(isset($arbData['log_hash'])){
			$logHash = '&logHash='.urlencode("td=" . $arbData['log_hash']);
		}else if(isset($_COOKIE['LOG_HASH'])){
			$logHash = '&logHash='.urlencode('td='.$_COOKIE['LOG_HASH']);
		}
		$chnm = '';
		if(isset($request['chnm'])){
			$chnm = $request['chnm'];
		}
	
		$affilData = getAffilData(get_client_ip());
		$servurl = urlencode(getServUrl());
		
		$url = 'http://json.media.net/jsonAds?keywords={keyword}&sitelinks=1&chnm={ttt}&maxAdCount={no_of_ad}&maxWebCount=0&cid={customer_id}&ver=2.0&adPageIndex={page_index}&serveUrl={request_url}&affilData={affilData}'.$logHash;
		$url = str_replace('{keyword}', urlencode($keyword), $url);
		$url = str_replace('{ttt}', urlencode($chnm), $url);
		$url = str_replace('{no_of_ad}', 3, $url);
		$url = str_replace('{customer_id}', $customer_id, $url);
		$url = str_replace('{page_index}', 1, $url);
		$url = str_replace('{request_url}', $servurl, $url);
		$adurl = str_replace('{affilData}', $affilData, $url);
		$AdResult1 = getAdDataFromAPI($adurl);
//		print_r($AdResult1);
		if (isset($_REQUEST['test']) && $_REQUEST['test'] == 1)
			echo $adurl;
		$body=show_ads($AdResult1,$keyword);
		return $body;
	}
	
	function getArbData($request){
        
		$utm_campaign = '';
		if (!$request['utm_campaign']) {
			$utm_campaign = '&utm_campaign=' . $_COOKIE['utm_campaign'];
		}
		$actual_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . $utm_campaign;
		$url = 'http://50.58.197.232/arbapi/response?url=' . urlencode($actual_url) . "&ip=" . urlencode(get_client_ip()) . "&ua=" . urlencode($_SERVER['HTTP_USER_AGENT']) . '&ref=&format=json';


		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		$response = curl_exec($ch);
		if (isset($_REQUEST['test']) && $_REQUEST['test'] == 1)
			echo $url;
		if(curl_errno($ch)==28)
			$response = json_encode(array("connection_timeout"=>1));
		curl_close($ch);
		$res = json_decode($response, true);
		unset($_COOKIE['LOG_HASH']);
		setcookie('LOG_HASH', $res['log_hash'], time() + 300, '/');
		return $res;
	}

	function getAffilData($ip) {
		$userAgent = $_SERVER['HTTP_USER_AGENT'];
		$ip = ($ip == '127.0.0.1') ? '115.114.59.182' : $ip;
		return urlencode("ip=" . $ip . "&ua=" . urlencode($userAgent));
	}

	function getServUrl() {
		return 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	}

	function getAdDataFromAPI($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		$response = curl_exec($ch);
		curl_close($ch);
		$res = json_decode($response, true);
//		echo "<pre>".print_r($res)."</pre>";
		return $res;
	}
	
	function get_client_ip() {
		$ipaddress = '';
		if (getenv('HTTP_X_CLIENT_IP'))
			$ipaddress = getenv('HTTP_X_CLIENT_IP');
		else if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if (getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if (getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if (getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if (getenv('HTTP_FORWARDED'))
			$ipaddress = getenv('HTTP_FORWARDED');
		else if (getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}
	
	function show_ads($data,$keyword){
		if (count($data) <= 0 || $data['StatusCode'] != 1)
			return;
		$adData = array();
		$data = $data['Results']['AdResultSet']['Listing'];
		$htmlString = '<div class="inwrapper"><div id="ed" class="main clearfix"><ul class="listitems">';
		$num = 1;
		$i = 1;
//		echo "<pre>";
//		print_r($data);
//		echo "</pre>";
		$htmlString='<div id="wrapper"><div class="wrapper1"> <div class="main clearfix" id="ed">
            <ul class="eds results">';
		foreach ($data as $key => $value) {
			$htmlString .= '<li><div class="skitto_wrap">'.$i.'</div><a class="track_click" href="'.$value['clickUrl'].'" target="_blank"><p class="title">'.strip_tags($value['title']). ' - ' . strip_tags($value['description']) .'</p><div class="du"> <p class="desc">'.$value['description'].'</p><p class="url">Sponsored: '.$value['siteHost'].'</p></div></a>';
			if (isset($value['siteLinks']) && !empty($value['siteLinks'])) {
				$htmlString .= "<div class='clearfix slinks-list'><ul class='siteLinks'>";
				foreach ($value['siteLinks'] as $siteLinks) {
					if (isset($siteLinks[1]['title'])) {
						$htmlString .= "<li><a href='" . $siteLinks[1]['rurl'] . "' target='_blank' class='track_click'><b>" . $siteLinks[1]['title'] . "</b></a></li>";
					}
					if (isset($siteLinks[2]['title'])) {
						$htmlString .= "<li><a href='" . $siteLinks[2]['rurl'] . "' target='_blank' class='track_click'><b>" . $siteLinks[2]['title'] . "</b></a></li>";
					}
				}
				$htmlString .="</ul></div>";
			}
			$htmlString .="</li>";
			$i++;
		}
		$htmlString .= '</ul></div></div>';
		$htmlString .= '</div>';
		return $htmlString;
	}
	
	



function theme_settings_page() {
?>
<style type="text/css">
#subscriber_list{clear:Both;width:100%;}
#subscriber_list table{border-collapse:collapse;border:1px solid #ccc;}
#subscriber_list td,#subscriber_list th{border-collapse:collapse;border:1px solid #ccc;padding:6px 10px;}
#subscriber_list th{background:#eee;}
.download_link{float:right;clear:both;margin-top:15px;border-radius:2px;-moz-border-radius:2px;-webkit-border-radius:2px;line-height:32px;padding:0 15px 0 30px;border:1px solid #ccc;background:#eee url(<?php echo get_bloginfo('template_directory') . '/images/report_icon.gif'; ?>) no-repeat 8px center;height:30px;cursor:pointer;text-decoration:none;}
td a{outline:none;}
.delmsg{padding:10px 12px; color: #4F8A10;background-color: #DFF2BF;font-size:12px;border:1px solid #89b15f;margin-bottom: 15px;display:none;position:relative;}
.delmsg_delicon {position: absolute;right: 12px;top: 13px;width: 10px;opacity: 0.4;cursor:pointer;}
.delmsg_delicon:hover{opacity: 0.8;}
</style>
<script type="text/javascript">
	$(window).load(function(){
		$('.delete_email_btn').click(function(e){
			var current_element = $(this);
			var del_record_id = parseInt($(this).data('del'));
			$.ajax({
				url: "<?php echo get_bloginfo('template_directory') . '/includes/delete.php'; ?>",
				type: "post",
				data: "del_record_id="+del_record_id,
				success: function(){
					current_element.parents('tr').fadeOut(150,function(){
						current_element.parents('tr').remove();
					})
					$('.delmsg').fadeIn(150);					
				},
				error:function(){
					console.log("Delete failed.");
				}
			});
			e.preventDefault();
		});
		$('.delmsg_delicon').click(function(){
			$('.delmsg').fadeOut(150);
		});
	});
</script>
<div class="wrap">
	<h2>Email List</h2>
	<div class="delmsg"><span>Record deleted successfully.</span> <img src="<?php echo get_bloginfo('template_directory') . '/images/cross.png'; ?>" alt="" class="delmsg_delicon" /></div>
	<div id="subscriber_list">
		<table width="100%">
			<tr>
				<th>Sr. No.</th>
				<th>Email</th>
				<th>IP</th>
				<th>User agent</th>
				<th>Subscription date</th>
				<th>Third party Opt-in</th>
				<th>Delete</th>
			</tr>
			<?php

				$cnt = 0;
				$result = mysql_query("SELECT * FROM wp_email_subscribers order by id DESC");
				while($row = mysql_fetch_array($result)){
					$cnt++;				
			?>
			<tr>
				<td><?php echo $cnt; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['ip']; ?></td>
				<td><?php echo $row['useragent']; ?></td>
				<td><?php echo $row['subscription_date']; ?></td>
				<td><?php echo $row['allow_thirdparty']; ?></td>
				<td align="center"><a href="#" title="Delete" data-del="<?php echo $row['id']; ?>" class="delete_email_btn"><img src="<?php echo get_bloginfo('template_directory') . '/images/delete.gif'; ?>" alt="Delete" /></a></td>
			</tr>
			<?php } ?>
		</table>
	</div>
	<a href="http://speakinghealth.com/maillist/" class="download_link" target="_blank">Download Email List</a>
</div>
<?php } 



?>
<div id="adminrrail"><?php echo _e('Bankrate Stories'); ?></div>
<div  id="adminrrail-in">
	<ul id="rrailul">
	<?php
	$rss = fetch_feed('http://www.bankrate.com/syndication/Bankrate_TodaysStories.xml');
	if(!is_wp_error($rss)) : // error check
	$maxitems = $rss->get_item_quantity(5); // number of items
	$rss_items = $rss->get_items(0, $maxitems);
	endif;
	if($maxitems == 0) echo '<dt>Feeds not available.</dt>'; // if empty
	else foreach ($rss_items as $item) : ?>
			<li style="list-style:square " >
				<span style="color:#004276;">
					<a style="text-decoration:none;" 
					href="<?php echo $item->get_permalink(); ?>" 
					title="<?php echo $item->get_date('j F Y @ g:i a'); ?>" 
					target="_blank"> <?php echo $item->get_title(); ?>
					</a>
				</span>
			</li>
	<?php endforeach; ?>
	</ul>
</div>

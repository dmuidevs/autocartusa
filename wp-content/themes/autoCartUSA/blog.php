<?php
/**
 * Template Name: blog
  */

get_header(); ?>

<div class="financing blogPagePad">
<div class="blogPageWrap">
    <div class="blogPage clearfix">
        <div class="leftBar">
            <div class="leftIn">
                <?php query_posts('post_type=post&post_status=publish&posts_per_page=10&paged='. get_query_var('paged')); ?>

                <?php if( have_posts() ): ?>

                <?php  while(have_posts()) : the_post(); ?>
                <div class="blogsWrap">

                    <div class="blogTitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></div>
                    <div class="blogSocial">
                        <?php //echo do_shortcode("[wp_social_sharing social_options='facebook,twitter,googleplus,linkedin,pinterest,xing' twitter_username='arjun077' facebook_text='Share on Facebook' twitter_text='Share on Twitter' googleplus_text='Share on Google+' linkedin_text='Share on Linkedin' pinterest_text='Share on Pinterest' xing_text='Share on Xing' icon_order='f,t,g,l,p,x' show_icons='0' before_button_text='' text_position='' social_image='']"); ?>
                    </div>
                    <?php $tags = wp_get_post_tags($post->ID); //this is the adjustment, all the rest is bhlarsen
                        $html = '<div class="post_tags"><ul>';
                        foreach ( $tags as $tag ) {
                        $tag_link = get_tag_link( $tag->term_id );
                         
                        $html .= "<li><a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
                        $html .= "{$tag->name}</a></li> ";
                        }
                        $html .= '</ul></div>';
                        echo $html; 
                    ?>
                    <div class="blogImg">
                         <?php if ( has_post_thumbnail() ) { ?>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('blogImg'); ?></a>
                                <?php } 
                                else { ?>
                            <img src="<?php bloginfo('template_directory'); ?>/images/pic1.jpg" alt="Headline" />
                         <?php } ?>
                    </div>
                    <div class="blogDesc"><?php echo get_excerpt2(300); ?></div>
                </div>
                <?php endwhile; ?>

             
                <div class="clearfix">
                    <?php the_posts_pagination( array(
                      'mid_size'  => 2,
                      'prev_text' => __( '<<', 'autoCartUSA' ),
                      'next_text' => __( '>>', 'autoCartUSA' ),
                    ) ); ?>
        

                    <div class="noPaged">
                        <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
                        <p>Page <?php echo $paged; ?> of <?php echo $wp_query->max_num_pages; ?></p>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="rightbar">
            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('blog Sidebar')) : else : ?>
            <?php endif; ?>

        </div>

        <?php else: ?>

            <div id="post-404" class="noposts">

                <p><?php _e('None found.','autoCartUSA'); ?></p>

            </div><!-- /#post-404 -->

        <?php endif; wp_reset_query(); ?>
    </div>
    </div>

</div>


<?php get_footer(); ?>
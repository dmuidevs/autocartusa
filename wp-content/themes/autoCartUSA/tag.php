<?php
/**
 * The template for displaying tag pages
 *
 */

get_header(); ?>

<div class="financing blogPagePad">
<div class="blogPageWrap">
    <div class="blogPage clearfix">
        <div class="leftBar">
            <div class="leftIn">

                <?php if( have_posts() ): ?>
                <header class="archive-header">
                	<h1 class="archive-title"><?php printf( __( 'Tag Archives: %s', 'autoCartUSA' ), single_tag_title( '', false ) ); ?></h1>

                	<?php
                		// Show an optional term description.
                		$term_description = term_description();
                		if ( ! empty( $term_description ) ) :
                			printf( '<div class="taxonomy-description">%s</div>', $term_description );
                		endif;
                	?>
                </header><!-- .archive-header -->

                <?php  while(have_posts()) : the_post(); ?>
                <div class="blogsWrap">

                    <div class="blogTitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></div>
                    <div class="blogSocial">
                        <?php //echo do_shortcode("[wp_social_sharing social_options='facebook,twitter,googleplus,linkedin,pinterest,xing' twitter_username='arjun077' facebook_text='Share on Facebook' twitter_text='Share on Twitter' googleplus_text='Share on Google+' linkedin_text='Share on Linkedin' pinterest_text='Share on Pinterest' xing_text='Share on Xing' icon_order='f,t,g,l,p,x' show_icons='0' before_button_text='' text_position='' social_image='']"); ?>
                    </div>
                    <div class="blogImg">
                         <?php if ( has_post_thumbnail() ) { ?>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('blogImg'); ?></a>
                                <?php } 
                                else { ?>
                            <img src="<?php bloginfo('template_directory'); ?>/images/pic1.jpg" alt="Headline" />
                         <?php } ?>
                    </div>
                    <div class="blogDesc"><?php the_content(); ?></div>
                </div>
                <?php endwhile; ?>

              
            </div>
            
        </div>

        <div class="rightbar">
            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('blog Sidebar')) : else : ?>
                                <?php endif; ?>
        </div>

        <?php endif; ?>
    </div>
    </div>

</div>


<?php
get_footer();?>

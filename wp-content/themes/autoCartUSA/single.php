<?php
/**
 * Template Name: single
  */

get_header(); ?>

<div class="financing blogPagePad">
<div class="blogPageWrap">
    <div class="blogPage clearfix">
        <div class="leftBar">
            <div class="leftIn">

                <?php if( have_posts() ): ?>

                <?php  while(have_posts()) : the_post(); ?>
                <div class="blogsWrap">

                    <div class="blogTitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></div>
                    <div class="blogSocial">

                        <?php //echo do_shortcode("[wp_social_sharing social_options='facebook,twitter,googleplus,linkedin,pinterest' twitter_username='arjun077' facebook_text='Share on Facebook' twitter_text='Share on Twitter' googleplus_text='Share on Google+' linkedin_text='Share on Linkedin' pinterest_text='Share on Pinterest' icon_order='f,t,g,l,p' show_icons='1' before_button_text='' text_position='' social_image='']"); ?>
                        <?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { ADDTOANY_SHARE_SAVE_KIT(); } ?>
                        
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
                    <div class="blogDesc"><?php the_content(); ?></div>

                    <?php
                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) {
                            comments_template();
                        }
                    ?>
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


<?php get_footer(); ?>
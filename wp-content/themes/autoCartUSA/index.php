<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div class="clearfix" id="main">
    <div class="contentFull" id="content">
        <h1 id="topHeading">Use The Best, <br class="brHead" /><span class="italic">To Find What's Best</span></h1>
        <h3 id="subHeading">Fuel your car buying experience</h3>
       

        <!--Form Details to display year/make/model in dropdown -->
        <div class="locateSearch">
       <div class="selectFormWrapper">
            <form method="POST" action="one123.php">

            <span class="select-wrapper2">
            <select id="ajMakes" name="makes" class="custom-select2">
            <option>Select Make</option>
            </select>
            <span class='holder2'></span>
            </span>

            <span class="select-wrapper3 disabled">
            <select id="ajModels" name="models" class="custom-select3" disabled="disabled">
            <option>Select Model</option>
            </select>
            <span class='holder3'></span>
            </span>

            <span class="select-wrapper disabled">
            <select id="ajYears" name="ajYears" class="custom-select" disabled="disabled">
            <option>Select Year</option>
            </select>
            <span class='holder'></span>
            </span>


            <input type="submit" value="Search" id="selectSearch">
            </form>
        </div>
        </div>
        </div><!--End topWrapper-->

       
    </div>
    </div>

    <div class="secondBlockWrap">
    <div class="secondBlock">
        <div class="neAdsWrap clearfix">
            <div class="newAds flt">
                <h2>New Inventoryasdasda</h2>
                <p>We know the thrill of buying a new car. Find your perfect <br class="brNone" /> match from the endless options available here.</p>
            </div>
            <!--<div class="newAds flt margL">
                <h2>Pre-Owned Inventory</h2>
                <p>We have  a huge selection of used cars that you can pick from. <br class="brNone" /> Also tools and tips to help you make the right choice.</p>
            </div>-->
        </div>
        <div class="head">LOCATE A CAR DEALER</div>
        <div class="text">We know that buying a car is a big decision and a good car dealership can go <br class="brNone3" /> a long way. Find the dealers that will suit you and your choice of car.</div>
        <div class="selectFormWrapper2">
            <form method="POST" action="one123.php">
                <span class="select-wrapper4">
                    <select id="ajMakes2" name="makes" class="custom-select4">
                    <option>Select Make</option>
                    </select>
                    <span class='holder4'></span>
                </span>
                <input type="text" name="" class="zipCode" placeholder="Zip Code">
                <input type="submit" value="Search" id="selectSearch">
            </form>
        </div>
    </div>
    </div>

    <div class="thirdBlockWrap">
    <div class="thirdBlock">
        <div class="head">CAR FINANCING</div>
        <div class="text">Any car finance related doubts? Solve them here</div>
        <ul class="clearfix">
            <li>
                <img src="<?php bloginfo('template_directory'); ?>/images/ico1.jpg" alt="" />
                <h3>Car Price Calculator</h3>
                <p>Estimate monthly payments <br class="brNone2" /> for new cars or used cars</p>
                
            </li>
            <li class="margSecondNone">
                <img src="<?php bloginfo('template_directory'); ?>/images/ico2.jpg" alt="" />
                <h3>Auto Insurance</h3>
                <p>Protect your car against the <br class="brNone2" /> worst with a car insurance</p>
            </li>
            <li class="margRNone">
                <img src="<?php bloginfo('template_directory'); ?>/images/ico3.jpg" alt="" />
                <h3>Car Loan</h3>
                <p>Everything you need to know <br class="brNone2" /> about car loans</p>
            </li>
        </ul>
        
    </div>

    </div>



        <div class="adBannerWrap"> <img src="<?php bloginfo('template_directory'); ?>/images/adbanner1.jpg" alt="" /></div>
    <div class="fourthBlock">
        <div class="head">WHY AUTOCART?</div>
        <ul class="clearfix">
        	<ul>
                        <?php 	$dupli_post_arr = array();
							query_posts( array ( 'posts_per_page' => 5, 'order'=> 'desc', 'post_type' => 'post' ) );							
						?>
                        <?php if (have_posts()) : while (have_posts()) : the_post(); 
							$dupli_post_arr[] = $post->ID;
						?>
                        	<li>
                        		<?php if ( has_post_thumbnail() ) { ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                    <?php } 
					else { ?>
                    	<img src="<?php bloginfo('template_directory'); ?>/images/ico4.jpg" alt="" />
                     <?php } ?>  
                            	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p><?php the_excerpt_max_charlength(150); ?></p>
                            </li>
                            <?php endwhile; endif; wp_reset_query(); ?>                            
                        </ul>




           <!--  -->
        </ul>
        
    </div>

     <div class="fifthBlock">
         <div class="head">WHAT'S HOT NOW</div>
        <div class="text">Get the latest on the autospace right here!</div> 
        <div class="sliderWrap">

    <div class="sliderContainer">
        <a class="btn prev"></a>
        <div class="slideInner">

            <ul class="slider  owl-carousel owl-theme"  id="owl-demo" >
                <li class="item">
                    <div class="postImg">
                        <img src="<?php bloginfo('template_directory'); ?>/images/pic1.jpg">
                        <div class="postDate"><span>01</span> Aug </div>
                    </div>
                    <div class="postDetailWrap clearfix">
                        <div class="title"><a href="#">1992 Dodge Shadow America</a></div>
                        <div class="desc clearfix">
                            <div class="postDesc">The Dodge Shadow America was the low-priced, K-Car-based successor to the very popular Simca-based Dodge Omni.</div>

                            <span class="authorName"> - Murilee Martin </span>
                        </div>
                        
                        <a class="readMore" href="#">Read More</a>

                    </div>
                </li>


                <li class="item">
                    <div class="postImg">
                        <img src="<?php bloginfo('template_directory'); ?>/images/pic1.jpg">
                        <div class="postDate"><span>02</span> Aug </div>
                    </div>
                    <div class="postDetailWrap clearfix">
                        <div class="title"><a href="#">1992 Dodge Shadow America</a></div>
                        <div class="desc clearfix">
                            <div class="postDesc">The Dodge Shadow America was the low-priced, K-Car-based successor to the very popular Simca-based Dodge Omni.</div>

                            <span class="authorName"> - Murilee Martin </span>
                        </div>
                        
                        <a class="readMore" href="#">Read More</a>

                    </div>
                </li>

                <li class="item">
                    <div class="postImg">
                        <img src="<?php bloginfo('template_directory'); ?>/images/pic1.jpg">
                        <div class="postDate"><span>03</span> Aug </div>
                    </div>
                    <div class="postDetailWrap clearfix">
                        <div class="title"><a href="#">1992 Dodge Shadow America</a></div>
                        <div class="desc clearfix">
                            <div class="postDesc">The Dodge Shadow America was the low-priced, K-Car-based successor to the very popular Simca-based Dodge Omni.</div>

                            <span class="authorName"> - Murilee Martin </span>
                        </div>
                        
                        <a class="readMore" href="#">Read More</a>

                    </div>
                </li>           

                <li class="item">
                    <div class="postImg">
                        <img src="<?php bloginfo('template_directory'); ?>/images/pic1.jpg">
                        <div class="postDate"><span>04</span> Aug </div>
                    </div>
                    <div class="postDetailWrap clearfix">
                        <div class="title"><a href="#">1992 Dodge Shadow America</a></div>
                        <div class="desc clearfix">
                            <div class="postDesc">The Dodge Shadow America was the low-priced, K-Car-based successor to the very popular Simca-based Dodge Omni.</div>

                            <span class="authorName"> - Murilee Martin </span>
                        </div>
                        
                        <a class="readMore" href="#">Read More</a>

                    </div>
                </li>   

                <li class="item">
                    <div class="postImg">
                        <img src="<?php bloginfo('template_directory'); ?>/images/pic1.jpg">
                        <div class="postDate"><span>05</span> Aug </div>
                    </div>
                    <div class="postDetailWrap clearfix">
                        <div class="title"><a href="#">1992 Dodge Shadow America</a></div>
                        <div class="desc clearfix">
                            <div class="postDesc">The Dodge Shadow America was the low-priced, K-Car-based successor to the very popular Simca-based Dodge Omni.</div>

                            <span class="authorName"> - Murilee Martin </span>
                        </div>
                        
                        <a class="readMore" href="#">Read More</a>

                    </div>
                </li>   


                <li class="item">
                    <div class="postImg">
                        <img src="<?php bloginfo('template_directory'); ?>/images/pic1.jpg">
                        <div class="postDate"><span>06</span> Aug </div>
                    </div>
                    <div class="postDetailWrap clearfix">
                        <div class="title"><a href="#">1992 Dodge Shadow America</a></div>
                        <div class="desc clearfix">
                            <div class="postDesc">The Dodge Shadow America was the low-priced, K-Car-based successor to the very popular Simca-based Dodge Omni.</div>

                            <span class="authorName"> - Murilee Martin </span>
                        </div>
                        
                        <a class="readMore" href="#">Read More</a>

                    </div>
                </li>                                   
            


            </ul>

        </div>
        <a class="btn next"></a>
    </div>

</div>       
    </div>

     <div class="adBannerWrap2"> <img src="<?php bloginfo('template_directory'); ?>/images/adbanner2.jpg" alt="" /></div>


</div>
<!-- .content-area -->

<?php get_footer(); ?>

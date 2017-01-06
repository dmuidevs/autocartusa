<?php
/**
 * Template Name: carfinancing
  */

get_header(); ?>
<div class="financing">
    <div class="innerPage">
        <h1 class="head" id="topHeading">Car <span class="italic">Financing</span></h1>
        <div class="subHead financeSub">There's something else that drives cars - money
      </div>
  </div>
  </div>

    <div class="FinancingWrap">
      <div class="container clearfix">
      <div class="fullBlock FormContWrap clearfix">
         <div class="innerHeaderBlock">
            <h3 class="header">Car Payment Calculator</h3>
            <h4 class="subheader">How much would I be paying for my car?</h4>
         </div>
         <div class="leftBlock">
            <p>
               The one thing you want to be absolutely sure of when you get to a car dealer is the monthly payments for your new car or used car. How can you do that? By using the car payment calculator that AutoCart is putting forth for your benefit. 
            </p>
            <p>  
               There are numerous variables that go into calculating the your monthly payments - car prices, down payment, interest rate, term of the loan etc. You can adjust these variables and choose what your payments will be like. 
            </p>
            <p>
               <!-- <img src="images/Financingimg1.jpg"> -->
            </p>
         </div>
         <div  class="rightBlock">
            <div class="financeFormWrap wpcf7">
               <div class="financeForm">
               <div class="financeformin">
               <p><div ><script src="http://www.onlineloancalculator.org/free-auto-loan-calculator/loan-calculator.js"></script></div>
    <font size="1">Powered By: <a href="http://www.onlineloancalculator.org/" target="_blank"><font color="#000000">OnlineLoanCalculator</font></a></font></p>
                  
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--  -->
      <div class="fullBlock clearfix">
         
         <div class="fullBlock">
            <div class="innerHeaderBlock">
               <h3 class="header">Auto Loan</h3>
            </div>
            
               <p>
                  Finance the car of your dreams and ensure you're getting your money's worth. A planned out auto loan can fulfil this desire. Select the best auto loan quote right here! 
               </p>
            
            
               <div class="financeForm2">
                 <div class="zipFiledsWrap">
                    <a href="#check_popup" class="fancybox-inline getQuoteButton">Get A Quote</a>
                 </div>
               </div>

               <div style="display:none" class="fancybox-hidden">
                <div id="check_popup" class="hentry getQuoteFormWrap" style="width:400px;max-width:100%;"><?php echo do_shortcode( '[contact-form-7 id="355" title="Get quote Financing"]' ); ?>
                </div>
              </div>
            
         </div>
      </div>
      </div>
   </div>

   <div class="fifthBlock clearfix">
         <div class="head">Car Articles and Reviews</div>
        <div class="text">Get the latest on the autospace right here!</div> 
        <div class="sliderWrap">

    <div class="sliderContainer">
        <a class="btn prev"></a>
        <div class="slideInner">

            <ul class="slider  owl-carousel owl-theme"  id="owl-demo" >
<?php
            $catquery = new WP_Query( 'cat=281&posts_per_page=10' );
            while($catquery->have_posts()) : $catquery->the_post();
            ?>
                <li class="item">
                    <div class="postImg">

                            <?php if ( has_post_thumbnail() ) { ?>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                            <?php } 
                            else { ?>
                        <img src="<?php bloginfo('template_directory'); ?>/images/pic1.jpg" alt="Headline" />
                     <?php } ?>

                        <!-- <div class="postDate"><?php //the_time('jS M') ?></div> -->
                    </div>
                    <div class="postDetailWrap clearfix">
                        <div class="title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></div>
                        <div class="desc clearfix">
                            <div class="postDesc"><?php echo get_excerpt(); ?></div>

                            <!-- <span class="authorName"> - <?php //the_author() ?> </span> -->
                        </div>
                        
                        <a class="readMore" href="<?php the_permalink(); ?>">Read More</a>

                    </div>
                </li>
                <?php endwhile; ?>
            </ul>

        </div>
        <a class="btn next"></a>
    </div>

</div>       
    </div>

<div class="clearfix">
<div class="desktopads">
  <div class="ads1054x143">
    <script id="mNCC" language="javascript">
        medianet_width = "1054";
        medianet_height = "143";
        medianet_crid = "951739525";
        medianet_versionId = "111299"; 
        medianet_chnm=" "; // Used to specify the channel name
        (function() {
            var isSSL = 'https:' == document.location.protocol;
            var mnSrc = (isSSL ? 'https:' : 'http:') + '//contextual.media.net/nmedianet.js?cid=8CUR089T9' + (isSSL ? '&https=1' : '');
            document.write('<scr' + 'ipt type="text/javascript" id="mNSC" src="' + mnSrc + '"></scr' + 'ipt>');
        })();
    </script>
  </div>
</div>
<div class="mobileads">
 <script id="mNCC" language="javascript">
    medianet_width = "300";
    medianet_height = "260";
    medianet_crid = "820462157";
    medianet_versionId = "111299"; 
    medianet_chnm=" "; // Used to specify the channel name
    (function() {
        var isSSL = 'https:' == document.location.protocol;
        var mnSrc = (isSSL ? 'https:' : 'http:') + '//contextual.media.net/nmedianet.js?cid=8CUR089T9' + (isSSL ? '&https=1' : '');
        document.write('<scr' + 'ipt type="text/javascript" id="mNSC" src="' + mnSrc + '"></scr' + 'ipt>');
    })();
  </script>
 </div>

</div>
<!-- .content-area -->

<?php get_footer(); ?>

<?php
/**
 * Template Name: contactus
  */

get_header(); ?>
<div class="contactUs">
    <div class="innerPage">
      <h1 class="head" id="topHeading">CONTACT <span class="italic">US</span></h1>
        <div class="subHead">It would be our pleasure to assist you with any doubts or queries you have<br class="brNoneIn" /> for us. Just drop in your details and we will get back to you as soon as possible
      </div>
  </div>
  </div>


  <div class="ContactWrap">
      <div class="container clearfix">
      <div class="fullBlock FormContWrap">
         <div class="leftBlock">
            <?php echo do_shortcode('[contact-form-7 id="361" title="Contact page form"]'); ?>
         </div>
         <!--end leftblock  -->
         <div class="rightBlock rightBlkAdWrap">
            
         </div>
         <!--end rightBlock  -->
      </div>
      <div class="fullBlock">
         
      </div>
      </div>
   </div>
<!-- .content-area -->

<?php get_footer(); ?>

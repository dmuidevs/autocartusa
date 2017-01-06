<?php
/**
 * Template Name: Front Page Template
  */

get_header(); ?>
<div class="homePageWrapper">
 <div class="firstBlock">

    <div class="clearfix" id="main">
    <div class="contentFull" id="content">
        <h1 id="topHeading">Use The Best, <br class="brHead" /><span class="italic">To Find What's Best</span></h1>
        <h3 id="subHeading">Fuel your car buying experience</h3>
       

        <div class="locateSearch clearfix">
       
        <div class="selectFormWrapper clearfix">
          <form method="GET" action="<?php echo home_url( '/newcarsearch' ); ?>" id="formMain">

            <span class="select-wrapper">
              <select id="ajMakes" name="AuMkNm" class="custom-select2" title="Select Make">
                <option>Select Make</option>
              </select>
              <span class="holder holder2" id="makeholder">Select Make</span>
            </span>

            <span class="select-wrapper disabled">
              <select id="ajModels" name="AuMdNm" class="custom-select3" disabled="disabled" title="Select Model">
                <option>Select Model</option>
              </select>
              <span class="holder holder3" id="modelPHolder">Select Model</span>
            </span>

            <span class="select-wrapper disabled">
              <select id="ajYears" name="AuYr" class="custom-select" disabled="disabled" title="Select Year">
                <option>Select Year</option>
              </select>
              <span class="holder" id="yearPHolder">Select Year</span>
            </span>

            <input type='hidden' id='AuStHd' name='AuStHd' value=''/>
            <input type="submit" value="Search" id="selectSearch" disabled="disabled" class="zipSearchBtn disabled">
          </form>
        </div>
        </div>
        </div><!--End topWrapper-->

       
    </div>
    </div>

    <div class="secondBlockWrap">
    <div class="secondBlock">
        <div class="neAdsWrap clearfix">
           <a href="<?php echo get_option('home'); ?>/newcars/" target="_blank" class="newAds flt">
                <h2>New Cars</h2>
                <p>We know the thrill of buying a new car. Find your perfect <br class="brNone" /> match from the endless options available here.</p>
            </a>
           <!-- <a href="<?php echo get_option('home'); ?>/usedcars/" class="newAds flt margL"> -->
           <a href="<?php echo get_option('home'); ?>/usedcars/" target="_blank" class="newAds flt margL">
                <h2>Used Cars</h2>
                <p>We have  a huge selection of used cars that you can pick from. <br class="brNone" /> Also tools and tips to help you make the right choice.</p>
            </a>
        </div>
        <div class="head">LOCATE A CAR DEALER</div>
        <div class="text">We know that buying a car is a big decision and a good car dealership can go <br class="brNone3" /> a long way. Find the dealers that will suit you and your choice of car.</div>
        <div class="selectFormWrapper2">
            <form method="GET" action="<?php echo home_url( '/locateadealer/' ); ?>">
                <span class="select-wrapper">
                    <select id="ajMakes2" name="make" class="custom-select4" title="Select Make">
                    <option>Select Make</option>
                    </select>
                    <span class='holder holder4'></span>
                </span>
                <input type="text" name="zipcode" class="zipCode" placeholder="Zip Code" >
                <input type="submit" value="Search" class="selectSearch zipSearchBtn">
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
                <a href="<?php echo get_option('home'); ?>/carfinancing/" target="_blank">
                <img src="<?php bloginfo('template_directory'); ?>/images/ico1.png" alt="" />
                <h3>Car Price Calculator</h3>
                <p>Estimate monthly payments <br class="brNone2" /> for new cars or used cars</p>
                </a>
            </li>
            <li class="margSecondNone">
                <a href="<?php echo get_option('home'); ?>/autoinsurance/" target="_blank">
                <img src="<?php bloginfo('template_directory'); ?>/images/ico2.png" alt="" />
                <h3>Auto Insurance</h3>
                <p>Protect your car against the <br class="brNone2" /> worst with a auto insurance</p>
                </a>
            </li>
            <li class="margRNone">
                <a href="<?php echo get_option('home'); ?>/autoloan/" target="_blank">
                <img src="<?php bloginfo('template_directory'); ?>/images/ico3.png" alt="" />
                <h3>Auto Loan</h3>
                <p>Everything you need to know <br class="brNone2" /> about auto loans</p>
                </a>
            </li>
        </ul>
        
    </div>

    </div>
   
<div class="fourthBlock">
        <div class="head">WHY AUTOCART?</div>
        <ul class="clearfix">
            <li>
                <img src="<?php bloginfo('template_directory'); ?>/images/ico4.jpg" alt="" />
                <h3>Reliable Information</h3>
                <p>We make sure our sources are true and transparent. We like it that way.</p>                
            </li>
            <li class="margSecondNone">
                <img src="<?php bloginfo('template_directory'); ?>/images/ico5.jpg" alt="" />
                <h3>Unparalleled Customer Accord</h3>
                <p>We understand perspectives and believe that every customer should be a happy one.</p>
            </li>
            <li class="margRNone thirdBlk">
                <img src="<?php bloginfo('template_directory'); ?>/images/ico6.jpg" alt="" />
                <h3>Premium Technology</h3>
                <p>We use the technology that is latest and flexible to fit your  needs and help you get the best results. No compromise.</p>
            </li>
        </ul>
        
    </div>







     <div class="fifthBlock">
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

</div>
<!--Script to fetch details from API-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
   jQuery.noConflict();
</script>

<!-- js code -->
<script>
 var protoCall = "https://";
 var host = "api.edmunds.com";

     // Make sure to change the API KEY
 var apiKey = "ch3dfn2zhfp6m8wt3gc8rc64";
 var fmt = "json";
 var standardParams = "&fmt=" + fmt +  "&api_key=" + apiKey + "&callback=?";
 var $yearSelect = jQuery('#ajYears');
 var $makeSelect = jQuery('#ajMakes');
 var $makeSelect2 = jQuery('#ajMakes2');
 var $modelSelect = jQuery('#ajModels');
 var $selectSearch = jQuery('#selectSearch');
 // var $styleSelect = jQuery('#ajStyles');
 var $formMain = jQuery('#formMain');

 // lets bind some events on document.ready.
 jQuery(function(){

     //$yearSelect.on('change', function() { getMakeModelsByYear()});
     $makeSelect.on('change', function() { enableModelDropdown() });
     $modelSelect.on('change', function() { getYears() });
     $yearSelect.on('change', function() { getStyles() });
     // lets build the year drop down.
     ajEdmundsBuildMake();

 });

function ajEdmundsBuildMake()
{
   
   var endPoint = "/api/vehicle/v2/makes",
   view = "basic",
   options = "view=" + view + standardParams,
   postURL = protoCall + host + endPoint + "?" + options;
   // $makeSelect.append('<option value="-1">Select Make</option>');
   
    jQuery.getJSON(postURL,
        function(data) {
             // clear the make drop down... re add the first option... remove dsiabled attr.
             
             $modelSelect.empty();
             $modelSelect.append('<option value="-1">Select Model</option>');

             // loop the makes... each make contains model... add the make in make drop down and models in model dd
             jQuery.each(data.makes, function(i, val) {
                  make = data.makes[i];
                  $makeSelect.append('<option value="' + make.niceName + '">' + make.name + '</option>');
                  $makeSelect2.append('<option value="' + make.niceName + '">' + make.name + '</option>');
                  // jQuery.each(make.models, function(x, val){   
                  //      model = make.models[x];
                //   $modelSelect.append('<option make="' + make.niceName +'" value="' + model.niceName + '">' + model.name + '</option>');                 
                  // });
             });
        });
}

 // since we already grabed the models...
 // now just matter of showing only the matching models for a make.
 function enableModelDropdown()
 {
   

     var make =  $makeSelect.val();
     var endPoint = "/api/vehicle/v2/" + make + "/models",
     view = "basic",
     options = "view=" + view + standardParams,
     postURL = protoCall + host + endPoint + "?" + options;

     
   jQuery.getJSON(postURL,
         function(data) {
              $modelSelect.removeAttr('disabled');
              $modelSelect.parent().removeClass('disabled');
              $modelSelect.find('option').not('[value="-1"]').hide();
              jQuery('#modelPHolder').text("Select Model");
              jQuery('#yearPHolder').text("Select Year");
              $yearSelect.attr('disabled','disabled');
              $yearSelect.parent().addClass('disabled');
              $selectSearch.addClass('disabled');
              $selectSearch.attr('disabled','disabled');
              jQuery('#AuStHd').val("");
              jQuery.each(data.models, function(i, val) {
                  model = data.models[i];
                 $modelSelect.append('<option value="' + model.niceName + '">' + model.name + '</option>');
            });
         });
     
 }


 function getYears()
 {
     var make = $makeSelect.val(),
         model = $modelSelect.val(),
         endPoint = "/api/vehicle/v2/" + make + "/" + model + "/years",
         view = "basic",
         options = "view=" + view + standardParams,
         postURL = protoCall + host + endPoint + "?" +  options;
       jQuery.getJSON(postURL,
           function(data) {
                $yearSelect.empty();
                $yearSelect.removeAttr('disabled');
                $yearSelect.parent().removeClass('disabled');

                $yearSelect.append('<option value="-1">Select Year</option>');

                jQuery('#yearPHolder').text("Select Year");
                jQuery.each(data.years, function(i, val) {
                      year = data.years[i];
                     $yearSelect.append("<option value='" + year.year + "'>" + year.year + "</option>");
                });
           });
 }



 function getStyles()
 {
     var year = $yearSelect.val(),
         make = $makeSelect.val(),
         model = $modelSelect.val(),
         endPoint = "/api/vehicle/v2/" + make + "/" + model + "/" + year + "/styles",
         view = "basic",
         options = "view=" + view + standardParams,
         postURL = protoCall + host + endPoint + "?" +  options;
     jQuery.getJSON(postURL,
         function(data) {
                $selectSearch.removeClass('disabled');
                $selectSearch.removeAttr('disabled');
                jQuery('#AuStHd').val(data.styles[0].id);
              // $formMain.append("<input type='hidden' id='AuStHd' name='AuStHd' value='" + data.styles[0].id + "'/>");
         });
 }
</script>
<?php get_footer(); ?>


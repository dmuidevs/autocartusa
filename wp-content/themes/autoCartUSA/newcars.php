<?php
   /**
    * Template Name: newcars
     */
   
   get_header(); ?>
<div class="newCarBlock">
   <div class="clearfix" id="main">
      <div class="contentFull" id="content">
         <h1 id="topHeading">NEW<span class="italic"> CARS</span></h1>
         <h3 id="subHeading">Everything you need for your new car- from car quotes <br />
            to car buying tips, we've got you covered!
         </h3>
         <!--Form Details to display year/make/model in dropdown -->
         <div class="selectFormWrapper clearfix">
          <form method="GET" action="<?php echo home_url( '/newcarsearch' ); ?>" id="formMain">
            <span class="select-wrapper">
              <select id="ajMakes" name="AuMkNm" class="custom-select2">
                <option>Select Make</option>
              </select>
              <span class="holder holder2" id="makeholder">Select Make</span>
            </span>

            <span class="select-wrapper disabled">
              <select id="ajModels" name="AuMdNm" class="custom-select3" disabled="disabled">
                <option>Select Model</option>
              </select>
              <span class="holder holder3" id="modelPHolder">Select Model</span>
            </span>

            <span class="select-wrapper disabled">
              <select id="ajYears" name="AuYr" class="custom-select" disabled="disabled">
                <option>Select Year</option>
              </select>
              <span class="holder" id="yearPHolder">Select Year</span>
            </span>

            <input type='hidden' id='AuStHd' name='AuStHd' value=''/>
            <input type="submit" value="Search" id="selectSearch" disabled="disabled" class="zipSearchBtn disabled">
          </form>
        </div>
      </div>
      <!--End topWrapper-->
   </div>
</div>

<input type="hidden" name="quoteZipHidden" id="quoteZipHidden">
<div class="newCarWrap clearfix">
   <div class="newCarContainer">
      
      <div class="headerBlock">
         <h2>Explore New Car Models</h2>
         <h3>Discover a car that suits your needs from a wide range of new cars</h3>
      </div>
      <div class="bodyStyle clearfix">
         <h4 class="subHead">Body Style</h4>
         <div class="styleleftPanel">
            <ul id="carTypes" class="carTypes clearfix">
               <li>
                  <a href="#" target="_blank">
                     <div class="carImg"><img src="<?php bloginfo('template_directory'); ?>/images/bodystyle/convertibles_icon.png"></div>
                     <span class="carName">Convertibles</span>
                  </a>
               </li>
               <li>
                  <a href="#" target="_blank">
                     <div class="carImg"><img src="<?php bloginfo('template_directory'); ?>/images/bodystyle/coupes_icon.png"></div>
                     <span class="carName">Coupes</span>
                  </a>
               </li>
               <li>
                  <a href="#" target="_blank">
                     <div class="carImg"><img src="<?php bloginfo('template_directory'); ?>/images/bodystyle/hatchbacks_icon.png"></div>
                     <span class="carName">Hatchbacks</span>
                  </a>
               </li>
               <li>
                  <a href="#" target="_blank">
                     <div class="carImg"><img src="<?php bloginfo('template_directory'); ?>/images/bodystyle/minivan_icon.png"></div>
                     <span class="carName">Minivan</span>
                  </a>
               </li>
               <li>
                  <a href="#" target="_blank">
                     <div class="carImg"><img src="<?php bloginfo('template_directory'); ?>/images/bodystyle/sedans_icon.png"></div>
                     <span class="carName">Sedans</span>
                  </a>
               </li>
               <li>
                  <a href="#" target="_blank">
                     <div class="carImg"><img src="<?php bloginfo('template_directory'); ?>/images/bodystyle/suv_icon.png"></div>
                     <span class="carName">SUV</span>
                  </a>
               </li>
               <li>
                  <a href="#" target="_blank">
                     <div class="carImg"><img src="<?php bloginfo('template_directory'); ?>/images/bodystyle/truck_icon.png"></div>
                     <span class="carName">Truck</span>
                  </a>
               </li>
               <li>
                  <a href="#" target="_blank">
                     <div class="carImg"><img src="<?php bloginfo('template_directory'); ?>/images/bodystyle/van_icon.png"></div>
                     <span class="carName">Van</span>
                  </a>
               </li><li>
                  <a href="#" target="_blank">
                     <div class="carImg"><img src="<?php bloginfo('template_directory'); ?>/images/bodystyle/wagen_icon.png"></div>
                     <span class="carName">Wagon</span>
                  </a>
               </li>

            </ul>
         </div>
         
         <div class="showAll"></div>
      </div>
      <div class="carModels clearfix">
         <h4 class="subHead">Make</h4>
         <div id="carList" class="leftPanel">
            <ul class="carList marginLeftNone">
               <li><a href="#" target="_blank">Acura</a></li>
               <li><a href="#" target="_blank">Alfa Romeo</a></li>
               <li><a href="#" target="_blank">Aston Martin</a></li>
               <li><a href="#" target="_blank">Audi</a></li>
               <li><a href="#" target="_blank">Bentley</a></li>
               <li><a href="#" target="_blank">BMW</a></li>
               <li><a href="#" target="_blank">Buick</a></li>
               <li><a href="#" target="_blank">Cadillac</a></li>
               <li><a href="#" target="_blank">Chevrolet</a></li>
               <li><a href="#" target="_blank">Chrysler</a></li>
               <li><a href="#" target="_blank">Dodge</a></li>
            </ul>
            <ul class="carList">
               <li><a href="#" target="_blank">Ferrari</a></li>
               <li><a href="#" target="_blank">FIAT</a></li>
               <li><a href="#" target="_blank">Ford</a></li>
               <li><a href="#" target="_blank">GMC</a></li>
               <li><a href="#" target="_blank">Honda</a></li>
               <li><a href="#" target="_blank">Hyundai</a></li>
               <li><a href="#" target="_blank">Infiniti</a></li>
               <li><a href="#" target="_blank">Jaguar</a></li>
               <li><a href="#" target="_blank">Jeep</a></li>
               <li><a href="#" target="_blank">Kia</a></li>
               <li><a href="#" target="_blank">Lamborghini</a></li>
            </ul>
            <ul class="carList">
               <li><a href="#" target="_blank">Land Rover</a></li>
               <li><a href="#" target="_blank">Lexus</a></li>
               <li><a href="#" target="_blank">Lincoln</a></li>
               <li><a href="#" target="_blank">Maserati</a></li>
               <li><a href="#" target="_blank">Mazda</a></li>
               <li><a href="#" target="_blank">McLaren</a></li>
               <li><a href="#" target="_blank">Mercedes-Benz</a></li>
               <li><a href="#" target="_blank">MINI</a></li>
               <li><a href="#" target="_blank">Mitsubishi</a></li>
               <li><a href="#" target="_blank">Nissan</a></li>
            </ul>
            <ul class="carList">
               <li><a href="#" target="_blank">Porsche</a></li>
               <li><a href="#" target="_blank">RAM</a></li>
               <li><a href="#" target="_blank">Rolls-Royce</a></li>
               <li><a href="#" target="_blank">Scion</a></li>
               <li><a href="#" target="_blank">Smart</a></li>
               <li><a href="#" target="_blank">Subaru</a></li>
               <li><a href="#" target="_blank">Tesla</a></li>
               <li><a href="#" target="_blank">Toyota</a></li>
               <li><a href="#" target="_blank">Volkswagen</a></li>
               <li><a href="#" target="_blank">Volvo</a></li>
            </ul>
         </div>
         <div class="rightPanel">
         <div class="desktopads">
            <script id="mNCC" language="javascript">
            medianet_width = "300";
            medianet_height = "500";
            medianet_crid = "625777181";
            medianet_versionId = "111299"; 
            medianet_chnm=" "; // Used to specify the channel name
            (function() {
                var isSSL = 'https:' == document.location.protocol;
                var mnSrc = (isSSL ? 'https:' : 'http:') + '//contextual.media.net/nmedianet.js?cid=8CUR089T9' + (isSSL ? '&https=1' : '');
                document.write('<scr' + 'ipt type="text/javascript" id="mNSC" src="' + mnSrc + '"></scr' + 'ipt>');
            })();
          </script>
          </div>
           <div class="mobileads">
           <script id="mNCC" language="javascript">
            medianet_width = "300";
            medianet_height = "500";
            medianet_crid = "160416746";
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
      </div>
     
     
      <div class="fourthBlock">
         <div class="headerBlock carQuotes">
            <h2>New Car Quotes</h2>
            <h3>Why get a car quote here? </h3>
         </div>
         <ul class="clearfix">
            <li>
               <img src="<?php bloginfo('template_directory'); ?>/images/ico7.jpg" alt="" />
               <h3>Saves time and money</h3>
               <p>All that travelling and talking to get a car quote from a store can be tiring. On Autocartusa.com the process is digitized. Get competitive car price at your fingertips.</p>
            </li>
            <li class="margSecondNone">
               <img src="<?php bloginfo('template_directory'); ?>/images/ico8.jpg" alt="" />
               <h3>Wide range of options</h3>
               <p>While you may not visit every store in your locality for a quote, on Autocartusa.com within a few seconds we give you a list of online car prices from all the local dealers around so you don't miss out on anything.</p>
            </li>
            <li class="margRNone thirdBlk">
               <img src="<?php bloginfo('template_directory'); ?>/images/ico9.jpg" alt="" />
               <h3>Benefit of the walk-in deals too</h3>
               <p>You can get the contact information and other details of the car dealerships and negotiate with them. This way you can ensure that you are happy with what you are going to pay for your new car or used car.</p>
            </li>
         </ul>
      </div>
      <div class="newCarContWrap  clearfix">
         <div class="leftPanel">
            <div class="leftBlock clearfix">
            <h2>Fill Out The Form To Get Free New Car Quotes</h2>
               

               <?php echo do_shortcode( '[contact-form-7 id="348" title="NEW CARS"]' ); ?>
               <script type="text/javascript">
                 jQuery.get("http://ipinfo.io", function (response) {
                  jQuery("#quoteZip").val(response.postal);
                  jQuery("#quoteZipHidden").val(response.postal);
                  }, "jsonp");
               </script>
            </div>
         </div>
         <div class="rightPanel">
           <div class="desktopads">
            <script id="mNCC" language="javascript">
              medianet_width = "340";
              medianet_height = "395";
              medianet_crid = "536078546";
              medianet_versionId = "111299"; 
              medianet_chnm=" "; // Used to specify the channel name
              (function() {
                  var isSSL = 'https:' == document.location.protocol;
                  var mnSrc = (isSSL ? 'https:' : 'http:') + '//contextual.media.net/nmedianet.js?cid=8CUR089T9' + (isSSL ? '&https=1' : '');
                  document.write('<scr' + 'ipt type="text/javascript" id="mNSC" src="' + mnSrc + '"></scr' + 'ipt>');
              })();
            </script>
           </div>
           <div class="mobileads">
            <script id="mNCC" language="javascript">
              medianet_width = "300";
              medianet_height = "250";
              medianet_crid = "498602174";
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
      </div>
   </div>
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
    medianet_height = "250";
    medianet_crid = "857821127";
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
<!--Script to fetch details from API-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
   jQuery.noConflict();
</script>
<!-- js code -->
<script>
// dynamic links
var listItems = jQuery("#carTypes li a");
var quoteZipHidden = jQuery('#quoteZipHidden').val();
listItems.each(function(idx, li) {
    var carname = jQuery(li).find('.carName').text();
    var product = jQuery(li).attr("href","http://inventory.autocartusa.com/?make="+carname+"&zipcode="+quoteZipHidden);
});
// end dynamic links


// dynamic links
var listItems2 = jQuery("#carList ul li a");
listItems2.each(function(idx, li) {
    var makename = jQuery(li).text();
    var product2 = jQuery(li).attr("href","http://inventory.autocartusa.com/?make="+makename+"&zipcode="+quoteZipHidden);
});
// end dynamic links



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
     $makeSelect.on('change', function() { enableModelDropdown()});
     $modelSelect.on('change', function() { getYears() });
     $yearSelect.on('change', function() { getStyles() });
     // lets build the year drop down.
     ajEdmundsBuildMake();

 });

function ajEdmundsBuildMake()
{
   
   var endPoint = "/api/vehicle/v2/makes?state=new",
   view = "basic",
   options = "view=" + view + standardParams,
   postURL = protoCall + host + endPoint + "&" + options;
   // console.log(postURL);
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
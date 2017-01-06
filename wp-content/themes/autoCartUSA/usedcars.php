<?php
/**
 * Template Name: usedcars
  */

get_header(); ?>





<div class="usedCarBlock">
   <div class="clearfix" id="main">
    <div class="contentFull" id="content">
        <h1 id="topHeading">USED <span class="italic">CARS</span></h1>
        <h3 id="subHeading">There are so many benefits to buying a used car. Cheaper car insurance, lower registration <br />
fees, better deals.. It's only going to save you a few thousand bucks after all!</h3>
       

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
        </div><!--End topWrapper-->

       
    </div>
    </div>

   <div class="UsedCarWrap">
      <div class="container clearfix">
     
      <!--  -->
      <div class="clearfix">
          
         
         <div>
            <div class="innerHeaderBlock">
                <div class="clearfix">
                  <div class="desktopads">
                    <div>
                      <script id="mNCC" language="javascript">
                        medianet_width = "1059";
                        medianet_height = "158";
                        medianet_crid = "538824372";
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
                      medianet_width = "295";
                      medianet_height = "221";
                      medianet_crid = "288366541";
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
               <h3 class="header">Check value of a used car</h3>
               <h4 class="subheader">Getting an estimate of the car value will help you get the best price and crack good deals</h4>
                
              <div class="tmvwidgetWrapper">
                <div id="tmvwidget"></div>
               </div>
      
            </div>
         </div> 
         <div id="vinform" class="fullBlock">
            <div class="innerHeaderBlock">
               <h3 class="header">Lookup A Car By The VIN</h3>
               <h4 class="subheader">Get your VIN decoded now</h4>
            </div>
         </div>  
         <div  class="fullBlock">
            <div class="usedcarForm2">
               <form class="wpcf7" method="post" action="#vinform">
                  <div class="responsive-form clearfix">
                        <div class="zipFiledsWrap">
                           <label class="formlabel">Enter Your VIN</label>
                           <input type="text" class="wpcf7-form-control" id="vininput" name="vininput" placeholder="Enter Your VIN"/>
                           <input type="submit" value="Search" name="vinsubmit" id="vinsubmit">
                        </div>
                     </div>
               </form>
<div id="vinresults">
<?php
if(isset($_POST['vinsubmit'])&&!empty($_POST['vinsubmit'])){
$vininput =  $_POST['vininput'];
if(isset($vininput)&&!empty($vininput)){

$url = 'https://api.edmunds.com/api/v1/vehicle/vin/'.$vininput.'/configuration?api_key=ch3dfn2zhfp6m8wt3gc8rc64';
//Set stream options
$opts = array(
  'http' => array('ignore_errors' => true)
);
//Create the stream context
$context = stream_context_create($opts);
//Open the file using the defined context
$output = file_get_contents($url, false, $context);
$obj = json_decode($output, true);
$data['vindata'] = $obj;
if($data['vindata']['error']['errorType']!="INCORRECT_PARAMS"){
?>

<table id="vinTable" class="vinTable">
<?php
foreach ($data as $value) {
echo "
<tr>
<td>make</td> 
<td>".$value['make']['name']."</td>
</tr>
<tr>
<td>model</td>    
<td>".$value['model']['name']."</td>
</tr>
<tr>
<td>styles</td>   
<td>".$value['styles'][0]['name']."</td>
</tr>
<tr>
<td>year</td>
<td>".$value['year']."</td>
</tr>
<tr>
<td>vehicleStyle</td> 
<td>".$value['vehicleStyle']."</td>
</tr>
<tr>
<td>drivenWheels</td> 
<td>".$value['drivenWheels']."</td>
</tr>
<tr>
<td>fuelType</td> 
<td>".$value['fuelType']."</td>
</tr>
<tr>
<td>cylinders</td>    
<td>".$value['cylinders']."
</td>
</tr>
";

$_POST['makename'] = $value['make']['name'];
$_POST['modelname'] = $value['model']['name'];
$_POST['stylename'] = $value['styles'][0]['name'];
$_POST['year'] = $value['year'];
$_POST['vehicleStyle'] = $value['vehicleStyle'];
$_POST['drivenWheels'] = $value['drivenWheels'];
$_POST['fuelType'] = $value['fuelType'];
$_POST['cylinders'] = $value['cylinders'];
}
  // foreach end
 
}else{
  echo "<div class='vinerror'>VIN is not appropriate</div>"; 
}
?>
</table>


<a href="#check_popup" class="fancybox-inline getQuoteButton vinButton">Get A Quote</a>
<div style="display:none" class="fancybox-hidden">
  <div id="check_popup" class="hentry getQuoteFormWrap" style="width:400px;max-width:100%;"><?php echo do_shortcode( '[contact-form-7 id="359" title="Get quote used cars"]' ); ?>
  </div>
</div>
<?php
}else{
  echo "<div class='vinerror'>VIN is not appropriate</div>";
}
}
?>            
</div>
   
            </div>
         </div>
         </div>
         </div>
         </div>

              <div class="fifthBlock">
         <div class="head">Car Articles and Reviews</div>
        <div class="text">Get the latest on the autospace right here!</div> 
        <div class="sliderWrap">

    <?php
    $catquery = new WP_Query( array(
    'category__in' => array(291,281),
    'posts_per_page' => 10,
    'post_type' => 'post',
    ));
if ( $catquery->have_posts() ) {
    ?>
    <div class="sliderContainer">
        <a class="btn prev"></a>
        <div class="slideInner">
            
            <ul class="slider  owl-carousel owl-theme"  id="owl-demo" >
            <?php
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
<?php
}
?>
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

<!--SCRIPT FOR EDMUNDS TMV WIDGET-->
<script type="text/javascript">
(function(d, tag, apikey){
    var tmv = {
        init: function() {
            tmv.loadjs('http://widgets.edmunds.com/js/edm/sdk.js', tmv.loadWidget);
        },
        loadjs: function(file, callback) {
            var fjs = d.getElementsByTagName(tag)[0],
                s = d.createElement(tag);
            s.onload = s.onreadystatechange = function() {
                var r = this.readyState;
                if (!r || r === 'loaded' || r === 'complete') {
                    callback.call();
                    s.onreadystatechange = null;
                }
            };
            s.src = file;
            fjs.parentNode.insertBefore(s, fjs);
        },
        loadWidget: function() {
            tmv.loadjs('http://widgets.edmunds.com/js/tmv/tmvwidget.js', tmv.initWidget);
        },
        initWidget: function() {
            var widget = new EDM.TMV(apikey, {root: 'tmvwidget', baseClass: 'tmvwidget'});
            widget.init({"includedMakes":"all","price":"tmv-invoice-msrp","showVehicles":"USED","zip":"10001"});
            widget.render();
        }
    }
    tmv.init();
}(document, 'script', 'ch3dfn2zhfp6m8wt3gc8rc64'));
</script>



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

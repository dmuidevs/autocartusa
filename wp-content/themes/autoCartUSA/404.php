<?php
   /**
    * Template Name: newcars
     */
   
   get_header(); ?>

<div class="errorPageWrap clearfix">
   <div class="errorPage">
      <div class="clearfix" id="main">
         <div class="contentFull" id="content">
            <h1 id="topHeading"><span>We couldn't find the page <br> you were looking for.</span></h1>
            <h3 id="subHeading">But we can still help you find what you need</h3>
            <!--Form Details to display year/make/model in dropdown -->
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
         <!--End topWrapper-->
      </div>
   </div>

   <div class="popularCars clearfix">
      <h2 class="headH1">Most Popular Car Sections</h2>
      <ul class="carSections">
         <li><a href="<?php echo get_option('home'); ?>/newcars/">New Cars</a></li>
         <li><a href="<?php echo get_option('home'); ?>/usedcars/">Used Cars</a></li>
         <li class="marginRightZero"><a href="<?php echo get_option('home'); ?>/carfinancing/">Car Finance</a></li>
         <li><a href="<?php echo get_option('home'); ?>/autoloan/">Auto Loan</a></li>
         <li><a href="<?php echo get_option('home'); ?>/autoinsurance/">Auto Insurance</a></li>
         <li class="marginRightZero"><a href="<?php echo get_option('home'); ?>/locateadealer/">Locate A Dealer</a></li>
      </ul>
   </div>

</div>


<div class="mostVistedCars">

   <div class="carModels clearfix">
      <h2 class="headH2">Most Visited Makes</h4>

         <ul class="carList marginLeftNone">
            <li><a href="#">Toyota</a></li>
            <li><a href="#">Ford</a></li>
            <li><a href="#">Honda</a></li>
            <li><a href="#">Chevrolet</a></li>
            <li><a href="#">Nissan</a></li>
            <li><a href="#">BMW</a></li>
         </ul>

         <ul class="carList secondWidth">
            <li><a href="#">Mazda</a></li>
            <li><a href="#">Hyundai</a></li>
            <li><a href="#">Mercedes-Benz</a></li>
            <li><a href="#">Volkswagen</a></li>
            <li><a href="#">Audi</a></li>
            <li><a href="#">Lexus</a></li>
         </ul>

         <ul class="carList">
            <li><a href="#">Dodge</a></li>
            <li><a href="#">Jeep</a></li>
            <li><a href="#">Subaru</a></li>
            <li><a href="#">Acura</a></li>
            <li><a href="#">Kia</a></li>
            <li><a href="#">Infiniti</a></li>
         </ul>

         <ul class="carList">
            <li><a href="#">GMC</a></li>
            <li><a href="#">Cadillac</a></li>
            <li><a href="#">Chrysler</a></li>
            <li><a href="#">Volvo</a></li>
            <li><a href="#">Mitsubishi</a></li>
            <li><a href="#">Buick</a></li>
         </ul>

         <ul class="carList">
            <li><a href="#">Porsche</a></li>
            <li><a href="#">Land Rover</a></li>
            <li><a href="#">Lincoln</a></li>
            <li><a href="#">Jaguar</a></li>
            <li><a href="#">Scion</a></li>
            <li><a href="#">MINI</a></li>
         </ul>

         <ul class="carList lastWidth">
            <li><a href="#">Tesla</a></li>
            <li><a href="#">Suzuki</a></li>
            <li><a href="#">Ram</a></li>
            <li><a href="#">Fiat</a></li>
            <li><a href="#">smart</a></li>
         </ul>                

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
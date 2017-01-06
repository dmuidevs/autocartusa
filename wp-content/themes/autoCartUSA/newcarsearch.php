<?php
/**
 * Template Name: newcarsearch
  */

get_header(); ?>

<?php
   $make=$_REQUEST['AuMkNm'];
   $model=$_REQUEST['AuMdNm'];
   $year=$_REQUEST['AuYr'];
?>

<div class="NCSearchResults">
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

<div class="carResultsContainer container clearfix">
  <h2 class="modelName"><?php echo $make." ".$model; ?></h2>
   <div class=""><!--Removed leftSide class from here becuase ads were removed-->
      <div class="modelShortDesc clearfix">

         <div class="modelImage" >
           <div id="modelImage"></div>
           <div id="gotogetquote"></div>
           <div class="getQuoteWrap clearfix">
             <a href="#contact_form_pop" class="fancybox-inline getQuoteButton">Get Quote</a>
          </div>
         </div>
         <div class="versions">
            <h4>Versions</h4>
            <div class="versionList clearfix">
               
            </div>
         </div>
      </div>

      

      <div style="display:none" class="fancybox-hidden">
          <div id="contact_form_pop" class="hentry getQuoteFormWrap" style="width:400px;max-width:100%;">
              <?php echo do_shortcode( '[contact-form-7 id="222" title="Get quote"]' ); ?>
          </div>
      </div>

      <div class="allVersionDetails clearfix">
         <h4>Details for all versions</h4>
      </div>
   </div><!--end leftSide-->

   <!-- <div class="rightSide">
      
   </div> -->
   
</div><!--end modelDetailsWrap-->

<script>
   jQuery.noConflict();
</script>
<script type="text/javascript">

function getQueryString(field, url) {
    var href = url ? url : window.location.href;
    var reg = new RegExp('[?&]' + field + '=([^&#]*)', 'i');
    var string = reg.exec(href);
    return string ? string[1] : '';
}

   var protoCall = "https://";
   var host = "api.edmunds.com";

   var apiKey = "ch3dfn2zhfp6m8wt3gc8rc64";
   var fmt = "json";
   var standardParams = "&fmt=" + fmt +  "&api_key=" + apiKey ;

   var $versionList=jQuery('.versionList');
   var $resultsdiv=jQuery('#results');
   var $modelImage=jQuery('#modelImage');
   var $modelslide=jQuery('.modelslide');
   var $allVersionDetails=jQuery('.allVersionDetails');

   var make=getQueryString("AuMkNm");
   var model=getQueryString("AuMdNm");

   // alert(make);

   // var style=getQueryString("AuSt");
   var year=getQueryString("AuYr");
   var hiddenStyle=getQueryString("AuStHd");

   // This is a functions that scrolls to #{blah}link
    function goToByScroll(id){
          // Remove "link" from the ID
        id = id.replace("link", "");
          // Scroll
        $('html,body').animate({
            scrollTop: ($("#"+id).offset().top)-200}, 800);
    }

   
   jQuery(window).load(function() {
    // console.log(newmake);
    // if(make!=''){
    //   jQuery("html, body").animate({ scrollTop: 600 }, 800);
    // }
    goToByScroll('gotogetquote');   
  });


    var endPoint1 = "/api/vehicle/v2/" + make + "/" + model + "/" + year + "/styles",
    view = "basic",
    options1 = "view=" + view + standardParams,
    postURL = protoCall + host + endPoint1 + "?" +  options1 + "&callback=?";
    //get all styles of selected make and model
   jQuery.getJSON(postURL,
       function(data) {
         var pricelist = [];
           jQuery.each(data.styles, function(i, val) {
            style = data.styles[i];
                 
               var styleID=style.id;

               // var res = Math.min.apply(Math,data.styles.map(function(o){return o.id;}));
               // $resultsdiv.append("<input id='hiddenStyle' type='hidden' value='" + res + "'/>");
               

               //get prices for all car models
               var endPoint2 = "/api/vehicle/v2/styles/"+styleID+"?view=full",
                  options2 =  standardParams,
                  postURL = protoCall + host + endPoint2  + options2 + "&callback=?";
                  jQuery.getJSON(postURL,
                      function(data) {
                        // console.log(data.price)
                        carPrice='';
                        carDisplacement='NA';
                        carValves='NA';

                        if(data.price.hasOwnProperty('baseMSRP')){
                          carPrice='<span>$'+ data.price.baseMSRP +'</span>';
                        }

                        if(data.engine.hasOwnProperty('displacement')){
                          carDisplacement=data.engine.displacement+' CC';
                        }

                        if(data.engine.hasOwnProperty('totalValves')){
                          carValves=data.engine.totalValves;
                        }
                        
                        // $versionList.append('<p class="versionName">'+ data.name +'</p><p class="versionPrice">$'+ data.price.baseMSRP +'</p>');
                        $versionList.append('<div class="modelDetailsWrap clearfix"><div class="modelDetails"><p class="versionName">'+ data.name +'</p><p class="versionDisplacement">'+data.engine.displacement+' CC, '+data.transmission.numberOfSpeeds+' Speed '+data.transmission.transmissionType+'</p></div><div class="modelPrice">'+ carPrice +'</div></div>');
                        // $allVersionDetails.append('<div class="one_fourth_details"><div class="detailsIN"><p class="versionName innerVN">'+ data.name +'</p><p class="versionCC"><b>Displacement:</b> '+data.engine.displacement+' CC</p><p class="versionHP"><b>Horsepower: </b>'+data.engine.horsepower+' HP</p><p class="versionTQ"><b>Torque: </b>'+data.engine.torque+'</p><p class="versionVL"><b>Valves: </b>'+data.engine.totalValves+'</p><p class="versionCL"><b>Cylinders: </b>'+data.engine.cylinder+'</p><p class="versionCF"><b>Configuration: </b>'+data.engine.configuration+'</p><p class="versionTP"><b>Type: </b>'+data.engine.type+'</p><p class="versionCP"><b>Compressor: </b>'+data.engine.compressorType+'</p></div></div>');
                        $allVersionDetails.append('<div class="one_fourth_details"><div class="detailsIN"><p class="versionName innerVN">'+ data.name +'</p><p class="versionCC"><b>Displacement:</b> '+carDisplacement+'</p><p class="versionHP"><b>Horsepower: </b>'+data.engine.horsepower+' HP</p><p class="versionTQ"><b>Torque: </b>'+data.engine.torque+'</p><p class="versionVL"><b>Valves: </b>'+carValves+'</p><p class="versionCL"><b>Cylinders: </b>'+data.engine.cylinder+'</p><p class="versionCF"><b>Configuration: </b>'+data.engine.configuration+'</p><p class="versionTP"><b>Type: </b>'+data.engine.type+'</p><p class="versionCP"><b>Compressor: </b>'+data.engine.compressorType+'</p></div></div>');
                        // $allVersionDetails.append('<div class="modelDetailsWrap clearfix"><div class="modelDetails"><p class="versionName">'+ data.name +'</p><p class="versionDisplacement">'+data.engine.displacement+' CC, '+data.transmission.numberOfSpeeds+' Speed '+data.transmission.transmissionType+'</p></div><div class="modelPrice"><span>$'+ data.price.baseMSRP +'</span></div></div>');
                        pricelist.push(data.price.baseMSRP)
                      });

            });
         
         // var p = [35,2,65,7,8,9,12,121,33,99];
         // Array.prototype.min = function() {
         //   return Math.min.apply(null, this);
         // };
         // console.log(pricelist.min());
         // console.log(p.min())
         // console.log(pricelist)

            //get image of car model
            var endPoint3 = "/v1/api/vehiclephoto/service/findphotosbystyleid?styleId="+hiddenStyle,
               options3 =  standardParams,
               postURL = protoCall + host + endPoint3  + options3 + "&callback=?";
               jQuery.getJSON(postURL,
                   function(data) {
                     var imagelist=[];
                     jQuery.each(data,function(){
                        if(this.shotTypeAbbreviation=="FQ"){
                        photourl=this.photoSrcs;
                        jQuery.each(photourl, function(i,url){
                           var match1600 = url.substr(url.length-8);
                           var match500 = url.substr(url.length-7);
                           if(match1600=="1600.jpg"){
                              // console.log(url);
                              imagelist.push(url)
                                }
                                
                        });
                     }
                        
                        
                     });


                     // console.log(imagelist);

                    if(imagelist!=''){
                     $modelImage.append('<img src="http://media.ed.edmunds-media.com'+imagelist[0]+'"/>');
                     }
                     if(imagelist==''){
                      $modelImage.append('<img src="http://autocartusa.com/wp-content/uploads/2016/12/noimg.png" class="noImage"/>');
                     }
                     
                   });


               
       });




   // var endPoint2 = "/api/vehicle/v2/styles/"+style+"?view=full",
   //    options2 =  standardParams,
   //    postURL = protoCall + host + endPoint2  + options2;
   //    jQuery.getJSON(postURL,
   //        function(data) {
   //          console.log(data);
   //          $showdiv.append('<p class="makeName"><b>Make: </b>'+ make +'</p>');
   //          $showdiv.append('<p class="modelName"><b>Model: </b>'+ model +'</p>');
   //          $showdiv.append('<p class="engineName"><b>Engine: </b>'+ data.engine.name +'</p>');
   //          $showdiv.append('<p class="cylinder"><b>Cylinders: </b>'+ data.engine.cylinder +'</p>');
   //          $showdiv.append('<p class="displacement"><b>Displacement: </b>'+ data.engine.displacement +' CC</p>');
   //          $showdiv.append('<p class="transmission"><b>Transmission: </b>'+ data.transmission.numberOfSpeeds +' Speed '+ data.transmission.transmissionType +'</p>');
   //          $showdiv.append('<p class="cylinder"><b>Cylinders: </b>'+ data.engine.cylinder +'</p>');
   //          $showdiv.append('<p class="cylinder"><b>Price: </b> $'+ data.price.baseMSRP +'</p>');
   //        });



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
   postURL = protoCall + host + endPoint + "?" + options + "&callback=?";
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
     postURL = protoCall + host + endPoint + "?" + options + "&callback=?";

     
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
         postURL = protoCall + host + endPoint + "?" +  options + "&callback=?";
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
         postURL = protoCall + host + endPoint + "?" +  options + "&callback=?";
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
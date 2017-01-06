<?php
/**
 * Template Name: locateadealer
  */

get_header(); ?>

<?php
   $make=$_REQUEST['make'];
   $zipcode=$_REQUEST['zipcode'];
?>

<div class="locateDealerBlock">
  <div class="clearfix" id="main">
    <div class="contentFull contentFullLD" id="content">
        <h1 id="topHeading">Find Car Dealers <span class="italic">Closest To You</span></h1>
        <h3 id="subHeading">The dealer locater will give you a list of new car and used car dealers around you. <br />Take a 
look at the competitive prices that they have to offer and make your choices accordingly</h3>
       
        
        <!--input Form Details to display year/make/model in dropdown -->
        <div class="locateSearch">
       <div class="selectFormWrapper2">
            <form method="GET" action="<?php echo home_url( '/locateadealer/' ); ?>" id="formMain">
                <span class="select-wrapper">
                    <select id="ajMakes2" name="make" class="custom-select4">
                    <option>Select Make</option>
                    </select>
                    <span class='holder holder4'></span>
                </span>
                <input type="text" name="zipcode" class="zipCode" placeholder="Zip Code">
                <input type="submit" value="Search" id="selectSearch" class="zipSearchBtn">
            </form>
        </div>
        </div>
        
        
        
        
    </div><!--End topWrapper-->

       
  </div>

  

  
</div>


<div class="container clearfix">
<div class="dealerHeadWrap"></div>
  
  <div class="dealerDetails clearfix">
  </div>
</div>

<div id="mylightbox" class="lightbox" style="width:400px;max-width:100%;"><?php echo do_shortcode( '[contact-form-7 id="262" title="Check Availability"]' ); ?></div>


<!-- .content-area -->

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
 var $makeSelect = jQuery('#ajMakes2');

 // lets bind some events on document.ready.
 jQuery(function(){
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
             // loop the makes... each make contains model... add the make in make drop down and models in model dd
             jQuery.each(data.makes, function(i, val) {
                  make = data.makes[i];
                  $makeSelect.append('<option value="' + make.niceName + '">' + make.name + '</option>');
                  
                  // jQuery.each(make.models, function(x, val){   
                  //      model = make.models[x];
                //   $modelSelect.append('<option make="' + make.niceName +'" value="' + model.niceName + '">' + model.name + '</option>');                 
                  // });
             });
        });
}

//GET DEALER DATA FROM URL PARAMETERS
function getQueryString(field, url) {
    var href = url ? url : window.location.href;
    var reg = new RegExp('[?&]' + field + '=([^&#]*)', 'i');
    var string = reg.exec(href);
    return string ? string[1] : '';
}

var $dealerDetails=jQuery('.dealerDetails');
var $dealerHeader=jQuery('.dealerHeadWrap');

var newmake=getQueryString("make");
var zipcode=getQueryString("zipcode");
// console.log(make+" "+zipcode);

jQuery(window).load(function() {
  // console.log(newmake);
  if(newmake!=''){
    jQuery("html, body").animate({ scrollTop: 500 }, 800);
  }
});


var endPoint1 = "/api/dealer/v2/dealers?zipcode=" + zipcode + "&make=" + newmake ,
view1 = "basic",
standardParams1 = "&fmt=" + fmt +  "&api_key=" + apiKey,
options1 = "view=" + view1 + standardParams1,
postURL1 = protoCall + host + endPoint1 + "&" +  options1 + "&callback=?";
// console.log(postURL1);

jQuery.getJSON(postURL1,
  function(data) {

    
    



    //get dealer details with edmunds api
    jQuery.each(data.dealers, function(i, val) {
      $dealerDetails.css('padding','20px 0');
      // console.log(data.dealers[i]);
      dealer=data.dealers[i];

      dealerPhone="NA";
      dealerEmail="NA";
      dealerWebsite="NA";

      if(dealer.hasOwnProperty('contactInfo')){
        if(dealer.contactInfo.hasOwnProperty('phone')){
          dealerPhone=dealer.contactInfo.phone;
        }

        if(dealer.contactInfo.hasOwnProperty('gpContactEmail')){
          dealerEmail=dealer.contactInfo.gpContactEmail;
        }

        if(dealer.contactInfo.hasOwnProperty('website')){
          dealerWebsite='<a href="'+dealer.contactInfo.website+'" target="_blank">'+dealer.contactInfo.website+'</a>';
          ;
        }
      }
      // debugger;
      $dealerDetails.append('<div class="dealerWrap"><div class="dealerContent"><h2 class="dealerName">'+dealer.name+'</h2><p class="dealerAddress"><b>Address : </b>'+dealer.address.street+', '+dealer.address.city+', '+dealer.address.zipcode+'</p><p class="dealerContactNo"><b>Phone : </b>'+dealerPhone+'</p><p class="dealerEmail"><b>Email : </b>'+dealerEmail+'</p><p class="dealerWebsite"><b>Website : </b>'+dealerWebsite+'</p><div class="getQuoteWrap clearfix"><a href="#" data-featherlight="#mylightbox" class="getQuoteButton caBtn">Check Availability</a></div></div></div>');
      
    });
// debugger;
    // jQuery('.caBtn').addClass('fancybox-inline');
    // debugger;
    // jQuery('.fancybox-inline').html(jQuery('.caBtn').size());

    //get city from zip
    var client = new XMLHttpRequest();
    client.open("GET", "http://api.zippopotam.us/us/"+zipcode, true);
    client.onreadystatechange = function() {
      if(client.readyState == 4) {
        var jdata = client.responseText;
        var obj = JSON.parse(jdata);
        var cityname=obj['places'][0]["place name"];
        var statename=obj['places'][0]["state"];
        var updatedMakeName=(newmake).replace(/\-/g, " ");
        $dealerHeader.append('<h4 class="dealerheader">Here Are Car Dealers for '+updatedMakeName+' in '+ cityname +', '+statename+'</h4>');
      };
    };

    client.send();

});



</script>




<?php get_footer(); ?>
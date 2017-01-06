<?php
/**
 * Template Name: newcarsearch2
  */

get_header(); ?>

<?php
	$make=$_REQUEST['AuMkNm'];
	$model=$_REQUEST['AuMdNm'];
	$year=$_REQUEST['AuYr'];
?>
<div class="adBannerWrap"> <img src="http://mcdwameyag/autoCartUSA/wp-content/themes/autoCartUSA/images/adbanner1.jpg" alt=""></div>
<div class="NCSearchResults">
	<h2 class="modelName"><?php echo $make." ".$model; ?></h2>
</div>

<div class="carResultsContainer container clearfix">
	<div class="leftSide">
		<div class="modelShortDesc clearfix">

			<div class="modelImage" id="modelImage"></div>
			<div class="versions">
				<h4>Versions</h4>
				<div class="versionList clearfix">
					
				</div>
			</div>
		</div>

		<div class="allVersionDetails clearfix">
			<h4>Details for all versions</h4>
		</div>
	</div><!--end leftSide-->

	<div class="rightSide">
		<div class="ad300x250">
           <img src="http://mcdwameyag/autoCartUSA/wp-content/themes/autoCartUSA/images/ad300x250.jpg">
        </div>
	</div>
	
</div><!--end modelDetailsWrap-->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
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

	// var style=getQueryString("AuSt");
	var year=getQueryString("AuYr");
	var hiddenStyle=getQueryString("AuStHd");

	



    var endPoint1 = "/api/vehicle/v2/" + make + "/" + model + "/" + year + "/styles",
    view = "basic",
    options1 = "view=" + view + standardParams,
    postURL = protoCall + host + endPoint1 + "?" +  options1;
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
	      			postURL = protoCall + host + endPoint2  + options2;
	      			jQuery.getJSON(postURL,
	      			    function(data) {
	      			    	// console.log(data.price.baseMSRP)
	      			    	
	      			    	// $versionList.append('<p class="versionName">'+ data.name +'</p><p class="versionPrice">$'+ data.price.baseMSRP +'</p>');
	      			    	$versionList.append('<div class="modelDetailsWrap clearfix"><div class="modelDetails"><p class="versionName">'+ data.name +'</p><p class="versionDisplacement">'+data.engine.displacement+' CC, '+data.transmission.numberOfSpeeds+' Speed '+data.transmission.transmissionType+'</p></div><div class="modelPrice"><span>$'+ data.price.baseMSRP +'</span></div></div>');
	      			    	// $allVersionDetails.append('<div class="one_fourth_details"><div class="detailsIN"><p class="versionName innerVN">'+ data.name +'</p><p class="versionCC"><b>Displacement:</b> '+data.engine.displacement+' CC</p><p class="versionHP"><b>Horsepower: </b>'+data.engine.horsepower+' HP</p><p class="versionTQ"><b>Torque: </b>'+data.engine.torque+'</p><p class="versionVL"><b>Valves: </b>'+data.engine.totalValves+'</p><p class="versionCL"><b>Cylinders: </b>'+data.engine.cylinder+'</p><p class="versionCF"><b>Configuration: </b>'+data.engine.configuration+'</p><p class="versionTP"><b>Type: </b>'+data.engine.type+'</p><p class="versionCP"><b>Compressor: </b>'+data.engine.compressorType+'</p></div></div>');
	      			    	$allVersionDetails.append('<div class="one_fourth_details"><div class="detailsIN"><p class="versionName innerVN">'+ data.name +'</p><p class="versionCC"><b>Displacement:</b> '+data.engine.displacement+' CC</p><p class="versionHP"><b>Horsepower: </b>'+data.engine.horsepower+' HP</p><p class="versionTQ"><b>Torque: </b>'+data.engine.torque+'</p><p class="versionVL"><b>Valves: </b>'+data.engine.totalValves+'</p><p class="versionCL"><b>Cylinders: </b>'+data.engine.cylinder+'</p><p class="versionCF"><b>Configuration: </b>'+data.engine.configuration+'</p><p class="versionTP"><b>Type: </b>'+data.engine.type+'</p><p class="versionCP"><b>Compressor: </b>'+data.engine.compressorType+'</p></div></div>');
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
      			postURL = protoCall + host + endPoint3  + options3;
      			jQuery.getJSON(postURL,
      			    function(data) {
      			    	var imagelist=[];
      			    	$.each(data,function(){
      			    		if(this.shotTypeAbbreviation=="FQ"){
	  			    			photourl=this.photoSrcs;
	  			    			$.each(photourl, function(i,url){
	  			    				var match1600 = url.substr(url.length-8);
	  			    				var match500 = url.substr(url.length-7);
	  			    				if(match1600=="1600.jpg"){
	  			    					// console.log(url);
	  			    					imagelist.push(url)
	      			    	        }
	      			    	        
	  			    			});
	  			    		}
      			    		
      			    		
      			    	});

      			    	$modelImage.append('<img src="http://media.ed.edmunds-media.com'+imagelist[0]+'"/>');
      			    	// console.log(imagelist)
      			    });


      			
	    });




	// var endPoint2 = "/api/vehicle/v2/styles/"+style+"?view=full",
	// 	options2 =  standardParams,
	// 	postURL = protoCall + host + endPoint2  + options2;
	// 	jQuery.getJSON(postURL,
	// 	    function(data) {
	// 	    	console.log(data);
	// 	    	$showdiv.append('<p class="makeName"><b>Make: </b>'+ make +'</p>');
	// 	    	$showdiv.append('<p class="modelName"><b>Model: </b>'+ model +'</p>');
	// 	    	$showdiv.append('<p class="engineName"><b>Engine: </b>'+ data.engine.name +'</p>');
	// 	    	$showdiv.append('<p class="cylinder"><b>Cylinders: </b>'+ data.engine.cylinder +'</p>');
	// 	    	$showdiv.append('<p class="displacement"><b>Displacement: </b>'+ data.engine.displacement +' CC</p>');
	// 	    	$showdiv.append('<p class="transmission"><b>Transmission: </b>'+ data.transmission.numberOfSpeeds +' Speed '+ data.transmission.transmissionType +'</p>');
	// 	    	$showdiv.append('<p class="cylinder"><b>Cylinders: </b>'+ data.engine.cylinder +'</p>');
	// 	    	$showdiv.append('<p class="cylinder"><b>Price: </b> $'+ data.price.baseMSRP +'</p>');
	// 	    });


	
</script>

<?php get_footer(); ?>
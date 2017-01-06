<?php
/**
 * Template Name: Auto Insurance
  */

get_header(); ?>

<?php
   $make=$_REQUEST['make'];
   $zipcode=$_REQUEST['zipcode'];
?>

<div class="autoinsurance">
  <div class="clearfix" id="main">
    <div class="contentFull" id="content">
      <h1 id="topHeading">Auto <span class="italic">Insurance</span></h1>
      <h3 id="subHeading">Get Free Auto Insurance Quotes</h3>

      <!--input Form Details to display year/make/model in dropdown -->
      <!-- <div class="locateSearch clearfix">
        <div class="selectFormWrapper2">
          <form method="GET" action="#" id="formMain">
            <input type="text" name="zipcode" class="zipCode" placeholder="Enter Your Zip Code">
            <input type="submit" value="Get Quotes" id="selectSearch" class="zipSearchBtn">
          </form>
        </div>
      </div> -->

      <h4 class="supersubHeading">Compare quotes from multiple providers to get best rates</h4>
    </div><!--End topWrapper-->
  </div>
</div>

<div class="container clearfix comContainer">
  <div class="newCarContWrap clearfix">
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
     <div class="leftPanel">
        <div class="leftBlock clearfix">
        <!-- <h2>Get Auto Insurance Quotes</h2> -->
           <?php echo do_shortcode( '[contact-form-7 id="348" title="NEW CARS"]' ); ?>
           <script type="text/javascript">
             jQuery.get("http://ipinfo.io", function (response) {
              jQuery("#quoteZip").val(response.postal);
              }, "jsonp");
           </script>
        </div>
     </div>
  </div>
</div>

<div class="container clearfix autoMid">
  <p>Auto Insurance is not only a requirement of law but also your responsibility towards your car. <br> It is a form of protection for your car and the people in it.</p>

  <div class="clearfix">
    <div class="dealerWrap">
      <div class="insContent">
        <h3 class="insTitle">Free Quotes</h3>
        <img src="<?php bloginfo('template_directory'); ?>/images/fq.jpg" alt="Free Quotes" class="insImg">
        <div class="insText">Get the benefit of online comparison of free quotes of the best insurance carriers in the industry</div>
      </div>
    </div>
    <div class="dealerWrap">
      <div class="insContent">
        <h3 class="insTitle">Simple Process</h3>
        <img src="<?php bloginfo('template_directory'); ?>/images/sp.jpg" alt="Simple Process" class="insImg">
        <div class="insText">Auto insurance is just a few clicks away with our simplified process. Enter your zip code and contact information to get insurance</div>
      </div>
    </div>
    <div class="dealerWrap">
      <div class="insContent">
        <h3 class="insTitle">Quick Result</h3>
        <img src="<?php bloginfo('template_directory'); ?>/images/qr.jpg" alt="Quick Result" class="insImg">
        <div class="insText">Get quotes from only the best, no hassles or spam fast and reliable outcome.</div>
      </div>
    </div>
  </div>

  <p>We can help you find coverage through one of our partners. <br> Here are the best auto insurance companies in the industry for you to pick from:</p>

  <div class="mobileads">
    <script id="mNCC" language="javascript">
      medianet_width = "300";
      medianet_height = "500";
      medianet_crid = "423573177";
      medianet_versionId = "111299"; 
      medianet_chnm=" "; // Used to specify the channel name
      (function() {
          var isSSL = 'https:' == document.location.protocol;
          var mnSrc = (isSSL ? 'https:' : 'http:') + '//contextual.media.net/nmedianet.js?cid=8CUR089T9' + (isSSL ? '&https=1' : '');
          document.write('<scr' + 'ipt type="text/javascript" id="mNSC" src="' + mnSrc + '"></scr' + 'ipt>');
      })();
    </script>
  </div>

  <ul class="clearfix insKeyWrapper">
    <li class="insKeyWrap keyBig firstKey">
      <a href="https://www.allstate.com/auto-insurance.aspx" target="_blank">All State Insurance</a>
    </li>
    <li class="insKeyWrap keyBig hideRight">
      <a href="https://www.libertymutual.com/auto" target="_blank">Liberty Mutual</a>
    </li>
    <li class="insKeyWrap">
      <a href="https://www.statefarm.com/insurance/auto" target="_blank">State Farm</a>
    </li>
    <li class="insKeyWrap lastKey">
      <a href="https://www.progressive.com/auto/" target="_blank">Progressive</a>
    </li>
    <li class="insKeyWrap firstKey">
      <a href="https://www.thehartford.com/aarp/car-insurance" target="_blank">The Hartford</a>
    </li>
    <li class="insKeyWrap hideRight">
      <a href="https://www.usaa.com/inet/pages/auto_insurance_main" target="_blank">USAA</a>
    </li>
    <li class="insKeyWrap">
      <a href="https://www.amica.com/en/products/auto-insurance.html" target="_blank">Amica</a>
    </li>
    <li class="insKeyWrap lastKey">
      <a href="https://www.geico.com/" target="_blank">Geico</a>
    </li>
  </ul>



  



</div>



<!-- .content-area -->


<?php get_footer(); ?>

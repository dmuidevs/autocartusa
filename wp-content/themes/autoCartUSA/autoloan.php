<?php
/**
 * Template Name: Auto Loan
  */

get_header(); ?>

<?php
   $make=$_REQUEST['make'];
   $zipcode=$_REQUEST['zipcode'];
?>

<div class="autoinsurance autoloan">
  <div class="clearfix" id="main">
    <div class="contentFull" id="content">
      <h1 id="topHeading">Auto <span class="italic">Loan</span></h1>
      <h3 id="subHeading">Compare Auto Loan Quotes to Get Best Rates</h3>

      <!--input Form Details to display year/make/model in dropdown -->
      <!-- <div class="locateSearch clearfix">
        <div class="selectFormWrapper2">
          <form method="GET" action="#" id="formMain">
            <input type="text" name="zipcode" class="zipCode" placeholder="Enter Your Zip Code">
            <input type="submit" value="Get Quotes" id="selectSearch" class="zipSearchBtn">
          </form>
        </div>
      </div> -->
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
        <!-- <h2>Get Auto Loan Quotes</h2> -->
           <?php echo do_shortcode( '[contact-form-7 id="381" title="auto loan"]' ); ?>
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
  <p>An Auto Loan is very important when you are buying a car. <br>It is important to list the pros and cons of every option before choosing the right one. <br>There are many factors that go into choosing the right option. 3 Main factors are:</p>

  <div class="clearfix ALMidBlock">
    <div class="dealerWrap">
      <div class="insContent alCont">
        <div class="alImgWrap" id="aldp">
        </div>
        <h3 class="insTitle">Down Payment</h3>
      </div>
    </div>
    <div class="dealerWrap">
      <div class="insContent">
        <div class="alImgWrap" id="alia"></div>
        <h3 class="insTitle">Installment Amount</h3>
      </div>
    </div>
    <div class="dealerWrap">
      <div class="insContent alCont">
        <div class="alImgWrap" id="allp"></div>
        <h3 class="insTitle">Loan Provider</h3>
      </div>
    </div>
  </div>

  <!-- EMI Calculator Widget START --><script src="http://emicalculator.net/widget/2.0/js/emicalc-loader.min.js" type="text/javascript"></script><div id="ecww-widgetwrapper" style="min-width:250px;width:100%;"><div id="ecww-widget" style="position:relative;padding-top:0;padding-bottom:280px;height:0;overflow:hidden;"></div><div id="ecww-more" style="background:#333;font:normal 13px/1 Helvetica, Arial, Verdana, Sans-serif;padding:10px 0;color:#FFF;text-align:center;width:100%;clear:both;margin:0;clear:both;float:left;"><a style="background:#333;color:#FFF;text-decoration:none;border-bottom:1px dotted #ccc;" href="http://emicalculator.net/" title="Loan EMI Calculator" rel="nofollow" target="_blank">emicalculator.net</a></div></div><!-- EMI Calculator Widget END -->

  <p>Today, you can also get auto loans online in a few clicks. <br>You get the benefits of online comparisons, competitive interest rates and much more. <br>Here are the best auto loan companies in the industry for you to pick from :</p>


  <div class="mobileads">
      <script id="mNCC" language="javascript">
          medianet_width = "300";
          medianet_height = "500";
          medianet_crid = "604427655";
          medianet_versionId = "111299"; 
          medianet_chnm=" "; // Used to specify the channel name
          (function() {
              var isSSL = 'https:' == document.location.protocol;
              var mnSrc = (isSSL ? 'https:' : 'http:') + '//contextual.media.net/nmedianet.js?cid=8CUR089T9' + (isSSL ? '&https=1' : '');
              document.write('<scr' + 'ipt type="text/javascript" id="mNSC" src="' + mnSrc + '"></scr' + 'ipt>');
          })();
      </script>
  </div>
  
  <ul class="clearfix insKeyWrapper autoLoanKeyWrapper">
    <li class="insKeyWrap firstKey">
      <a href="http://www.carsdirect.com/auto-loans/" target="_blank">CarsDirect</a>
    </li>
    <li class="insKeyWrap hideRight">
      <a href="https://www.myautoloan.com/myautoloan-home.html" target="_blank">MyAutoLoan</a>
    </li>
    <li class="insKeyWrap">
      <a href="https://www.usbank.com/loans-lines/auto-loans/index.aspx" target="_blank">US Bank</a>
    </li>
    <li class="insKeyWrap lastKey">
      <a href="https://www.lightstream.com/new-auto-loans" target="_blank">Lightstream</a>
    </li>
    <li class="insKeyWrap firstKey">
      <a href="https://www.bankofamerica.com/auto-loans/" target="_blank">BOA</a>
    </li>
    <li class="insKeyWrap keyBig hideRight">
      <a href="https://www.autocreditexpress.com/" target="_blank">Auto Credit Express</a>
    </li>
    <li class="insKeyWrap">
      <a href="https://www.capitalone.com/auto-financing/" target="_blank">Capital One</a>
    </li>
    <li class="insKeyWrap lastKey">
      <a href="https://roadloans.com/car-loans" target="_blank">RoadLoans</a>
    </li>
  </ul>


  



</div>



<!-- .content-area -->


<?php get_footer(); ?>

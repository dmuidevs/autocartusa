<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 */
?>

      <div class="footerWrap" id="footerHeight">
        <div class="footer clearfix">
            <div class="socialBlock">
                <div class="fLogo"></div>
                <div class="social clearfix">
                    <a href="https://twitter.com/AutocartUsa" target="_blank" title="Twitter" class="twitt"></a>
                    <a href="https://www.facebook.com/AutoCart-USA-692733374236702/" target="_blank" title="Facebook" class="fb"></a>
                    <a href="https://www.instagram.com/autocartusa_official/" target="_blank" title="Instagram" class="instagram"></a>
                    <!--<a href="#" class="goog"></a>
                    <a href="#" class="video margRNone"></a>-->
                </div> 
                <div class="fSearch">
                    <form>
                        <input type="search" placeholder="Search" name="search" class="fSearchBox">
                        <input type="submit" value="" class="fsearchBtn">
                    </form>
                </div>
                <a href="http://www.edmunds.com/?id=apis" class="edmundslogo" target="_blank"></a>

            </div>
            <div class="fLinksBlock">
                <h2>COMPANY</h2>
                <ul>
                    <!-- <li><a href="aboutUs.html">About Us</a></li> -->
                    <li><a href="<?php echo get_option('home'); ?>/news/" target="_blank">News</a></li>
                    <li><a href="<?php echo get_option('home'); ?>/fraudawareness/" target="_blank">Fraud Awareness</a></li>
                    <!-- <li><a href="sitemap.html">Sitemap</a></li> -->
                    <li><a href="<?php echo get_option('home'); ?>/contact-us/" target="_blank">Contact Us</a></li>
                </ul>
            </div>
            <div class="fLinksBlock">
                <h2>SERVICES</h2>
                <ul>
                    <li><a href="<?php echo get_option('home'); ?>/newcars/" target="_blank">New Cars</a></li>
                    <li><a href="<?php echo get_option('home'); ?>/usedcars/" target="_blank">Used Cars</a></li>
                    <li><a href="<?php echo get_option('home'); ?>/locateadealer/" target="_blank">Locate A Dealer</a></li>
                    <li><a href="<?php echo get_option('home'); ?>/carfinancing/" target="_blank">Car Financing</a></li>
                    <li><a href="<?php echo get_option('home'); ?>/autoloan/" target="_blank">Auto Loan</a></li>
                    <li><a href="<?php echo get_option('home'); ?>/autoinsurance/" target="_blank">Auto Insurance</a></li>
                </ul>
            </div>
            <div class="fAdWrap">
                <div class="desktopads">
                <script id="mNCC" language="javascript">
                medianet_width = "300";
                medianet_height = "250";
                medianet_crid = "232815058";
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
        </div>
    </div>

    <div class="subFooter">
        <div class="subFooterIn clearfix">
            <div class="copyright">&#169; AutoCart USA, All rights reserved</div>
            <div class="privacyMenuWrap">
                <ul>
                    <li class="brdrNone"><a href="<?php echo get_option('home'); ?>/privacy/">Privacy Policy</a></li>
                    <li class="noMargin"><a href="<?php echo get_option('home'); ?>/terms/">Terms Of Use</a></li>
                </ul>
            </div>
        </div>
    </div>
 
<!--[if !IE]> -->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
<!-- <![endif]-->

<!--[if lte IE 9]>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<![endif]-->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/common.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/owl.carousel.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/featherlight.js" type="text/javascript" charset="utf-8"></script>


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-89348538-1', 'auto');
  ga('send', 'pageview');

</script>

<?php wp_footer(); ?>

</body>
</html>

<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <?php wp_head(); ?>
    <meta name="Description" content="Buying new and used cars made easy. Locate car dealers near you, calculate monthly payments, articles and other tools to help you in the process of buying a car.">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/images/favIco.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,600i,700,700i" rel="stylesheet"> 
    <!--[if lt IE 9]>
    <script src="<?php //echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
    <![endif]-->
    
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/owl.carousel.css" type="text/css" />
    <link href="<?php bloginfo('template_directory'); ?>/css/featherlight.css" type="text/css" rel="stylesheet" />
<!--EDMUNDS TMV WIDGET STYLES-->
<link rel="stylesheet" href="http://widgets.edmunds.com/css/tmv/simple-light.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>

<style>.tmvwidget{-webkit-border-radius:0px;-moz-border-radius:0px;border-radius:0px;border-width:1px;width:466px;}.tmvwidget .tmvwidget-header{-webkit-border-top-right-radius:0px;-moz-border-radius-topright:0px;border-top-right-radius:0px;-webkit-border-top-left-radius:0px;-moz-border-radius-topleft:0px;border-top-left-radius:0px;}
</style>
<!--EDMUNDS TMV WIDGET STYLES-->



<!--[if lte IE 10]>
<style>
.UsedCarWrap .usedcarForm2 .formlabel{display: none !important;}
.ContactWrap .formlabel{display:none !important}
.ContactWrap .wpcf7 select{background:none !important}
.FinancingWrap .financeForm2 .formlabel{display: none !important;}
</style>
<![endif]-->

<!--[if lte IE 8]>
<style>
.UsedCarWrap .usedcarForm2 input[type="text"]{width: 150px;}   
.UsedCarWrap .usedcarForm2 INPUT[type='button']{width:140px;}
.slider LI{margin: 0 25px; width:310px}
.ContactWrap .column-half{width:45% !important;}
.ContactWrap .wpcf7 INPUT[type='button']{padding:10px 20px}
.FinancingWrap .column-twothird{width:190px !important;}
.FinancingWrap .financeForm input[type="text"]{width: 120px}
.FinancingWrap .financeForm INPUT[type='button']{padding:10px;width: 120px}
.FinancingWrap .financeForm2 input[type="text"]{width: 100px !important}
.NCSearchResults{background-position:center top}
.newCarBlock{background-position:center top}
.insKeyWrap a{border:1px solid #e6e6e6;width:113px;font-size:17px}
#ecww-widgetwrapper{display:none}
</style>
<![endif]-->
<!--[if lte IE 7]>
<style>
.ContactWrap .column-half{width:45% !important;}
.ContactWrap .wpcf7 select{height:45px !important; background-image:none  !important}
.ContactWrap .wpcf7 INPUT[type='text']{width:165px}
.UsedCarWrap .usedcarForm2 input[type="text"]{padding:13px 15px 12px}
.UsedCarWrap .usedcarForm2 INPUT[type='button']{padding:10px 30px}
.ContactWrap .wpcf7 select{height:47px !important; background-image:none  !important; zoom: 1;}
.ContactWrap .wpcf7 INPUT[type='text']{width:165px}
.FinancingWrap .financeForm input[type="text"]{width: 100px}
.FinancingWrap .financeForm INPUT[type='button']{padding:10px;width: 120px}
.FinancingWrap .financeForm2  input[type='button']{padding:12px 10px 12px !important;width:140px}
.newCarContainer .leftPanel .carTypes li{float:left}
.SearchContainer{width:auto}
.searchbox-input{line-height:41px}
.modelDetailsWrap{overflow:hidden}
.getQuoteWrap{width:100%}
.one_fourth_details{width:33%}
.newCarContainer .carTypes LI{float:left}
.UsedCarWrap .usedcarForm2 INPUT[type='submit']{padding:10px 30px}
.featherlight .featherlight-content{width:400px;overflow:hidden}
.getQuoteMain INPUT[type='text']{width:auto}
.quoteLeft{margin-bottom:10px;float:none;margin-right:0}
.autoMid{padding-bottom:20px}
</style>
<![endif]-->


</head>

<body <?php body_class(); ?>>
<div class="mainWrap">
   
     <header class="clearfix">
        <div class="headerIn clearfix">
            <h1 class="logo">
                <a href="<?php echo get_option('home'); ?>" title="autocartusa.com">
                    <img class="sLogo1" src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="autocartusa.com"/>
                </a>
            </h1>
            <div class="mobnavbtn"><a id="nav-toggle"  href="javascript:void(0);"><span></span></a></div>
            <nav>            
                <div id="nav">
                    <?php wp_nav_menu( array( 'menu' => 'top-menu' ) ); ?>
                </div>  


                <div class="SearchContainer">
                    <form role="search" method="get" id="searchform" class="searchbox" action="<?php echo home_url( '/' ); ?>">
                        <input type="search" placeholder="Search Here" name="search" class="searchbox-input" value="<?php echo trim( get_search_query() ); ?>" onkeyup="buttonUp();" required>
                        <input name="searchsubmit" id="searchsubmit" value="" type="submit" class="searchbox-submit" />
                        <span class="searchbox-icon"></span>
                    </form>
                </div>
                <div class="mobNav" id="mobNav">
                    <?php wp_nav_menu( array( 'menu' => 'mob-menu' ) ); ?>
                    <div class="searchBoxN">
                        <form>
                            <input type="text" class="searTxt" placeholder="Search..">
                            <input type="submit" value="" class="searBtn">
                        </form>
                    </div>
                </div>
                
                
            </nav>
        </div>
    </header>
    <div id="menu_overlay"></div>

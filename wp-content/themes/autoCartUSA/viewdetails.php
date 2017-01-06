<?php
/**
 * Template Name: View Details
  */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta name="title" content="Auto Cart USA - autocartusa.com - New Cars, Used Cars, Car Finance, Car Dealers">
    <meta name="Description" content="Buying new and used cars made easy. Locate car dealers near you, calculate monthly payments, articles and other tools to help you in the process of buying a car.">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <title>Auto Cart USA - autocartusa.com - New Cars, Used Cars, Car Finance, Car Dealers</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/images/favIco.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,600i,700,700i" rel="stylesheet"> 
    <!--[if lt IE 9]>
    <script src="<?php //echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
    <![endif]-->
    
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />


</head>

<body <?php body_class(); ?>>

    <div class="mainwrap">
        <header class="clearfix">
            <div class="headerIn clearfix">
                <h1 class="logo">
                    <a href="<?php echo get_option('home'); ?>" title="autocartusa.com">
                        <img class="sLogo1" src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="autocartusa.com"/>
                    </a>
                </h1>
            </div>
        </header>


        <div class="container dataDetails">
            <div class="clearfix">
                <h1>Search Cars - Get Quote</h1>
                <?php echo do_shortcode('[cfdb-datatable form="Get quote" hide="Submitted Login"]'); ?>

                <h1>Used Cars - Get Quote</h1>
                <?php echo do_shortcode('[cfdb-datatable form="Get quote used cars" hide="Submitted Login"]'); ?>

                <h1>New Cars - Get Quote</h1>
                <?php echo do_shortcode('[cfdb-datatable form="NEW CARS" hide="Submitted Login"]'); ?>

                <h1>Used Cars - VIN Lookup</h1>
                <?php echo do_shortcode('[cfdb-datatable form="VIN lookup" hide="Submitted Login"]'); ?>

                <h1>Locate A Dealer - Check Availibility</h1>
                <?php echo do_shortcode('[cfdb-datatable form="Check Availability" hide="Submitted Login"]'); ?>
            </div>
        </div>
    </div>
</body>
</html>
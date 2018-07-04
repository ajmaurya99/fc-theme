<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <meta name="theme-color" content="#311b92"/>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <meta name="author" content="Flying Cursor"/>
    <meta property="og:type" content="website"/>

    <?php
    if (isset($_GET['src'])) {
        $get = $_GET['src'];
    } else {
        $get = "website";
    }
    ?>

    <!-- Twitter Share -->
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:card" content="website"/>
    <meta name="twitter:site" content="@The_Spool"/>
    <meta name="twitter:creator" content="@flyingcursor"/>


    <link rel="apple-touch-icon" sizes="180x180"
          href="<?php bloginfo('stylesheet_directory'); ?>/images/favicons/apple-touch-icon.png"/>
    <link rel="icon" type="image/png"
          href="<?php bloginfo('stylesheet_directory'); ?>/images/favicons/favicon-32x32.png" sizes="32x32"/>
    <link rel="icon" type="image/png"
          href="<?php bloginfo('stylesheet_directory'); ?>/images/favicons/favicon-16x16.png" sizes="16x16"/>
    <link rel="manifest" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicons/manifest.json"/>
    <meta name="theme-color" content="#ffffff"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          type="text/css"/>

    <?php wp_head(); ?>

    <?php if ($_SERVER['HTTP_HOST'] === "thespool.in" || $_SERVER['HTTP_HOST'] === "www.thespool.in") { ?>
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                        (i[r].q = i[r].q || []).push(arguments)
                    }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-50915476-4', 'auto');
            ga('send', 'pageview');
            ga('send', 'event', '<?php echo $get; ?>', 'Media');
        </script>

        <!-- Facebook Pixel Code -->
        <script>
            !function (f, b, e, v, n, t, s) {
                if (f.fbq)return;
                n = f.fbq = function () {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq)f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '120087271876344');
            fbq('track', 'PageView');
        </script>
        <noscript>
            <img height="1" width="1"
                 src="https://www.facebook.com/tr?id=120087271876344&ev=PageView
&noscript=1"/>
        </noscript>
        <!-- End Facebook Pixel Code -->
    <?php } ?>


</head>
<?php if ($_SERVER['HTTP_HOST'] === "thespool.in" || $_SERVER['HTTP_HOST'] === "www.thespool.in") { ?>
    <script>
        fbq('track', 'ViewContent', {
            visited: 1,
        });
    </script>
<?php } ?>

<body <?php body_class(); ?>>
<div id="page" class="site container-fluid">
    <div class="row">
        <a class="skip-link screen-reader-text" href="#content">
            <?php esc_html_e('Skip to content', 'the-spool'); ?></a>
        <nav class="navbar  navbar-fixed-top main-menu">
            <div class="container">
                <div class="row add-nav-padding">
                    <div class="col-xs-4">
                        <div class="navbar-expand" id="toggle">
                            <span class="top"></span>
                            <span class="middle"></span>
                            <span class="bottom"></span>
                        </div>

                        <div class="overlay" id="overlay">
                            <?php
                            $facebook_url = get_option('facebook_url');
                            $twitter_url = get_option('twitter_url');
                            $instagram_url = get_option('instagram_url');
                            $footer_text = get_option('footer_text');
                            ?>
                            <nav class="overlay-menu">
                                <ul>
                                    <li><a href="<?php bloginfo('url'); ?>" title="The Spool">Home</a></li>
                                    <li><a href="<?php bloginfo('url'); ?>/about" title="About The Spool">About
                                            Spool</a></li>
                                    <!--                                    <li><a href="#">All Interviews</a></li>-->
                                    <li><a href="<?php bloginfo('url'); ?>/contact" title="Contact The Spool">Get In
                                            Touch</a></li>
                                    <li>
                                        <ul class="social-menu">
                                            <li><a href="<?php echo $facebook_url; ?>" target="_blank"
                                                   title="Facebook The Spool"><i
                                                        class="fa fa-facebook" aria-hidden="true"
                                                        aria-label="Facebook"></i></a></li>
                                            <li><a href="<?php echo $twitter_url; ?>" target="_blank"
                                                   title="Twitter The Spool"><i
                                                        class="fa fa-twitter" aria-hidden="true"
                                                        aria-label="Twitter"></i></a></li>
                                            <li><a href="<?php echo $instagram_url; ?>" target="_blank"
                                                   title="Instagram The Spool"><i
                                                        class="fa fa-instagram" aria-hidden="true"
                                                        aria-label="Instagram"></i></a></li>
                                            <!--  <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true" aria-label="You Tube"></i></a></li> -->
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <h1 class="heading logo">
                            <?php
                            $pri_logo_id = get_theme_mod('custom_logo');
                            $pri_logo = wp_get_attachment_image_src($pri_logo_id, 'full');
                            ?>
                            <?php if ($pri_logo || $sec_logo): ?>
                                <a rel="home" href="
                                     <?php bloginfo('url'); ?>" title="The Spool">
                                    <img src="
                            <?php echo $pri_logo[0]; ?>"
                                         class="site-logo" title="The Spool">
                                </a>
                            <?php endif; ?>
                        </h1>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <div class="row">
                            <div class="col-xs-6">

                            </div>
                            <div class="col-xs-6">
                                <div class="fontsizes">
                                    <span id="incfont">+</span>
                                    <span id="deffont">A</span>
                                    <span id="decfont">-</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <?php
        /* <header id="masthead" class="site-header" role="banner">

        <nav id="site-navigation" class="main-navigation" role="navigation">
            <button class="menu-toggle" aria-controls="primary-menu"
                    aria-expanded="false"><?php esc_html_e('Primary Menu', 'the-spool'); ?></button>
            <?php wp_nav_menu(array('theme_location' => 'menu-1', 'menu_id' => 'primary-menu')); ?>
        </nav><!-- #site-navigation -->
    </header><!-- #masthead -->
        */ ?>

        <div id="content" class="site-content">

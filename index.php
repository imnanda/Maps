<?php
include 'proses/db_connect.php'
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Aviators - byaviators.com">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="assets/img/lg.png.png" type="image/png">
    <link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="assets/css/bootstrap-responsive.css" type="text/css">
    <link rel="stylesheet" href="assets/libraries/chosen/chosen.css" type="text/css">
    <link rel="stylesheet" href="assets/libraries/bootstrap-fileupload/bootstrap-fileupload.css" type="text/css">
    <link rel="stylesheet"
          href="assets/libraries/jquery-ui-1.10.2.custom/css/ui-lightness/jquery-ui-1.10.2.custom.min.css"
          type="text/css">
    <link rel="stylesheet" href="assets/css/realia-blue.css" type="text/css" id="color-variant-default">
    <link rel="stylesheet" href="#" type="text/css" id="color-variant">

    <title>Di Bandung Barat</title>

    <script type="javascript">

    </script>
</head>
<body>
<div id="wrapper-outer">
<div id="wrapper">
<div id="wrapper-inner">
<!-- BREADCRUMB -->

<!-- /.breadcrumb-wrapper -->

<!-- HEADER -->
<div id="header-wrapper">
    <div id="header">
        <div id="header-inner">
            <div class="container">
                <div class="navbar">
                    <div class="navbar-inner">
                        <div class="row">
                            <div class="logo-wrapper span4">
                                <a href="#nav" class="hidden-desktop" id="btn-nav">Toggle navigation</a>

                                <div class="logo">
                                    <a href="index.php" title="Home">
                                        <img src="assets/img/lg.png" alt="Home">
                                    </a>
                                </div>
                                <!-- /.logo -->

                                <div class="site-name">
                                    <a href="/" title="Home" class="brand">Dispenda</a>
                                </div>
                                <!-- /.site-name -->

                                <div class="site-slogan">
                                    <span>Perdagangan <br>Indonesia</span>
                                </div>
                                <!-- /.site-slogan -->
                            </div>

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.navbar-inner -->
                </div>
                <!-- /.navbar -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#header-inner -->
    </div>
    <!-- /#header -->
</div>
<!-- /#header-wrapper -->

<!-- NAVIGATION -->
<?php
include "nav.html";
?>
<!-- /.navigation -->

<!-- CONTENT -->
<div id="content">
<div class="map-wrapper">
    <div class="map">
        <div id="map" class="map-inner"></div>
        <!-- /.map-inner -->

        <div class="container">
            <div class="row">
                <div class="span3">
                    <div class="property-filter pull-right">
                        <div class="content">
                            <form method="get" action="proses/daftar_usaha.php" id="search_map">
                                <div class="location control-group">
                                    <label class="control-label" for="kecamatan">
                                        Pilih Kecamatan
                                    </label>

                                    <div class="controls">
                                        <select id="kecamatan" name="id_kecamatan">
                                            <?php
                                            $res = mysql_query("SELECT idKecamatan, namaKecamatan FROM kecamatan ORDER BY namaKecamatan");
                                            if ($res === false) {
                                                die(mysql_error());
                                            }
                                            $i = 1;
                                            while ($data = mysql_fetch_array($res)) {
                                                ?>
                                                <option value="<?php echo $data['idKecamatan']; ?>">
													<?php echo $data['namaKecamatan']; ?>
                                                </option>
                                                <?php
                                                $i++;
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- /.controls -->
                                </div>
                                <!-- /.control-group -->

                                <div class="type control-group">
                                    <label class="control-label" for="kelurahan">
                                        Pilih Kelurahan
                                    </label>

                                    <div class="controls">
                                        <select id="kelurahan" name="id_kelurahan">
											<option value="">Pilih Kecamatan</option>
                                            <?php
                                            $res = mysql_query("SELECT * FROM kelurahan ORDER BY namaKelurahan");
                                            if ($res === false) {
                                                die(mysql_error());
                                            }
                                            $i = 1;
                                            while ($data = mysql_fetch_array($res)) {
                                                ?>
                                                <option value="<?php echo $data['idKelurahan']; ?>" class="<?php echo $data['idKecamatan']; ?>">
													<?php echo $data['namaKelurahan']; ?>
                                                </option>
                                                <?php
                                                $i++;
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- /.controls -->
                                </div>

                                <div class="form-actions">
                                    <input type="submit" value="Cari" class="btn btn-primary btn-large">
                                </div>
                                <!-- /.form-actions -->
                            </form>
                        </div>
                        <!-- /.content -->
                    </div>
                    <!-- /.property-filter -->
                </div>
                <!-- /.span3 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.map -->
</div>
<!-- /.map-wrapper -->
<div class="container">
    <div id="main">
        <h2 class="page-header">Theme features</h2>

        <div class="bottom-wrapper">
            <div class="bottom container">
                <div class="bottom-inner row">
                    <div class="item span4">
                        <div class="address decoration"></div>
                        <h2><a>List your property</a></h2>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla accumsan dui ac nunc imperdiet
                            rhoncus. Aenean vitae imperdiet lectus</p>
                        <a href="#" class="btn btn-primary">Read more</a>
                    </div>
                    <!-- /.item -->

                    <div class="item span4">
                        <div class="gps decoration"></div>
                        <h2><a>Advertise rentals</a></h2>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla accumsan dui ac nunc imperdiet
                            rhoncus. Aenean vitae imperdiet lectus</p>
                        <a href="#" class="btn btn-primary">Read more</a>
                    </div>
                    <!-- /.item -->

                    <div class="item span4">
                        <div class="key decoration"></div>
                        <h2><a>Guidance</a></h2>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla accumsan dui ac nunc imperdiet
                            rhoncus. Aenean vitae imperdiet lectus</p>
                        <a href="#" class="btn btn-primary">Read more</a>
                    </div>
                    <!-- /.item -->
                </div>
                <!-- /.bottom-inner -->
            </div>
            <!-- /.bottom -->
        </div>
        <div class="features">

            <h2 class="page-header">Theme features</h2>

            <div class="row">
                <div class="item span4">
                    <div class="row">
                        <div class="icon span1">
                            <img src="assets/img/icons/features-seo.png" alt="">
                        </div>
                        <!-- /.icon -->

                        <div class="text span3">
                            <h3>SEO Ready</h3>

                            <p>Realia is ready to put your website on higher ranks. Every line of code was developed
                                with SEO
                                principles in mind.</p>
                        </div>
                        <!-- /.logo -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.item -->

                <div class="item span4">
                    <div class="row">
                        <div class="icon span1">
                            <img src="assets/img/icons/features-retina.png" alt="">
                        </div>
                        <!-- /.icon -->

                        <div class="text span3">
                            <h3>Retina Ready</h3>

                            <p>Realia looks great even on Retina and high-resoultion displays. Every graphic element is
                                sharp
                                and clean. No blurry images anymore!</p>
                        </div>
                        <!-- /.logo -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.item -->

                <div class="item span4">
                    <div class="row">
                        <div class="icon span1">
                            <img src="assets/img/icons/features-custom-widgets.png" alt="">
                        </div>
                        <!-- /.icon -->

                        <div class="text span3">
                            <h3>Custom Widgets</h3>

                            <p>Realia provides custom developed widgets to fulfil requirements of good real estate
                                application.</p>
                        </div>
                        <!-- /.logo -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.item -->
            </div>
            <div class="row">
                <div class="item span4">
                    <div class="row">
                        <div class="icon span1">
                            <img src="assets/img/icons/features-bootstrap.png" alt="">
                        </div>
                        <!-- /.icon -->

                        <div class="text span3">
                            <h3>Prepared for Bootstrap</h3>

                            <p>Developer friendly code based on Bootstrap and SASS makes your own customizations really
                                easy.</p>
                        </div>
                        <!-- /.logo -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.item -->

                <div class="item span4">
                    <div class="row">
                        <div class="icon span1">
                            <img src="assets/img/icons/features-pencil.png" alt="">
                        </div>
                        <!-- /.icon -->

                        <div class="text span3">
                            <h3>Frontend Submission</h3>

                            <p>Make the portal solution from your real estate by providing property submission on
                                homepage.</p>
                        </div>
                        <!-- /.logo -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.item -->

                <div class="item span4">
                    <div class="row">
                        <div class="icon span1">
                            <img src="assets/img/icons/features-responsive.png" alt="">
                        </div>
                        <!-- /.icon -->

                        <div class="text span3">
                            <h3>Responsive</h3>

                            <p>Realia is ready to put your website on higher ranks. Every line of code was developed
                                with SEO
                                principles in mind.</p>
                        </div>
                        <!-- /.logo -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.item -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.features -->    </div>
</div>


</div>
<!-- /#content -->
</div>
<!-- /#wrapper-inner -->

<div id="footer-wrapper">
<div id="footer-top">
    <div id="footer-top-inner" class="container">
        <div class="row">
            <div class="widget properties span3">
                <div class="title">
                    <h2>Most Recent</h2>
                </div>
                <!-- /.title -->

                <div class="content">
                    <div class="property">
                        <div class="image">
                            <a href="detail.html"></a>
                            <img src="assets/img/tmp/property-small-1.png" alt="">
                        </div>
                        <!-- /.image -->
                        <div class="wrapper">
                            <div class="title">
                                <h3>
                                    <a href="detail.html">27523 Pacific Coast</a>
                                </h3>
                            </div>
                            <!-- /.title -->
                            <div class="location">Palo Alto CA</div>
                            <!-- /.location -->
                            <div class="price">€2 300 000</div>
                            <!-- /.price -->
                        </div>
                        <!-- /.wrapper -->
                    </div>
                    <!-- /.property -->

                    <div class="property">
                        <div class="image">
                            <a href="detail.html"></a>
                            <img src="assets/img/tmp/property-small-2.png" alt="">
                        </div>
                        <!-- /.image -->
                        <div class="wrapper">
                            <div class="title">
                                <h3>
                                    <a href="detail.html">27523 Pacific Coast</a>
                                </h3>
                            </div>
                            <!-- /.title -->
                            <div class="location">Palo Alto CA</div>
                            <!-- /.location -->
                            <div class="price">€2 300 000</div>
                            <!-- /.price -->
                        </div>
                        <!-- /.wrapper -->
                    </div>
                    <!-- /.property -->

                    <div class="property">
                        <div class="image">
                            <a href="detail.html"></a>
                            <img src="assets/img/tmp/property-small-3.png" alt="">
                        </div>
                        <!-- /.image -->
                        <div class="wrapper">
                            <div class="title">
                                <h3>
                                    <a href="detail.html">27523 Pacific Coast</a>
                                </h3>
                            </div>
                            <!-- /.title -->
                            <div class="location">Palo Alto CA</div>
                            <!-- /.location -->
                            <div class="price">€2 300 000</div>
                            <!-- /.price -->
                        </div>
                        <!-- /.wrapper -->
                    </div>
                    <!-- /.property -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.properties-small -->

            <div class="widget span3">
                <div class="title">
                    <h2>Contact us</h2>
                </div>

                <!-- /.title -->

                <div class="content">
                    <table class="contact">
                        <tbody>
                        <tr>
                            <th class="address">Address:</th>
                            <td>1900 Pico Blvd<br>Santa Monica, CA 90405<br>United States<br></td>
                        </tr>
                        <tr>
                            <th class="phone">Phone:</th>
                            <td>+48 123 456 789</td>
                        </tr>
                        <tr>
                            <th class="email">E-mail:</th>
                            <td><a href="mailto:info@yourcompany.com">info@example.com</a></td>
                        </tr>
                        <tr>
                            <th class="skype">Skype:</th>
                            <td>your.company</td>
                        </tr>
                        <tr>
                            <th class="gps">GPS:</th>
                            <td>34.016811<br>-118.469009</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.content -->
            </div>
            <!-- /.widget -->

            <div class="widget span3">
                <div class="title">
                    <h2 class="block-title">Useful links</h2>
                </div>
                <!-- /.title -->

                <div class="content">
                    <ul class="menu nav">
                        <li class="first leaf"><a href="404.html">404 page</a></li>
                        <li class="leaf"><a href="about-us.html">About us</a></li>
                        <li class="leaf"><a href="contact-us.html">Contact us</a></li>
                        <li class="leaf"><a href="faq.html">FAQ</a></li>
                        <li class="leaf"><a href="grid-system.html">Grid system</a></li>
                        <li class="leaf"><a href="our-agents.html">Our agents</a></li>
                        <li class="last leaf"><a href="typography.html">Typography</a></li>
                    </ul>
                </div>
                <!-- /.content -->
            </div>
            <!-- /.widget -->

            <div class="widget span3">
                <div class="title">
                    <h2 class="block-title">Say hello!</h2>
                </div>
                <!-- /.title -->

                <div class="content">
                    <form method="post">
                        <div class="control-group">
                            <label class="control-label" for="inputName">
                                Name
                                <span class="form-required" title="This field is required.">*</span>
                            </label>

                            <div class="controls">
                                <input type="text" id="inputName">
                            </div>
                            <!-- /.controls -->
                        </div>
                        <!-- /.control-group -->

                        <div class="control-group">
                            <label class="control-label" for="inputEmail">
                                Email
                                <span class="form-required" title="This field is required.">*</span>
                            </label>

                            <div class="controls">
                                <input type="text" id="inputEmail">
                            </div>
                            <!-- /.controls -->
                        </div>
                        <!-- /.control-group -->

                        <div class="control-group">
                            <label class="control-label" for="inputMessage">
                                Message
                                <span class="form-required" title="This field is required.">*</span>
                            </label>

                            <div class="controls">
                                <textarea id="inputMessage"></textarea>
                            </div>
                            <!-- /.controls -->
                        </div>
                        <!-- /.control-group -->

                        <div class="form-actions">
                            <input type="submit" class="btn btn-primary arrow-right" value="Send">
                        </div>
                        <!-- /.form-actions -->
                    </form>
                </div>
                <!-- /.content -->
            </div>
            <!-- /.widget -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#footer-top-inner -->
</div>
<!-- /#footer-top -->

<div id="footer" class="footer container">
    <div id="footer-inner">
        <div class="row">
            <div class="span6 copyright">
                <p>© Copyright 2013 by <a href="http://themes.byaviators.com">Aviators</a>. All rights reserved.</p>
            </div>
            <!-- /.copyright -->

            <div class="span6 share">
                <div class="content">
                    <ul class="menu nav">
                        <li class="first leaf"><a href="http://www.facebook.com" class="facebook">Facebook</a></li>
                        <li class="leaf"><a href="http://flickr.net" class="flickr">Flickr</a></li>
                        <li class="leaf"><a href="http://plus.google.com" class="google">Google+</a></li>
                        <li class="leaf"><a href="http://www.linkedin.com" class="linkedin">LinkedIn</a></li>
                        <li class="leaf"><a href="http://www.twitter.com" class="twitter">Twitter</a></li>
                        <li class="last leaf"><a href="http://www.vimeo.com" class="vimeo">Vimeo</a></li>
                    </ul>
                </div>
                <!-- /.content -->
            </div>
            <!-- /.span6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#footer-inner -->
</div>
<!-- /#footer -->
</div>
<!-- /#footer-wrapper -->
</div>
<!-- /#wrapper -->
</div>
<!-- /#wrapper-outer -->

<div class="palette">
    <div class="toggle">
        <a href="#">Toggle</a>
    </div>
    <!-- /.toggle -->

    <div class="inner">
        <div class="headers">
            <h2>Header styles</h2>
            <ul>
                <li><a class="header-light">Light</a></li>
                <li><a class="header-normal">Normal</a></li>
                <li><a class="header-dark">Dark</a></li>
            </ul>
        </div>
        <!-- /.headers -->

        <div class="patterns">
            <h2>Background patterns</h2>
            <ul>
                <li><a class="pattern-cloth-alike">cloth-alike</a></li>
                <li><a class="pattern-corrugation">corrugation</a></li>
                <li><a class="pattern-diagonal-noise">diagonal-noise</a></li>
                <li><a class="pattern-dust">dust</a></li>
                <li><a class="pattern-fabric-plaid">fabric-plaid</a></li>
                <li><a class="pattern-farmer">farmer</a></li>
                <li><a class="pattern-grid-noise">grid-noise</a></li>
                <li><a class="pattern-lghtmesh">lghtmesh</a></li>
                <li><a class="pattern-pw-maze-white">pw-maze-white</a></li>
                <li><a class="pattern-none">none</a></li>
            </ul>
        </div>

        <div class="colors">
            <h2>Color variants</h2>
            <ul>
                <li><a href="assets/css/realia-red.css" class="red">Red</a></li>
                <li><a href="assets/css/realia-magenta.css" class="magenta">Magenta</a></li>
                <li><a href="assets/css/realia-brown.css" class="brown">Brown</a></li>
                <li><a href="assets/css/realia-orange.css" class="orange">Orange</a></li>
                <li><a href="assets/css/realia-brown-dark.css" class="brown-dark">Brown dark</a></li>

                <li><a href="assets/css/realia-gray-red.css" class="gray-red">Gray Red</a></li>
                <li><a href="assets/css/realia-gray-magenta.css" class="gray-magenta">Gray Magenta</a></li>
                <li><a href="assets/css/realia-gray-brown.css" class="gray-brown">Gray Brown</a></li>
                <li><a href="assets/css/realia-gray-orange.css" class="gray-orange">Gray Orange</a></li>
                <li><a href="assets/css/realia-gray-brown-dark.css" class="gray-brown-dark">Gray Brown dark</a></li>

                <li><a href="assets/css/realia-green-light.css" class="green-light">Green light</a></li>
                <li><a href="assets/css/realia-green.css" class="green">Green</a></li>
                <li><a href="assets/css/realia-turquiose.css" class="turquiose">Turquiose</a></li>
                <li><a href="assets/css/realia-blue.css" class="blue">Blue</a></li>
                <li><a href="assets/css/realia-violet.css" class="violet">Violet</a></li>

                <li><a href="assets/css/realia-gray-green-light.css" class="gray-green-light">Gray Green light</a></li>
                <li><a href="assets/css/realia-gray-green.css" class="gray-green">Gray Green</a></li>
                <li><a href="assets/css/realia-gray-turquiose.css" class="gray-turquiose">Gray Turquiose</a></li>
                <li><a href="assets/css/realia-gray-blue.css" class="gray-blue">Gray Blue</a></li>
                <li><a href="assets/css/realia-gray-violet.css" class="gray-violet">Gray Violet</a></li>
            </ul>
        </div>
        <!-- /.colors -->

        <a href="#" class="btn btn-primary reset">Reset default</a>
    </div>
    <!-- /.inner -->
</div>
<!-- /.palette -->

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=true"></script>
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/jquery.ezmark.js"></script>
<script type="text/javascript" src="assets/js/jquery.currency.js"></script>
<script type="text/javascript" src="assets/js/jquery.cookie.js"></script>
<script type="text/javascript" src="assets/js/retina.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/carousel.js"></script>
<script type="text/javascript" src="assets/js/gmap3.min.js"></script>
<script type="text/javascript" src="assets/js/gmap3.infobox.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.chained.js"></script>
<script type="text/javascript" src="assets/libraries/jquery-ui-1.10.2.custom/js/jquery-ui-1.10.2.custom.min.js"></script>
<script type="text/javascript" src="assets/libraries/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript" src="assets/libraries/iosslider/_src/jquery.iosslider.min.js"></script>
<script type="text/javascript" src="assets/libraries/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="assets/js/realia.js"></script>
<script type="text/javascript" src="assets/js/maps.js"></script>
<script>
$(function() {
	loadUsaha('proses/daftar_usaha.php');
});
</script>
</html>

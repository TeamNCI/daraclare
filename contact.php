<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- SEO -->
    <title>DaraClare: UX Designer &amp; Frontend Developer</title>
    <meta name="description" content="Dara Clare, UX designer and frontend developer" />
    <meta name="keywords" content="UX Designer, UI Designer, Frontend Developer, Front End Developer, Designer, Dublin, CSS, HTML, Development, Frontend, Responsive, Developer" />
    
    <link href="favicon.png" rel="icon" type="image/png" />
    
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,700%7cBitter:400,700' rel='stylesheet' type='text/css'>
    <!-- Bootstrap 3.1.0 -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <!-- Flexslider 2 -->
    <link href="css/flexslider.css" rel="stylesheet" />
    <!-- venobox -->
    <link href="css/venobox.css" rel="stylesheet">
    <!-- ionicons font -->
    <link href="css/ionicons.min.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/color/blue.css" rel="stylesheet" />
  </head>
  <body>
    
    <div class="main-wrapper">
      <header>
        <div class="container">
          <div class="row">

            <div id="logo-region" class="logo col-md-3 text-center-sm">
              <a href="index.html"><img src="logo.svg" alt="logo" class="img-responsive" /></a>
            </div> <!-- /logo-region -->

            <div id="menu-region" class="col-md-9">
              <nav class="navbar daraclare-main-menu" role="navigation">
                <!-- Menu button for mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">MENU</button>
                </div>
            
                <!-- Navigation links -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                  <ul class="nav navbar-right navbar-nav">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="portfolio.html">Portfolio</a></li>
                      <li><a href="blog">Blog</a></li>
                    <li class="active"><a href="contact.php">Contact</a></li>
                  </ul>
                </div> <!-- /navbar-collapse -->
              </nav>
            </div> <!-- /menu-region -->

          </div> <!-- /row -->
        </div> <!-- container -->
      </header>

      <div id="top-content-region" class="top-content region-0 padding-top-15 padding-bottom-15 block-15 bg-color-grayLight1">
        <div class="container">
          <div class="row">

            <div id="top-content-left-region" class="top-content-left col-xs-12 col-md-6 text-center-sm">
              <div class="region">

                <div id="page-title-block" class="page-title block">
                  <h1>Contact</h1>
                </div> <!-- /page-title-block -->

              </div> <!-- /region -->
            </div> <!-- /top-content-left-region -->

            <!-- /top-content-right-region -->

          </div> <!-- /row -->
        </div> <!-- /container -->
      </div> <!-- /top-content-region -->

      <div id="content-region" class="content region">

        <div id="contacts-block" class="contacts block">
          <div class="container">
            <div class="row">

              <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-2">
                <h5>Address</h5>
                <p>Dublin, Ireland</p>
              </div>

              <div class="col-xs-12 col-sm-6 col-md-4 margin-top-xs-40">
                <h5>Contact Me</h5>
                <p>Phone: <a href="tel:+353876394884">+353 87 639 4884</a><br>Email:<a href="mailto:daraclare@gmail.com"> daraclare@gmail.com</a></p>
              </div>

            </div> <!-- /row -->
          </div> <!-- /container -->
        </div> <!-- /contacts-block -->
        
        <div id="contact-content-block" class="contact-content block">
          <div class="container">
            <div class="row">

              <div class="col-xs-12 col-md-8 col-md-offset-2">
                
                <?php  

                  if (isset($_POST['submit'])) {

                    if ($_POST['contact-name'] != "") {
                      $_POST['contact-name'] = filter_var($_POST['contact-name'], FILTER_SANITIZE_STRING);
                      if ($_POST['contact-name'] == "") {
                        $errors .= 'Please enter a valid name.<br><br>';
                      }
                    } else {
                      $errors .= 'Please enter your name.<br>';
                    }

                    if ($_POST['contact-email'] != "") {
                      $email = filter_var($_POST['contact-email'], FILTER_SANITIZE_EMAIL);
                      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $errors .= "$email is <strong>NOT</strong> a valid email address.<br><br>";
                      }
                    } else {
                      $errors .= 'Please enter your email address.<br>';
                    } 

                    if ($_POST['contact-subject'] != "") {
                      $_POST['contact-subject'] = filter_var($_POST['contact-subject'], FILTER_SANITIZE_STRING);
                      if ($_POST['contact-subject'] == "") {
                        $errors .= 'Please enter a subject.<br>';
                      }
                    } else {
                      $errors .= 'Please enter a subject.<br>';
                    }

                    if ($_POST['contact-message'] != "") {
                      $_POST['contact-message'] = filter_var($_POST['contact-message'], FILTER_SANITIZE_STRING);
                      if ($_POST['contact-message'] == "") {
                        $errors .= 'Please enter a message to send.<br>';
                      }
                    } else {
                      $errors .= 'Please enter a message to send.<br>';
                    }

                    if (!$errors) {
                      $mail_to = 'daraclare@gmail.com';
                      $subject = "DaraClare.com Website Form" . $_POST['contact-subject'];
                      $message  = 'From: ' . $_POST['contact-name'] . "<br>";
                      $message .= 'Email: ' . $email . "<br><br>";
                      $message .= "Message:<br>" . stripslashes($_POST['contact-message']) . "<br><br>";
                      $header = "From:" . $email . "\r\n" . "MIME-Version: 1.0\r\n" . "Content-Type: text/html; charset=UTF-8";
                      mail($mail_to, $subject, $message, $header) or die("Error!");
                    ?>
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Success!</strong> Thank you for your email.
                      </div>
                    <?php 
                    } else {
                    ?>
                      <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Error!</strong><br /> <?php echo $errors; ?>
                      </div>
                    <?php
                    }
                  }

                ?>
              
                <form class="form-horizontal" method="post" role="form">
                  <div class="form-group">
                    <div class="col-md-6 margin-bottom-sm-20">
                      <input type="text" class="form-control" id="contact-name" name="contact-name" placeholder="Name" />
                    </div> <!-- /col-md-6 -->
                    <div class="col-md-6">
                      <input type="email" class="form-control" id="contact-email" name="contact-email" placeholder="Email" />
                    </div> <!-- /col-md-6 -->
                  </div> <!-- /form-group -->
                  
                  <div class="form-group">
                    <div class="col-xs-12">
                      <input type="text" class="form-control" id="contact-subject" name="contact-subject" placeholder="Subject" />
                    </div> <!-- /col-xs-12 -->
                  </div> <!-- /form-group -->
                  
                  <div class="form-group">
                    <div class="col-xs-12">
                      <textarea class="form-control" rows="8" id="contact-message" name="contact-message" placeholder="Message"></textarea>
                    </div> <!-- /col-xs-12 -->
                  </div> <!-- /form-group -->
                  
                  <div class="form-group">
                    <div class="col-xs-12">
                      <input type="submit" class="btn btn-primary btn-sm" id="submit" name="submit" value="Send" />
                    </div> <!-- /col-xs-12 -->
                  </div> <!-- /form-group -->
                </form>

              </div> <!-- /col-xs-12 -->

            </div> <!-- /row -->
          </div> <!-- /container -->
        </div> <!-- /contact-content-block -->

      </div> <!-- /content-region -->

    

      <div id="content-3-region" class="content-3 region bg-color-theme text-color-light">

        <div id="call-to-action-1-block" class="call-to-action-1 block">
          <div class="container">
            <div class="row">

              <div class="col-xs-12 text-center">
                <h3 class="call-to-action-1-text">Interested in web design and development?</h3>
                <a href="blog" class="call-to-action-1-button btn btn-default">Read my blog</a>
              </div>

            </div> <!-- /row -->
          </div> <!-- /container -->
        </div> <!-- /call-to-action-1-block -->

      </div> <!-- /content-3-region -->

      <div id="footer-columns-region" class="footer-columns region-30 block-30 bg-color-grayDark2 text-color-light">
        <div class="container">
          <div class="row">

            <div id="footer-first-column-region" class="footer-first-column col-xs-12 col-md-4 text-center">
              <div class="region">

                <div id="footer-address-block" class="footer-address block">
                  <i class="icon ion-ios7-location-outline size-32 margin-bottom-20"></i>
                  <p>Dublin, Ireland</p>
                </div> <!-- /footer-address-block -->

              </div> <!-- /region -->
            </div> <!-- /footer-first-column-region -->

            <div id="footer-second-column-region" class="footer-second-column col-xs-12 col-md-4 text-center">
              <div class="region">

                <div id="footer-mail-block" class="footer-mail block">
                  <i class="icon ion-ios7-email-outline size-32 margin-bottom-20"></i>
                  <p><a href="mailto:daraclare@gmail.com">daraclare@gmail.com</a></p>
                </div> <!-- /footer-mail-block -->

              </div> <!-- /region -->
            </div>  <!-- /footer-second-column-region -->

            <div id="footer-third-column-region" class="footer-third-column col-xs-12 col-md-4 text-center">
              <div class="region">

                <div id="footer-phone-block" class="footer-phone block">
                  <i class="icon ion-ios7-telephone-outline size-32 margin-bottom-20"></i>
                  <p><a href="tel:0876394884">087 639 4884</a>
                </div> <!-- /footer-phone-block -->

              </div> <!-- /region -->
            </div>  <!-- /footer-third-column-region -->

          </div> <!-- /row -->
        </div> <!-- /container -->
      </div> <!-- /footer-columns-region -->

      <footer class="region-10 block-10 bg-color-grayDark1 text-color-light">
        <div class="container">
          <div class="row">

            <div id="footer-left-region" class="footer-left region-bottom-sm-0 col-xs-12 col-md-6 text-center-sm">
              <div class="region">

                <div id="copyright-block" class="block">
                  <p>Created by Dara Clare | Copyright &copy; 2015</p>
                </div> <!-- /copyright-block -->

              </div> <!-- /region -->
            </div> <!-- /footer-left-region -->

            <div id="footer-right-region" class="footer-right region-top-sm-0 col-xs-12 col-md-6 text-right text-center-sm">
              <div class="region">

                <div id="social-networks-footer-block" class="social-networks-footer block">
                  <a href="http://www.facebook.com/GraphicDesignDublin"><i class="icon ion-social-facebook"></i></a>
                  <a href="https://twitter.com/GraphicDD"><i class="icon ion-social-twitter"></i></a>
                  <a href="http://github.com/daraclare"><i class="icon ion-social-github"></i></a>
                </div> <!-- /social-networks-footer -->

              </div> <!-- /region -->
            </div> <!-- /footer-right-region -->

          </div> <!-- /row -->
        </div> <!-- /container -->
      </footer>
    </div> <!-- /main-wrapper -->

    

    <!-- Back to top button -->
    
    <div id="back-to-top">
      <i class="ion-ios7-arrow-up"></i>
    </div>

    <!-- End of Back to top button -->
    
    <!-- jQuery 1.10.2 -->
    <script src="js/jquery-1.10.2.min.js"></script>
    <!-- jQuery Plugins -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.flexverticalcenter.js"></script>
    <script src="js/jquery.flexslider-min.js"></script>
    <script src="js/retina-1.1.0.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.mixitup.min.js"></script>
    <script src="js/venobox.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="js/app.js"></script>
    <!-- Demo Switcher -->
    <script src="js/demo-switcher.js"></script>
  </body>
</html>
<!DOCTYPE html>

<?php include("settings.php"); ?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo SVRNAME; ?> - Error</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="server-offline-top">The server is offline. It will be back soon! See below for details.</div>
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo SVRNAME; ?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Home (Coming Soon)</a></li>
            <li><a href="index.php">Server</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- BANNER START -->
    <div class="banner-head">
      <h1><?php echo SVRNAME; ?></h1>
      <h3><?php echo SVRSLOGAN; ?></h3>
    </div>
    <!-- BANNER END -->

    <!-- MAIN ERROR SECTION START -->
      <div class="page-section-server-error">
        <h1>Sorry, something went wrong!</h1>
        <br>
        <p>Looks like our server is offline or there's a fault we don't know about. Check back soon.</p>
      </div>
    <!-- MAIN ERROR SECTION END -->

    <!-- MAIN ERROR SECTION START -->
      <div class="page-section-white-title">
        <h1>Information</h1>
        <br>
        <p>
          <?php
            date_default_timezone_set("Australia/Melbourne"); // Change to your timezone. Supported timezones: http://php.net/manual/en/timezones.php
            echo "<b>Time(AEDT):</b> " . date("h:i:sa");

            echo "<br><br><b>Date:</b> " . date("d/m/y") . "<br><br>";

            $useragent = $_SERVER ['HTTP_USER_AGENT'];
            echo "<b>Broweser/System Information:</b> " . $useragent; 

            $started_at = microtime(true);
            echo '<br><br><b>Page Loadtime:</b> ' . (microtime(true) - $started_at) . ' seconds.'; 
          ?>
        </p>
      </div>
    <!-- MAIN ERROR SECTION END -->

    <!-- FOOTER START -->
    <br><footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="index.php">Server</a>
                        </li>
                    </ul>
                    <p id="copyright">Copyright &copy; -Servername- <?php echo date("Y"); ?>. This site was coded by <?php echo OWNER; ?>. All Rights Reserved<br><br> Server IP: <?php echo SVRIP; ?></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER END -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
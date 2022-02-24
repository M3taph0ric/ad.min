<?php
require("settings.php"); // everything must be set in that file (server IP, variables etc.)

try
{
    $rQuery = new QueryServer( $serverIP, $serverPort );

    $aInformation = $rQuery->GetInfo( );
    $aServerRules = $rQuery->GetRules( );
    $aBasicPlayer = $rQuery->GetPlayers( );
    $aTotalPlayers = $rQuery->GetDetailedPlayers( );

    $rQuery->Close( );
}
catch (QueryServerException $pError)
{
    header("Location: http://yourdomain/error.php"); // Redirects to an error page if the server is offline. Change this according to your site domain name. You can customize the error page by opening 'error.php'
}

if(isset($aInformation) && is_array($aInformation)){
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo SVRNAME; ?> - STATUS</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
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
            <li><a href="https://mgcrp.netlify.app/">Home</a></li>
            <li class="active"><a href="demo.php">Server</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- BANNER START -->
    <div class="banner-head">
      <h1><?php echo SVRNAME; ?></h1>
      <h3><?php echo SVRSLOGAN; ?></h3>
      <div class="banner-head"><img src="myLogo.png" draggable="false"></div>
    </div>
    <!-- BANNER END -->

    <!-- ABOUT START -->
    <div class="page-section-grey-title">
      <h1>Server Statistics</h1>
      <h4>View all of our server statistics here!</h4>
    </div>
    <!-- ABOUT END -->

    <!-- SERVER STATS START -->
    <div class="page-section-server-stats">
      <h2>Server Information:</h2>
      <div class="table-responsive">
        <table class="table table-striped table-bordered" style="width:700px;" align="center">
          <tr>
            <td><b>Hostname</b></td>
            <td><?php echo htmlentities($aInformation['Hostname']); ?></td>
          </tr>
          <tr>
            <td><b>Gamemode</b></td>
            <td><?php echo htmlentities($aInformation['Gamemode']); ?></td>
          </tr>
          <tr>
            <td><b>Players</b></td>
            <td><?php echo $aInformation['Players']; ?> / <?php echo $aInformation['MaxPlayers']; ?></td>
          </tr>
          <tr>
            <td><b>Map</b></td>
            <td><?php echo htmlentities($aInformation['Map']); ?></td>
          </tr>
          <tr>
            <td><b>Time</b></td>
            <td><?php echo $aServerRules['worldtime']; ?></td>
          </tr>
          <tr>
            <td><b>Version</b></td>
            <td><?php echo $aServerRules['version']; ?></td>
          </tr>
        </table>
      </div>
    <!-- SERVER STATS END -->

      <br/>

    <!-- SERVER PLAYERS START -->
      <h2>Online Players:</h2>
      <?php
        if(!is_array($aTotalPlayers) || count($aTotalPlayers) == 0){
        echo '<br /><i>No players online!</i>';
      } else {
      ?>
      <table class="table table-striped table-bordered" style="width:700px;" align="center">
        <tr>
            <td><b>Player ID</b></td>
            <td><b>Nickname</b></td>
            <td><b>Score</b></td>
        </tr>
      <?php
        foreach($aTotalPlayers AS $id => $value){
      ?>
        <tr>
            <td><?php echo $value['PlayerID']; ?></td>
            <td><?php echo htmlentities($value['Nickname']); ?></td>
            <td><?php echo $value['Score']; ?></td>
        </tr>
      <?php
        }
        echo '</table>';
        }
        }
      ?>  
    <!-- SERVER PLAYERS END -->
    </div>

    <!-- ANNOUNCEMENTS STARTS -->
    <div class="page-section-grey-title">
      <h2>Announcements:</h2>
      <div class="alert alert-success" role="alert">No server announcements. Check back soon!</div>
    </div>
    <!-- ANNOUNCEMENTS END -->

    <!-- FOOTER START -->
    <footer>
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
                    <p id="copyright">Copyright &copy; -MGCRP- <?php echo date("Y"); ?>. This site was coded by <?php echo OWNER; ?>. All Rights Reserved<br><br> Server IP: <?php echo SVRIP; ?></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER END -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

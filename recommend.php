<!DOCTYPE HTML>
<html>
<head lang="en">
    <title>Outbreak Shield</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <link rel="stylesheet" href="./scripts/custom.css">
    <link rel="stylesheet" href="./scripts/bootstrap.css">
    <link rel="stylesheet" href="./scripts/bootstrap.min.css">

    <link rel="shortcut icon" type="image/x-icon" href="images/site_icon.png" />

    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="scripts/html5shiv.min.js"></script>
      <script src="scripts/respond.min.js"></script>
    <![endif]-->
    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="scripts/stylesheet.css">
  </head>
	<body>
 <div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-static-top">
          
          <div >
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" value="ajgvd">
                <span class="sr-only">Menu</span>
                <span class="icon-bar" style="left:0px"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
                <div class="navbar-inner">
                <a class="navbar-brand" href="index.php">OutBreak Shield</a>
            </div>
              </div>
            <div id="navbar" class="navbar-collapse collapse pull-right pad10">
              <ul class="nav navbar-nav">
                <li style="font-weight:700;"><a href="#"></a></li>
            <li><a href="checkyourself.php">Test Yourself</a></li>
            <li><a href="checkyourself.php">Dengue Worldwide</a></li>
            <li><a href="new/entry.php">Report Us</a></li>
                <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">All about Dengue<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="diagnosis.php">Diagnosis</a></li>
                    <li><a href="treatment.php">Treatment</a></li>
                    <li><a href="symptoms.php">Symptoms</a></li>
                    <li><a href="buyonline.php">Buy Online Healthcare</a></li>
                    <li><a href="facts.php">Facts</a></li>
                    <li><a href="trends.php">Latest Trends</a></li>
                  </ul>
                </li>
                  
                  <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blood Donors<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="register.php">Register for donating blood</a></li>
                    <li><a href="search_donor.php">Search for a Donor</a></li>
                    
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="contactus.php">Contact Us</a></li>
                    <li><a href="#">Feedback/Suggestions</a></li>
                    </ul>
                </li>
          </ul>
            </div>
          </div>
        </nav>

    </div>
<?php
if($_SERVER["REQUEST_METHOD"]=="GET" && isset($_GET["prob"]))
{ 
  $prob=$_GET["prob"];
  if($prob==0)
  {
    $msg="Congratulations!! You are perfectly safe till now and away from the epidemic.<br>Meanwhile, You could check our <a href=\"diagnosis.php\">information page about Dengue</a>, the <a href=\"trends.php\">current trends</a>, or maybe buy a product to keep away dengue <a href=\"buyonline.php\">here.</a>";
  }
  else if($prob==1 || $prob=2)
  {
  $msg="Sorry!! But there is a probability you might suffer from dengue.<br>You could read more about dengue at our <a href=\"diagnosis.php\">information page about Dengue</a>, the <a href=\"trends.php\">current trends</a>, or maybe buy a product to keep away dengue <a href=\"buyonline.php\">here.</a>";
  }
  else if($prob==4)
  {
  $msg="Sorry!! According to our diagnosis, there is a high chance that you are suffering from dengue. You should immediaely see a doctor. You can check the nearby hospitals on the map <a href=\"new/dengueworldwide.php\">here</a>";
  }

}
else
{
  echo "<script>alert(\"You need to fill the form first before we recommend you.\"); window.location = \"checkyourself.php\";</script>";
}
?>

<div class="container">
  <div class="jumbotron">
     <?php if ($prob!=0)
     echo '<img style="float:left;" src="images/cry.png" width="90px" height="90px">';
     else
      {
        echo '<img style="float:left;" src="images/happy.png" width="90px" height="90px">';
      }?>


     <h2><?php echo $msg; ?></h2>      
     </div>
</div>

<div class="navbar navbar-fixed-bottom">
  <div class="container">
    <p class="text-muted">Copyright <a href="http://www.outbreakshield.com">OutBreak Sheild</a></p>
  </div>
</div>


	<!-- script references -->
		<script src="http://maps.googleapis.com/maps/api/js?sensor=false&extension=.js&output=embed"></script>
		<script src="./js/scripts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	</body>
</html>
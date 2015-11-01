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
            <li><a href="new/dengueworldwide.php">Dengue Worldwide</a></li>
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
require("dbconnect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $count=0;
  $possible=0;
  $age=$_POST["age"];
  $days=$_POST["before"];
  $bit=$_POST["bit"];
  if(isset($_POST["back"]))
    $count++;
  if(isset($_POST["fever"]))
    $count++;
  if(isset($_POST["head"]))
    $count++;
  if(isset($_POST["joint"]))
    $count++;
  if(isset($_POST["bleeding"]))
    $count++;
  if(isset($_POST["fluid"]))
    $count++;
  if(isset($_POST["nausea"]))
    $count++;
  if(isset($_POST["vomiting"]))
    $count++;
  if(isset($_POST["rash"]))
    $count++;
  if(isset($_POST["sudden"]))
    $count++;
  if($count>=7 && $age<=45)
    $possible=1;//might be possible
  if($count>=6 && $age>=45)
    $possible=1;//might be possible
  if($count>=8 && $age>50)
    $possible=4;//highly

  if($bit==1 && $count>=5)
    $possible=2;//likely to happen
  if($days>=14)
    $possible=0;//not possible
  header("Location:recommend.php?prob=$possible");
  exit();
}
$conn->close();
?>


<div class="row pad-30">  
  <h2 class="text-center">  Fill this form to check whether you have some chances of Dengue Occuring</h2>
  <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group">
            <label for="age"><h4>Your Age:</h4></label>
            <input type="number" class="form-control" min="1" max="130" name = "age" required>
        </div>
        <div class="form-group">
            <label for="symptom"><h4>Check any Symptoms which you have:</h4></label>
        </div>
        <div class="form-group">
          <div class="row">
          <div class="col-md-6">
            <input type="checkbox" name="back" value="back"><strong>Back Ache</strong>
          </div>
          <div class="hidden-lg hidden-md"><br></div>
          <div class="col-md-6"> 
            <input type="checkbox" name="fever" value="fever"><strong>Fever</strong> 
          </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
          <div class="col-md-6">
            <input type="checkbox" name="head" value="head"><strong>Head Ache</strong><br>
          </div>
          <div class="hidden-lg hidden-md"><br></div>
          <div class="col-md-6"> 
            <input type="checkbox" name="joint" value="joint"><strong>Muscle and Joint Pain</strong><br> 
          </div>
          </div>
        </div>
         <div class="form-group">
          <div class="row">
          <div class="col-md-6">
            <input type="checkbox" name="fluid" value="fluid"><strong>Fluid Accumulation in Chest</strong><br>
          </div>
          <div class="hidden-lg hidden-md"><br></div>
          <div class="col-md-6"> 
            <input type="checkbox" name="bleeding" value="bleeding"><strong> Bleeding</strong><br> 
          </div>
          </div>
        </div>
         <div class="form-group">
          <div class="row">
          <div class="col-md-6">
            <input type="checkbox" name="nausea" value="nausea"><strong>Nausea</strong><br>
          </div>
          <div class="hidden-lg hidden-md"><br></div>
          <div class="col-md-6"> 
            <input type="checkbox" name="vomiting" value="vomiting"><strong>Vomiting</strong><br> 
          </div>
          </div>
        </div> 
        <div class="form-group">
          <div class="row">
          <div class="col-md-6">
            <input type="checkbox" name="rash" value="rash"><strong>Rashes</strong><br>
          </div>
          <div class="hidden-lg hidden-md"><br></div>
          <div class="col-md-6"> 
            <input type="checkbox" name="sudden" value="sudden"><strong>Sudden Onset of Fever</strong><br> 
          </div>
          </div>
        </div>
        <div class="form-group">
            <label for="age"><h4>Have you ever been bitten by any serotype of Dengue Virus DEN-1, DEN2, DEN3, or DEN4?</h4></label><br>
            <input type="radio" name="bit" value="yes"><strong>Yes</strong><br><br>
            <input type="radio" name="bit" value="no"><strong>No</strong><br> <br>
        </div>
        <div class="form-group">
            <label for="before"><h4>How many days before do you suspect you were bitten(If you were out on a vacation, then how many days have passed before the symptoms were visible)?</h4></label>
            </h4></label>
            <input type="number" class="form-control" min="0" max="120" name = "before" required>
        </div>
        <button type="submit" name="submit" class="btn btn-default">Check It!</button>
    </form>
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
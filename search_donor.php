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
            <!--<li><a href="dengueworldwide.php">Dengue Worldwide</a></li>-->
             <li><a href="./new/dengueworldwide.php">Dengue Worldwide</a></li>
            <li><a href="new/entry.php">Report Us</a></li>
                <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">All about Dengue<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="diagnosis.php">Diagnosis</a></li>
                    <li><a href="treatment.php">Treatment</a></li>
                    <li><a href="symptoms.php">Symptoms</a></li>
                    <li><a href="buyonline.php">Buy Online</a></li>
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

    <div>
      <table class="table table -striped  ">
      <th>Name</th>
      <th>Age</th>
      <th>Gender</th>
      <th>Blood Group</th>
      <th>E-Mail</th>
      <th>Mobile No</th>
      <th>City</th>
      <?php
      require("dbconnect.php");
      $rs=mysqli_query($conn,"select * from  donors");
      
     foreach($rs as $row)
     {
      $name=$row['name'];
      $age=$row['age'];
      $gender=$row['gender'];
      $bg=$row['bloodgroup'];
      $email=$row['email'];
      $mobile=$row['mno'];
      $city=$row['city'];
      echo "<tr>
      <td>$name</td>
      <td>$age</td>
      <td>$gender</td>
      <td>$bg</td>
      <td>$email</td>
      <td>$mobile</td>
      <td>$city</td>
      </tr>";

     }
     
    
      ?>
      </table>
    </div>
<br>
<div class="navbar navbar-fixed-bottom">
  <div class="container">
    <p class="text-muted">Copyright <a href="http://www.outbreakshield.com">OutBreak Shield</a></p>
  </div>
</div>


	<!-- script references -->
		<script src="./js/scripts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	</body>
</html>
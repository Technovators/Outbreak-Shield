<html>
	<head>
		<title>Add Event</title>
		
		<script src="js/jquery.js"></script>
        <script src="js/jquery-ui.js"></script>
        <link rel="stylesheet" href="../scripts/custom.css">
    	<link rel="stylesheet" href="../scripts/bootstrap.css">
    	<link rel="stylesheet" href="../scripts/bootstrap.min.css">
    	<link rel="stylesheet" href="../scripts/stylesheet.css">
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
		
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
             <li><a href="dengueworldwide.php">Dengue Worldwide</a></li>
            <li><a href="entry.php">Report Us</a></li>
                <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">All about Dengue<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="../diagnosis.php">Diagnosis</a></li>
                    <li><a href="../treatment.php">Treatment</a></li>
                    <li><a href="../symptoms.php">Symptoms</a></li>
                    <li><a href="../buyonline.php">Buy Online</a></li>
                    <li><a href="../facts.php">Facts</a></li>
                    <li><a href="../trends.php">Latest Trends</a></li>
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
			if (isset($_POST["lat"]))
			{
				include_once("../config.php");

				$con = mysqli_connect($config["server"], $config["username"], $config["password"], $config["dbname"])or die(mysqli_error($con));

				$query = "INSERT INTO patients VALUES (\"".$_POST["name"]."\", \"".$_POST["age"]."\", \"".$_POST["gender"]."\", \"".$_POST["blood_group"]."\", \"".$_POST["country"]."\", \"".$_POST["city"]."\", \"".$_POST["lat"]."\", \"".$_POST["lng"]."\", \"".$_POST["diag_date"]."\");";

				mysqli_query($con, $query) or die(mysqli_error($con));

				echo '<div id="successMessage" style="color:#32cd32; text-align:center"><h1>Event Successfully Added!</h1></div>';
			}
		?>

		<h1 style="text-align:center">Add Entry</h1>

		<div class="row pad-40">
		<center>
		<div class="form-control">
			<form method="POST" id="myForm" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" >
				
					<div class="control-group">
						<label>Name</label>
						<input name="name" type="text" class="form-control" required>
					</div>

					<div class="control-group">
						<label>Age</label>
						<input name="age" type="text" class="form-control" required>
					</div>

					<div class="control-group">
						<label>Gender</label>
						<input name="gender" type="text" class="form-control" required>
					</div>

					<div class="control-group">
						<label>Blood Group</label>
						<input name="blood_group" type="text" class="form-control" required>
					</div>

					<div class="control-group">
						<label>Country</label>
						<input id="country" name="country" type="text" class="form-control" onchange="codeAddress()" required>
					</div>

					<div class="control-group">
						<label>City</label>
						<input id="city" name="city" type="text" class="form-control" onchange="codeAddress()" required>
					</div>

					<input id="lat" name="lat" type="text" class="form-control" style="display:none;">
					<input id="lng" name="lng" type="text" class="form-control"style="display:none;" >

					<div class="control-group">
						<label>Diag Date</label>
						<input name="diag_date" type="text" class="form-control">
					</div>

					<br>
					
					<div class="control-group" style="text-align:center">
						<button type="submit" class="pure-button">Add</button>
					</div>
				
			</form>
		</div>
		</div>
		</center>
		
		<script>
			function codeAddress() {
				geocoder = new google.maps.Geocoder();
				var address = document.getElementById("city").value + ", " + document.getElementById("country").value;
				geocoder.geocode( { 'address': address}, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					document.getElementById("lat").value = results[0].geometry.location.lat().toString();
					document.getElementById("lng").value = results[0].geometry.location.lng().toString();
				}
				else
					alert("Geocode was not successful for the following reason: " + status);
				});
			}
		</script>
	</body>
</html>
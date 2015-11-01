<html>
	<head>
		<title>Add Event</title>
		<link rel="stylesheet" href="../css/pure-min.css">
		<script src="js/jquery.js"></script>
        <script src="js/jquery-ui.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
		</head>
	<body>
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

		<div class="pure-u-1-6"></div>
		<div class="pure-u-2-3">
			<form method="POST" id="myForm" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" class="pure-form pure-form-aligned">
				<fieldset>
					<div class="pure-control-group">
						<label class="pure-u-1-3">Name</label>
						<input name="name" type="text" class="pure-u-2-3" required>
					</div>

					<div class="pure-control-group">
						<label class="pure-u-1-3">Age</label>
						<input name="age" type="text" class="pure-u-2-3" required>
					</div>

					<div class="pure-control-group">
						<label class="pure-u-1-3">Gender</label>
						<input name="gender" type="text" class="pure-u-2-3" required>
					</div>

					<div class="pure-control-group">
						<label class="pure-u-1-3">Blood Group</label>
						<input name="blood_group" type="text" class="pure-u-2-3" required>
					</div>

					<div class="pure-control-group">
						<label class="pure-u-1-3">Country</label>
						<input id="country" name="country" type="text" class="pure-u-2-3" onchange="codeAddress()" required>
					</div>

					<div class="pure-control-group">
						<label class="pure-u-1-3">City</label>
						<input id="city" name="city" type="text" class="pure-u-2-3" onchange="codeAddress()" required>
					</div>

					<input id="lat" name="lat" type="text" class="pure-u-2-3" hidden>
					<input id="lng" name="lng" type="text" class="pure-u-2-3" hidden>

					<div class="pure-control-group">
						<label class="pure-u-1-3">Diag Date</label>
						<input name="diag_date" type="text" class="pure-u-2-3">
					</div>

					<br>
					
					<div class="pure-control-group" style="text-align:center">
						<button type="submit" class="pure-button">Add</button>
					</div>
				</fieldset>
			</form>
		</div>
		<div class="pure-u-1-6"></div>
		
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
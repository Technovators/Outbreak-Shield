<!DOCTYPE html>
<html>

<head>
	<title>Map</title>
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>

<body>
	<div style="left:0; width:15%; top:0; height:75%; float:left; background-color:black; color:white;">
		Filter By:
		<form id="filterForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onreset="this.submit();">
			<ul>
				<li>
					Disease <br>
					<input type="checkbox" name="diabetes" id="diabetes" value="diabeties" onchange="form.submit();"> Diabetes <br>
					<input type="checkbox" name="heartProblem" id="heartProblem" value="heartProblem" onchange="form.submit();"> Heart Patient <br>
					<input type="checkbox" name="aids" id"aids" value="aids" onchange="form.submit();"> Aids <br>
					<input type="checkbox" name="asthma" id="asthma" value="asthma" onchange="form.submit();"> Asthma <br>
				</li>
				<li>
					Age <br>
					<select name="ageFilter" onchange="form.submit();">
						<option id="noAgeFilter" value="noAgeFilter"> No Filter </option>
						<option id="gt18" value="gt18"> > 18 </option>
						<option id="gt25" value="gt25"> > 25 </option>
						<option id="gt35" value="gt35"> > 35 </option>
						<option id="gt45" value="gt45"> > 45 </option>
					</select>
				</li>
				<li>
					Sex <br>
					<select name="sexFilter" onchange="form.submit();">
						<option id="noSexFilter" value="noSexFilter"> No Filter </option>
						<option id="M" value="M"> Male </option>
						<option id="F" value="F"> Female </option>
						<option id="O" value="O"> Other </option>
					</select>
				</li>
				<li>
					Blood Group<br>
					<select name="bloodGroupFilter" onchange="form.submit();">
						<option id="noBloodGroupFilter" value="noBloodGroupFilter"> No Filter </option>
						<option id="AP" value="AP"> A+ </option>
						<option id="AN" value="AN"> A- </option>
						<option id="BP" value="BP"> B+ </option>
						<option id="BN" val" value="BN"> B- </option>
						<option id="ABP" value="ABP"> AB+ </option>
						<option id="ABN" value="ABN"> AB- </option>
						<option id="OP" value="OP"> O+ </option>
						<option id="ON" value="ON"> O- </option>
					</select>
				</li>
				<li>
					Graph Type<br>
					<select name="graphType" onchange="form.submit();">
						<option id="noGraph" value="noGraph"> Select Graph </option>
						<option id="ageVsFreq" value="ageVsFreq">Age Vs Freq</option>
						<option id="timeVsFreq" value="timeVsFreq">Time Vs Freq</option>
						<option id="areaFreqDist" value="areaFreqDist">Area Freq Dist</option>
						<option id="sexFreqDist" value="sexFreqDist">Sex Freq Dist</option>
					</select>
				</li>
			</ul>
			
			<input type="reset" value="Reset Filters">
		</form>
	</div>
	<div id="map-canvas" style="width:85%; height: 75%;"></div>
	<div id="chart_div" style="width: 100%; height: 25%; position:center;"></div>

	<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
	<script src="markerclusterer.js"></script>
	<script src="List.js"></script>
	<script src="Mapster.js"></script>
	<script src="map-options.js"></script>
	
	<script>

		(function(window, mapster) {
		  // DOWNLOAD CLUSTERER: https://code.google.com/p/google-maps-utility-library-v3/wiki/Libraries

		  // map options
		  var options = mapster.MAP_OPTIONS,
		  element = document.getElementById('map-canvas'),
		  // map
		  map = mapster.create(element, options);

		   for (var i = 0; i < 4000; i++) {
		   	var v1 = 37.781350 + Math.random();
		   	var v2 =-122.4858831+ Math.random();
    map.addMarker({
      
      lat: v1,
      lng: v2,
      content: '<a href="https://www.google.co.in/maps/search/hospital/' + v1 + ',' + v2 + ',12z" target=\"_blank\">Hospitals near you.</a>',
      icon: 'hpic.png'
    });}
    for (var i = 0; i < 4000; i++) {
		   	var v1 = 147.781350 + Math.random();
		   	var v2 =-122.4858831+ Math.random();
    map.addMarker({
      
      lat: v1,
      lng: v2,
      content: '<a href="https://www.google.co.in/maps/search/hospital/' + v1 + ',' + v2 + ',12z" target=\"_blank\">Hospitals near you.</a>',
      icon: 'hpic.png'
    });}
     

		  <?php
				include_once("../config.php");

				$con = mysqli_connect($config["server"], $config["username"], $config["password"], $config["dbname"])or die(mysqli_error($con));
				
				$noConditions = 0;

				$query = "SELECT * FROM patients";
				
				$queryConditions = "";
				
				if(isset($_POST['diabetes']))
				{
					$queryConditions .= (($noConditions == 0)? " where ": " and ");
					$queryConditions .= " 1 = 1";
					//$queryConditions .= " diabetes = true";

					echo '$("#diabetes").prop("checked", true);';

					$noConditions++;
				}
				if(isset($_POST['heartProblem']))
				{
					$queryConditions .= (($noConditions == 0)? " where ": " and ");
					$queryConditions .= " 1 = 1";
					//$queryConditions .= " heartProblem = true";

					echo '$("#heartProblem").prop("checked", true);';

					$noConditions++;
				}
				if(isset($_POST['aids']))
				{
					$queryConditions .= (($noConditions == 0)? " where ": " and ");
					$queryConditions .= " 1 = 1";
					//$queryConditions .= " aids = true";

					echo '$("#aids").prop("checked", true);';

					$noConditions++;
				}
				if(isset($_POST['asthma']))
				{
					$queryConditions .= (($noConditions == 0)? " where ": " and ");
					$queryConditions .= " 1 = 1";
					//$queryConditions .= " asthma = true";

					echo '$("#asthma").prop("checked", true);';

					$noConditions++;
				}
				if(isset($_POST['ageFilter']) && $_POST['ageFilter'] != "noAgeFilter")
				{
					$minAge = ($_POST['ageFilter'] == "gt18"? 18: ($_POST['ageFilter'] == "gt25"? 25: ($_POST['ageFilter'] == "gt35"? 35: 45)));

					$queryConditions .= (($noConditions == 0)? " where ": " and ");
					$queryConditions .= " age > ".$minAge;

					echo '$("#'.$_POST['ageFilter'].'").prop("selected", true);';

					$noConditions++;
				}
				if(isset($_POST['sexFilter']) && $_POST['sexFilter'] != "noSexFilter")
				{
					$queryConditions .= (($noConditions == 0)? " where ": " and ");
					$queryConditions .= " gender = '".$_POST['sexFilter']."'";

					echo '$("#'.$_POST['sexFilter'].'").prop("selected", true);';

					$noConditions++;
				}
				if(isset($_POST['bloodGroupFilter']) && $_POST['bloodGroupFilter'] != "noBloodGroupFilter")
				{
					$queryConditions .= (($noConditions == 0)? " where ": " and ");
					$queryConditions .= " blood_group = '".($_POST['bloodGroupFilter'] == "AP"? "A+": ($_POST['bloodGroupFilter'] == "AN"? "A-": ($_POST['bloodGroupFilter'] == "BP"? "B+": ($_POST['bloodGroupFilter'] == "BN"? "B-": ($_POST['bloodGroupFilter'] == "ABP"? "AB+": ($_POST['bloodGroupFilter'] == "ABN"? "AB-": ($_POST['bloodGroupFilter'] == "OP"? "O+": "O-")))))))."'";

					echo '$("#'.$_POST['bloodGroupFilter'].'").prop("selected", true);';
					
					$noConditions++;
				}

				$query .= $queryConditions.";";

				//echo 'console.log("'.$query.'");';

				$result = mysqli_query($con, $query) or die(mysqli_error($con));
					
				while($row=mysqli_fetch_assoc($result))
				{
					extract($row);
					echo 'map.addMarker({lat: '.$lat.', lng: '.$lng.', content: "I live in '.$city.', '.$country.'.<br><a href=\\"https://www.google.co.in/maps/search/hospital+'.$city.'+'.$country.'\\" target=\"_blank\">Hospitals near you.</a>", icon: "hpic.png"});';
				}
		  ?>

		}(window, window.Mapster));
	</script>
	
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
	google.load("visualization", "1", {packages:["corechart"]});
	google.setOnLoadCallback(drawChart);
	function drawChart() {

	var dataArr = [];

	<?php
		if (isset($_POST["graphType"]) && $_POST["graphType"] != "noGraph")
		{
			if ($_POST["graphType"] == "ageVsFreq")
			{
				echo "dataArr.push(['Age', 'Number of Patients']);";
				echo "var options = { hAxis: {titleTextStyle: {color: '#333'}}, vAxis: {minValue: 0} };";
				echo "options.title = 'Age Vs Frequency';";
				echo "options.hAxis.title = 'Age';";
				echo "var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));";

				$query = "SELECT age, COUNT(*) AS freq FROM patients ".$queryConditions." GROUP BY age ORDER BY age;";
				$result = mysqli_query($con, $query) or die(mysqli_error($con));

				while($row=mysqli_fetch_assoc($result))
				{
					extract($row);
					echo 'dataArr.push(['.$age.','.$freq.']);';
				}

				echo "var data = google.visualization.arrayToDataTable(dataArr);";
			}
			else if ($_POST["graphType"] == "timeVsFreq")
			{
				echo "dataArr.push(['Time', 'Number of Patients']);";
				echo "var options = { hAxis: {titleTextStyle: {color: '#333'}}, vAxis: {minValue: 0} };";
				echo "options.title = 'Time Vs Frequency';";
				echo "options.hAxis.title = 'Time';";
				echo "var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));";
				
				$query = "SELECT YEAR(diag_date) as diag_year, COUNT(*) AS freq FROM patients ".$queryConditions." GROUP BY YEAR(diag_date) ORDER BY YEAR(diag_date);";
				$result = mysqli_query($con, $query) or die(mysqli_error($con));

				while($row=mysqli_fetch_assoc($result))
				{
					extract($row);
					echo 'dataArr.push(['.$diag_year.','.$freq.']);';
				}
				
				echo "var data = google.visualization.arrayToDataTable(dataArr);";
			}
			else if ($_POST["graphType"] == "areaFreqDist")
			{
				echo "dataArr.push(['Country', 'Number of Patients']);";
				echo "var options = {colorAxis: {colors: ['#00853f', 'black', '#e31b23']}};";
				echo "var chart = new google.visualization.GeoChart(document.getElementById('chart_div'));";
				
				$query = "SELECT country, COUNT(*) AS freq FROM patients ".$queryConditions." GROUP BY country ORDER BY country;";
				$result = mysqli_query($con, $query) or die(mysqli_error($con));

				while($row=mysqli_fetch_assoc($result))
				{
					extract($row);
					echo 'dataArr.push(["'.$country.'",'.$freq.']);
					';
				}
				
				echo "var data = google.visualization.arrayToDataTable(dataArr);";
			}
			else if ($_POST["graphType"] == "sexFreqDist")
			{
				echo "dataArr.push(['Country', 'Number of Patients']);";
				echo "var options = {title: 'Sex Freq Dist'};";
				echo "var chart = new google.visualization.PieChart(document.getElementById('chart_div'));";
				
				$query = "SELECT gender, COUNT(*) AS freq FROM patients ".$queryConditions." GROUP BY gender ORDER BY gender;";
				$result = mysqli_query($con, $query) or die(mysqli_error($con));

				while($row=mysqli_fetch_assoc($result))
				{
					extract($row);
					echo 'dataArr.push(["'.$gender.'",'.$freq.']);
					';
				}
				
				echo "var data = google.visualization.arrayToDataTable(dataArr);";
			}

			echo '$("#'.$_POST['graphType'].'").prop("selected", true);';
		}
		else
		{
			echo "dataArr.push(['Abscissa', 'Ordinate']);";
			echo "var options = { hAxis: {titleTextStyle: {color: '#333'}}, vAxis: {minValue: 0} };";
			echo "dataArr.push([0, 0]);";
			echo "options.title = 'Slect the type of graph you want';";
			echo "var data = google.visualization.arrayToDataTable(dataArr);";
			echo "var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));";
		}

		//echo 'console.log("'.$query.'");';
		mysqli_close($con);
	?>
	  
	chart.draw(data, options);
	}
    </script>
  
</body>

</html>	
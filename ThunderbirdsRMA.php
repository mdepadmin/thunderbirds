<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Thunerbirds Routine Mapping Application">
		<meta name="author" content="Alex Strobl, MS GIS University of Redlands (December 2015); MDEP, Mojave Data Ecosystem Program">
		
		<title>Thunderbirds Routine Mapping Application</title>
		<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="http://openlayers.org/en/v3.8.2/css/ol.css" type="text/css">
		<script src="http://openlayers.org/en/v3.8.2/build/ol.js"></script>
		<link rel="stylesheet" href="http://108.178.184.45:58088/Thunderbirds/ol3/css/ol.css" type="text/html">
		<script src="http://108.178.184.45:58088/Thunderbirds/ol3/ol.js"></script>
		<script src="http://108.178.184.45:58088/Thunderbirds/Cesium/Cesium.js"></script>
		<script src="http://108.178.184.45:58088/Thunderbirds/ol3cesium.js"></script>


</head>
<body>

<div id="header">
	<h1>Thunderbird's Web Application</h1>
<!--Buttons for edit, delete, and print-->
	<div id="toolbar">
		<br>
		<button type="button" class="btn btn-toolbar" id="editbtn"><b>EDIT</b></button>
		<button type="button" class="btn btn-toolbar" id="delbtn"><b>DELETE</b></button>
		<a id="export-jpeg" class="btn btn-toolbar" download="map.jpeg"><i class="icon-download"></i><b>EXPORT</b></a>
		<div id="no-download" class="alert alert-error" style="display: none">
			This example requires a browser that supports the
			<a href="http://caniuse.com/#feat=download">link download</a> attribute.
		</div>
	</div>
</div>

<div id="nav">
<!--Buttons and forms for user input-->
	<!--<a href="#" class="btn btn-danger" id="opener"><i class="glyphicon glyphicon-align-justify"></i></a>-->
    <button type="button" class="btn btn-nav" data-toggle="collapse" data-target="#create"><b>Create New Airshow</b></button><br>
	<div id="create" class="collapse">
		<b>Show Location</b><br>
		<form>
			<input type="text" id="locname" size="20"><br>
		</form>
		<b>Date</b><br>
		<form>
			<input type="date" id="showdate"><br>
		</form>
		<b>Latitude</b><br>
		<form>
			Degrees:
			<input type="float" id="latdegrees" size="10"><br>
			Minutes:
			<input type="float" id="latdecmin" size="10"><br>
		<b>Longitude</b><br>
			Degrees:
			<input type="float" id="longdegrees" size="10"><br>
			Minutes:
			<input type="float" id="longdecmin" size="10"><br>
		</form>
		<input type="submit" class="btn btn-toolbar" value="Submit" id="addshow"><br>
	</div>
	
<!--Add Bomb Burst Menus-->
	<button type="button" class="btn btn-nav" data-toggle="collapse" data-target="#bb"><b>Create New Bomb Burst</b></button><br>
	<div id="bb" class="collapse">
		<b>Show Location</b><br>
		<form>
			<input type="text" id="BBlocname" size="20"><br>
		</form>
		<b>Latitude</b><br>
		<form onsubmit="conversionfunction()">
			Degrees:
			<input type="float" id="BBlatdegrees" size="10"><br>
			Minutes:
			<input type="float" id="BBlatdecmin" size="10"><br>
			<b>Longitude</b><br>
			Degrees:
			<input type="float" id="BBlongdegrees" size="10"><br>
			Minutes:
			<input type="float" id="BBlongdecmin" size="10"><br>
		</form>
		<input type="submit" class="btn btn-toolbar" value="Submit" id="addBB"><br>
	</div>
	
    <button type="button" class="btn btn-nav" data-toggle="collapse" data-target="#select"><b>Select Airshow</b></button><br>
    <div id="select" class="collapse">
<!--Update dropdown menu with airshow locations-->
			<form id="showForm">
			<select id="selectshow">
				<option selected="true" disabled="true">Choose a Show Location</option>
				<?php
					$db = pg_connect("host=localhost port=58079 dbname=routinelocations user=postgres password=Ri0grande22") 
						or die('Could not connect: ' .pg_last_error());
					$sql = 'SELECT location FROM showlocation';
					$result = pg_query($sql) or die('Query failed: ' .pg_last_error());
					while ($line = pg_fetch_assoc($result)) {
                      	$loc = $line['location'];
					    echo "<option value='$loc'>" .$loc. "</option>\n";
						}
				pg_free_result($result);
				pg_close($db);
				?>
			</select>
			</form>
			<form id="bombburstForm">
			<select id="selectBombbusrt">
				<option selected="true" disabled="true">Choose a Bomb Burst</option>
				<?php
					$db = pg_connect("host=localhost port=58079 dbname=routinelocations user=postgres password=Ri0grande22") 
						or die('Could not connect: ' .pg_last_error());
					$sql = 'SELECT location FROM bombburst';
					$result = pg_query($sql) or die('Query failed: ' .pg_last_error());
					while ($line = pg_fetch_assoc($result)) {
						$bbloc = $line['location'];
					    echo "<option value='$bbloc'>" .$bbloc. "</option>/n";
						}
				pg_free_result($result);
				pg_close($db);
				?>
			</select>
			</form>
		<b>Magnetic Deviation</b><br>      
		<form>
			<input type="text" id="magdev" size="20" value=0><br>
		</form>
		<input type="submit" value="Zoom To" id="zoomtoshow" onclick="zoomto()"><br>
	</div>
	<input type="button" id ="toggle3d" value="Switch 2D/3D" onclick="javascript:ol3d.setEnabled(!ol3d.getEnabled())"/><br>
	<button type="button" class="btn btn-toolbar" onClick="javascript:createpts()"><b>CREATE ROUTINE</b></button><br>
	<button type="button" class="btn btn-toolbar" onClick="javascript:clearroutine()"><b>CLEAR ROUTINE</b></button><br>
	<button type="button" data-toggle="collapse" data-target="#layers"><b>LAYERS</b></button>
		<div id="layers" class="collapse">
			<input type="checkbox" value="buildingson" id="buildingon" onClick="buildControl(this);" autocomplete="off" checked> Buildings<br>
			<input type="checkbox" value="buildextson" id="buildexton" onClick="buildextControl(this);" autocomplete="off" checked> Buildings in Extent<br>
			<input type="checkbox" value="3dbuildson" id="3dbuildon" onClick="build3dControl(this);" autocomplete="off" checked> 3D Buildings<br>
			<input type="checkbox" value="maneuverson" id="maneuveron" onClick="maneuverControl(this);" autocomplete="off" checked> Maneuvers<br>
			<input type="checkbox" value="textson" id="texton" onClick="textControl(this);" autocomplete="off" checked> True Headings<br>
			<input type="checkbox" value="overlayson" id="overlayon" onClick="overlayControl(this);" autocomplete="off" checked> Overlay<br>
			<input type="checkbox" value="showcenterson" id="showcenteron" onClick="showcenterControl(this);" autocomplete="off" checked> Show Center<br>
			<input type="checkbox" value="bombburstson" id="bombburston" onClick="bombburstControl(this);" autocomplete="off" checked> Bomb Burst<br>
		</div>
</div>

<div class="container-fluid">

<div class="row-fluid">
  <div class="span12">
    <div id="map" class="map">
	</div>
  </div>
</div>

</div>

</body>
</html>
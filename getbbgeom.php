  <?php
    $routinebb = $_GET["routinebb"];
	$db = pg_connect("host=localhost port=58079 dbname=routinelocations user=postgres password=Ri0grande22") 
		or die('Could not connect: ' .pg_last_error());
	$sql = "SELECT ST_X(geom) as x, ST_Y(geom) as y FROM bombburst WHERE location = '$routinebb' ";
	$result = pg_query($db,$sql) or die('Query failed: ' .pg_last_error());
	while ($line = pg_fetch_assoc($result)) {
		header("Content-Type: application/json");
		$bbdata[] = $line['x'];
      	$bbdata[] = $line['y'];
	}
	echo json_encode($bbdata);
	?>
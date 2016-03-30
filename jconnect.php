<?php
echo "<br> The time is " . date("h:i:sa");
echo "<br><br>";

					$db = pg_connect("host=localhost port=58079 dbname=routinelocations user=postgres")
						or die('Could not connect: ' .pg_last_error($db));
					echo "Success";
                      echo pg_last_error($db);
//				pg_close($db);

// $conn_string = "host=localhost port=58079 dbname=routinelocations user=postgres password=Ri0grande22";
// $dbconn4 = pg_connect($conn_string);
//
//  host=localhost port=58079 dbname=routinelocations user=postgres password=Ri0grande22 ssslmode=disable
?>
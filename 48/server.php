<?php




	error_reporting(E_ERROR | E_PARSE);
				$decode = json_decode($data, true);
				$nick = $_GET["id"];
				$x1 = $_GET["x1"];
				$y1 = $_GET["y1"];

				$timep = date("h:i:s");

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "mmorpg";


	$con = mysqli_connect('localhost', 'root', '', 'mmorpg');



	if ($con->connect_error) {
	    die("Connection failed: " . $con->connect_error);
	}



	$sql = "SELECT nick FROM Gamers WHERE nick = '$nick'";

	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_row($result);

	if($row) {
		$sql = "UPDATE Gamers SET x='$x1', y='$y1', timep='$timep' WHERE nick='$nick'";
	} else if($nick != 'undefined' && $nick != null) {
		$sql = "INSERT INTO Gamers (nick, x, y, timep)
		VALUES ('$nick', '$x1', '$y1', '$timep')";

	}

	if ($con->query($sql) === TRUE) {

	} else {

	}



	$sql = "SELECT nick, x, y, timep FROM Gamers";

	$result = mysqli_query($con, $sql);

	$row = mysqli_fetch_row($result);

		$mystr = "";
	if ($result->num_rows > 0) {


    while($row = $result->fetch_assoc()) {


		$first = $row["nick"];
		$second = $row["x"];
		$third = $row["y"];
		$fourth = $row["timep"];


		if (strtotime($fourth) - strtotime($timep) < -30 ){
			    $sql = "DELETE FROM Gamers WHERE nick='$first'";

		    if ($con->query($sql) === TRUE) {

		    } else {

		    }
		}

			$mystr = $mystr."\"".$row["nick"]."\"".":{\"x\":\"".$row["x"]."\",\"y\":\"".$row["y"]."\"},";



    }

			


			echo "{".substr($mystr, 0, -1)."}";


}

	$con->close();
		
?>
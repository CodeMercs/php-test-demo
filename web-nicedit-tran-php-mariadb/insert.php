<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
</head>
<body>
		<?php
			require_once "conf.php";

			$dbhost = HOST;
			$dbuser = DATABASE_USER;
			$dbpass = DATABASE_PASSWORD;
			$dbname = DATABASE;

			$con = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname) or die('Error with MySQL connection');
			$no = $_POST['no'];
			$save = $_POST['save'];
			$sql = "insert into save( no, save) values( '". $no ."', '". htmlentities($save) ."');";
			echo $sql.'<br />';

			if ($con->query($sql) === TRUE) {
			    echo "New record created successfully";
			} else {
			    echo "Error: " . $sql . "<br />" . $con->error;
			}

			$con->close();
		?>
		
		<br /><br />
		<input type="button" value="Back" onclick="location.href='index.php'">

</body>
</html>


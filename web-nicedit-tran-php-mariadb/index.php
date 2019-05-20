<!DOCTYPE html>
<html>
	<head>
		<title>Edit</title>
		<style type="text/css">
			
		</style>
	</head>
	<body>
		<?php
			require_once "conf.php";
		/* PHP 7 - M */

			$dbhost = HOST;
			$dbuser = DATABASE_USER;
			$dbpass = DATABASE_PASSWORD;
			$dbname = DATABASE;

			echo "<h1>Server</h1>";

			echo "Host : " . $dbhost . "<br /><br />";
			$con = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname) or die('Error with MySQL connection');

			$sql = 'SELECT * from save;';
				echo "<h1>Table</h1>";
				$result = $con->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
					echo "NO : " . $row["no"]. "; SAVE: " . htmlentities($row["save"]) . "<br />";
					}
				} else {
					echo "0 results";
				}
		?>
		<div>
			<form action="insert.php" method="POST">
				<h1>Area</h1>
				Number : <input type="number" placeholder="Number" name="no">
				<br /><br />
				<textarea cols="50" id="work" name="save"></textarea>
				<br /><br />
				<input type="submit" value="Submit"><br />
			</form>
		</div>
		<script src="js/nicEdit.js" type="text/javascript"></script>
		<script type="text/javascript">

			bkLib.onDomLoaded(function() {
				// new nicEditor({iconsPath : 'img/nicEditorIcons.gif'}).panelInstance('work');
				new nicEditor({iconsPath : 'img/nicEditorIcons.gif',fullPanel : true}).panelInstance('work');
			});

		</script>
	</body>
</html>
<!DOCTYPE html>
<html>
	<head>
		<title>Test DB</title>
	</head>
	<body>
	<br />

		<?php

		/* PHP 7 */
		/* M */
			$dbhost = 'localhost';
			$dbuser = 'root';
			$dbpass = 'hitachi';
			$dbname = 'test';
			echo 	"Host : " . $dbhost . "<br /><br />";

			 $con = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname) or die('Error with MySQL connection');

		?>


	<?php

	?>
	<?php
	$name = $_POST['name']; 

		$sql = 'SELECT 
				`user`.`uid` AS `user_id`, 
				`user`.`passwd` AS `user_passwd`, 
				`user`.`email` AS `user_email`, 
				`student`.`name` AS `stu_name`,
				`student`.`birthday` AS `stu_birth`  
				FROM `user` 
				LEFT JOIN `student` ON `user`.`sid`=`student`.`sid` 
				WHERE `user`.`sid` = '. $name;

		echo  "Show SQL : ". $sql ."<br /><br /><br /> Show Table : <br />";

		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {

				echo "user_id : " . $row["user_id"]. 
				"; user_passwd : " . $row["user_passwd"] . 
				"; user_email : " . $row["user_email"] . 
				"; stu_name : "  . $row["stu_name"] . 
				"; stu_birth : "  . $row["stu_birth"] . "<br />";
			}
		} else {
			echo "0 results";
		}
	echo "<br /><br />Sid : $name";
	?>
	<input type="button" value="Back" onclick="location.href='test.php'">


	</body>
</html>





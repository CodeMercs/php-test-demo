<?php

	/* Edit conf.example.php */
	require_once "conf.php";

		/* PHP 7 */
			$dbhost = HOST;
			$dbuser = DATABASE_USER;
			$dbpass = DATABASE_PASSWORD;
			$dbname = DATABASE;

			/* Show Host*/
			// echo "Host : " . $dbhost . "<br /><br />";

			 $con = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname) or die('Error with MySQL connection');

	/* Num */
	// $name = intval($_GET['q']);

	$name = $_GET['q'];


	if (!$con) {
		die('Could not connect: ' . mysqli_error($con));
	}

	mysqli_select_db($con,"ajax_demo");

		$sql = 'SELECT 
				`user`.`uid` AS `user_id`, 
				`user`.`passwd` AS `user_passwd`, 
				`user`.`email` AS `user_email`, 
				`student`.`name` AS `stu_name`,
				`student`.`dep` AS `stu_dep`,
				`student`.`birthday` AS `stu_birth`  
				FROM `user` 
				LEFT JOIN `student` ON `user`.`sid`=`student`.`sid` 
				WHERE `student`.`dep` = '. '\''. $name .'\'';
	echo $sql . '<br /><br /><hr /><br />';
	$result = mysqli_query($con,$sql);

	echo "<table>
	<tr>
		<th>User ID</th>
		<th>Password</th>
		<th>Email</th>
		<th>Name</th>
		<th>Department</th>
		<th>Birthday</th>
	</tr>";
	while($row = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>" . $row['user_id'] . "</td>";
		echo "<td>" . $row['user_passwd'] . "</td>";
		echo "<td>" . $row['user_email'] . "</td>";
		echo "<td>" . $row['stu_name'] . "</td>";
		echo "<td>" . $row['stu_dep'] . "</td>";
		echo "<td>" . $row['stu_birth'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
	mysqli_close($con);

?>



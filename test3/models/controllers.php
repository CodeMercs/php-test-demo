<?php

require_once "db.php";
	function getData() {

		global $conn;
		
		$sql1 = 'SELECT * from scores;';

		$sql2 = 'SELECT * from student;';

		$sql3 = 'SELECT * from user;';

		$sql4 = 'SELECT `user`.`uid` AS `user_id`, `user`.`passwd` AS `user_passwd`, `user`.`email` AS `user_email`, `student`.`name` AS `stu_name` FROM `user` LEFT JOIN `student` ON `user`.`sid`=`student`.`sid`';

		$sql5 = 'SELECT `user`.`uid` AS `user_id`, `user`.`passwd` AS `user_passwd`, `user`.`email` AS `user_email`, `student`.`name` AS `stu_name` FROM `user` LEFT JOIN `student` ON `user`.`sid`=`student`.`sid` WHERE `user`.`uid` = 1';

		if ($conn->connect_error) {
			die("Connection failed : " . $conn->connect_error);
		} 

	/*

	$sql = "SELECT C1, C2, C3 FROM TableName";

	*/

	$result1 = $conn->query($sql1);

		echo " Scores <br />";
		if ($result1->num_rows > 0) {
			// output data of each row
			while($row = $result1->fetch_assoc()) {
			echo "id : " . $row["no"]. "; Name : " . $row["name"]. "; sid : " . $row["sid"]. "<br />";
			}
		} else {
			echo "0 results";
		}

		echo "<br /><br /><br /> Student <br />";
		$result2 = $conn->query($sql2);

		if ($result2->num_rows > 0) {
			// output data of each row
			while($row = $result2->fetch_assoc()) {
			echo "sid : " . $row["sid"]. "; Name : " . $row["name"]."; Birthday : ". $row["birthday"]. "<br />";
			}
		} else {
			echo "0 results";
		}

		echo "<br /><br /> User <br />";
		$result3 = $conn->query($sql3);

		if ($result3->num_rows > 0) {
			// output data of each row
			while($row = $result3->fetch_assoc()) {
			echo "uid : " . $row["uid"]. "; passwd : " . $row["passwd"] . "; email : " . $row["email"] . "; sid : "  . $row["sid"] . "<br />";
			}
		} else {
			echo "0 results";
		}

		echo "<br /><br /> Join <br />";
		$result4 = $conn->query($sql4);
		if ($result4->num_rows > 0) {
			// output data of each row
			while($row = $result4->fetch_assoc()) {
			echo "user_id : " . $row["user_id"]. "; user_passwd : " . $row["user_passwd"] . "; user_email : " . $row["user_email"] . "; stu_name : "  . $row["stu_name"] . "<br />";
			}
		} else {
			echo "0 results";
		}
		echo "<br />";

		echo "<br />";
		$result5 = $conn->query($sql5);
		if ($result5->num_rows > 0) {
				// output data of each row
			while($row = $result5->fetch_assoc()) {
			echo "user_id : " . $row["user_id"]. "; user_passwd : " . $row["user_passwd"] . "; user_email : " . $row["user_email"] . "; stu_name : "  . $row["stu_name"] . "<br />";
			}
		} else {
				echo "0 results";
		}
	}

?>

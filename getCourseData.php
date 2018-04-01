<?php
# getting the connection from the database
require_once("mysqli_connect.php");
# setting the query
$select_query = "SELECT courseID, courseType, courseName FROM courseratest";

$result = mysqli_query($conn, $select_query);

if (mysqli_num_rows($result) > 0) {
	echo "<form action = 'changeStatus.php' method = 'post'>
			<table align = 'left' cellpadding = '8' cellspacing = '5'>
				<tr align = 'left'>
					<td>courseID</td>
					<td>courseType</td>
					<td>CourseName</td>
					<td>status</td>
				</tr>";
	

	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr align = 'left'>
			<td>" . $row["courseID"] . "</td>" .
			"<td>" . $row["courseType"] . "</td>" . 
			"<td>" . $row["courseName"] . "</td>" .
			"<td><input type = 'checkbox' name = 'check[]' value ='".$row['courseID']."' /></td>";
			echo "</tr>";
}
	echo "<tr align = 'left'>
			<td>
				<input type = 'submit' name = 'save_courses' value = 'save course' />
			</td>
		</tr>";	
	echo "</table>";
	echo "</form>";
} else {
echo "Couldn't establish a connection and get the desired data";
}
?>

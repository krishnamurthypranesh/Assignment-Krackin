<?php
require_once("mysqli_connect.php");

if(isset($_POST['view_saved'])) {
	# setting the query
$select_query = "SELECT courseID, courseType, courseName FROM courseratest WHERE status= 1 ";

$result = mysqli_query($conn, $select_query);

if (mysqli_num_rows($result) > 0) {
	echo "<table align = 'left' cellpadding = '8' cellspacing = '5'>
			<tr align = 'left'>
				<td>courseID</td>
				<td>courseType</td>
				<td>CourseName</td>
			</tr>";
	

	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr align = 'left'>
			<td>" . $row["courseID"] . "</td>" .
			"<td>" . $row["courseType"] . "</td>" . 
			"<td>" . $row["courseName"] . "</td>" ;
			echo "</tr>";
}

	echo "</table>";
} else {
echo "Couldn't establish a connection and get the desired data";
}
$reset_query = "UPDATE courseratest SET status = '0'";

mysqli_query($conn, $reset_query);

mysqli_close($conn);
}

echo "</br><a href = 'getCourseData.php'>Go to courses page</a>";
?>

<?php

# get the connection to the database
require_once("mysqli_connect.php");

# setting the url
$coursera_url = "https://api.coursera.org/api/courses.v1";

# get the contents
$courses_json = file_get_contents($coursera_url); 

# echo $courses_json; 


$courses_array = json_decode($courses_json, true);

# echo $courses_array["elements"][0]["courseType"];


	foreach($courses_array["elements"] as $course) {
		$course_id = $course["id"];
		$course_type = $course["courseType"];
		$course_name = $course["name"];
		
		$query = "INSERT INTO courseratest (courseID, courseType, courseName) VALUES ('$course_id', '$course_type', '$course_name')";
		
		 mysqli_query($conn, $query);
	}
?>

<html>
	<head>
		<title>Test Coursera Connector</title>
	</head>
	<body>
		<p>To view the list of avaliable courses, click on the button below</p>
		<form action = "getCourseData.php" method = "post">
				<table>
					<tr>
						<td>
							<input type = "submit" name =  "submit" value = "View"/>
						</td>
					</tr>
				</table>
		</form>
	</body>
</html>
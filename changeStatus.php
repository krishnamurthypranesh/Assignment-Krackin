<?php

# getting connection 
require_once("mysqli_connect.php");

if(isset($_POST["save_courses"]) && !empty($_POST["check"])){
	# creating variable to store query result
	$check_box = $_POST["check"];
	
	#change the status of the row in the database table
	foreach($check_box as $check){
		if(!empty($check)){
			$status_query = "UPDATE courseratest SET status = '1' WHERE courseID='".$check."'";
			mysqli_query($conn, $status_query);
		} else {
			continue;
		}
		# echo $check. "</br>";
			
	}
	
	/* for($i = 0; $i < count($check_box); $i++) {
		if(!empty($check_box[$i])){
			$status_query = "UPDATE courseratest SET status = 1 WHERE (courseID) VALUES('$check_box[$i]')";
			mysqli_query($conn, $status_query);
		} else {
			continue; 
		}
} */
}
?>

<html>
	<head>
		<title>Test web connector</title>
	</head>
	<body>
	</br>
		<p>To save courses, click on the button below.</p>
		<form action = "viewSaved.php" method = "post"><input type = "submit" name = "view_saved" value = "View Saved Courses"/></form>
	</body>
</html>
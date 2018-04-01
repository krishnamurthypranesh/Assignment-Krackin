# Place this file in the api folder of the website. For e.g. if example.com is your domain place this file in example.com/api
# Make sure that the url has been standardized by creating a .htaccess file. 

<?php
# connect to database

require_once("../mysqli_connect.php")

$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method) {
	case "GET":
		# Retrive Courses
		if(!empty($_GET["courseID"])) {
			$course_id = $_GET["courseID"];
			get_courses($course_id);
		}
		else {
			get_courses();
		}
		break;
	case "POST":
		#Insert course
		insert_course();
		break;
	case "PUT":
		# Update course
		$course_id = $_GET["course_id"];
		update_course($course_id);
		break;
	case "DELETE":
		# Delete course
		$course_id = $_GET["course_id"];
		delete_course($course_id);
		break;
	default :
		# Invalid request method
		header("HTTP/ 1.0 405 Method not allowed");
		break;
}

# function to insert courses
function insert_course() {
	global $conn;
	$course_id = $_POST["courseID"];
	$course_name = $_POST["courseName"];
	$course_type = $_POST["courseType"];
	# setting the query to be run
	$query = "INSERT INTO courseratest SET courseID=' {$course_id}', courseName='{$course_name}', courseType=' {$course_type}'";
	if(mysqli_query($conn, $query)) {
		$response = array(
			"status" => 1,
			"status_message" => "Course added successfully!"
		);
	} else {
		$response = array(
			"status" => 0,
			"status_message" => "Course addition failed."
		);
	}
	header("Content-Type: application/json");
	echo json_encode($response);
}

# function to get courses

function get_courses($course_id = 0) {
	global $conn;
	$query = "SELECT * FROM courseratest";
	if($course_id != 0) {
		$query.="WHERE courseID=".$course_id."LIMIT 1";
	}
	$response = array();
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_array($result)) {
		$response[] = $row;
	}
	header("Content-Type: application/json");
	echo json_encode($response);
}

# function to delete course
function delete_course($course_id) {
	global $conn;
	$query = "DELETE FROM courseratest WHERE courseID=" .$course_id;
	if(mysqli_query($conn, $query)) {
		$response = array(
		"status" => 1,
		"status_message" => "Course Deleted successfully!"
		);
	} else  {
		$response = array(
		"status" => 0,
		"status_message" => "Course could not be deleted!");
	}
	
	header("Content-Type: application/json");
	echo json_encode($response);
}

# function to update course information
function update_course($course_id) {
	global $conn;
	parse_str(file_get_contents("php://input", $post_vars);
	$course_id = $post_vars["courseID"];
	$course_name = $post_vars["courseName"];
	$course_type = $post_vars["courseType"];
	
	$query = "UPDATE courseratest SET courseID='{$course_id}', courseName='{$course_name}', courseType='{$course_type}'";

	if(mysqli_query($conn, $query)) {
		$response = array(
		"status" => 1,
		"status_message" => "Course updated successfully!");
	} else {
		$response = array(
		"status" => 0,
		"status_message" => "Course info could not be updated...");
	}
	header("Content-Type: application/json");
	echo json_encode($response);
} 

# close database connection
mysqli_close($conn);
?>

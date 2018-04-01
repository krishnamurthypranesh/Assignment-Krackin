<?php 
# setting the constants

define("server", "localhost");

define("user", "testweb");

define("pass", "turtledove");

define("db", "courses");

# establishing connection with the server
$conn = @mysqli_connect(server, user, pass, db);

if(!$conn) {
	die("Connection failed: ". mysqli_connect_error());
}

# echo "Connected successfully!";
?>
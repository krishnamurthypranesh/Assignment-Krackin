<?php 
# setting the constants

define("server", "");  # enter servername here

define("user", "");  # enter username here

define("pass", "");  # enter password here

define("db", "courses");  # db name

# establishing connection with the server
$conn = @mysqli_connect(server, user, pass, db);

if(!$conn) {
	die("Connection failed: ". mysqli_connect_error());
}

# echo "Connected successfully!";
?>

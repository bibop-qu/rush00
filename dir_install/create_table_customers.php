<?PHP
$conn = mysqli_connect($server_name, $user_name, $password, $db_name);
if (mysqli_connect_error()) {
	die("Connection failed: " . mysqli_connect_error());
}

$query = "CREATE TABLE customers (
	c_id INT(6) UNSIGNED AUTO_INCREMENT,
	login VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL,
	admin INT DEFAULT 0,
	PRIMARY KEY (c_id)
)";
if (!mysqli_query($conn, $query)) {
	die("Error creating table: " . mysqli_error($conn));
}

mysqli_close($conn);
?>

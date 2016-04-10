<?PHP
$conn = mysqli_connect($server_name, $user_name, $password, $db_name);
if (mysqli_connect_error()) {
	die("Connection failed: " . mysqli_connect_error());
}

$query = "CREATE TABLE orders (
	o_id INT(6) UNSIGNED AUTO_INCREMENT,
	login VARCHAR(255) NOT NULL,
	cart VARCHAR(2048) NOT NULL,
	PRIMARY KEY (o_id)
)";
if (!mysqli_query($conn, $query)) {
	die("Error creating table: " . mysqli_error($conn));
}

mysqli_close($conn);
?>

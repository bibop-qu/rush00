<?PHP
$conn = mysqli_connect($server_name, $user_name, $password, $db_name);
if (mysqli_connect_error()) {
	die("Connection failed: " . mysqli_connect_error());
}

$query = "CREATE TABLE products (
	p_id INT(6) UNSIGNED AUTO_INCREMENT,
	product VARCHAR(255) NOT NULL,
	category VARCHAR(255) NOT NULL,
	description VARCHAR(255) NOT NULL,
	price INT(6) UNSIGNED NOT NULL,
	quantity INT(6) UNSIGNED NOT NULL,
	image VARCHAR(255) NOT NULL,
	PRIMARY KEY (p_id)
)";
if (!mysqli_query($conn, $query)) {
	die("Error creating table: " . mysqli_error($conn));
}

mysqli_close($conn);
?>

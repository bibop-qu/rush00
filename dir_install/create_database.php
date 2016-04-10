<?PHP
$conn = mysqli_connect($server_name, $user_name, $password);
if (mysqli_connect_error()) {
	die("Connection failed: " . mysqli_connect_error());
}

$query = "CREATE DATABASE $db_name";
if (!mysqli_query($conn, $query)) {
	die("Error creating database: " . mysqli_error($conn));
}

mysqli_close($conn);
?>

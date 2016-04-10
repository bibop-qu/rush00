<?PHP
include 'login_information.php';
$conn = mysqli_connect($server_name, $user_name, $password, $db_name);
if (mysqli_connect_error()) {
	die("Connection failed: " . mysqli_connect_error());
}

$stmt = mysqli_stmt_init($conn);
$query = 'INSERT INTO customers (login, password, admin) VALUES (?, ?, ?)';
if (mysqli_stmt_prepare($stmt, $query)) {
	/* bind parameters for markers */
	mysqli_stmt_bind_param($stmt, "ssi", $login, $password, $admin);

	while (($data = fgetcsv($handle, 1024, ";")) !== FALSE)
	{
		$login = mysqli_real_escape_string($conn, $data["0"]);
		$password = hash("whirlpool", $data["1"]);
		$admin = 0;
		mysqli_stmt_execute($stmt);
	}
	mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>
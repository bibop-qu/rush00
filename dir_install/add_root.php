<?PHP
$conn = mysqli_connect($server_name, $user_name, $password, $db_name);
if (mysqli_connect_errno()) {
	die("Connection failed: " . mysqli_connect_error());
}

# Create a prepared statement
$stmt = mysqli_stmt_init($conn);
$query = 'INSERT INTO customers (login, password, admin) VALUES (?, ?, ?)';
if (mysqli_stmt_prepare($stmt, $query)) {
	$login = mysqli_real_escape_string($conn, "root42");
	$password = hash("whirlpool", "root42");
	$admin = 1;

	# bind parameters for markers
	mysqli_stmt_bind_param($stmt, "ssi", $login, $password, $admin);

	# execute query
	mysqli_stmt_execute($stmt);

	# close statement
	mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>

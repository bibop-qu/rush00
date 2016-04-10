<?PHP
include 'login_information.php';
$conn = mysqli_connect($server_name, $user_name, $password, $db_name);
if (mysqli_connect_error()) {
	die("Connection failed: " . mysqli_connect_error());
}

$stmt = mysqli_stmt_init($conn);
$query = 'INSERT INTO products (product, category, description, price, quantity, image) VALUES (?, ?, ?, ?, ?, ?)';
if (mysqli_stmt_prepare($stmt, $query)) {
	/* bind parameters for markers */
	mysqli_stmt_bind_param($stmt, "sssiis",$product, $category, $description, $price, $quantity, $image);

	while (($data = fgetcsv($handle, 1024, ";")) !== FALSE)
	{
		$product = mysqli_real_escape_string($conn, $data["0"]);
		$category = mysqli_real_escape_string($conn, $data["1"]);
		$description = mysqli_real_escape_string($conn, $data["2"]);
		$price = mysqli_real_escape_string($conn, $data["3"]);
		$quantity = mysqli_real_escape_string($conn, $data["4"]);
		$image = mysqli_real_escape_string($conn, $data["5"]);
		mysqli_stmt_execute($stmt);
	}
	mysqli_stmt_close($stmt);
}

mysqli_close($conn);

?>
<?PHP
	session_start();
	include 'dir_install/login_information.php';

	$conn = mysqli_connect($server_name, $user_name, $password, $db_name, $db_port);
	if (mysqli_connect_errno())
		die("Connection failed: " . mysqli_connect_error());

		$stmt = mysqli_stmt_init($conn);
		$query = 'INSERT INTO orders (login, cart) VALUES (?, ?)';
		if (mysqli_stmt_prepare($stmt, $query))
		{
			# bind parameters for markers
   			mysqli_stmt_bind_param($stmt, "ss", $login, $cart);
			# execute query
		    mysqli_stmt_execute($stmt);
			# close statement
  		    mysqli_stmt_close($stmt);
  		    mysqli_close($conn);
  		    header("Location: index.php");
		}
		mysqli_close($conn);
?>
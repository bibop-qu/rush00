<?PHP
	include 'dir_install/login_information.php';

	if (!$_POST['login'] || !$_POST['passwd'] || $_POST['submit'] !== "OK")
	   exit("ERROR\n");

	$conn = mysqli_connect($server_name, $user_name, $password, $db_name, $db_port);
	if (mysqli_connect_errno())
		die("Connection failed: " . mysqli_connect_error());

	$pass = hash('whirlpool', $_POST['passwd']);
	$log = $_POST['login'];

	# Create a prepared statement
	if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM customers WHERE login='$log'")) > 0)
	   header("location: create_account.php");
	else
	{
		$stmt = mysqli_stmt_init($conn);
		$query = 'INSERT INTO customers (login, password) VALUES (?, ?)';
		if (mysqli_stmt_prepare($stmt, $query))
		{
			$login = mysqli_real_escape_string($conn, $log);
			# bind parameters for markers
   			mysqli_stmt_bind_param($stmt, "ss", $login, $pass);
			# execute query
		    mysqli_stmt_execute($stmt);
			# close statement
  		    mysqli_stmt_close($stmt);
			header("location: index.php");
		}
	}
	mysqli_close($conn);
?>




<?PHP
	include 'dir_install/login_information.php';

	if (!$_POST['login'] || !$_POST['passwd'] || $_POST['submit'] !== "OK")
	   exit("ERROR\n");
	
	$conn = mysqli_connect($server_name, $user_name, $password, $db_name, $db_port);
	if (mysqli_connect_errno())
		die("Connection failed: " . mysqli_connect_error());

	$pass = hash('whirlpool', $_POST['passwd']);
	$log = $_POST['login'];
	if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM customers WHERE login='$log' AND password='$pass'")) > 0)
	{
		session_start();
		if ($log and $pass and $_POST['submit'] == "OK")
			{
				$_SESSION['login'] = $log;
				if (mysqli_num_rows(mysqli_query($conn, "SELECT login, admin FROM customers WHERE login='$log' AND admin=1")) > 0)
					$_SESSION['admin'] = 1;
				else
					$_SESSION['admin'] = 0;
				$SESSION['panier'] = array();
			}
		header("location: index.php");
	}
	else
		header("Location: sign_in.php");
	mysqli_close($conn);
?>
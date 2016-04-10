<?PHP 
include 'dir_install/login_information.php';

//print_r($_POST);

session_start();
if ($_SESSION['admin'] === 0)
	header('Location: index.php');

$conn = mysqli_connect($server_name, $user_name, $password, $db_name, $db_port);
if (mysqli_connect_errno())
	die("Connection failed: " . mysqli_connect_error());

$login = mysqli_real_escape_string($conn, $_POST['login']);
$mdp = hash('whirlpool', $_POST['passwd']);
$action = $_POST['action_customer'];
$valadmin = $_POST['admin'];
if ($login !== NULL)
{
	if ($action == "modif" and $mdp == NULL)
	{
		$query = "UPDATE customers SET admin='$valadmin' WHERE login='$login'";
		mysqli_query($conn, $query);
		mysqli_close($conn);
		header("Location: admin.php");
	}
	else if ($action == "modif" and $valadmin === NULL)
	{
		$query = "UPDATE customers SET password='$mdp' WHERE login='$login'";
		mysqli_query($conn, $query);
		mysqli_close($conn);
		header("Location: admin.php");
	}
	else if ($action == "modif")
	{
		$query = "UPDATE customers SET password='$mdp', admin='$valadmin' WHERE login='$login'";
		mysqli_query($conn, $query);
		mysqli_close($conn);
		header("Location: admin.php");
	}
	else if ($action == "add" and $mdp != NULL and $_SESSION['admin'] != NULL)
	{
		if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM customers WHERE login='$login'")) > 0)
		{
			header("Location: admin.php");
			return ;
		}
		$stmt = mysqli_stmt_init($conn);
		$query = 'INSERT INTO customers (login, password, admin) VALUES (?, ?, ?)';
		if (mysqli_stmt_prepare($stmt, $query))
		{
			# bind parameters for markers
   			mysqli_stmt_bind_param($stmt, "ssi", $login, $mdp, $valadmin);
			# execute query
		    mysqli_stmt_execute($stmt);
			# close statement
  		    mysqli_stmt_close($stmt);
  		    mysqli_close($conn);
  		    header("Location: admin.php");
		}

	}
	else if ($action == "dell" and $_POST['mdp'] == NULL and $_POST['admin'] == NULL)
	{
		$query = "DELETE FROM customers WHERE login='$login'";
		mysqli_query($conn, $query);
		mysqli_close($conn);
		header("Location: admin.php");
	}
}
?>

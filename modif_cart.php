<?PHP
include 'dir_install/login_information.php';

print_r($_POST);

#session_start();
if ($_SESSION['admin'] === 0)
	header('Location: index.php');

$conn = mysqli_connect($server_name, $user_name, $password, $db_name, $db_port);
if (mysqli_connect_errno())
	die("Connection failed: " . mysqli_connect_error());

$product = mysqli_real_escape_string($conn, $_POST['product']);
$category = mysqli_real_escape_string($conn, $_POST['category']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$couleur = mysqli_real_escape_string($conn, $_POST['couleur']);
$action = $_POST['action_cart'];

if ($product !== NULL)
{
	if ($action == "modif" and $category != NULL)
	{
		echo "OK";
		$query = "UPDATE products SET category='$category' WHERE product='$product'";
		mysqli_query($conn, $query);
	}
	if ($action == "modif" and $description)
	{
		$query = "UPDATE products SET description='$description' WHERE product='$product'";
		mysqli_query($conn, $query);
	}
	if ($action == "modif" and $price)
	{
		$query = "UPDATE products SET price='$price' WHERE product='$product'";
		mysqli_query($conn, $query);
	}
	if ($action == "modif" and $quantity)
	{
		$query = "UPDATE products SET quantity='$quantity' WHERE product='$product'";
		mysqli_query($conn, $query);
	}
	if ($action == "modif" and $price)
	{
		$query = "UPDATE products SET couleur='$couleur' WHERE product='$product'";
		mysqli_query($conn, $query);
	}
	if ($action == "modif")
		mysqli_close($conn);
		header("Location: admin.php")
	else if ($action == "add" and $category != NULL and $description != NULL and $price != NULL and $quantity != NULL and $couleur != NULL)
	{
		if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM products WHERE product='$product'")) > 0)
			header("Location: admin.php");
		$stmt = mysqli_stmt_init($conn);
		$query = 'INSERT INTO products (category, product, description, price, quantity, couleur) VALUES (?, ?, ?, ?, ?, ?)';
		if (mysqli_stmt_prepare($stmt, $query))
		{
			# bind parameters for markers
   			mysqli_stmt_bind_param($stmt, "sssiis", $category, $product, $description, $price, $quantity, $couleur);
			# execute query
		    mysqli_stmt_execute($stmt);
			# close statement
  		    mysqli_stmt_close($stmt);
  		    mysqli_close($conn);
  		    header("Location: admin.php");
		}

	}
	else if ($action == "dell" and $_POST['category'] == NULL and $_POST['description'] == NULL and $_POST['price'] == NULL and $_POST['quantity'] == NULL and $_POST['couleur'] == NULL)
	{
		$query = "DELETE FROM products WHERE product='$product'";
		mysqli_query($conn, $query);
		mysqli_close($conn);
		header("Location: admin.php");
	}
}
?>
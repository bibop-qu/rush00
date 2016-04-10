<?PHP
session_start();
if ($_SESSION['admin'] === 0)
	header('Location: index.php');
?>
<HTML>
	<HEAD>
		<TITLE>ADMIN
		</TITLE>
		<META CHARSET="UTF-8">
		<META NAME="author" CONTENT="basle-qu & flourd_au">
		<META NAME="description" CONTENT="Administratiom">
		<LINK REL="shortcut icon" HREF="favicon.ico" TYPE="image/x-icon">
		<lINK REL="stylesheet" TYPE="text/css" MEDIA="all" HREF="./style/design.css">
	</HEAD>
	<BODY>
		<header><H1 class="titre">ADMINISTRATION
			<?PHP include'nav.php'; ?>
		</H1></header>
<?PHP
	include 'dir_install/login_information.php';

	$conn = mysqli_connect($server_name, $user_name, $password, $db_name, $db_port);
	if (mysqli_connect_errno())
		die("Connection failed: " . mysqli_connect_error());

	$query = 'SELECT login, admin FROM customers';
	$result = mysqli_query($conn, $query);
	while ($donnees = mysqli_fetch_array($result))
	{
		echo "$donnees[0]: $donnees[1]";
		echo "<BR />";
	}
	echo "<HR>";
	echo ('<form method="POST" action="modif_customer.php">login:  <INPUT type="text" name="login"><br/>  mdp:  <input type="text" name ="passwd"><br/>  admin:  <input type="text" name="admin"><br/><input type="submit" name="action_customer" value="modif"><input type="submit" name="action_customer" value="add"><input type="submit" name="action_customer" value="dell"></form>');
	echo "<HR>";
	$query = 'SELECT * FROM products';
	$result = mysqli_query($conn, $query);
	while ($modif = mysqli_fetch_array($result))
	{
		echo "$modif[1] $modif[2] $modif[3] $modif[4] $modif[5] $modif[6]";
		echo "<BR />";
	}
	echo "<HR>";
	echo ('<form method="POST" action="modif_cart.php">product:  <input type="text" name ="product"><br/>category:  <INPUT type="text" name="category"><br/> description:  <input type="text" name="description"></br> price <input type="text" name ="price"><br/>quantity <input type="text" name ="quantity"><br/>image <input type="text" name ="image"><br/> <input type="submit" name="action_cart" value="modif"><input type="submit" name="action_cart" value="add"><input type="submit" name="action_cart" value="dell"></form>');
	echo "<HR>";
	mysqli_close($conn)
	?>
	</BODY>
</HTML>

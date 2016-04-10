<?PHP session_start(); ?>
<HTML>
	<HEAD>
		<TITLE>CART
		</TITLE>
		<META CHARSET="UTF-8">
		<META NAME="author" CONTENT="basle-qu & flourd_au">
		<META NAME="description" CONTENT="Cart">
		<LINK REL="shortcut icon" HREF="favicon.ico" TYPE="image/x-icon">
		<lINK REL="stylesheet" TYPE="text/css" MEDIA="all" HREF="./style/design.css">
	</HEAD>
	<BODY>
		<header><H1 class="titre">CART
<?PHP include'nav.php';
include'dir_install/login_information.php';
?>
		</H1></header>
		<?PHP
		$conn = mysqli_connect($server_name, $user_name, $password, $db_name, $db_port);
		if (mysqli_connect_errno())
		die("Connection failed: " . mysqli_connect_error());

		$login = $_SESSION['login'];
		if ($login == NULL)
			return ;
		$panier = array();
		$tmp = $_POST['Add'];
		if ($_POST['Add'] != NULL)
			$panier[] = $tmp;
		if ($panier != NULL)
			$_SESSION['panier'][] = $panier;
		if ($_SESSION['panier'] == NULL)
			return ;

		$price = 0;
		foreach ($_SESSION['panier'] as $value)
		{
			$query = "SELECT * FROM products WHERE product='$value[0]'";
			$result = mysqli_query($conn, $query);
			$modif = mysqli_fetch_array($result);
			echo $modif[1]." ".$modif[4]." ".$modif[5].'<BR \>';
			$price = $price + $modif[4];
		}
		if ($price != 0)
			echo "TOTAL: ". $price.'<BR \>';
		if ($_SESSION['login'])
		{
			$_SESSION['panier_price'] = $price;
			echo ('<form method="POST" action="envoie.php"><button  value="valider">Valider votre commande</form>');
		}

		mysqli_close($conn);
		?>
		<DIV>

		</DIV>


	</BODY>
</HTML>

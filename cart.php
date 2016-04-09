<?PHP session_start(); ?>
<HTML>
	<HEADER>
		<TITLE>CART
		</TITLE>
		<META CHARSET="UTF-8">
		<META NAME="author" CONTENT="basle-qu & flourd_au">
		<META NAME="description" CONTENT="Cart">
		<LINK REL="shortcut icon" HREF="favicon.ico" TYPE="image/x-icon">
		<lINK REL="stylesheet" TYPE="text/css" MEDIA="all" HREF="./style/design.css">
	</HEADER>
	<BODY>
		<H1 class="titre">CART
		</H1>
		<?PHP include'nav.php' ?>
		<HR>
		<?PHP
			die("Connection failed: " . mysqli_connect_error());
		$login = $_SESSION['login'];
		$panier = array();
		$tmp = $_POST['Add'];
		if ($_POST['Add'] != NULL)
			$panier[] = $tmp;
		if ($panier != NULL)
			$_SESSION['panier'][] = $panier;
		foreach ($_SESSION['panier'] as $value)
		{
			echo $value[0].'<BR \>';
		}
		mysqli_close($conn);
		?>
		<DIV>

		</DIV>


	</BODY>
</HTML>

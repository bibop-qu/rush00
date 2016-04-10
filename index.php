<?PHP session_start(); ?>
<HTML>
	<HEAD>
		<TITLE>42clothes
		</TITLE>
		<META CHARSET="UTF-8">
		<META NAME="author" CONTENT="basle-qu & mjarraya">
		<META NAME="description" CONTENT="The boutique de peinture en ligne">
		<LINK REL="shortcut icon" HREF="favicon.ico" TYPE="image/x-icon">
		<lINK REL="stylesheet" TYPE="text/css" MEDIA="all" HREF="./style/design.css">
	</HEAD>
	<BODY>
		<header class="home">
			<H1 class="titre">42clothes
				<?PHP include'nav.php'; ?>
			</H1>
		</header>
		<SECTION id="vitrine">
		<?PHP
			include 'dir_install/login_information.php';
			$conn = mysqli_connect($server_name, $user_name, $password, $db_name, $db_port);
			if (mysqli_connect_errno())
	  			die("Connection failed: " . mysqli_connect_error());
			$query = 'SELECT * FROM products';
			$result = mysqli_query($conn, $query);
			while ($donnees = mysqli_fetch_array($result))
			{
				if (!isset($_GET['category']) || $_GET['category'] == strtolower($donnees[2]))
		   	{
					echo ('<DIV class="encadre"><img width=150 src="'.$donnees[6].'">');
              //  echo $donnees[6];
              //  echo ('">');
				echo '<P>'.$donnees[1].'</P>';
                echo ('C: '.$donnees[2].'<BR />'.'Description: '.$donnees[3].'<BR />'.'Prix: '.$donnees[4].' Po<BR />'.'Quantité: '.$donnees[5].'<BR />'.'Catégorie: <a href="index.php?category='.strtolower($donnees[2]).'">'.strtoupper($donnees[2]).'</a><BR /><BR />
						<form method="POST" action="cart.php"><input type="submit" value="');
						echo ($donnees[1].'" name="Add"></form>'.'</DIV>');
					}
		   }
		   mysqli_close($conn);
		?>
	</SECTION>
		<FOOTER>
			<?PHP
			if ($_SESSION['admin'] === 1)
			   echo "<A TITLE='Administration' HREF='./admin.php'>Administration</A>";
			?>
		</FOOTER>
	</BODY>
</HTML>

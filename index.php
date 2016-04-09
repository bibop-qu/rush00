<?PHP session_start(); ?>
<HTML>
	<HEADER>
		<TITLE>COULEURS
		</TITLE>
		<META CHARSET="UTF-8">
		<META NAME="author" CONTENT="basle-qu & flourdau">
		<META NAME="description" CONTENT="The boutique de peinture en ligne">
		<LINK REL="shortcut icon" HREF="favicon.ico" TYPE="image/x-icon">
		<lINK REL="stylesheet" TYPE="text/css" MEDIA="all" HREF="./style/design.css">
	</HEADER>
	<BODY>
		<H1 class="titre">COULEURS
		</H1>
		<?PHP include'nav.php' ?>

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
		   		echo ('<DIV class="encadre" style="background:');
                echo $donnees[6];
                echo ('">');
				echo '<P>'.$donnees[0].'</P>';
                echo ('Name: '.$donnees[2].'<BR />'.'Description: '.$donnees[3].'<BR />'.'Prix: '.$donnees[4].' Po<BR />'.'Quantite: '.$donnees[5].'<BR />'.'Categorie: '.$donnees[2].'<BR /><BR />
						<form method="POST" action="cart.php"><input type="submit" value="');
						echo $donnees[2];
						echo ('" name="Add">'.'</DIV>');
		   }
		   mysqli_close($conn);
		?>
		</SECTION>
		<HR>
		<FOOTER>
			<?PHP
			if ($_SESSION['admin'] === 1)
			   echo "<A TITLE='Administration' HREF='./admin.php'>Administration</A>";
			?>
		</FOOTER>
	</BODY>
</HTML>

		<HR>
		<NAV>
			<A TITLE="Accueil" HREF="./index.php">HOME</A>
			<?PHP
				if (!$_SESSION['login'])
					echo "<A HREF='./sign_in.php'>SIGN IN</A>";
				else
					echo "<A HREF='./sign_out.php'>SIGN OUT</A>";
			?>
			<?php
			if (!$_SESSION['login'])
			echo "<A HREF='./create_account.php'>REGISTER</A>";
			?>
		<ul id="menu">
<li>
	<A TITLE="Cart" HREF="./cart.php">CART</A>
			<ul class="inside">
				<li><a href="#">Categorie 1</a></li>
				<li><a href="#">Categorie 2</a></li>
				<li><a href="#">Categorie 3</a></li>
				<li><a href="#">Categorie 4</a></li>
				<li><a href="#">Categorie 5</a></li>
			</ul>
		</li>
	</ul>
		</NAV>

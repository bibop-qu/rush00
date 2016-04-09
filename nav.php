		<HR>
		<NAV>
			<A TITLE="Accueil" HREF="./index.php">Acceuil</A>
			<?PHP
				if (!$_SESSION['login'])
					echo "<A HREF='./sign_in.php'>Sign In</A>";
				else
					echo "<A HREF='./sign_out.php'>Sign Out</A>";
			?>
			<A TITLE="Creat_Account" HREF="./create_account.php">Create_Account</A>
			<A TITLE="Cart" HREF="./cart.php">Cart</A>
		</NAV>
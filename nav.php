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
				<li><a href="index.php?category=chemises">Chemises</a></li>
				<li><a href="index.php?category=vestes">Vestes</a></li>
				<li><a href="index.php?category=pantalons">Pantalons</a></li>
				<li><a href="index.php?category=baskets">Baskets</a></li>
				<li><a href="index.php?category=sousvets">Sous-vêtements</a></li>
			</ul>
		</li>
	</ul>
		</NAV>

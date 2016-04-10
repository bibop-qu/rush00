<HTML>
	<HEAD>
		<TITLE>SIGN IN
		</TITLE>
		<META CHARSET="UTF-8">
		<META NAME="author" CONTENT="basle-qu & mjarraya">
		<META NAME="description" CONTENT="Sign_In">
		<LINK REL="shortcut icon" HREF="favicon.ico" TYPE="image/x-icon">
		<lINK REL="stylesheet" TYPE="text/css" MEDIA="all" HREF="./style/design.css">
	</HEAD>
	<BODY>
		<header>
			<h1 class="titre">SIGNING IN
			<?PHP include'nav.php'; ?>
		</h1></header>
			<SECTION>

				<!--<FORM action="connection.php" method="POST">
					<p id="ident">Identifiant:
					<INPUT type="text" name="login" placeholder="Login"/>
				</p>
				<p id="mdp">Mot de passe:
					<INPUT type="password" name="passwd" placeholder="Password"/>
					<INPUT type="submit" name="submit" value="OK"/>
				</p></FORM>-->
				<form action="connection.php" method="POST">
					<header>LOG IN</header><br/>
					<label>IDENTIFIANT</label>
					<input id=inp type="text" name="login" placeholder="Login"/><br/>
					<label>MOT DE PASSE</label>
					<input id=inp type="password" name="passwd" placeholder="Password"/><br/><br/>
					<input id=sub type="submit" name="submit" value="OK"/>
				</form>

			</SECTION>
			<FOOTER>
			</FOOTER>
	</BODY>
</HTML>

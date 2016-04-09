<!DOCTYPE HTML>
<HTML>
	<HEADER>
		<TITLE>Sign_In
		</TITLE>
		<META CHARSET="UTF-8">
		<META NAME="author" CONTENT="basle-qu & flourd_au">
		<META NAME="description" CONTENT="Sign_In">
		<LINK REL="shortcut icon" HREF="favicon.ico" TYPE="image/x-icon">
		<lINK REL="stylesheet" TYPE="text/css" MEDIA="all" HREF="./style/design.css">
	</HEADER>
	<BODY>
		<H1 class="titre">SIGN_IN
		</H1>
		<?PHP include'nav.php'; ?>
		<HR>
			<SECTION>
				<FORM action="connection.php" method="POST">
					Identifiant:
					<INPUT type="text" name="login" placeholder="Login"/>
					<BR />
					Mot de passe:
					<INPUT type="password" name="passwd" placeholder="Password"/>
					<INPUT type="submit" name="submit" value="OK"/>
				</FORM>
			</SECTION>
	</BODY>
</HTML>

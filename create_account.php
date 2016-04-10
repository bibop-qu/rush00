<HTML>
	<HEAD>
		<TITLE>CREATE ACCCOUNT
		</TITLE>
		<META CHARSET="UTF-8">
		<META NAME="author" CONTENT="basle-qu & flourd_au">
		<META NAME="description" CONTENT="Create_Account">
		<LINK REL="shortcut icon" HREF="favicon.ico" TYPE="image/x-icon">
		<lINK REL="stylesheet" TYPE="text/css" MEDIA="all" HREF="./style/design.css">
	</HEAD>
	<BODY>
		<header><H1 class="titre">CREATE ACCOUNT
			<?PHP include'nav.php'; ?>
		</H1></header>
		<SECTION>
			<!--<FORM id="ident" action="login.php" method="POST">
				<p id="ident">Identifiant:
				<INPUT type="text" name="login" placeholder="Login"/>
			</p>
				<p id="mdp">Mot de passe:
				<INPUT type="password" name="passwd" placeholder="Password"/>
				<INPUT type="submit" name="submit" value="OK"/>
			</p>
		</FORM>-->
			<form action="login.php" method="POST">
				<header>REGISTER</header><br/>
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

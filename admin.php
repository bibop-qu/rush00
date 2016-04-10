<?PHP
session_start();
if ($_SESSION['admin'] === 0)
	header('Location: index.php');
?>
<HTML>
	<HEAD>
		<TITLE>ADMIN
		</TITLE>
		<META CHARSET="UTF-8">
		<META NAME="author" CONTENT="basle-qu & flourd_au">
		<META NAME="description" CONTENT="Administratiom">
		<LINK REL="shortcut icon" HREF="favicon.ico" TYPE="image/x-icon">
		<lINK REL="stylesheet" TYPE="text/css" MEDIA="all" HREF="./style/design.css">
	</HEAD>
	<BODY>
		<header><H1 class="titre">ADMINISTRATION
			<?PHP include'nav.php'; ?>
		</H1></header>
<?PHP
	include 'dir_install/login_information.php';

	$conn = mysqli_connect($server_name, $user_name, $password, $db_name, $db_port);
	if (mysqli_connect_errno())
		die("Connection failed: " . mysqli_connect_error());

	$query = 'SELECT login, admin FROM customers';
	$result = mysqli_query($conn, $query);
	echo ('<table width="15%" class="users"><tr class="twords"><td>UTILISATEUR</td><td>ADMIN</td></tr>');
	while ($donnees = mysqli_fetch_array($result))
		echo ('<tr class="words"><td>'.$donnees[0].'</td>'.'<td width=10px class="admin1">'.$donnees[1].'</td></tr>');
	echo "</table><br/>";
	echo ('<form id="sform" method="POST" action="modif_customer.php">IDENTIFIANT<INPUT id="inp" type="text" name="login"><br/><br/>NV MOT DE PASSE<input id="inp" type="password" name ="passwd"><br/><br/>ADMINISTRATEUR<input id="inp" type="text" name="admin"><br/><br/><br/><input id="sub" type="submit" name="action_customer" value="modif"><input id="sub" type="submit" name="action_customer" value="add"><input id="sub" type="submit" name="action_customer" value="dell"></form><br/>');
	echo "<br/><br/><HR>";
	$query = 'SELECT * FROM products';
	$result = mysqli_query($conn, $query);
	echo ('<table class="products" width="60%"><tr class="twords"><td>PRODUIT</td><td>CATÉGORIE</td><td>DESCRIPTION</td><td>PRIX</td><td>QUANTITÉ</td><td>LIEN IMAGE</td></tr>');
	while ($modif = mysqli_fetch_array($result))
		echo ('<tr class="words"><td>'.strtoupper($modif[1]).'</td><td>'.strtoupper($modif[2]).'</td><td>'.strtoupper($modif[3]).'</td><td>'.$modif[4].'$</td><td>'.$modif[5].'</td><td><img width=150px src="'.$modif[6].'"></td></tr>');
	echo "</table><HR>";
	echo ('<form id="bform" method="POST" action="modif_cart.php">PRODUIT<input id="inp" type="text" name ="product"><br/><br/>CATÉGORIE<INPUT id="inp" type="text" name="category"><br/><br/>DESCRIPTION<input id="inp" type="text" name="description"></br><br/>PRIX<input id="inp" type="text" name ="price"><br/><br/>QUANTITÉ<input id="inp" type="text" name ="quantity"><br/><br/>LIEN IMAGE<input id="inp" type="text" name ="image"><br/><br/><br/><input id="sub" type="submit" name="action_cart" value="modif"><input id="sub" type="submit" name="action_cart" value="add"><input id="sub" type="submit" name="action_cart" value="dell"></form>');
	mysqli_close($conn);

	$handle = fopen('orders.csv', "r");

	while ($line = fgets($handle))
	{
		$tab = str_getcsv($line, ";");
		foreach ($tab as $value) {
			echo "<p>$value</p>";
		}
	}

    fclose($handle);
	?>
	</BODY>
</HTML>

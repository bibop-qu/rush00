<?PHP
include 'dir_install/login_information.php';
	session_start();
	$tab = array();
	$tab[0] = $_SESSION['login'];

	foreach ($_SESSION['panier'] as $elem)
	{
		foreach ($elem as  $value) {
		
				$tab[] = $value;
		}
	}
	$tab[] = $_SESSION['panier_price'];
	$handle = fopen("orders.csv", "a");

	fputcsv($handle, $tab, ";");
	$_SESSION['panier'] = NULL;

	fclose($handle);
	header('Location: index.php');

?>
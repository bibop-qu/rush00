<?PHP
include 'dir_install/login_information.php';

# Create Database (exit on error)
include 'dir_install/create_database.php';

# Create Table customers (exit on error)
include 'dir_install/create_table_customers.php';
# Create Table products (exit on error)
include 'dir_install/create_table_products.php';
# Create Table orders (exit on error)
include 'dir_install/create_table_orders.php';

# Add root
include 'dir_install/add_root.php';
# Add clients
$handle = fopen("dir_install/customers.csv", "r");
if ($handle !== FALSE) {
	include 'dir_install/add_customers_demo.php';
	fclose($handle);
}
## Add products
$handle = fopen("dir_install/products.csv", "r");
if ($handle !== FALSE) {
	include 'dir_install/add_products_demo.php';
	fclose($handle);
}
echo "<h1>INSTALLATION DONE</h1>";
?>

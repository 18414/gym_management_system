root@89b2e78690f3:/opt/lampp/apache2# cat /opt/lampp/htdocs/gym_management_system/includes/db_connect.php
<?php
global $con;
$con = mysqli_connect("gym-system-db.czrdtrac0wnc.us-east-2.rds.amazonaws.com", "bhushan", "ganesha123", "gym_management_system");

if (!$con) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>


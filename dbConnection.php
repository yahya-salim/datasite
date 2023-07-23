<?php
// info de la base 000webhost

$sname="localhost";
$unmae="id21067613_yahya_irl";
$password="Yahya_irl0";
$db_name="id21067613_datasite";
$conn = mysqli_connect($sname, $unmae, $password, $db_name);
if(!$conn) {
    echo "Connection failed !";
}

?>
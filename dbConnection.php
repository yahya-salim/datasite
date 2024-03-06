<?php

$sname=getenv("HOSTNAME");
$unmae=getenv("USERNAME");
$password=getenv("PSWD");
$db_name=getenv("DBNAME");
$conn = mysqli_connect($sname, $unmae, $password, $db_name);
if(!$conn) {
    echo "Connection failed !";
}

?>
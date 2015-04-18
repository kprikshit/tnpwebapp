<?php

include "db.php";
session_start();
$conn = get_conn();

if (isset($_SESSION['admin']))
{

echo "welcome ".$_SESSION['admin'];


}


?>

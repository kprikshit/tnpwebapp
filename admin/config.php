<?php

function get_conn()
{

$servername = "localhost";
$username = "vishwash";
$password = "universe";
$dbname = "tnp";
$conn = new PDO("pgsql:host=$servername;dbname=$dbname",$username,$password);

return $conn;
}

?>



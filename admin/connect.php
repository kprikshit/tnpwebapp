<?php

include "config.php";
session_start();
$conn = get_conn();
$username=$_POST['uname'];
$password=$_POST['pass'];

$sql ="select * from admin where aid='".$username."' ;" ;
$q = $conn->query($sql) or die('failed');

$r = $q->fetch(PDO::FETCH_ASSOC);
if ($r['password'] == $password){
  $_SESSION['name'] = $username;
  $_SESSION['auth'] = 1;
  header("Location:students.php");
}

else{
  $msg = "LoginError";
  header("Location:index.php?msg=".urldecode($msg));
}

?>

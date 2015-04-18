<?php

include "db.php";
session_start();
$conn = get_conn();

$sql ="select * from company where cid='".$_REQUEST['cid']."' ;" ;

$q = $conn->query($sql) or die('failed');

$r = $q->fetch(PDO::FETCH_ASSOC);

if ($r['password'] == $_REQUEST['password'])
 {
  if ($r['approval_status'] == '1')
  {
  #echo "correct password";
  session_unset();
  #session_destroy();

  $_SESSION['cid'] = $_REQUEST['cid'];
  header("Location: welcome_company.php");
  }
 else
  {
   $_SESSION['notify'] = "Your company has not been registered by the administrator yet";
   header("Location: index.php");
  }
 }
else
 {
  $_SESSION['notify'] = "The username or password you entered is incorrect.";
  header("Location: index.php");
 }


?>

<?php

include "db.php";
session_start();
$conn = get_conn();

echo "welcome to admin portal <br>" ;

?>

<form action='admin_authentication.php' method='POST'>
 Admin Name : <input type='text' name='aid'> <br>
 Password: <input type='password' name='password'> <br>
 <input type='submit' value='Submit'> 
</form>

<?php

?>

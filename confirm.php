<?php
/*
   * Class:  csci303fa24
   * User:  delaynamoury
   * Date:  11/30/24
   * Filename:  confirm.php
   * 
 */
$pageName = "Confirm";
require_once "header.php";
?>


<?php
 if($_GET['state'] == '1'){
     echo "You are logged out";
 }
 elseif ($_GET['state'] == '2'){
    echo 'Welcome, ';
    echo $_SESSION['fname'];

 }
 ?>
  <?php
require_once "footer.php";
?>


<?php
/*
   * Class:  csci303fa24
   * User:  delaynamoury
   * Date:  11/30/24
   * Filename:  select2.php
   * 
 */
$pageName = "select2-delayna";
require_once 'header.php';
?>
<?php
$sql = "SELECT * FROM employees";
$stmt = $pdo->prepare($sql);
$stmt -> execute();

$row = $stmt->fetch();
print_r($row);
echo $row['emp_no']. " - " . $row['last_name'];
?>
<?php
require_once 'footer.php';
?>
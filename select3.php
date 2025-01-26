<?php
/*
   * Class:  csci303fa24
   * User:  delaynamoury
   * Date:  11/30/24
   * Filename:  select3.php
   * 
 */
$pageName = "select3-delayna";
require_once 'header.php';
?>
<?php
$sql = "SELECT * FROM employees";
$stmt = $pdo->prepare($sql);
$stmt -> execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);
print_r($row);
echo $row['emp_no']. " - " . $row['last_name'];
?>
<?php
require_once 'footer.php';
?>
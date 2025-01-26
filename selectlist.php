<?php
/*
   * Class:  csci303fa24
   * User:  delaynamoury
   * Date:  11/30/24
   * Filename:  selectlist.php
   * 
 */
$pageName = "EmployeeList-delayna";
require_once 'header.php';
?>
<?php
$sql = "SELECT emp_no, last_name FROM employees ORDER BY last_name";
$stmt = $pdo->prepare($sql);
$stmt -> execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//print_r($result);
foreach ($result as $row) {
    echo "<a href='selectview.php?q=" . $row['emp_no']. "'>" . $row['last_name'] . "</a><br>";
}
?>
<?php
require_once 'footer.php';
?>
<?php
/*
   * Class:  csci303fa24
   * User:  delaynamoury
   * Date:  11/30/24
   * Filename:  select4.php
   * 
 */
$pageName = "select4-delayna";
require_once 'header.php';
?>
<?php
$sql = "SELECT * FROM employees ORDER BY last_name";
$stmt = $pdo->prepare($sql);
$stmt -> execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($result);
foreach ($result as $row) {
    echo $row['emp_no'] . " - " . $row['last_name']. "<br>";
}
?>
<?php
require_once 'footer.php';
?>
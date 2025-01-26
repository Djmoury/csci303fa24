<?php
/*
   * Class:  csci303fa24
   * User:  delaynamoury
   * Date:  11/30/24
   * Filename:  select1.php
   * 
 */
$pageName = "select1-delayna";
require_once 'header.php';
?>
<?php
$sql = "SELECT * FROM employees ORDER BY last_name";


$result = $pdo->query($sql);

foreach ($result as $row) {
    echo $row['emp_no'] . " - " . $row['last_name'] . "<br>";
}
foreach ($result as $row) {
    echo $row['emp_no'] . " - " . $row['last_name'] . "<br>";
}
?>
<?php
require_once 'footer.php';
?>
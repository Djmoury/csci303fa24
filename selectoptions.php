<?php
/*
   * Class:  csci303fa24
   * User:  delaynamoury
   * Date:  11/30/24
   * Filename:  selectoptions.php
   * 
 */
$pageName = "Employee Options-delayna";
require_once 'header.php';
?>
<?php


$sql = "SELECT emp_no, first_name,last_name FROM employees ORDER BY last_name";
$stmt = $pdo->prepare($sql);
$stmt -> execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//print_r($result);
//foreach ($result as $row) {
   // echo $row['emp_no'] . " - " . $row['last_name']. "<br>";
//}

?>
<table>
    <tr><th>Options</th><th>First Name</th><th>Last Name</th></tr>

<?php
foreach ($result as $row) {
    ?>
    <tr>
        <td><a href="selectview.php?q=<?php echo $row['emp_no']?>">View</a> |
            <a href="selectupdate.php?q=<?php echo $row['emp_no']?>">Update</a> |
            <a href="selectdelete.php?q=<?php echo $row['emp_no']?>&l=<?php echo $row ['last_name']?>">Delete</a>
            </td>
            <td><?php echo $row['first_name']?></td><?php echo "\n";?>
             <td><?php echo $row['last_name']?></td><?php echo "\n";?>
             </tr>
 <?php
}
 ?>
</table>

<?php
require_once 'footer.php';
?>
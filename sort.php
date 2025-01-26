<?php
/*
   * Class:  csci303fa24
   * User:  delaynamoury
   * Date:  11/30/24
   * Filename:  selectoptions.php
   * 
 */
$pageName = "Sort Employees Names By Ascending or Descending";
require_once 'header.php';
?>
<?php
if (isset($_GET['q'])) {
    switch ($_GET['q']) {
        case "fd":
            $sorting = "first_name DESC";
            break;
        case "ld":
            $sorting = "last_name DESC";
            break;
        case "fa":
            $sorting = "first_name ASC";
            break;
        case "la":
            $sorting = "last_name ASC";
            break;
        default:
            $sorting = "last_name ASC";
    }
}
else{
    $sorting= "last_name ASC";
}

$sql = "SELECT emp_no, first_name,last_name FROM employees ORDER BY $sorting";
$stmt = $pdo->prepare($sql);
$stmt -> execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//print_r($result);
//foreach ($result as $row) {
   // echo $row['emp_no'] . " - " . $row['last_name']. "<br>";
//}
?>
<table>
    <tr><th>Options</th><th>First Name<a href="<?php echo $currentFile;?>?q=fd">&#x25BC;</a><a href="<?php echo $currentFile;?>?q=fa">&#x25B2;</a></th><th>Last Name<a href="<?php echo $currentFile;?>?q=ld">&#x25BC;</a><a href="<?php echo $currentFile;?>?q=la">&#x25B2;</a></th></tr>

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
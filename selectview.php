<?php
/*
   * Class:  csci303fa24
   * User:  delaynamoury
   * Date:  11/30/24
   * Filename:  selectview.php
   * 
 */
$pageName = "Employee Details-delayna";
require_once 'header.php';
if (!isset($_GET['q']) || !is_numeric($_GET['q'])) {
   echo '<p class="error"> There is a problem providing the data you requested. Please return to <a href="selectoptions.php">Options</a> or <a href="selectlist.php">List</a> to try again. </p>';
} else{
?>
<?php
$sql = "SELECT * FROM employees WHERE emp_no = :emp_no";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':emp_no', $_GET['q']);
$stmt -> execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<table>
    <tr><th>Employee ID: </th><td><?php echo $row['emp_no']?></td></tr>
    <tr><th>Birth Date: </th><td><?php echo $row['birth_date']?></td></tr>
    <tr><th>First Name: </th><td><?php echo $row['first_name']?></td></tr>
    <tr><th>Last Name: </th><td><?php echo $row['last_name']?></td></tr>
    <tr><th>Email: </th><td><?php echo $row['email']?></td></tr>
    <tr><th>Gender: </th><td><?php echo $row['gender']?></td></tr>
    <tr><th>Bio: </th><td><?php echo $row['bio']?></td></tr>
    <tr><th>Hire date: </th><td><?php echo $row['hire_date']?></td></tr>
</table>

<?php
}// else get q
require_once 'footer.php';
?>
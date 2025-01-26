<?php
/*
   * Class:  csci303fa24
   * User:  delaynamoury
   * Date:  12/10/24
   * Filename:  contentmanage.php
   * 
 */
$pageName = "Posts";
require_once 'header.php';
?>
<?php


$sql = "SELECT ID, title,details FROM content ORDER BY title";
$stmt = $pdo->prepare($sql);
$stmt -> execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//print_r($result);
//foreach ($result as $row) {
// echo $row['emp_no'] . " - " . $row['last_name']. "<br>";
//}

?>
    <table>
        <tr><th>Options</th><th>No.</th><th>Title</th></tr>

        <?php
        foreach ($result as $row) {
            ?>
            <tr>
                <td><a href="contentview.php?q=<?php echo $row['ID']?>">View</a> |
                    <a href="contentupdate.php?q=<?php echo $row['ID']?>">Update</a> |
                    <a href="contentdelete.php?q=<?php echo $row['ID']?>&t=<?php echo $row ['title']?>">Delete</a>
                </td>
                <td><?php echo $row['ID']?></td><?php echo "\n";?>
                <td><?php echo $row['title']?></td><?php echo "\n";?>
            </tr>
            <?php
        }
        ?>
    </table>

<?php
require_once 'footer.php';
?>
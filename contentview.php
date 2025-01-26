<?php
/*
   * Class:  csci303fa24
   * User:  delaynamoury
   * Date:  12/10/24
   * Filename:  contentview.php
   * 
 */
$pageName = "Content Details";
require_once 'header.php';
if (!isset($_GET['q']) || !is_numeric($_GET['q'])) {
    echo '<p class="error"> There is a problem providing the data you requested. Please return to <a href="contentmanage.php">Manage Content</a> to try again. </p>';
} else{
    ?>
    <?php
    $sql = "SELECT *
        FROM content 
         INNER JOIN users
         ON content.userID = users.ID
         WHERE content.ID = :ID";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':ID', $_GET['q']);
    $stmt -> execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$row){
        echo "<p class='error'> No such record found. </p>";
    } else {
    ?>
    <table>
        <tr><th>Title: </th><td><?php echo $row['title']?></td></tr>
        <tr><th>Owner: </th><td><?php echo $row['fname'] . ' ' . $row['lname']?></td></tr>
        <tr><th>Date: </th><td><?php echo $row['created']?></td></tr>
        <tr><th>Details:</th><td><?php echo $row['details']?></td></tr>
    </table>

    <?php
    }
}// else get q
require_once 'footer.php';
?>
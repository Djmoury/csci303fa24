<?php
/*
   * Class:  csci303fa24
   * User:  delaynamoury
   * Date:  12/10/24
   * Filename:  contentdelete.php
   * 
 */
$pageName="Delete";
require_once "header.php";

if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['q'])) {
    $ID = $_GET['q']; //Use any var name you want.
} elseif($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['ID'])) {
    $ID = $_POST['ID'];
} else {
    echo "<p class='error'>No such entry!</p>";
}


$showForm = 1;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $sql = "DELETE FROM content WHERE ID= :ID";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':ID', $_POST['ID']);
    $stmt->execute();
    echo "<p>The content <strong>" . $_POST['title'] . "</strong> was successfully deleted.</p>";
    $showForm = 0;
}

$sql = "SELECT * from content WHERE ID = :ID";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':ID', $ID);
$stmt->execute();
$row = $stmt->fetch();
if(!$row) {
    echo "<p class='error'>There is no such entry.</p>";
    $showForm = FALSE;
}
if ($row['userID'] != $_SESSION['ID']) {
    echo "<p class='error'>You are not the owner of the
    content.</p>";
    $showForm = FALSE;
}

if ($showForm == 1) {
    ?>
    <p> Please confirm you want to delete <strong><?php echo $_GET['t']; ?> </strong></p>
    <form id="delete" name="delete" method="post" action="<?php echo $currentFile; ?>">
        <input type="hidden" id="ID" name="ID" value="<?php echo $_GET['q']; ?>">
        <input type="hidden" id="title" name="title" value="<?php echo $_GET['t']; ?>">
        <input type="submit" id="deleteform" name="deleteform" value="DELETE">
    </form>
    <?php
}
require_once "footer.php";
?>
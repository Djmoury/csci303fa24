<?php
/*
   * Class:  csci303fa24
   * User:  delaynamoury
   * Date:  11/30/24
   * Filename:  selectdelete.php
   * 
 */
$pageName="Delete";
require_once "header.php";

$showForm = 1;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $sql = "DELETE FROM employees WHERE emp_no= :emp_no";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':emp_no', $_POST['emp_no']);
    $stmt->execute();
    echo "<p>The employee <strong>" . $_POST['last_name'] . "</strong> was successfully deleted.</p>";
    $showForm = 0;
}
if ($showForm == 1) {
    ?>
<p> Please confirm you want to delete <strong><?php echo $_GET['l']; ?></strong> </p>
    <form id="delete" name="delete" method="post" action="<?php echo $currentFile; ?>">
        <input type="hidden" id="emp_no" name="emp_no" value="<?php echo $_GET['q']; ?>">
        <input type="hidden" id="last_name" name="last_name" value="<?php echo $_GET['l']; ?>">
        <input type="submit" id="delete" name="delete" value="DELETE">
    </form>
    <?php
}
require_once "footer.php";
?>


<?php
/*
   * Class:  csci303fa24
   * User:  delaynamoury
   * Date:  12/10/24
   * Filename:  contentupdate.php
   * 
 */
$pageName = "Update Content";
require_once "header.php";


$showForm = TRUE;
$errors = [];

if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['q'])) {
    $ID = $_GET['q']; //Use any var name you want.
} elseif($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['ID'])) {
    $ID = $_POST['ID'];
} else {
    echo "<p class='error'>No such entry!</p>";
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $userID= $_POST['userID'];
    $title = trim($_POST['title']);
    $details = $_POST['details'];


    if (empty($title)) {
        $errors['title'] = "Title is required";
    } else {
        if($title != $_POST['origtitle']) {
            $sql = "SELECT title from content WHERE title = :field";
            $dupTitle = check_duplicates($pdo, $sql, $title);
            if ($dupTitle) {
                $errors['title'] = "Title is taken.";
            }
        }
    }
    if (empty($details)) {
        $errors['details'] = "Details are required";
    }

    if (!empty($errors)) {

        echo "<span class='error'>There was an error submitting the form</span>";
    } else {

        $sql = "UPDATE content SET userID = :userID, title = :title, details = :details, updated = :updated WHERE ID = :ID";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':userID', $userID);
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':details', $details);
        $stmt->bindValue(':updated', date("Y-m-d H:i:s"));
        $stmt->bindValue(':ID', $ID);
        $stmt->execute();
        echo "<span class='success'>Content was posted successfully</span>";
        $showForm = FALSE;

    }
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
if ($showForm == TRUE) {
    ?>

    <p>All fields are required </p>

    <form name="updatecontent" id="updatecontent" method="POST" action="<?php echo $currentFile; ?>">
        <input type="hidden" name="userID" value="<?php echo htmlspecialchars($_SESSION['ID']);?>">
        <input type="hidden" name="ID" value="<?php echo $row['ID'];?>">
        <input type="hidden" name="origtitle" value="<?php echo $row['title'];?>">
        <label class= form for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?php
            if(isset($title)) {
                echo htmlspecialchars($title);
            }else{
                echo htmlspecialchars($row['title']);
        }?>">
        <?php
        if(!empty($errors['title'])) {
            echo "<span class= 'error'>". $errors['title']. "</span>";
        }
        ?>
        <br>
        <label class= form for="details">Details:</label>
        <?php
        if(!empty($errors['details'])) {
            echo "<span class= 'error'>". $errors['details']. "</span>";
        }
        ?>
        <textarea name="details" id="details" placeholder="Please enter details for your post"><?php
            if(isset($details)){
                echo htmlspecialchars($details);
            }else{
                echo htmlspecialchars($row['details']);
            }

            ?></textarea>
        <br>
        <input type="submit" name="submit" id="submit" value= "submit">

    </form>

    <?php
}

require_once "footer.php";
?>
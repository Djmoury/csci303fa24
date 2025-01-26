<?php
/*
   * Class:  csci303fa24
   * User:  delaynamoury
   * Date:  12/10/24
   * Filename:  contentadd.php
   * 
 */
$pageName = "Create a Post";
require_once "header.php";


$showForm = TRUE;
$errors = [];



if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $userID= (int)$_POST['userID'];
    $title = trim($_POST['title']);
    $details = $_POST['details'];


    if (empty($title)) {
        $errors['title'] = "Title is required";
    } else {
        $sql = "SELECT title from content WHERE title = :field";
        $dupTitle = check_duplicates($pdo, $sql, $title);
        if ($dupTitle) {
            $errors['title'] = "Title already exists";
        }
    }


    if (empty($details)) {
        $errors['details'] = "Details are required";
    }

    if (!empty($errors)) {

        echo "<span class='error'>There was an error submitting the form</span>";
    } else {

        $sql = "INSERT INTO content (userID, title, details, created, updated) VALUES (:userID, :title, :details, :created,:updated)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':userID', $userID);
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':details', $details);
        $stmt->bindValue(':created', date("Y-m-d H:i:s"));
        $stmt->bindValue(':updated', date("Y-m-d H:i:s"));
        $stmt->execute();
        echo "<span class='success'>Content was posted successfully</span>";
        $showForm = FALSE;

    }
}

if ($showForm == TRUE) {
    ?>
    <p>This form will create a post. It will require a title and details </p>

    <form name="AddContent" id="content" method="POST" action="<?php echo $currentFile; ?>">
        <input type="hidden" name="userID" value="<?php echo htmlspecialchars($_SESSION['ID']);?>">
        <label class= form for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?php if(isset($title)){echo htmlspecialchars($title);}?>">
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
        <textarea name="details" id="details" placeholder="Please enter details for your post"><?php if(isset($details)){echo $details;}?></textarea>
        <br>
        <input type="submit" name="submit" id="submit" value= "submit">

    </form>

    <?php
}

require_once "footer.php";
?>
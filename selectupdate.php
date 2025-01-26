<?php
/*
   * Class:  csci303fa24
   * User:  delaynamoury
   * Date:  12/10/24
   * Filename:  selectupdate.php
   * 
 */
 $pageName = "Update";
 require_once "header.php";
 checkLogin();
/*
 $showForm= TRUE;
 $errors= [];

 if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["q"])) {
     $ID = $_GET['q'];
 } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["emp_no"])) {
     $ID = $_POST["emp_no"];
 } else {
     echo "<p class='error'>Error: Entry does not exist </p>";
 }
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $title = trim($_POST["title"]);
     if ($title != $_POST['origtitle']) {
         $sql = "SELECT title from content WHERE title = ;field";
         $dupTitle = check_duplicates($pdo, $sql, $title);
         if ($dupTitle) {
             $errors['title'] = "Title is taken.";
         }
     }
     if (!empty($errors)) {
         echo "<p class='error'>There are errors, etc., etc.</p>";
     } else {
         $sql = "UPDATE content SET title = :title WHERE ID = :ID";
         $stmt = $pdo->prepare($sql);
         $stmt->bindValue(':title', $title);
         $stmt->bindValue(':ID', $ID);
         $stmt->execute();
         echo "<p class='success'>Thank you , etc., etc.</p>";
         $showForm = FALSE;
     }
*/
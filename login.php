<?php
/*
   * Class:  csci303fa24
   * User:  delaynamoury
   * Date:  11/30/24
   * Filename:  login.php
   * 
 */
$pageName = "Login";
require_once "header.php";
?>

 <?php
 $showform = 1;  // show form is true
 $errors = []; // This uses an associative array to store errors

 /* ***********************************************************************
 * PROCESS THE FORM UPON SUBMIT
 * *********************************************************************
 */
 if ($_SERVER['REQUEST_METHOD'] == "POST") {
     //SANITIZE USER DATA
     $email = trim(strtolower($_POST['email']));
     $pwd = $_POST['pwd'];

     /* ***********************************************************************
      * ERROR CHECKING - ONLY ENTER BLOCK OF CODE IF ALL FIELDS FILLED OUT
      * ONLY CHECK FOR EMPTY.  NO NEED FOR ANTYING ELSE SINCE YOU DO THAT AT REGISTRATION.
      * ***********************************************************************
      */
     if (empty($email)) {
         $errors['email'] = "Email is required";
     }
     if (empty($pwd)) {
         $errors['pwd'] = "Password is required";
     }

     /* ***********************************************************************
          * CONTROL CODE
          * ***********************************************************************
          */
     if (!empty($errors)) {
         echo "Please fill out all required fields.";
     } else {
         // VERIFY THE PASSWORD
         $sql = "SELECT * FROM users WHERE email = :email";
         $stmt = $pdo->prepare($sql);
         $stmt->bindValue(':email', $email);
         $stmt->execute();
         $row = $stmt->fetch();
         if (!$row) {
             echo "<p class='error'>There is no user with that email.</p>";
         } else {
             //whatever my original code was is now in my ELSE

             if (password_verify($pwd, $row['pwd'])) {
                 // SET SESSION VARIABLES
                 $_SESSION['ID'] = $row['ID'];
                 $_SESSION['fname'] = $row['fname'];
                 $_SESSION['status'] = $row['status'];

                 // REDIRECT TO CONFIRMATION PAGE
                 header("Location: confirm.php?state=2");
             } else {
                 echo "<p class='error'>Your password is incorrect.</p>";
             }
         } // else errors
     }//submit
 }
 if ($showform == 1) {
 ?>
    <form name="login" id="login" method="POST" action="<?php echo $currentFile;?>">
    <label class= 'form' for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?php if(isset($email)){echo htmlspecialchars($email);}?>">
    <?php
    if(!empty($errors['email'])) {
        echo "<span class= 'error'>". $errors['email']. "</span>";
    }
    ?>
    <br>
    <label class= 'form' for="pwd">Password:</label>
    <input type="password" name="pwd" id="pwd" placeholder="must be at least 8 characters" >
    <?php
    if(!empty($errors['pwd'])) {
        echo "<span class= 'error'>". $errors['pwd']. "</span>";
    }
    ?>
    <input type="submit" name="submit" id="submit" value= "submit">
</form>

    <?php
    }
 require_once "footer.php";
    ?>


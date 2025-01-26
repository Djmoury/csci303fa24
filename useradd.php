<?php
/*
   * Class:  csci303fa24
   * User:  delaynamoury
   * Date:  9/12/24
   * Filename:  useradd.php
   * 
 */
/* ***********************************************************************************************
 * READ ALL COMMENTS CAREFULLY!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * Course lessons will eventually cover all parts of this form.
 *
 * FA24 BASIC FORM TEMPLATE - COPY THIS ENTIRE PAGE AFTER YOUR INITIAL COMMENTS
 * Modify any part that says "CHANGE_THIS"
 * Variable names are examples and can be modified (e.g. $showForm & $pageName
 *
 *  PART 1 - PAGE SETUP - HEADER USAGE
 *     Create a variable for a user-friendly name of the page (e.g.  $pageName) as displayed in header
 *     Include your header file with require_once (modify if needed)
 *  ******************************************************************************************** */
$pageName = "Create an Account";
require_once "header.php";

/* ***********************************************************************************************
 *  PART 2 - SET INITIAL VARIABLES
 *     SHOW FORM - Create a flag to allow us to show (default) or hide the form as appropriate.
 *     ERRORS - Create variable or array to handle the existence of errors.
 *     OTHERS - Create other variables, if necessary.
 *  ******************************************************************************************** */
$showForm = TRUE;  //$showForm is an example name.  Can use a different variable name, if desired.
$errors = []; // This uses an associative array to store errors, but you can use other methods.
//add additional initial variables here, when needed


/* ***********************************************************************************************
*  PART 3 - PROCESS THE FORM UPON SUBMIT - THIS IS A *POST* FORM.  WOULD BE ALTERED FOR A *GET* FORM.
*  ******************************************************************************************** */
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    /* ***********************************************************************************************
     * PART 3.1 - TROUBLESHOOTING
     * Use print_r or var_dump for troubleshooting, but COMMENT OUT when done testing!
     * ******************************************************************************************** */
   // print_r($_POST); //UNCOMMENT when needed.
    //var_dump($_POST); // UNCOMMENT when needed.

    /* ***********************************************************************************************
     * PART 3.2 - CREATE LOCAL VARIABLES
     *     Create a local variable for ALL form fields (except submit)
     *     Sanitize any text BOX values (such as first name, email, etc.) with trim()
     *     Modify EMAILS and USERNAMES ONLY with strtolower() AND trim()
     *     NEVER modify passwords
     * ******************************************************************************************** */
    $fname = trim($_POST['fname']);
    $lname= trim($_POST['lname']);
    $email = strtolower(trim($_POST['email']));
    $job= trim($_POST['job']);
    $pwd = $_POST['pwd'];

    if(isset($_POST['preference'])) {
        $preference = $_POST['preference'];
    }
    if(isset($_POST['postpreference'])) {
        $postpreference = $_POST['postpreference'];
    }
    $state = $_POST['state'];
    $bio = $_POST['bio'];


    /* ***********************************************************************************************
     * PART 3.3 - ERROR CHECKING
     * Here, you are checking for:
     *     Missing values (where appropriate)
     *     Duplicates (if not allowed)
     *     Format errors (such as email, date, url, etc.)
     *     Restrictions (such as length requirements)
     *     Other requirements of your program
     * ******************************************************************************************** */
    if (empty($fname)) {
        $errors['fname'] = "First Name is required";
    }
    if (empty($lname)) {
        $errors['lname'] = "Last Name is required";
    }
    if (empty($job)) {
        $errors['job'] = "Job is required";
    }

    if (empty($email)) {
        $errors['email'] = "Email is required";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $errors['email'] = "Invalid email format";
        }
        $sql ="SELECT email from users WHERE email = :field";
        $dupEmail= check_duplicates($pdo,$sql,$email);
        if($dupEmail){
            $errors['email'] = "Email already exists";
        }
    }
    if (strlen($pwd) < 8) {
        $errors['pwd'] = "Password is not 8 characters";
    }

    if (empty($preference)) {
        $errors['preference'] = "Preference is required";
    }
    if (empty($postpreference)) {
        $errors['postpreference'] = "Post preference is required";
    }
    if (empty($state)) {
        $errors['state'] = "State is required";
    }
    if (empty($bio)) {
        $errors['bio'] = "A biography is required";
    }
    /* ***********************************************************************************************
     * PART 3.4 - PROGRAM CONTROL
     * ******************************************************************************************** */
    // *** IF THERE ARE ERRORS ***
    if (!empty($errors)) {
        /* ***********************************************************************************************
         * PART 3.4a - PROGRAM CONTROL - ERRORS EXIST
         * The above if statement assumes array called $errors().  Modify as needed.
         *    Provide general message to user.
         *    Provide Specific messages are displayed in form.
         *    NOTE CSS CLASS .error created in Style Sheet
         * ******************************************************************************************** */
        echo "<span class='error'>There was an error submitting the form</span>";
    }
    //*** IF THERE ARE NO ERRORS ***
    else {
        /* ***********************************************************************************************
         * PART 3.4b - PROGRAM CONTROL - NO ERRORS EXIST
         *    Perform database actions (if applicable)
         *    Display user-friendly feedback of success. ALWAYS REQUIRED
         *    NOTE CSS CLASS .success created in Style Sheet
         *    HIDE THE FORM upon SUCCESS
        * ******************************************************************************************** */
        $sql="INSERT INTO users (fname, lname, email, job, pwd,preference, postpreference, state, bio, created) VALUES (:fname, :lname, :email, :job, :pwd, :preference, :postpreference, :state, :bio, :created)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':fname', $fname);
        $stmt->bindValue(':lname', $lname);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':job', $job);
        $stmt->bindValue(':pwd', password_hash($pwd, PASSWORD_DEFAULT));
        $stmt->bindValue(':preference', $preference);
        $stmt->bindValue(':postpreference', $postpreference);
        $stmt->bindValue(':state', $state);
        $stmt->bindValue(':bio', $bio);
        $stmt->bindValue(':created', date("Y-m-d H:i:s"));
        $stmt->execute();
        echo "<span class='success'>Form submitted successfully</span>";
        $showForm = FALSE; //$showForm is an example name.  Can use a different variable name, if desired.
    }//*** END of ELSE statement to check for ERRORS
}//*** END of PROCESS THE FORM UPON SUBMIT

/* ***********************************************************************************************
 * PART 4 - FORM CODE
 *    Check to see if form should be displayed w/ if statement
 *    Provide useful paragraph to user with directions (expectations about required fields)
 *    CHANGE the METHOD to GET if not POST form
 *  ******************************************************************************************** */
if ($showForm == TRUE) { //$showForm is an example name.  Can use a different variable name, if desired.
    ?>
    <p>This form will create an account for this website. It will require first name, last name, email, password, current job, email preference, usability preference, state, and a biography. </p>

    <form name="AddUser" id="user" method="POST" action="<?php echo $currentFile; ?>">
        <!-- ENTER FORM FIELDS BELOW.  REDISPLAY VALUES UPON ERROR & DISPLAY ERROR MESSAGES. -->
        <label class= form for="fname">First Name:</label>
        <input type="text" name="fname" id="fname" value="<?php if(isset($fname)){echo htmlspecialchars($fname);}?>">
        <?php
        if(!empty($errors['fname'])) {
            echo "<span class= 'error'>". $errors['fname']. "</span>";
        }
        ?>
        <br>
        <label class= form for="lname">Last Name:</label>
        <input type="text" name="lname" id="lname" value="<?php if(isset($lname)){echo htmlspecialchars($lname);}?>">
        <?php
        if(!empty($errors['lname'])) {
            echo "<span class= 'error'>". $errors['lname']. "</span>";
        }
        ?>
        <br>
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
        <br>
        <label class= form for="job">Current Job Title:</label>
        <input type="text" name="job" id="job" value="<?php if(isset($job)){echo htmlspecialchars($job);}?>">
        <?php
        if(!empty($errors['job'])) {
            echo "<span class= 'error'>". $errors['job']. "</span>";
        }
        ?>
        <br>
        <fieldset><legend>Would you like to receive emails? </legend>
            <?php
            if(!empty($errors['preference'])) {
                echo "<br><span class= 'error'>". $errors['preference']. "</span><br>";
            }
            ?>
            <input type="radio" name="preference" id="pyes" value="Y"
            <?php if(isset($preference) && $preference == "Y") {echo "checked";}?>>
            <label for="pyes">Yes</label>
            <br>
            <input type="radio" name="preference" id="pno" value="N"
            <?php if(isset($preference) && $preference == "N") {echo "checked";}?>>
            <label for="pno">No</label>

        </fieldset>
        <fieldset><legend>Do you agree to allow us to use your posts? </legend>
            <?php
            if(!empty($errors['postpreference'])) {
                echo "<br><span class= 'error'>". $errors['postpreference']. "</span><br>";
            }
            ?>
            <input type="radio" name="postpreference" id="posty" value="Y"
                <?php if(isset($postpreference) && $postpreference == "Y") {echo "checked";}?>>
            <label for="posty">Yes</label>
            <br>
            <input type="radio" name="postpreference" id="postno" value="N"
                <?php if(isset($postpreference) && $postpreference == "N") {echo "checked";}?>>
            <label for="postno">No</label>

        </fieldset>
        <br>
        <label class= form for="state">State:</label>
        <?php
        if(!empty($errors['state'])) {
            echo "<span class= 'error'>". $errors['state']. "</span><br>";
        }
        ?>
        <select name="state" id="state">
            <?php
            $sql = "SELECT abbrev, statename FROM statelist ORDER BY priority";
            $result = $pdo->query($sql);
            foreach($result as $row) {
                echo "<option value='" . $row['abbrev'] . "'"; if (isset($state) && $state == $row['abbrev']) {echo "selected";}echo ">" . $row['statename'] . "</option>";
            }


            ?>
        </select>
        <br>
        <label class= form for="bio">Biography:</label>
        <?php
        if(!empty($errors['bio'])) {
            echo "<span class= 'error'>". $errors['bio']. "</span>";
        }
        ?>
        <textarea name="bio" id="bio" placeholder="Please enter your bio"><?php if(isset($bio)){echo $bio;}?></textarea>
        <br>
        <input type="submit" name="submit" id="submit" value= "submit">

    </form>
    <?php
}//*** END of IF statement to SHOW FORM

/* ***********************************************************************************************
 *  PART 5 - PAGE SETUP - FOOTER USAGE
 *    Include your header file with require_once
 *  ******************************************************************************************** */
require_once "footer.php";
?>

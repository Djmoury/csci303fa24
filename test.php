<?php

/*
   * Class:  csci303fa24
   * User:  delaynamoury
   * Date:  8/29/2024
   * Filename:  test.php
   * 
 */
$pageName = "TEST PAGE";
require_once 'header.php';
echo "Delayna";
$fname = "Delayna Moury";
?>


<p> Hello, <?php echo $fname; ?> Welcome back!</p>
<?php
    echo "<p>Hello, $fname.  Welcome back!</p>";
// Example of a string
$varstr1 = "One";

//Another example of a string
$varstr2 = 'Two';

// Example of an integer
$varint = 1;

// Example of a floating-point number
$varfloat = 1.7;

// Example of a boolean
$varbool = True;

//Display contents of variables above:
echo $varstr1;
echo "<br>";
echo $varstr2;
echo "<br>";
echo $varint;
echo "<br>";
echo $varfloat;
echo "<br>";
echo $varbool;
?>

<h3>PHP Self</h3>
<?php
    echo $_SERVER['PHP_SELF'];
    echo "<br>";
    echo basename($_SERVER['SCRIPT_FILENAME']);
?>
<h3>PHP Filename</h3>
<?php
    echo $_SERVER['SCRIPT_FILENAME'];
?>
    <h3>PHP Sever Name</h3>
<?php
echo $_SERVER['SERVER_NAME'];
?>
    <h3>PHP Admin</h3>
<?php
echo $_SERVER['SERVER_ADMIN'];
?>
    <h3>PHP Script Name</h3>
<?php
echo $_SERVER['SCRIPT_NAME'];
?>

<?php
require_once 'footer.php';
?>
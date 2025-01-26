<?php
/*
   * Class:  csci303fa24
   * User:  delaynamoury
   * Date:  11/21/24
   * Filename:  select.php
   * 
 */
$pageName = "select-delayna";
require_once 'header.php';
?>
<?php
echo ($currentFile == "select1.php") ? : "<a href='select1.php'>Select1- SIMPLE QUERY </a>";
?>
<br>
<?php
echo ($currentFile == "select2.php") ? : "<a href='select2.php'>Select2- FETCH (DEFAULT) WITH PREPARED STATEMENTS</a>";
?>
<br>
<?php
echo ($currentFile == "select3.php") ? : "<a href='select3.php'>Select3- FETCH (ASSOCIATIVE ARRAY) </a>";
?>
<br>
<?php
echo ($currentFile == "select4.php") ? : "<a href='select4.php'>Select4- FETCHALL</a>";
?>
<br>
<?php
echo ($currentFile == "select5.php") ? : "<a href='select5.php'>Select5- SELECT APPROPRIATE FIELDS</a>";
?>
<br>
<?php
echo ($currentFile == "selectoptions.php") ? : "<a href='selectoptions.php'>Select6- LINKING TO OPTIONS </a>";
?>
<br>
<?php
echo ($currentFile == "sort.php") ? : "<a href='sort.php'>Select7- LIST OF LINKS  </a>";
?>
<br>
<?php
echo ($currentFile == "selectlist.php") ? : "<a href='selectlist.php'>Select8- VIEW DETAILS WITH BINDVALUES AND GET</a>";
?>
<br>


<?php
require_once 'footer.php';
?>


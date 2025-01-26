<?php
/*
   * Class:  csci303fa24
   * User:  delaynamoury
   * Date:  9/19/24
   * Filename:  s19.php
   * 
 */
 $pageName= "September 19th";
 require_once "header.php";
 ?>


<?php

$flag= FALSE;
$str = "                 Delayna";
$strerr= "";

echo "<h3>print_r</h3>";
/* returns string without spaces */
print_r($str);

echo "<h3>var_dump</h3>";
/* returns amount of spaces */
var_dump($str);

echo "<h3>isset</h3>";
/* By adding a ! before isset, reverses meaning
Returns if a string is set */
if(isset($str)){
    echo "<p>The string is set!</p>";
}
else{
   echo "<p>The string is not set.</p>";
}

echo "<h3>empty</h3>";
/* returns empty or not*/
if(!empty($str)){
    echo "<p>Something here</p>";
}
else{
    echo "<p>Nothing here</p>";
}
echo "<h3>strtolower/strtoupper</h3>";
/*makes string lowercase*/
echo strtolower($str);
echo strtoupper($str);

echo "<h3>strlength</h3>";
/*string length comparison*/
if (strlen($str)<100) {
    echo "<p>String length is less than 100</p>";
}

require_once "footer.php";
?>

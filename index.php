<?php

/*
   * Class:  csci303fa24
   * User:  delaynamoury
   * Date:  9/5/2024
   * Filename:  index.php
   * 
 */

$pageName = "Welcome CCU Alumni!";
require_once 'header.php';
?>

This is the Coastal Carolina University Alumni website. Here you will be able to register for an account, post, update, view,
and delete content about your experience at CCU!
<br>
Below you will find a list of previous posts by fellow Alumni.
<br>
<br>
<?php
$sql= "SELECT * FROM content ORDER BY title";
$result = $pdo->query($sql);
foreach ($result as $row) {
    echo "<a href='contentview.php?q=" . $row['ID'] . "'>" . $row['title'] . "</a><br>";
}
?>
<br>
<br>
<?php

require_once 'footer.php';
?>

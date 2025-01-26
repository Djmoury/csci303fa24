<?php
/*
   * Class:  csci303fa24
   * User:  delaynamoury
   * Date:  11/30/24
   * Filename:  logout.php
   * 
 */


session_start();
session_unset();
session_destroy();
header("Location: confirm.php?state=1");

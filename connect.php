<?php
/*
   * Class:  csci303fa24
   * User:  delaynamoury
   * Date:  10/30/24
   * Filename:  connect.php
   * 
 */
/*  *************************************************************************************************************************************
* CONNECTING TO A DATABASE
**************************************************************************************************************************************
* $dsn (Data Source Name) represents the connection string for the database source.  It includes the driver name (mysql), host name (localhost for us) and the database name you are trying to connect.  The database name is the same as you PHPMyAdmin username.
* $user represents the username.  You have been given a PHPMyAdmin username.  This is not your CCU username.
* $pass represents the password for the database.  You have been provided with a phpMyAdmin password.  This is not your CCU password.
* $pdo represents the code that establishes the connection by creating an instance of the PDO base class (this is a built-in PHP class)
*/
$dsn= "mysql:host=localhost;dbname=303f4djmoury";
$user = "303f4djmoury";
$pwd= "csci303fa241762";
$pdo = new PDO($dsn,$user,$pwd);


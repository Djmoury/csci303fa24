<?php

/*
   * Class:  csci303fa24
   * User:  delaynamoury
   * Date:  9/5/2024
   * Filename:  header.php
   * 
 */

/* *****************************************************************************
 * FA24 Header File Template
 * COPY THIS ENTIRE CODE EXAMPLE ***AFTER YOUR INITIAL COMMENTS***
 *
 * SESSION:  Start the session (Used for Authentication)
 *      PHP Manual:  https://www.php.net/manual/en/function.session-start.php
 * ************************************************************************** */
session_start();  //****LEAVE COMMENTED UNTIL INSTRUCTED****

/* *****************************************************************************
 * ERROR REPORTING:  Display all errors for troubleshooting programming.
 *      ALWAYS LEAVE UNCOMMENTED FOR THIS COURSE
 *      PHP Manual:  https://www.php.net/manual/en/function.error-reporting.php
 *      PHP Manual:  https://www.php.net/manual/en/function.ini-set.php
 * ************************************************************************** */
error_reporting(E_ALL);
ini_set('display_errors','1');

/* *****************************************************************************
 * INCLUDE FILES:  Files needed to run the program
 *      PHP Manual:  https://www.php.net/manual/en/function.include-once.php
 * ************************************************************************** */
require_once "connect.php"; //****LEAVE COMMENTED UNTIL INSTRUCTED****
require_once "functions.php"; //****LEAVE COMMENTED UNTIL INSTRUCTED****

/* *****************************************************************************
 * When using,  watch for CAPITALIZATION of variable names.  Make changes as necessary.
 * Example videos will differ.
 *      PHP Manual:  https://www.php.net/manual/en/function.basename.php
 *      PHP Manual:  https://www.php.net/reserved.variables.server
 * ************************************************************************** */
$currentFile = basename($_SERVER['SCRIPT_FILENAME']);

/* *****************************************************************************
 * BEGIN HTML PAGE
 *      1 - REPLACE the *title* with your CCU USERNAME
 *      2 - REPLACE the name of the *css* file with your own, once created
 *      3 - REPLACE the contents of the *h1* with your full name
 * ************************************************************************** */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>djmoury</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.tiny.cloud/1/5o7mj88vhvtv3r2c5v5qo4htc088gcb5l913qx5wlrtjn81y/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
<header>
    <h1>Delayna Moury</h1>
    <nav>
        <?php
        /* *****************************************************************************
         * MAIN PAGE NAVIGATION
         *      DO NOT DELETE THE FIRST LINE.  You will be appending as necessary.
         *      ADD ADDITIONAL lines on the very next line after the link to the index.
         *          Be sure you add your new links inside the block of PHP code.
         *      PHP Manual:  https://www.php.net/manual/en/language.operators.comparison.php
         *                   (scroll down to Ternary Operator)
         * ************************************************************************** */
        echo ($currentFile == "index.php") ? "Home" : "<a href='index.php'>Home</a>";
        // ADD NEXT LINK IN THIS PHP BLOCK OF CODE
        echo ($currentFile == "useradd.php") ? "Register" : "<a href='useradd.php'>Register</a>";

        if (isset($_SESSION['ID'])) {
            echo ($currentFile == "logout.php") ? "Logout" : "<a href='logout.php'>Logout</a>";
            echo ($currentFile == "contentadd.php") ? "Create a Post" : "<a href='contentadd.php'>Create a Post</a>";
            echo ($currentFile == "contentmanage.php") ? "Posts" : "<a href='contentmanage.php'>Posts</a>";
        } else {
            echo ($currentFile == "login.php") ? "Login" : "<a href='login.php'>Login</a>";
        }

        ;
        ?>
    </nav>
</header>
<main>
    <h2><?php echo $pageName;?></h2>
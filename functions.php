<?php
/*
   * Class:  csci303fa24
   * User:  delaynamoury
   * Date:  11/14/24
   * Filename:  functions.php
   * 
 */

function check_duplicates($pdo,$sql,$field){
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':field', $field);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;

}

function checkLogin(){

    if (!isset($_SESSION['ID'])) {
        echo "<p class='error'>This page requires authentication. Please login to view this page.</p>";
        require_once "footer.php";
        exit();
    }
}

function userCheck(){
    if (isset($_SESSION['status']) && $_SESSION['status'] != 1){
        echo "<p class='error'>Access Denied. You do not have the permissions to access this page.</p>";
        require_once "footer.php";
        exit();
    }

}
 
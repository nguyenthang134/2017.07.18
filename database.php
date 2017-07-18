<?php
/**
 * Created by PhpStorm.
 * User: thang
 * Date: 7/18/17
 * Time: 4:46 PM
 */
$dsn = 'mysql:host=localhost;dbname=my_guitar_shop1';
$username = 'root';
$password = '';
try{
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e){
    $error_message = $e->getMessage();
    include 'database_error.php';
    exit();
}
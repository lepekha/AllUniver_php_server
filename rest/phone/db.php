<?php   

$user = "";
$pass = "";
$pdo = new PDO('mysql:host=localhost;dbname=id3267118_alluniver', $user, $pass,array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
)
);
$pdo->exec('SET NAMES utf8 COLLATE utf8_general_ci;');
?>
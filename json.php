<?php
// require_once "proses.php";
// $users = mysqli_query($con, "SELECT * FROM users ORDER BY `user_id` DESC");
// $users = mysqli_fetch_object($users);



$dbh = new PDO('mysql:host=localhost;dbname=db_test', 'ariel', '');
$db = $dbh->prepare("select * from users");
$db->execute();
$users = $db->fetchAll(PDO::FETCH_ASSOC);

$json = json_encode($users);
echo $json;
// var_dump($users);
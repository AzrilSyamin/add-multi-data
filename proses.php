<?php
require_once 'conf.php';
$con = mysqli_connect($host, $user, $pass);
if (!$con) {
  echo "gagal connect" . mysqli_connect_error();
}

// create tabel & database
$db_name = "CREATE DATABASE IF NOT EXISTS $dbName ";
if (!mysqli_query($con, $db_name) === true) {
  echo "Gagal buat database: " . mysqli_error($con);
} else {
  $con = mysqli_connect($host, $user, $pass, $dbName);
  create_table();
}
// end create table & database

function create_table()
{
  global $con;
  $sql = "CREATE TABLE IF NOT EXISTS users (
    user_id int NOT NULL AUTO_INCREMENT,
    user_name varchar(100) DEFAULT NULL,
    phone_number varchar(13) DEFAULT NULL,
    user_role varchar(50) DEFAULT NULL,
    PRIMARY KEY (user_id)
  ) ENGINE=InnoDB AUTO_INCREMENT=332 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";
  return mysqli_query($con, $sql);
}

function add($data, $total)
{
  global $con;
  for ($i = 1; $i <= $total; $i++) {
    $name = htmlspecialchars($data["user-name-" . $i]);
    $phone = htmlspecialchars($data["phone-number-" . $i]);
    $hobby = htmlspecialchars($data["role-" . $i]);
    if (strlen($phone) < 10 || strlen($phone) > 12) {
      echo "
      <script>
      alert('Phone Number at least 10 digit')
      </script>";
      return false;
    }
    $result = mysqli_query($con, "INSERT INTO users VALUE (NULL,'$name','$phone','$hobby')");
  }
  if ($result) {
    return mysqli_affected_rows($con);
  }
}

function del()
{
  global $con;
  $data = $_POST['checked'];
  foreach ($data as $user) {
    $query = "DELETE FROM users WHERE user_id = '$user'";
    $result = mysqli_query($con, $query);
  }
  if ($result) {
    return mysqli_affected_rows($con);
  }
}

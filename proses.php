<?php
require_once 'conf.php';
$con = mysqli_connect($localhost, $user, $pass, $dbName);


function add($data, $total)
{
  global $con;
  for ($i = 1; $i <= $total; $i++) {
    $first = $data["first-name-" . $i];
    $last = $data["last-name-" . $i];
    $hobby = $data["hobby-" . $i];
    $result = mysqli_query($con, "INSERT INTO users VALUE (NULL,'$first','$last','$hobby')");
  }
  if ($result) {
    echo "<script>window.location='index.php'</script>";
  }
}

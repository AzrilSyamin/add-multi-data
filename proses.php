<?php
require_once 'conf.php';
$con = mysqli_connect($localhost, $user, $pass, $dbName);


function add($data, $total)
{
  global $con;
  for ($i = 1; $i <= $total; $i++) {
    $first = $data["user-name-" . $i];
    $last = $data["phone-number-" . $i];
    $hobby = $data["role-" . $i];
    $result = mysqli_query($con, "INSERT INTO users VALUE (NULL,'$first','$last','$hobby')");
  }
  if ($result) {
    echo "<script>window.location='index.php'</script>";
    return mysqli_affected_rows($con);
  }
}

function del($data)
{
  global $con;
  // $datas = $data['checked'];
  foreach ($data as $user) {
    // var_dump($data);
    $query = "DELETE FROM users WHERE user_id = '$user'";
    $result = mysqli_query($con, $query);
  }
  if ($result) {
    // echo "<script>window.location='index.php'</script>";
    return mysqli_affected_rows($con);
  }
}

function myAlert($result, $action)
{

  if ($result > 0) {
    $result = "successful";
    $color = "success";
  } else {
    $result = "Failed";
    $color = "danger";
  }


  echo "
  <div class=\"col-12\">
    <div class=\"alert alert-$color alert-dismissible fade show\" role=\"alert\">
    $action <b>$result</b> !
    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
    </div>
  </div>
  ";
}

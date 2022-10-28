<?php
require_once "proses.php";
$users = mysqli_query($con, "SELECT * FROM users ORDER BY `user_id` DESC");


?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Lists</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <style>
    .box {
      padding: 10px 10px;
      background-color: #ccc;
      border-radius: 5px;
    }

    .mytable {
      max-height: 600px;
      overflow-y: scroll;
    }
  </style>
</head>

<body>
  <div class="container">

    <div class="row mt-4">

      <!-- contents -->
      <div class="col-md-12">
        <!-- box -->
        <div class="box">
          <?php
          if (isset($_POST["AddAllUsers"])) {
            if (add($_POST, $_POST["total"]) > 0) {
              echo "<script>
                alert('Add user successfully')
                window.location.href='?add'
                </script>";
            }
          }

          if (isset($_POST['btn-delete'])) {
            if (!isset($_POST["checked"])) {
              echo "<script>
              alert('Please select a user first')
              window.location.href='?err'</script>";
              return false;
            }
            echo "<script>
                alert('Delete? Are you sure?')
                </script>";
            if (del() > 0) {
              echo "<script>
                window.location.href='?del'
                </script>";
            }
          }
          ?>
          <!-- header  -->
          <div class="d-flex my-2">
            <h4 class="col-6">User List</h4>
            <button class="col-4 btn btn-success ms-auto" data-bs-toggle="modal" data-bs-target="#AddUser">Add New</button>
          </div>
          <!-- end header  -->

          <form method="POST">
            <!-- responsive tabel  -->
            <div class="table-responsive mytable">
              <!-- table  -->
              <table class="table table-dark table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Role</th>
                    <th scope="col">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="select_all">
                      </div>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($users as $user) : ?>
                    <tr>
                      <th scope="row"><?= $i++; ?></th>
                      <td><?= $user["user_name"]; ?></td>
                      <td><?= $user["phone_number"]; ?></td>
                      <td><?= ($user["user_role"] == NULL) ? '<span class="badge bg-danger">Not Set</span>' : $user["user_role"]; ?></td>
                      <td>
                        <div class="form-check">
                          <input class="form-check-input check" type="checkbox" name="checked[]" value="<?= $user["user_id"]; ?>">
                        </div>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
              <!-- end table  -->
            </div>
            <!-- end responsive table  -->

            <?php
            if (mysqli_num_rows($users) < 1) : ?>
              <div class="bg-secondary mb-2 text-center">
                <p class="badge ">No Data!</p>
              </div>
            <?php endif; ?>

            <!-- action  -->
            <div class="col-md-12 d-flex justify-content-end mt-2">
              <button type="submit" name="btn-edit" class="btn btn-warning mx-2" id="edit">Edit</button>
              <button type="submit" name="btn-delete" class="btn btn-danger" id="del">Delete</button>
            </div>
            <!-- end action  -->

          </form>
        </div>
        <!-- end box -->
      </div>
      <!-- end content  -->




      <!-- Modal 1 -->
      <div class="modal fade" id="AddUser" tabindex="-1" aria-labelledby="AddUserLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="AddUserLabel">Total New Data</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="add.php" method="post" class="row">
                <div class="mb-3">
                  <label for="totalUser" class="form-label">Total Users</label>
                  <input type="number" class="form-control" id="totalUser" name="totalUser" max="" placeholder="10">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary" name="AddData">Next</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- end modal 1 -->

    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
  </script>
  <script>
    $(document).ready(function() {
      $("#select_all").on("click", function() {
        if (this.checked) {
          $(".check").each(function() {
            this.checked = true
          })
        } else {
          $(".check").each(function() {
            this.checked = false
          })
        }
      })

      $(".check").click(function() {
        if ($(".check:checked").length == $(".check").length) {
          $("#select_all").prop("checked", true)
        } else {
          $("#select_all").prop("checked", false)
        }
      })

    })
  </script>
</body>

</html>
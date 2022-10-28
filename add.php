<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <style>
    .box {
      padding: 10px 10px;
      background-color: #ccc;
      border-radius: 5px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row mt-3">
      <?php if (!isset($_POST["AddData"])) {
        echo "<script>
          window.location.href = 'index.php';
        </script>";
      } ?>
      <!-- header  -->
      <div class="col-md-12 my-2 ps-0">
        <a href="index.php" class="btn btn-warning mb-3">Back</a>
        <h2>Add New User</h2>
      </div>
      <!-- end header  -->

      <!-- table add data -->
      <div class="col shadow">
        <!-- add user data  -->
        <form action="index.php" method="post">

          <!-- if $_POST["totalUser"] = null, $_POST["totalUser"] = 1 -->
          <?php ($_POST["totalUser"] == null) ? $_POST["totalUser"] = 1 : $_POST["totalUser"];
          if ($_POST["totalUser"] > 10) {
            echo "<script>
                alert('Max 10 user you can add!')
                window.location.href='?err'
                </script>";
            return false;
          }
          ?>
          <input type="hidden" name="total" value="<?= $_POST["totalUser"]; ?>">

          <div class="col row mt-2">
            <?php
            $total = $_POST["totalUser"];
            for ($i = 1; $i <= $total; $i++) : ?>
              <div class="col-md-4 my-2">
                <div class="box">
                  <h4>User <?= $i; ?></h4>
                  <div class="mb-3">
                    <input type="text" class="form-control" id="user-name" name="user-name-<?= $i; ?>" placeholder="Your Name" required>
                  </div>
                  <div class="mb-3">
                    <input type="number" class="form-control" id="phone-number" name="phone-number-<?= $i; ?>" placeholder="Phone Number" required>
                  </div>
                  <div class=" mb-3">
                    <select class="form-select" name="role-<?= $i; ?>">
                      <option selected value="">--Select--</option>
                      <option value="Owner">Owner</option>
                      <option value="Admin">Admin</option>
                      <option value="User">Subscriber</option>
                    </select>
                    <span class="badge text-danger">*Optional</span>
                  </div>
                </div>
              </div>
            <?php endfor; ?>
          </div>
          <div class="mb-3 py-2 d-flex justify-content-end">
            <button type="submit" class="btn btn-success" name="AddAllUsers">Add User</button>
          </div>

        </form>
        <!-- end add user data  -->


      </div>
      <!-- end table add data -->

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>
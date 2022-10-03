<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row justify-content-center mt-3">
      <?php if (!isset($_POST["AddData"])) : ?>
        <script>
          window.location.href = "index.php";
        </script>
      <?php endif ?>
      <!-- header  -->
      <div class="col-md-8 row my-2">
        <h2 class="col">Add User Data</h2>
      </div>
      <!-- end header  -->

      <!-- table add data -->
      <div class="col-md-8">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">Hobby</th>
            </tr>
          </thead>
          <tbody>
            <!-- add user data  -->
            <form action="index.php" method="post" class="row">
              <!-- if $_POST["totalUser"] = null, $_POST["totalUser"] = 1 -->
              <?php ($_POST["totalUser"] == null) ? $_POST["totalUser"] = 1 : $_POST["totalUser"]; ?>
              <input type="hidden" name="total" value="<?= $_POST["totalUser"]; ?>">
              <?php
              $total = $_POST["totalUser"];
              for ($i = 1; $i <= $total; $i++) : ?>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td>
                    <div class="mb-3">
                      <!-- <label for="first-name" class="form-label">First Name</label> -->
                      <input type="text" class="form-control" id="first-name" name="first-name-<?= $i; ?>" placeholder="Jack">
                    </div>
                  </td>
                  <td>
                    <div class="mb-3">
                      <!-- <label for="last-name" class="form-label">Last Name</label> -->
                      <input type="text" class="form-control" id="last-name" name="last-name-<?= $i; ?>" placeholder="john">
                    </div>
                  </td>
                  <td>
                    <div class="mb-3">
                      <!-- <label for="hobby" class="form-label">Hobby</label> -->
                      <input type="text" class="form-control" id="hobby" name="hobby-<?= $i; ?>" placeholder="Reading Book">
                    </div>
                  </td>
                </tr>
              <?php endfor ?>
              <button type="submit" class="btn btn-success" name="AddAllUsers">Add User Data</button>
            </form>
            <!-- end add user data  -->
          </tbody>
        </table>

      </div>
      <!-- end table add data -->

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>
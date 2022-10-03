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
      <div class="col-md-12 row my-2">
        <h2 class="col">Add User Data</h2>
      </div>
      <!-- end header  -->

      <!-- table add data -->
      <div class="col-md-12">
        <!-- add user data  -->
        <form action="index.php" method="post" class="row bg-secondary justify-content-center">
          <!-- if $_POST["totalUser"] = null, $_POST["totalUser"] = 1 -->
          <?php ($_POST["totalUser"] == null) ? $_POST["totalUser"] = 1 : $_POST["totalUser"]; ?>
          <input type="hidden" name="total" value="<?= $_POST["totalUser"]; ?>">
          <div class="col row ">
            <?php
            $total = $_POST["totalUser"];
            for ($i = 1; $i <= $total; $i++) : ?>
              <div class="col-md-6 row my-2">
                <h3>User Number <?= $i; ?></h3>
                <div class="col-md-6 mb-3">
                  <!-- <label for="first-name" class="form-label">First Name</label> -->
                  <input type="text" class="form-control" id="first-name" name="first-name-<?= $i; ?>" placeholder="Jack">
                </div>
                <div class="col-md-6 mb-3">
                  <!-- <label for="last-name" class="form-label">Last Name</label> -->
                  <input type="text" class="form-control" id="last-name" name="last-name-<?= $i; ?>" placeholder="john">
                </div>
                <div class="mb-3">
                  <!-- <label for="hobby" class="form-label">Hobby</label> -->
                  <input type="text" class="form-control" id="hobby" name="hobby-<?= $i; ?>" placeholder="Reading Book">
                </div>
              </div>
            <?php endfor ?>
          </div>
          <div class="mb-3 py-2 d-flex justify-content-end">
            <button type="submit" class="btn btn-success" name="AddAllUsers">Add User Data</button>
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
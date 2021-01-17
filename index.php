<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>To-Do List</title>
  </head>
  <body>
   <!--Main title-->
    <div class="shadow p-3 mb-5 bg-success rounded">
        <nav class="navbar navbar-dark bg-success mb-1">
            <div class="container-fluid">
                <a href="./index.php"><span class="navbar-brand mb-0 text-uppercase badge bg-danger text-wrap fs-3" style="width: 10rem;">To-Do List</span></a>
            </div>
        </nav>
    </div>

    <!--prikazemo errorje v kolikor so prisotni-->
    <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    ?>

    <?php include('form.php'); ?> <!--vkljucimo PHP kodo iz druge datoteke-->

    <!--Form-->
    <div class="container mb-6" id="formDiv">
        <form action="form.php" method="POST">
            <div class="row g-2">
                <!--Naslov-->
                <div class="col-8">
                    <div class="mb-6">
                        <input type="text" name="name" class="form-control" value="" placeholder="Naslov">
                    </div>
                </div>
                <!--Datum-->
                <div class="col-2">
                    <div class="mb-6">
                        <input type="date" min="" id="date" name="date" class="form-control" value="" placeholder="Datum">
                    </div>
                </div>
                <!--Button za posiljanje podatkov-->
                <div class="col-2">
                    <button type="submit" name="create" class="form-control btn btn-outline-success mb-6"></button>
                </div>
            </div>
        </form>
    </div>

    <!--Obrazci za prikaz podatkov iz baze-->
    <div class="container">
        <div class="row m6">
            <!--Vsebina iz baze-->
            <?php
            // vkljucimo template
            // READ
            include("./template/database.php");
            while ($row = $result->fetch_assoc()): ?>
                <div class="col-sm-4">
                    <div class="card text-center mb-3 bg-success text-light">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase fs-5 fw-bold"><?php echo $row['name']; ?></h5>
                            <p class="card-text fw-lighter"><?php echo $row['date']; ?></p>
                        </div>
                    </div>
                </div>
            <!--Zakljucimo while zanko-->
            <?php endwhile; ?>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>
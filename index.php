<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!--Custom CSS-->
    <link href="./style.css" rel="stylesheet">

<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

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
    <!--prikaz sporocil ob ustvarjanju ali brisanju elementov iz baz-->
    <?php if(isset($_SESSION["sporocilo"])): ?> <!--preverimo ce je session sporocilo bilo nastavljeno-->
        <div class="container mb-6">
            <!--dinamicno nastavi Bootstrap class glede na tip sporocila-->
        <div class="alert alert-<?=$_SESSION['tip_Sporocila']?> mb-3">
            <?php 
                echo $_SESSION['sporocilo'];
                unset($_SESSION['sporocilo']);
            ?>
        </div>
        </div>
    <?php endif ?> <!--zakljucimo if-->

    <!--Form-->
    <div class="container mb-6" id="formDiv">
        <form action="form.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row g-2">
                <!--Naslov-->
                <div class="col-8">
                    <div class="mb-6">
                        <input type="text" name="name" class="form-control" value="<?php echo $name ?>" placeholder="Naslov">
                    </div>
                </div>
                <!--Datum-->
                <div class="col-2">
                    <div class="mb-6">
                        <input type="date" min="" id="date" name="date" class="form-control" value="<?php echo date($date) ?>" placeholder="Datum">
                    </div>
                </div>
                <!--Button za posiljanje podatkov-->
                <div class="col-2">
                    <?php 
                        if ($update == true):
                    ?>
                        <button type="submit" name="update" class="form-control btn btn-outline-warning mb-6">Posodobi <span><i class="icon-edit"></i></span></button>
                    <?php else: ?>
                        <button type="submit" name="create" class="form-control btn btn-outline-success mb-6">Dodaj <span><i class="icon-save"></i></span></button>
                    <?php endif; ?>
                </div>
            </div>
        </form>
    </div>

    <!--Tabela za prikaz podatkov iz baze-->
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
                             <p class="card-text fw-lighter">
                                <?php echo $row['date']; ?> 
                                <span><input class="form-check-input" type="checkbox" id="checkboxDone" style="margin-left: 10px"></span>
                            </p>
                            <!--Urejanje elementa-->
                            <a href="index.php?edit=<?php echo $row['id']; ?>"
                                class="btn btn-warning">Uredi <span><i class="icon-edit"></i></span></a>
                            <!--Brisanje elementa-->
                            <a href="form.php?delete=<?php echo $row['id']; ?>"
                                class="btn btn-danger">Izbrisi <span><i class="icon-trash"></i></span></a>
                        </div>
                    </div>
                </div>
            <!--Zakljucimo while zanko-->
            <?php endwhile; ?>
        </div>
    </div>
    
    <!--Custom JS-->
    <script src="./script.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>
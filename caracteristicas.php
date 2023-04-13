<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caracteristicas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

    <?php include_once('./nav.php'); ?>
    <input type="hidden" id="idUsuario" name="idUsuario" value="<?= $_SESSION['id']; ?>">

    <div class="container">
        <div class="text-center">
            <br>
            <h3>Digite las 10 características que determinaron en su mesa</h3>
            <br>
        </div>

        <div class="row">
            <div class="col-6">
                <form id="formCaracteristicas">
                    <?php for ($i = 1; $i < 6; $i++) {
                    ?>
                        <div class="row align-items-center">
                            <div class="col-1">
                                <label for="caracteristica<?= $i ?>"><span class="circulo_inputs">&nbsp <?= $i ?></span></label>
                            </div>
                            <div class="col-11">
                                <div class="mb-3 mt-3">
                                    <input type="text" class="form-control" required id="caracteristica<?= $i ?>" name="caracteristica<?= $i ?>">
                                </div>
                            </div>
                        </div>
                    <?php
                    } ?>
            </div>

            <div class="col-6">
                <?php for ($i = 6; $i < 11; $i++) {
                ?>
                    <div class="row align-items-center">
                        <div class="col-1">
                            <label for="caracteristica<?= $i ?>"><?php echo ($i != 10) ? "<span class='circulo_inputs'>&nbsp {$i}</span>" : "<span class='circulo_inputs'>&nbsp{$i}</span>" ?></label>
                        </div>
                        <div class="col-11">
                            <div class="mb-3 mt-3">
                                <input type="text" class="form-control" id="caracteristica<?= $i ?>" name="caracteristica<?= $i ?>">
                            </div>
                        </div>
                    </div>
                <?php
                } ?>
            </div>

            <div class="col-12 text-center">
                <br>
                <button type="submit" class="btn btn-secondary" style="background-color: #3C4444;">Agregar</button>
                </form>
            </div>
        </div>
    </div>

    <?php include_once('./footer.php'); ?>

    <script src="./assets/js/main.js"></script>

</body>

</html>
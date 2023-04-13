<?php
require_once('./classMain.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <?php include_once('./nav.php'); ?>
    <input type="hidden" id="idUsuario" name="idUsuario" value="<?= $_SESSION['id']; ?>">

    <div class="container">
        <div class="row g-0">
            <div class="col-lg-4 mt-3 pe-lg-2">
                <div class="card border-dark h-lg-100">
                    <div class="card-body position-relative">
                        <h3>Requerimientos</h3>

                        <?php $requerimientos = $ObjClase->muestraRequerimientos($_SESSION['id']);

                        if (!empty($requerimientos)) {
                            foreach ($requerimientos as $requerimiento) {
                        ?>
                                <div class="col-12">
                                    <div class="mb-3 mt-3">
                                        <input type="text" class="form-control" id="<?= $requerimiento->Requerimiento ?>" disabled name="<?= $requerimiento->Requerimiento ?>" value="<?= $requerimiento->Requerimiento ?>">
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                            echo "No hay requerimientos";
                        } ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 mt-3 pe-lg-2">
                <div class="card border-dark h-lg-100">
                    <div class="card-body position-relative">
                        <h3>Factores</h3><br>

                        <div class="col-12">
                            <form id="formFactores">
                                <p>Requerimiento seleccionado: </p>
                                <select class="form-control" id="reqSelecc" name="reqSelecc">
                                    <?php
                                    if (!empty($requerimientos)) {
                                        foreach ($requerimientos as $requerimiento) {
                                    ?>
                                            <option value="<?= $requerimiento->IdRequerimiento ?>"><?= $requerimiento->Requerimiento ?></option>
                                    <?php
                                        }
                                    } else {
                                        echo "No hay requerimientos";
                                    }
                                    ?>
                                </select>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3 mt-3">
                                    <label for="">Factor Positivo</label>
                                    <input type="text" class="form-control" required id="FacPos" name="FacPos">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="">Factor Negativo</label>
                                    <input type="text" class="form-control" required id="FacNeg" name="FacNeg">
                                </div>
                            </div>
                        </div>

                        <div class="col-12 text-center">
                            <br>
                            <button type="submit" class="btn btn-secondary" style="background-color: #3C4444;">Agregar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once('./footer.php'); ?>

    <script src="./assets/js/main.js"></script>

</body>

</html>
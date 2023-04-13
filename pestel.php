<?php
require_once('./classMain.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pestel</title>
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
                        <table class="table">
                            <h3>Factores Positivos</h3>

                            <tbody>
                                <?php
                                $factores = $ObjClase->muestraFactores($_SESSION['id']);

                                if (!empty($factores)) {
                                    foreach ($factores as $factor) {
                                        if ($factor->Tipo == 1) {
                                ?>
                                            <tr>
                                                <td><?= $factor->Factor ?></td>
                                            </tr>
                                            <?php
                                            ?>
                                <?php
                                        }
                                    }
                                } else {
                                    echo "No hay factores";
                                }
                                ?>
                            </tbody>
                        </table>

                        <table class="table">
                            <h3>Factores Negativos</h3>

                            <tbody>
                                <?php

                                if (!empty($factores)) {
                                    foreach ($factores as $factor) {
                                        if ($factor->Tipo == 0) {
                                ?>
                                            <tr>
                                                <td><?= $factor->Factor ?></td>
                                            </tr>
                                            <?php
                                            ?>
                                <?php
                                        }
                                    }
                                } else {
                                    echo "No hay factores";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 mt-3 pe-lg-2">
                <div class="card border-dark h-lg-100">
                    <div class="card-body position-relative">
                        <div class="col-12">
                            <form id="formPestel">
                                <div class="row">
                                    <div class="col-6 mb-3 mt-3">
                                        <label for="facSelecc">Factor seleccionado: </label>
                                        <select class="form-control" id="facSelecc" name="facSelecc">
                                            <?php
                                            if (!empty($factores)) {
                                                foreach ($factores as $factor) {
                                            ?>
                                                    <option value="<?= $factor->IdFactor ?>"><?= $factor->Factor ?></option>
                                            <?php
                                                }
                                            } else {
                                                echo "No hay factores";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-6 mb-3 mt-3">
                                        <label for="clasificacion">Clasificación del factor:</label>
                                        <select class="form-control" required id="clasificacion" name="clasificacion">
                                            <option value="0">Interno</option>
                                            <option value="1">Externo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="politico">Político:</label>
                                        <select class="form-control" required id="politico" name="politico">
                                            <option value="0">Negativo</option>
                                            <option value="1">Positivo</option>
                                        </select>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="economico">Económico:</label>
                                        <select class="form-control" required id="economico" name="economico">
                                            <option value="0">Negativo</option>
                                            <option value="1">Positivo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="social">Social:</label>
                                        <select class="form-control" required id="social" name="social">
                                            <option value="0">Negativo</option>
                                            <option value="1">Positivo</option>
                                        </select>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="tecnologico">Tecnólogico:</label>
                                        <select class="form-control" required id="tecnologico" name="tecnologico">
                                            <option value="1">Positivo</option>
                                            <option value="0">Negativo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="ecologico">Ecológico:</label>
                                        <select class="form-control" required id="ecologico" name="ecologico">
                                            <option value="0">Negativo</option>
                                            <option value="1">Positivo</option>
                                        </select>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="legal">Legal:</label>
                                        <select class="form-control" required id="legal" name="legal">
                                            <option value="1">Positivo</option>
                                            <option value="0">Negativo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="comentarios">Digite los comentarios que requiera para justificar la clasififación de factor:</label>
                                        <textarea class="form-control" id="comentarios" name="comentarios" rows="4" cols="15"></textarea>
                                    </div>
                                </div>

                                <div class="col-12 text-center">
                                    <br>
                                    <button type="submit" class="btn btn-secondary" style="background-color: #3C4444;">Agregar</button>
                                </div>
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
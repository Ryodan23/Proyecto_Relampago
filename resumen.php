<?php
require_once('./classMain.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

    <?php include_once('./nav.php'); ?>
    <input type="hidden" id="idUsuario" name="idUsuario" value="<?= $_SESSION['id']; ?>">

    <div class="container border border-dark mt-3">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>Factor</th>
                    <th>Clasificacion</th>
                    <th>Político</th>
                    <th>Económico</th>
                    <th>Social</th>
                    <th>Tecnológico</th>
                    <th>Ecológico</th>
                    <th>Legal</th>
                    <th>Comentarios</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                $pesteles = $ObjClase->muestraPestel($_SESSION['id']);

                if (!empty($pesteles)) {
                    foreach ($pesteles as $pestel) {
                ?>
                        <tr>
                            <td><?=$pestel->Factor?></td>
                            <td><?php echo ($pestel->Clasificacion==1) ? "Interno" : "Externo"?></td>
                            <td><?php echo ($pestel->Politico==1) ? "<input class='form-check-input' disabled type='checkbox' name='' checked id=''>" : "<input class='form-check-input' disabled type='checkbox' name='' id=''>"?></td>
                            <td><?php echo ($pestel->Econocimo==1) ? "<input class='form-check-input' disabled type='checkbox' name='' checked id=''>" : "<input class='form-check-input' disabled type='checkbox' name='' id=''>"?></td>
                            <td><?php echo ($pestel->Social==1) ? "<input class='form-check-input' disabled type='checkbox' name='' checked id=''>" : "<input class='form-check-input' disabled type='checkbox' name='' id=''>"?></td>
                            <td><?php echo ($pestel->Tecnologico==1) ? "<input class='form-check-input' disabled type='checkbox' name='' checked id=''>" : "<input class='form-check-input' disabled type='checkbox' name='' id=''>"?></td>
                            <td><?php echo ($pestel->Ecologico==1) ? "<input class='form-check-input' disabled type='checkbox' name='' checked id=''>" : "<input class='form-check-input' disabled type='checkbox' name='' id=''>"?></td>
                            <td><?php echo ($pestel->Legal==1) ? "<input class='form-check-input' disabled type='checkbox' name='' checked id=''>" : "<input class='form-check-input' disabled type='checkbox' name='' id=''>"?></td>
                            <td><?php echo ($pestel->Comentarios!="") ? $pestel->Comentarios : "No hay comentarios"?></td>
                    <?php
                    }
                } else {
                    echo "<br> No hay datos <hr> ";
                }
                    ?>
                        </tr>
            </tbody>
        </table>
    </div>

    <?php include_once('./footer.php'); ?>

</body>

</html>
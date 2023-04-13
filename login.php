<?php

require_once('./classMain.php');

//Login
if (isset($_POST["accion"])) {
    if ($_POST['accion'] == 'iniciarSesion') {
        $usuario = $_POST['usuario'];
        $pass = md5($_POST['contrasena']);

        $login = $ObjClase->login($usuario, $pass);

        if ($login) {
            foreach ($login as $datos => $row) {
                $_SESSION['id'] = $row->IdUsuario;
            }
?>
            <script>
                window.location.href = "./pestel.php";
            </script>
        <?php
        } else {
        ?>
            <script>
                Swal.fire("Error!", "El usuario o la contraseña no coiciden.", "error");
            </script>
<?php
        }
    }
}

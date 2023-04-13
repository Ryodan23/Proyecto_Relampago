<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-sm" style="background-color: #3C4444; height: 90px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="./assets/img/Captura de pantalla 2023-03-30 213758.png" style="height: 80px;" alt="logo"></a>
        </div>
    </nav>

    <div class="container">
        <div class="left">
            <p>
                Comprenda a su audiencia objetivo gracias a un software de segmentación de mercado
            </p>
        </div>

        <div class="right">
            <img src="./assets/img/pestel-analysis-1-what.jpg" style="width:600px" alt="ImagePestel" />
        </div>

        <div class="iniciar text-center">
            <br>
            <br>
            <button class="btn btn-secondary" id="loginBtn" style="background-color: #3C4444;">Iniciar</button>
        </div>

        <div id="loginModal">
            <form>
                <div class="mb-3 mt-3">
                    <label for="usuario" class="form-label">Usuario:</label>
                    <input type="text" class="form-control" id="usuario" placeholder="Usuario" name="usuario">
                </div>
                <div class="mb-3">
                    <label for="contrasena" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="contrasena" placeholder="Contraseña" name="contrasena">
                </div>
                <div class="text-center">
                    <button type="submit" id="btnlogin" name="btnlogin" class="btn btn-outline-dark">Iniciar sesión</button>
                </div>
            </form>
        </div>
    </div>

    <div id="alerta"></div>

    <?php include_once('./footer.php'); ?>

    <script src="./assets/js/main.js"></script>

</body>

</html>
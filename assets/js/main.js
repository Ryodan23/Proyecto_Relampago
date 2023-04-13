$(document).ready(function () {

    /**
     * Abre Modal
     */
    let modal = document.getElementById("loginModal");

    $('#loginBtn').click(function (e) {
        e.preventDefault();

        modal.style.display = "block";
    });

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    /**
    * Iniciar Sesion
    */
    $('#btnlogin').on('click', function (e) {
        e.preventDefault();

        let usuario = $("#usuario").val();
        let contrasena = $("#contrasena").val();
        let accion = "iniciarSesion";

        $.ajax({
            url: "login.php",
            type: "POST",
            data: {
                usuario,
                contrasena,
                accion
            }, success: function (response) {
                $('#alerta').html(response);
            }
        });
    });

    /**
     * ID Usuario
     */
    let idUser = $('#idUsuario').val();

    /**
     * Contadores
     */
    let contadorReq = 1;

    /**
     * Caracteristicas
     */
    $('#formCaracteristicas').submit(function (e) {
        e.preventDefault();

        let caracteristicas = $(this).serializeArray();
        caracteristicas.push({ name: "idUsuario", value: idUser });
        caracteristicas.push({ name: "accion", value: "registraCaracteristicas" });

        $.ajax({
            type: "POST",
            url: "classMain.php",
            data: caracteristicas,
            success: function (response) {
                Swal.fire('Exito!', 'Se registraron las características correctamente', 'success');

                setTimeout(function () {
                    window.location.href = 'requerimientos.php';
                }, 2000);
            }
        });
    });

    /**
     * Requerimientos
     */
    $('#formRequerimientos').submit(function (e) {
        e.preventDefault();

        let caracteristicaActual = $('#caractSelecc').val();

        let requerimientos = $(this).serializeArray();
        requerimientos.push({ name: "idCaracteristica", value: caracteristicaActual });
        requerimientos.push({ name: "accion", value: "registraRequerimientos" });

        $.ajax({
            type: "POST",
            url: "classMain.php",
            data: requerimientos,
            success: function (response) {
                if (contadorReq == 9) {
                    Swal.fire('Exito!', 'Requerimientos registrados correctamente', 'success');

                    setTimeout(function () {
                        window.location.href = 'factores.php';
                    }, 2000);
                } else {
                    Swal.fire('Exito!', 'Requerimientos registrados correctamente', 'success');

                    $('#formRequerimientos').trigger("reset");
                    contadorReq++;
                    $('#caractSelecc').val(contadorReq);
                }
            }
        });
    });

    /**
     * Factores
     */
    $('#formFactores').submit(function (e) {
        e.preventDefault();

        let requerimientoActual = $('#reqSelecc').val();

        let factores = $(this).serializeArray();
        factores.push({ name: "idRequerimiento", value: requerimientoActual });
        factores.push({ name: "accion", value: "registraFactores" });

        $.ajax({
            type: "POST",
            url: "classMain.php",
            data: factores,
            success: function (response) {

                Swal.fire('Exito!', 'Factores registrados correctamente', 'success');

                $('#formFactores').trigger("reset");
            }
        });

    });

    /**
     * Pestel
     */
    $('#formPestel').submit(function (e) {
        e.preventDefault();

        let pestel = $(this).serializeArray();
        pestel.push({ name: "accion", value: "registraPestel" });

        $.ajax({
            type: "POST",
            url: "classMain.php",
            data: pestel,
            success: function (response) {
                let res = JSON.parse(response);

                if (res.response == true) {
                    Swal.fire('Exito!', 'Datos resgistrados correctamente', 'success');

                } else if (res.response == false) {
                    Swal.fire('Error!', 'Se presentó un error', 'error');
                }
            }
        });
    });
});
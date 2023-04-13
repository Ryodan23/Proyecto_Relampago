<?php

namespace clase;

session_start();

use PDO;

class claseGeneral
{
    // private $user = 'tiusr6pl_ProyectoSitios';
    // private $pass = 'c4uU5f@32';
    // private $conn;

    // function __construct()
    // {
    //     $this->conn = new PDO('sqlsrv:server=tiusr6pl.cuc-carrera-ti.ac.cr\MSSQLSERVER2019;database=tiusr6pl_ProyectoSitios', $this->user, $this->pass);
    //     $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    // }

    private $user = 'sa';
    private $pass = '123';
    private $conn;

    function __construct()
    {
        $this->conn = new PDO('sqlsrv:server=127.0.0.1;database=relampago', $this->user, $this->pass);
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }

    public function login()
    {
        $param = func_get_args();

        $query = "SELECT * FROM Usuarios WHERE Usuario=? and Contrasena=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $param[0], PDO::PARAM_STR);
        $stmt->bindParam(2, $param[1], PDO::PARAM_STR);
        $stmt->execute();

        $datos = $stmt->fetchAll();

        if (!empty($datos)) {
            return $datos;
        } else {
            return false;
        }
    }

    public function registraCaracteristicas()
    {
        $param = func_get_args();

        $query = "INSERT INTO Caracteristicas(IdUsuario, Caracteristica) VALUES (?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $param[0], PDO::PARAM_INT);
        $stmt->bindParam(2, $param[1], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function muestraCaracteristicas()
    {
        $param = func_get_args();

        $query = "SELECT * FROM Caracteristicas WHERE IdUsuario=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $param[0], PDO::PARAM_STR);
        $stmt->execute();

        $datos = $stmt->fetchAll();

        if (!empty($datos)) {
            return $datos;
        } else {
            return false;
        }
    }

    public function registraRequerimientos()
    {
        $param = func_get_args();

        $query = "INSERT INTO Requerimientos(IdCaracteristica, Requerimiento) VALUES (?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $param[0], PDO::PARAM_INT);
        $stmt->bindParam(2, $param[1], PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo true;
        } else {
            echo false;
        }
    }

    public function muestraRequerimientos()
    {
        $param = func_get_args();

        $query = "SELECT R.* FROM Requerimientos R JOIN Caracteristicas C ON (R.IdCaracteristica = C.IdCaracteristica) 
        JOIN Usuarios U ON (U.IdUsuario = C.IdUsuario) WHERE U.IdUsuario=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $param[0], PDO::PARAM_STR);
        $stmt->execute();

        $datos = $stmt->fetchAll();

        if (!empty($datos)) {
            return $datos;
        } else {
            return false;
        }
    }

    public function registraFactor()
    {
        $param = func_get_args();

        $query = "INSERT INTO Factores(IdRequerimiento, Factor, Tipo) VALUES (?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $param[0], PDO::PARAM_INT);
        $stmt->bindParam(2, $param[1], PDO::PARAM_STR);
        $stmt->bindParam(3, $param[2], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function muestraFactores()
    {
        $param = func_get_args();

        $query = "SELECT F.* FROM Factores F JOIN Requerimientos R ON (F.IdRequerimiento = R.IdRequerimiento) JOIN Caracteristicas C ON (R.IdCaracteristica = C.IdCaracteristica) 
        JOIN Usuarios U ON (U.IdUsuario = C.IdUsuario) WHERE U.IdUsuario=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $param[0], PDO::PARAM_INT);
        $stmt->execute();

        $datos = $stmt->fetchAll();

        if (!empty($datos)) {
            return $datos;
        } else {
            return false;
        }
    }

    public function registraPestel()
    {
        $param = func_get_args();

        $query = "INSERT INTO Pestel(IdFactor, Clasificacion, Politico, Econocimo, Social, Tecnologico, Ecologico, Legal, Comentarios) VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $param[0], PDO::PARAM_INT);
        $stmt->bindParam(2, $param[1], PDO::PARAM_INT);
        $stmt->bindParam(3, $param[2], PDO::PARAM_INT);
        $stmt->bindParam(4, $param[3], PDO::PARAM_INT);
        $stmt->bindParam(5, $param[4], PDO::PARAM_INT);
        $stmt->bindParam(6, $param[5], PDO::PARAM_INT);
        $stmt->bindParam(7, $param[6], PDO::PARAM_INT);
        $stmt->bindParam(8, $param[7], PDO::PARAM_INT);
        $stmt->bindParam(9, $param[8], PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo json_encode(array('response'=>true));
        } else {
            echo json_encode(array('response'=>false));
        }
    }

    public function muestraPestel()
    {
        $param = func_get_args();

        $query = "SELECT P.*, F.* FROM Pestel P JOIN Factores F ON (P.IdFactor = F.IdFactor) JOIN Requerimientos R ON (F.IdRequerimiento = R.IdRequerimiento) 
        JOIN Caracteristicas C ON (R.IdCaracteristica = C.IdCaracteristica) 
        JOIN Usuarios U ON (U.IdUsuario = C.IdUsuario) WHERE U.IdUsuario=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $param[0], PDO::PARAM_INT);
        $stmt->execute();

        $datos = $stmt->fetchAll();

        if (!empty($datos)) {
            return $datos;
        } else {
            return false;
        }
    }
}

$ObjClase = new claseGeneral();

// Caracteristicas
if (isset($_POST['accion'])) {
    if ($_POST['accion'] == 'registraCaracteristicas') {
        $idUsuario = $_POST['idUsuario'];

        for ($i = 1; $i < 6; $i++) {
            $ObjClase->registraCaracteristicas($idUsuario, $_POST["caracteristica{$i}"]);
        }
    }
}

// Requerimientos
if (isset($_POST['accion'])) {
    if ($_POST['accion'] == 'registraRequerimientos') {
        $idCaracteristica = $_POST['idCaracteristica'];

        for ($i = 1; $i < 4; $i++) {
            $ObjClase->registraRequerimientos($idCaracteristica, $_POST["requerimiento{$i}"]);
        }
    }
}

// Factores
if (isset($_POST['accion'])) {
    if ($_POST['accion'] == 'registraFactores') {
        $idRequerimiento = $_POST['idRequerimiento'];
        $facPos = $_POST['FacPos'];
        $facNeg = $_POST['FacNeg'];

        for ($i = 0; $i < 2; $i++) {
            if ($i == 0) {
                $ObjClase->registraFactor($idRequerimiento, $facNeg, $i);
            } else {
                $ObjClase->registraFactor($idRequerimiento, $facPos, $i);
            }
        }
    }
}

// Pestel
if (isset($_POST['accion'])) {
    if ($_POST['accion'] == 'registraPestel') {
        $idFactor = $_POST['facSelecc'];
        $clasificacion = $_POST['clasificacion'];
        $politico = $_POST['politico'];
        $economico = $_POST['economico'];
        $social = $_POST['social'];
        $tecnologico = $_POST['tecnologico'];
        $ecologico = $_POST['ecologico'];
        $legal = $_POST['legal'];
        $comentarios = $_POST['comentarios'];

        $ObjClase->registraPestel($idFactor, $clasificacion, $politico, $economico, $social, $tecnologico, $ecologico, $legal, $comentarios);
    }
}

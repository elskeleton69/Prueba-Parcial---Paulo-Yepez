<?php
require_once("../config/conexion.php");

class Suministra{
    public function todos()
{
    $con = new ClaseConectar();
    $con = $con->ProcedimientoConectar();
    $cadena = "SELECT * FROM Suministra";
    $datos = mysqli_query($con, $cadena);
    $con->close();
    return $datos;
}

public function uno($ID_suministra)
{
    $con = new ClaseConectar();
    $con = $con->ProcedimientoConectar();
    $cadena = "SELECT * FROM Suministra WHERE ID_suministra = $ID_suministra";
    $datos = mysqli_query($con, $cadena);
    $con->close();
    return $datos;
}

public function Insertar($ID_proveedor, $ID_pedido)
{
    $con = new ClaseConectar();
    $con = $con->ProcedimientoConectar();
    $cadena = "INSERT INTO Suministra (ID_proveedor, ID_pedido) VALUES ($ID_proveedor, $ID_pedido)";
    if (mysqli_query($con, $cadena)) {
        $con->close();
        return "ok";
    } else {
        $con->close();
        return 'Error al insertar en la base de datos';
    }
}

public function Actualizar($ID_proveedor, $ID_pedido, $ID_suministra)
{
    $con = new ClaseConectar();
    $con = $con->ProcedimientoConectar();
    $cadena = "UPDATE Suministra SET ID_proveedor = $ID_proveedor, ID_pedido = $ID_pedido WHERE ID_suministra = $ID_suministra";
    if (mysqli_query($con, $cadena)) {
        $con->close();
        return "ok";
    } else {
        $con->close();
        return 'Error al actualizar el registro';
    }
}

public function Eliminar($ID_suministra)
{
    $con = new ClaseConectar();
    $con = $con->ProcedimientoConectar();
    $cadena = "DELETE FROM Suministra WHERE ID_suministra = $ID_suministra";
    if (mysqli_query($con, $cadena)) {
        $con->close();
        return true;
    } else {
        $con->close();
        return false;
    }
}

}
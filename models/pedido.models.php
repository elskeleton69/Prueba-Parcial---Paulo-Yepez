<?php
require_once("../config/conexion.php");

class Pedidos{
    public function todos()
{
    $con = new ClaseConectar();
    $con = $con->ProcedimientoConectar();
    $cadena = "SELECT * FROM Pedido";
    $datos = mysqli_query($con, $cadena);
    $con->close();
    return $datos;
}

public function uno($ID_pedido)
{
    $con = new ClaseConectar();
    $con = $con->ProcedimientoConectar();
    $cadena = "SELECT * FROM Pedido WHERE ID_pedido = $ID_pedido";
    $datos = mysqli_query($con, $cadena);
    $con->close();
    return $datos;
}

public function Insertar($Fecha, $Total, $Estado, $Metodo_pago)
{
    $con = new ClaseConectar();
    $con = $con->ProcedimientoConectar();
    $cadena = "INSERT INTO Pedido (Fecha, Total, Estado, Metodo_pago) VALUES ('$Fecha', $Total, '$Estado', '$Metodo_pago')";
    if (mysqli_query($con, $cadena)) {
        $con->close();
        return "ok";
    } else {
        $con->close();
        return 'Error al insertar en la base de datos';
    }
}

public function Actualizar($ID_pedido, $Fecha, $Total, $Estado, $Metodo_pago)
{
    $con = new ClaseConectar();
    $con = $con->ProcedimientoConectar();
    $cadena = "UPDATE Pedido SET Fecha = '$Fecha', Total = $Total, Estado = '$Estado', Metodo_pago = '$Metodo_pago' WHERE ID_pedido = $ID_pedido";
    if (mysqli_query($con, $cadena)) {
        $con->close();
        return "ok";
    } else {
        $con->close();
        return 'Error al actualizar el registro';
    }
}

public function Eliminar($ID_pedido)
{
    $con = new ClaseConectar();
    $con = $con->ProcedimientoConectar();
    $cadena = "DELETE FROM Pedido WHERE ID_pedido = $ID_pedido";
    if (mysqli_query($con, $cadena)) {
        $con->close();
        return true;
    } else {
        $con->close();
        return false;
    }
}

}
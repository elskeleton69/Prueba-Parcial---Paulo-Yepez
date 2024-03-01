<?php
require_once("../config/conexion.php");

class Proveedores
{
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT 
        P.ID_proveedor,
        P.Nombre AS NombreProveedor,
        P.Producto_suministrado,
        P.Contacto,
        P.Telefono,
        Pedido.ID_pedido,
        Pedido.Fecha,
        Pedido.Total,
        Pedido.Estado,
        Pedido.Metodo_pago
    FROM 
        Proveedor AS P
    INNER JOIN 
        Suministra AS S ON P.ID_proveedor = S.ID_proveedor
    INNER JOIN 
        Pedido ON S.ID_pedido = Pedido.ID_pedido;
    ";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }

    public function uno($ID_proveedor)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM Proveedor WHERE ID_proveedor = $ID_proveedor";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }


    public function insertar($Nombre, $Producto_suministrado, $Contacto, $Telefono, $idpedido)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO Proveedor (Nombre, Producto_suministrado, Contacto, Telefono)
        VALUES ('$Nombre', '$Producto_suministrado', '$Contacto', '$Telefono');";
        if (mysqli_query($con, $cadena)) {
            require_once('../models/suministra.php');
            $suministra = new Suministra();

            return $suministra->Insertar(mysqli_insert_id($con), $idpedido);
        } else {
            return 'Error al insertar en la base de datos';
        }
        $con->close();
    }

    public function Actualizar($ID_proveedor, $Nombre, $Producto_suministrado, $Contacto, $Telefono)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE Proveedor SET Nombre='$Nombre', Producto_suministrado='$Producto_suministrado', Contacto='$Contacto', Telefono='$Telefono' WHERE ID_proveedor=$ID_proveedor";

        if (mysqli_query($con, $cadena)) {
            return $ID_proveedor;
        } else {
            return 'Error al actualizar el registro';
        }

        $con->close();
    }

    public function Eliminar($ID_proveedor)
    {

        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM Suministra WHERE ID_proveedor = $ID_proveedor";
        mysqli_query($con, $cadena);


        $cadena = "DELETE FROM Proveedor WHERE ID_proveedor = $ID_proveedor";
        if (mysqli_query($con, $cadena)) {
            $con->close();
            return true;
        } else {
            return false;
        }
        $con->close();
    }

}
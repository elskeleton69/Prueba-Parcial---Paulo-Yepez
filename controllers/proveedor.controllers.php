<?php
error_reporting(0);
require_once("../config/sesiones.php");
require_once("../models/proveedor.models.php");

$Proveedores = new Proveedores;
switch ($_GET["op"]) {
    /* Procedimiento para listar todos los registros */
    case 'todos':
        $datos = array();
        $datos = $Proveedores->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
    
    /* Procedimiento para sacar un registro */
    case 'uno':
        $id_proveedor = $_POST["ID_proveedor"];
        $datos = array();
        $datos = $Proveedores->uno($id_proveedor);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    /* Procedimiento para insertar */
    case 'insertar':
        $Nombre = $_POST["Nombre"];
        $Producto_suministrado = $_POST["Producto_suministrado"];
        $Contacto = $_POST["Contacto"];
        $Telefono = $_POST["Telefono"];
        $ID_pedido = $_POST["ID_pedido"];
        $datos = array();
        $datos = $Proveedores->insertar($Nombre, $Producto_suministrado, $Contacto, $Telefono,$ID_pedido);
        echo json_encode($datos);
        break;
    
    /* Procedimiento para actualizar */
    case 'actualizar':
        $id_proveedor = $_POST["id_proveedor"];
        $Nombre = $_POST["Nombre"];
        $Producto_suministrado = $_POST["Producto_suministrado"];
        $Contacto = $_POST["Contacto"];
        $Telefono = $_POST["Telefono"];
        $datos = array();
        $datos = $Proveedores->Actualizar($id_proveedor, $Nombre, $Producto_suministrado, $Contacto, $Telefono);
        echo json_encode($datos);
        break;

    /* Procedimiento para eliminar */
    case 'eliminar':
        $id_proveedor = $_POST["id_proveedor"];
        $datos = array();
        $datos = $Proveedores->Eliminar($id_proveedor);
        echo json_encode($datos);
        break;
}


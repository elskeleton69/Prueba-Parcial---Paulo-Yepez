<?php
error_reporting(0);
require_once("../config/sesiones.php");
require_once("../models/pro.models.php");

$Proveedores = new Proveedores;
switch ($_GET["op"]) {
    /* Procedimiento para listar todos los registros */
    case 'todos':
        $datos = array();
        $datos = $proveedor->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
    
    /* Procedimiento para sacar un registro */
    case 'uno':
        $id_proveedor = $_POST["ID_proveedor"];
        $datos = array();
        $datos = $proveedor->uno($id_proveedor);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    /* Procedimiento para insertar */
    case 'insertar':
        $Nombre = $_POST["Nombre"];
        $Producto_suministrado = $_POST["Producto_suministrado"];
        $Contacto = $_POST["Contacto"];
        $Telefono = $_POST["Telefono"];
        $datos = array();
        $datos = $proveedor->Insertar($Nombre, $Producto_suministrado, $Contacto, $Telefono);
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
        $datos = $proveedor->Actualizar($id_proveedor, $Nombre, $Producto_suministrado, $Contacto, $Telefono);
        echo json_encode($datos);
        break;

    /* Procedimiento para eliminar */
    case 'eliminar':
        $id_proveedor = $_POST["id_proveedor"];
        $datos = array();
        $datos = $proveedor->Eliminar($id_proveedor);
        echo json_encode($datos);
        break;
}


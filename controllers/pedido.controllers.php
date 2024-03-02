<?php
error_reporting(0); 
require_once("../config/sesiones.php");
require_once("../models/pedido.models.php");

$Pedidos = new Pedidos;

switch ($_GET["op"]) {
    /* Procedimiento para listar todos los registros */
    case 'todos':
        $datos = array();
        $datos = $Pedidos->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
    
    /* Procedimiento para sacar un registro */
    case 'uno':
        $ID_pedido = $_POST["ID_pedido"];
        $datos = array();
        $datos = $Pedidos->uno($ID_pedido);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    /* Procedimiento para insertar */
    case 'insertar':
        $Fecha = $_POST["Fecha"];
        $Total = $_POST["Total"];
        $Estado = $_POST["Estado"];
        $Metodo_pago = $_POST["Metodo_pago"];
        $datos = array();
        $datos = $Pedidos->Insertar($Fecha, $Total, $Estado, $Metodo_pago);
        echo json_encode($datos);
        break;
    
    /* Procedimiento para actualizar */
    case 'actualizar':
        $ID_pedido = $_POST["ID_pedido"];
        $Fecha = $_POST["Fecha"];
        $Total = $_POST["Total"];
        $Estado = $_POST["Estado"];
        $Metodo_pago = $_POST["Metodo_pago"];
        $datos = array();
        $datos = $Pedidos->Actualizar($ID_pedido, $Fecha, $Total, $Estado, $Metodo_pago);
        echo json_encode($datos);
        break;

    /* Procedimiento para eliminar */
    case 'eliminar':
        $ID_pedido = $_POST["ID_pedido"];
        $datos = array();
        $datos = $Pedidos->Eliminar($ID_pedido);
        echo json_encode($datos);
        break;
}

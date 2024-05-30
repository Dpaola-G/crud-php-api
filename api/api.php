<?php
include ('../Models/ProductoDAO.php');
header("Content-type: application/json"); // Corregido el encabezado

$method = $_SERVER['REQUEST_METHOD'];
$class = new ProductoDao ();

switch($method){
    case 'GET':
     $resultado= $class->TraerClases();
     echo (json_encode($resultado));
     break;

    case 'POST': // Corregido el switch y eliminada la condición redundante
        $data = json_decode(file_get_contents('php://input'), true);
        $id = $data['id'];
        $nombre = $data['nombre'];
        $descripcion = $data['descripcion'];
        $respuesta = $class->agregarClases($id, $nombre, $descripcion);
        echo (json_encode($respuesta)); // Corregida la variable a imprimir
        break;

    case 'DELETE': // Corregido el switch y eliminada la condición redundante
        $data = json_decode(file_get_contents('php://input'), true);
        $id = $data['id'];
        $msg = $class->eliminarClases($_data['id']);
        echo (json_encode($respuesta)); 
        
    case 'PUT': // Corregido el switch y eliminada la condición redundante
        $data = json_decode(file_get_contents('php://input'), true);
        $id = $data['id'];
        $nombre = $data['nombre'];
        $descripcion = $data['descripcion'];
        $respuesta =$class->actualizarClase($data['id'],$data['nombre'],$data['descripcion']);
        echo (json_encode($respuesta));     
}
?>

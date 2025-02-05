<?php
    require "config.php";
    
    $datos = json_decode(file_get_contents("php://input"));
    $request = $datos->request;
    
    // READ: Leer los registros de la base de datos
    if($request == 1){
      $sql = "SELECT * FROM ingrediente";
      $query = $mysqli->query($sql);
        
      $datos = array();
      while($resultado = $query->fetch_assoc()) {
        $datos[] = $resultado;
      }
        
      echo json_encode($datos);
      exit;
    }

    // CREATE: Insertar registro en la base de datos
    if($request == 2) {

      $nombre = $datos->nombre;
      $descripcion = $datos->descripcion;
      $fecha_ingreso = $datos->fecha_ingreso;
      $fecha_vencimiento = $datos->fecha_vencimiento;

      $sql_select = "SELECT nombre FROM ingrediente WHERE nombre='$nombre'";
      $query_select = $mysqli->query($sql_select);

      if(($query_select->num_rows) == 0) {
        // Inserta los datos correspondientes
        $sql_insert = "INSERT INTO ingrediente(nombre, descripcion, fecha_ingreso, fecha_vencimiento) VALUES('$nombre', '$descripcion', '$fecha_ingreso', '$fecha_vencimiento')";
        if($mysqli->query($sql_insert) === TRUE) {
          echo "Se registro exitosamente.";
        } else {
          echo "Ocurrio un problema.";
        }
      } else {
        echo "Esos datos ya existen.";
      }
      exit;
    }

    // UPDATE: Actualizar el registro de la base de datos
    if($request == 3) {

      $id_ingrediente = $datos->id_ingrediente;
      $nombre = $datos->nombre;
      $descripcion = $datos->descripcion;
      $fecha_ingreso = $datos->fecha_ingreso;
      $fecha_vencimiento = $datos->fecha_vencimiento;

      $sql_edit = "UPDATE ingrediente SET nombre='$nombre', descripcion='$descripcion', fecha_ingreso='$fecha_ingreso', fecha_vencimiento='$fecha_vencimiento'
      WHERE id_ingrediente='$id_ingrediente'";
      $query_update = $mysqli->query($sql_edit);

      echo "Se actualizo el registro.";
      exit;
    }

    // DELETE: Borrar registro de la base de datos
    if($request == 4) {
      
      $id_ingrediente = $datos->id_ingrediente;

      $sql_delete = "DELETE FROM ingrediente WHERE id_ingrediente='$id_ingrediente'";
      $query_delete = $mysqli->query($sql_delete);

      echo "Registro eliminado.";
      exit;
    }

?>
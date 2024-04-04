<?php
    require "config.php";
    
    $datos = json_decode(file_get_contents("php://input"));
    $request = $datos->request;
    
    // READ: Leer los registros de la base de datos
    if($request == 1){
      $sql = "SELECT * FROM pastel";
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
      $preparado_por = $datos->preparado_por;
      $fecha_creacion = $datos->fecha_creacion;
      $fecha_vencimiento = $datos->fecha_vencimiento;

      $sql_select = "SELECT nombre FROM pastel WHERE nombre='$nombre'";
      $query_select = $mysqli->query($sql_select);

      if(($query_select->num_rows) == 0) {
        // Inserta los datos correspondientes
        $sql_insert = "INSERT INTO pastel(nombre, descripcion, preparado_por, fecha_creacion, fecha_vencimiento) VALUES('$nombre', '$descripcion', '$preparado_por', '$fecha_creacion', '$fecha_vencimiento')";
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

      $id_pastel = $datos->id_pastel;
      $nombre = $datos->nombre;
      $descripcion = $datos->descripcion;
      $preparado_por = $datos->preparado_por;
      $fecha_creacion = $datos->fecha_creacion;
      $fecha_vencimiento = $datos->fecha_vencimiento;

      $sql_edit = "UPDATE pastel SET nombre='$nombre', descripcion='$descripcion', preparado_por='$preparado_por', fecha_creacion='$fecha_vencimiento', fecha_vencimiento='$fecha_vencimiento'
      WHERE id_pastel='$id_pastel'";
      $query_update = $mysqli->query($sql_edit);

      echo "Se actualizo el registro.";
      exit;
    }

    // DELETE: Borrar registro de la base de datos
    if($request == 4) {
      
      $id_pastel = $datos->id_pastel;

      $sql_delete = "DELETE FROM pastel WHERE id_pastel='$id_pastel'";
      $query_delete = $mysqli->query($sql_delete);

      echo "Registro eliminado.";
      exit;
    }

?>
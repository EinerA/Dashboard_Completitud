<?php
  // Configuramos la conexión a la base de datos
  $serverName = "localhost"; //serverName\instanceName
  // Puesto que no se han especificado UID ni PWD en el array  $connectionInfo,
  // La conexión se intentará utilizando la autenticación Windows.
  $connectionInfo = array( 'CharacterSet' => 'UTF-8',"Database"=>"tigo");
  $conn = sqlsrv_connect( $serverName, $connectionInfo);

  if( $conn ) {
     //  echo "Conexión establecida.<br />";

  }else{
       //echo "Conexión no se pudo establecer.<br />";
       //die( print_r( sqlsrv_errors(), true));
  }

// Seleccionamos los datos de la tabla postres


?>
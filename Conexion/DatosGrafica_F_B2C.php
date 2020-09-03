
<?php
header('Content-type: application/json; charset=utf-8');
require 'sqlServer.php';
$Unidad = $_GET['unit'];


            $sql = "SELECT * FROM Fijo_Hogar_Celular; ;";
            $stmt = sqlsrv_query( $conn, $sql  );
            // Hacemos un bucle con los datos obtenidos
            $data = array();
                while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                 $data[]= array('Orden' => (string)$row['Orden'],'Rango_Cal' => (string)$row['Rango_Cal'],'Grupo' => (string)$row['Grupo'],'Cantidad' => (string)$row['Cantidad'],'Porc' => (string)$row['Porc'],'Promedio' => (string)$row['Promedio'],);
                }

            $sql = "SELECT * FROM Fijo_Hogar_Correo; ;";
            $stmt = sqlsrv_query( $conn, $sql  );
            // Hacemos un bucle con los datos obtenidos
            $dataFHCorreo = array();
                while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                    $dataFHCorreo[]= array('Orden' => (string)$row['Orden'],'Rango_Cal' => (string)$row['Rango_Cal'],'Grupo' => (string)$row['Grupo'],'Cantidad' => (string)$row['Cantidad'],'Porc' => (string)$row['Porc'],'Promedio' => (string)$row['Promedio'],);
                }

            $sql = "SELECT * FROM Fijo_Hogar_Residencial; ;";
            $stmt = sqlsrv_query( $conn, $sql  );
            // Hacemos un bucle con los datos obtenidos
            $dataFHResidencial = array();
                while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                    $dataFHResidencial[]= array('Orden' => (string)$row['Orden'],'Rango_Cal' => (string)$row['Rango_Cal'],'Grupo' => (string)$row['Grupo'],'Cantidad' => (string)$row['Cantidad'],'Porc' => (string)$row['Porc'],'Promedio' => (string)$row['Promedio'],);
                }

            // Data Completitud fijo hogar -Celular
            $sql = "SELECT Negocio,	Segmento,	Contacto,	Anio,	DATENAME (MONTH,'1901-'+Mes+'-01')  Mes,	Cantidad,	Ocupacion, ROUND(cast(REPLACE(Porc_Completitud,',','.') as float) *100.0, 2 ) Porc_Completitud
                    FROM Data_Completitud where Negocio='FIJO' AND Segmento='B2C' AND Contacto='Celular' ;";
            $stmt = sqlsrv_query( $conn, $sql  );
            $dataCompletitud_FH_TC = array();
                while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                    $dataCompletitud_FH_TC[]= array('Negocio' => (string)$row['Negocio'],'Segmento' => (string)$row['Segmento'],'Contacto' => (string)$row['Contacto'],'Anio' => (string)$row['Anio'],'Mes' => (string)$row['Mes'],'Cantidad' => (string)$row['Cantidad'],'Ocupacion' => (string)$row['Ocupacion'],'Porc_Completitud' => (string)$row['Porc_Completitud']);
                }    

            // Data Completitud fijo hogar -Correo Electronico 
            $sql = "SELECT Negocio,	Segmento,	Contacto,	Anio,	DATENAME (MONTH,'1901-'+Mes+'-01')  Mes,	Cantidad,	Ocupacion, ROUND(cast(REPLACE(Porc_Completitud,',','.') as float) *100.0, 2 ) Porc_Completitud
            FROM Data_Completitud where Negocio='FIJO' AND Segmento='B2C' AND Contacto='Correo Electrónico' ;";
            $stmt = sqlsrv_query( $conn, $sql  );
            $dataCompletitud_FH_CE = array();
                while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                    $dataCompletitud_FH_CE[]= array('Negocio' => (string)$row['Negocio'],'Segmento' => (string)$row['Segmento'],'Contacto' => (string)$row['Contacto'],'Anio' => (string)$row['Anio'],'Mes' => (string)$row['Mes'],'Cantidad' => (string)$row['Cantidad'],'Ocupacion' => (string)$row['Ocupacion'],'Porc_Completitud' => (string)$row['Porc_Completitud']);
                } 

            // Data Completitud fijo hogar -Correo Electronico 
            $sql = "SELECT Negocio,	Segmento,	Contacto,	Anio,	DATENAME (MONTH,'1901-'+Mes+'-01')  Mes,	Cantidad,	Ocupacion, ROUND(cast(REPLACE(Porc_Completitud,',','.') as float) *100.0, 2 ) Porc_Completitud
            FROM Data_Completitud where Negocio='FIJO' AND Segmento='B2C' AND Contacto='Teléfono Fijo' ;";
            $stmt = sqlsrv_query( $conn, $sql  );
            $dataCompletitud_FH_TF = array();
                while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                    $dataCompletitud_FH_TF[]= array('Negocio' => (string)$row['Negocio'],'Segmento' => (string)$row['Segmento'],'Contacto' => (string)$row['Contacto'],'Anio' => (string)$row['Anio'],'Mes' => (string)$row['Mes'],'Cantidad' => (string)$row['Cantidad'],'Ocupacion' => (string)$row['Ocupacion'],'Porc_Completitud' => (string)$row['Porc_Completitud']);
                }  


  if( $stmt === false) {
      die( print_r( sqlsrv_errors(), true) );
  }

  

  
$dataFULL = array();
$dataFULL1 = array();
for ($i = 0; $i < count($data); $i++) {
    $dataFULL[0][]=array('Orden_Fijo_Hogar_Celular' => $data[$i]['Orden'],'Rango_Cal_Fijo_Hogar_Celular' => $data[$i]['Rango_Cal'],'Grupo_Fijo_Hogar_Celular' => $data[$i]['Grupo'],'Cantidad_Fijo_Hogar_Celular' => $data[$i]['Cantidad'],'Porcentaje_Fijo_Hogar_Celular' => $data[$i]['Porc'],'Promedio_Fijo_Hogar_Celular' => $data[$i]['Promedio'],
                    'Orden_FHCorreo' => $dataFHCorreo[$i]['Orden'],'Rango_Cal_FHCorreo' => $dataFHCorreo[$i]['Rango_Cal'],'Grupo_FHCorreo' => $dataFHCorreo[$i]['Grupo'],'Cantidad_FHCorreo' => $dataFHCorreo[$i]['Cantidad'],'Porcentaje_FHCorreo' => $dataFHCorreo[$i]['Porc'],'Promedio_FHCorreo' => $dataFHCorreo[$i]['Promedio'],
                    'Orden_FHResidencial' => $dataFHResidencial[$i]['Orden'],'Rango_Cal_FHResidencial' => $dataFHResidencial[$i]['Rango_Cal'],'Grupo_FHResidencial' => $dataFHResidencial[$i]['Grupo'],'Cantidad_FHResidencial' => $dataFHResidencial[$i]['Cantidad'],'Porcentaje_FHResidencial' => $dataFHResidencial[$i]['Porc'],'Promedio_FHResidencial' => $dataFHResidencial[$i]['Promedio'],);
                    };
for ($i = 0; $i < count($dataCompletitud_FH_TC); $i++) {
$dataFULL['dataCompletitud_FH_TC'][]=array('Negocio' => $dataCompletitud_FH_TC[$i]['Negocio'],'Segmento' => $dataCompletitud_FH_TC[$i]['Segmento'],'Contacto' => $dataCompletitud_FH_TC[$i]['Contacto'],'Anio' => $dataCompletitud_FH_TC[$i]['Anio'],'name' => $dataCompletitud_FH_TC[$i]['Mes'],'y' => (int)$dataCompletitud_FH_TC[$i]['Cantidad'],'Ocupacion' => $dataCompletitud_FH_TC[$i]['Ocupacion'],'porcentaje' => $dataCompletitud_FH_TC[$i]['Porc_Completitud'],'color' => "#00377b");
};
for ($i = 0; $i < count($dataCompletitud_FH_TC); $i++) {
    $dataFULL['dataCompletitud_FH_CE'][]=array('Negocio' => $dataCompletitud_FH_CE[$i]['Negocio'],'Segmento' => $dataCompletitud_FH_CE[$i]['Segmento'],'Contacto' => $dataCompletitud_FH_CE[$i]['Contacto'],'Anio' => $dataCompletitud_FH_CE[$i]['Anio'],'name' => $dataCompletitud_FH_CE[$i]['Mes'],'y' => (int)$dataCompletitud_FH_CE[$i]['Cantidad'],'Ocupacion' => $dataCompletitud_FH_CE[$i]['Ocupacion'],'porcentaje' => $dataCompletitud_FH_CE[$i]['Porc_Completitud'],'color' => "#00377b");
    };

for ($i = 0; $i < count($dataCompletitud_FH_TC); $i++) {
    $dataFULL['dataCompletitud_FH_TF'][]=array('Negocio' => $dataCompletitud_FH_TF[$i]['Negocio'],'Segmento' => $dataCompletitud_FH_TF[$i]['Segmento'],'Contacto' => $dataCompletitud_FH_TF[$i]['Contacto'],'Anio' => $dataCompletitud_FH_TF[$i]['Anio'],'name' => $dataCompletitud_FH_TF[$i]['Mes'],'y' => (int)$dataCompletitud_FH_TF[$i]['Cantidad'],'Ocupacion' => $dataCompletitud_FH_TF[$i]['Ocupacion'],'porcentaje' => $dataCompletitud_FH_TF[$i]['Porc_Completitud'],'color' => "#00377b");
    };
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
// Mostramos los datos en formato JSON
echo json_encode($dataFULL);
?>
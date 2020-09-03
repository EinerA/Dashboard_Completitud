
<?php
header('Content-type: application/json; charset=utf-8');
require 'sqlServer.php';
//$Unidad = $_GET['unit'];
            // Datos Movil Correo          
            $sql = "SELECT * FROM MOVIL_Hogar_Correo; ;";
            $stmt = sqlsrv_query( $conn, $sql  );
            $dataM_B2CCorreo = array();
                while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                    $dataM_B2CCorreo[]= array('Orden' => (string)$row['Orden'],'Rango_Cal' => (string)$row['Rango_Cal'],'Grupo' => (string)$row['Grupo'],'Cantidad' => (string)$row['Cantidad'],'Porc' => (string)$row['Porc'],'Promedio' => (string)$row['Promedio'],);
                }
            // Datos Movil Residencial  
            $sql = "SELECT * FROM MOVIL_Hogar_Residencial; ;";
            $stmt = sqlsrv_query( $conn, $sql  );
            $dataM_B2CResidencial = array();
                while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                    $dataM_B2CResidencial[]= array('Orden' => (string)$row['Orden'],'Rango_Cal' => (string)$row['Rango_Cal'],'Grupo' => (string)$row['Grupo'],'Cantidad' => (string)$row['Cantidad'],'Porc' => (string)$row['Porc'],'Promedio' => (string)$row['Promedio'],);
                }
 

            // Data Completitud MOVIL  -Correo Electronico 
            $sql = "SELECT Negocio,	Segmento,	Contacto,	Anio,	DATENAME (MONTH,'1901-'+Mes+'-01')  Mes,	Cantidad,	Ocupacion, ROUND(cast(REPLACE(Porc_Completitud,',','.') as float) *100.0, 2 ) Porc_Completitud
            FROM Data_Completitud where Negocio='MOVIL' AND Segmento='B2C' AND Contacto='Correo Electrónico' ;";
            $stmt = sqlsrv_query( $conn, $sql  );
            $dataCompletitud_M_B2C_CE = array();
                while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                    $dataCompletitud_M_B2C_CE[]= array('Negocio' => (string)$row['Negocio'],'Segmento' => (string)$row['Segmento'],'Contacto' => (string)$row['Contacto'],'Anio' => (string)$row['Anio'],'Mes' => (string)$row['Mes'],'Cantidad' => (string)$row['Cantidad'],'Ocupacion' => (string)$row['Ocupacion'],'Porc_Completitud' => (string)$row['Porc_Completitud']);
                } 

            // Data Completitud MOVIL -Correo Electronico 
            $sql = "SELECT Negocio,	Segmento,	Contacto,	Anio,	DATENAME (MONTH,'1901-'+Mes+'-01')  Mes,	Cantidad,	Ocupacion, ROUND(cast(REPLACE(Porc_Completitud,',','.') as float) *100.0, 2 ) Porc_Completitud
            FROM Data_Completitud where Negocio='MOVIL' AND Segmento='B2C' AND Contacto='Teléfono Fijo' ;";
            $stmt = sqlsrv_query( $conn, $sql  );
            $dataCompletitud_M_B2C_TF = array();
                while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                    $dataCompletitud_M_B2C_TF[]= array('Negocio' => (string)$row['Negocio'],'Segmento' => (string)$row['Segmento'],'Contacto' => (string)$row['Contacto'],'Anio' => (string)$row['Anio'],'Mes' => (string)$row['Mes'],'Cantidad' => (string)$row['Cantidad'],'Ocupacion' => (string)$row['Ocupacion'],'Porc_Completitud' => (string)$row['Porc_Completitud']);
                }  


  if( $stmt === false) {
      die( print_r( sqlsrv_errors(), true) );
  }

  
$dataFULL = array();
for ($i = 0; $i < count($dataM_B2CCorreo); $i++) {
    $dataFULL[0][]=array('Orden_M_B2CCorreo' => $dataM_B2CCorreo[$i]['Orden'],'Rango_Cal_M_B2CCorreo' => $dataM_B2CCorreo[$i]['Rango_Cal'],'Grupo_M_B2CCorreo' => $dataM_B2CCorreo[$i]['Grupo'],'Cantidad_M_B2CCorreo' => $dataM_B2CCorreo[$i]['Cantidad'],'Porcentaje_M_B2CCorreo' => $dataM_B2CCorreo[$i]['Porc'],'Promedio_M_B2CCorreo' => $dataM_B2CCorreo[$i]['Promedio'],
                            'Orden_M_B2CResidencial' => $dataM_B2CResidencial[$i]['Orden'],'Rango_Cal_M_B2CResidencial' => $dataM_B2CResidencial[$i]['Rango_Cal'],'Grupo_M_B2CResidencial' => $dataM_B2CResidencial[$i]['Grupo'],'Cantidad_M_B2CResidencial' => $dataM_B2CResidencial[$i]['Cantidad'],'Porcentaje_M_B2CResidencial' => $dataM_B2CResidencial[$i]['Porc'],'Promedio_M_B2CResidencial' => $dataM_B2CResidencial[$i]['Promedio'],);
                    };
for ($i = 0; $i < count($dataCompletitud_M_B2C_CE); $i++) {
    $dataFULL['dataCompletitud_M_B2C_CE'][]=array('Negocio' => $dataCompletitud_M_B2C_CE[$i]['Negocio'],'Segmento' => $dataCompletitud_M_B2C_CE[$i]['Segmento'],'Contacto' => $dataCompletitud_M_B2C_CE[$i]['Contacto'],'Anio' => $dataCompletitud_M_B2C_CE[$i]['Anio'],'name' => $dataCompletitud_M_B2C_CE[$i]['Mes'],'y' => (int)$dataCompletitud_M_B2C_CE[$i]['Cantidad'],'Ocupacion' => $dataCompletitud_M_B2C_CE[$i]['Ocupacion'],'porcentaje' => $dataCompletitud_M_B2C_CE[$i]['Porc_Completitud'],'color' => "#00377b");
    };

for ($i = 0; $i < count($dataCompletitud_M_B2C_TF); $i++) {
    $dataFULL['dataCompletitud_M_B2C_TF'][]=array('Negocio' => $dataCompletitud_M_B2C_TF[$i]['Negocio'],'Segmento' => $dataCompletitud_M_B2C_TF[$i]['Segmento'],'Contacto' => $dataCompletitud_M_B2C_TF[$i]['Contacto'],'Anio' => $dataCompletitud_M_B2C_TF[$i]['Anio'],'name' => $dataCompletitud_M_B2C_TF[$i]['Mes'],'y' => (int)$dataCompletitud_M_B2C_TF[$i]['Cantidad'],'Ocupacion' => $dataCompletitud_M_B2C_TF[$i]['Ocupacion'],'porcentaje' => $dataCompletitud_M_B2C_TF[$i]['Porc_Completitud'],'color' => "#00377b");
    };
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
// Mostramos los datos en formato JSON
echo json_encode($dataFULL);
?>
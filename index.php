<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DASHBOARD COMPLETITUD</title>
    <link rel="icon" type="image/png" href="Logo_Tigo.png" sizes="192x192">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/bootstrap.js" defer=""></script>    

</head>
<body>
<?php include 'inc/menu.php';?>


   <style>.highcharts-figure, .highcharts-data-table table {
            min-width: 310px; 
            max-width: 800px;
            margin: 1em auto;
        }

        #container {
            height: 400px;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #EBEBEB;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }
        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }
        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }
        .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
            padding: 0.5em;
        }
        .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }
        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }

    </style>

    <body>

    <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="Highcharts-8.2.0/code/modules/data.js"></script>
<script src="Highcharts-8.2.0/code/modules/drilldown.js"></script>
<div id="container" style="min-width: 310px; height: 400px; margin: 10 10 auto"></div>


        <script src="Highcharts-8.2.0/code/modules/series-label.js"></script>
        <script src="Highcharts-8.2.0/code/modules/exporting.js"></script>
        <script src="Highcharts-8.2.0/code/modules/export-data.js"></script>
        <script src="Highcharts-8.2.0/code/modules/accessibility.js"></script>






        <script type="text/javascript">


            window.addEventListener('DOMContentLoaded', (event) => {

                $.ajax({
                    url: "Conexion/DatosGrafica_FH.php",
                    method: "GET",
                    dataType: 'json',
                    contentType: "application/json; charset=utf-8",
                    data:'unit='+0 ,
                    success: function(dato) {                       

                        Highcharts.chart('container', {
                            chart:{
                                type:'column',
                                events: {
                                drilldown: function (e) {
                                    this.setTitle(null, {text: 'Ultimos 6 meses - ' + e.point.name});// subtitulo interior
                                },
                                drillup: function (e) {
                                    this.setTitle(null, {text: 'Nivel de Calidad de datos Mes Actual'});//subtitulo atras
                                }
                                }
                            },
                            title: {
                                text: 'FIJO- HOGAR' // nombre principal
                            },
                            subtitle: {
                                text: 'Nivel de Calidad de datos Mes Actual'// subtitulo principal
                            },
                            "legend":{
                                "enabled":true
                            },
                            "lang":{
                                "drillUpText":"<< Atrás"
                            },
                            "xAxis":{
                                "type":"category"
                            },
                            "yAxis":{
                                "title":{
                                    "text":"Valores"// eje x
                                }
                            },
                            "plotOptions":{
                                "series":{
                                    "allowPointSelect":true,
                                    "showInLegend":true,
                                    "cursor":"pointer",
                                    "dataLabels":{
                                        "enabled":true,
                                        "format":"{y:,.0f}"
                                    }
                                }
                            },
                            "tooltip":{
                                "headerFormat":"<dl><dt style=\"color:{point.color}\">{series.name}</dt>",
                                "pointFormat":"<dd style=\"font-weight:bold;\">{point.name}: {point.y:,.0f} <br> Porcentaje:{point.porcentaje}%  </dd>",
                                "footerFormat":"</dl>",
                                "useHTML":true
                            },
                            "series":[//Grafica principal
                                {
                                    "name":"Alta",
                                    "color":"#00377b",
                                    "data":[
                                        {
                                            "name":"Teléfono Celular",
                                            "y":JSON.parse(dato[0][0].Cantidad_Fijo_Hogar_Celular),
                                            "porcentaje":JSON.parse(dato[0][0].Porcentaje_Fijo_Hogar_Celular),
                                            "drilldown":"Teléfono Celular DataCompletitud",
                                            "color":"#00377b"
                                        },
                                        {
                                            "name":"Correo Electrónico",
                                            "y":JSON.parse(dato[0][0].Cantidad_FHCorreo),
                                            "porcentaje":JSON.parse(dato[0][0].Porcentaje_FHCorreo),
                                            "drilldown":"Correo Electrónico DataCompletitud",
                                            "color":"#00377b"
                                        },
                                        {
                                            "name":"Teléfono Residencial",
                                            "y":JSON.parse(dato[0][0].Cantidad_FHResidencial),
                                            "porcentaje": JSON.parse(dato[0][0].Porcentaje_FHResidencial),
                                            "drilldown":"Teléfono Residencial DataCompletitud",
                                            "color":"#00377b"
                                        }
                                    ]
                                },
                                {
                                    "name":"Media",
                                    "color":"rgb(124, 181, 236)",
                                    "data":[
                                        {
                                            "name":"Teléfono Celular",
                                            "y":JSON.parse(dato[0][1].Cantidad_Fijo_Hogar_Celular),
                                            "porcentaje":JSON.parse(dato[0][1].Porcentaje_Fijo_Hogar_Celular),
                                            "drilldown":"Teléfono Celular DataCompletitud",
                                            "color":"rgb(124, 181, 236)"
                                        },
                                        {
                                            "name":"Correo Electrónico",
                                            "y":JSON.parse(dato[0][1].Cantidad_FHCorreo),
                                            "porcentaje":JSON.parse(dato[0][1].Porcentaje_FHCorreo),
                                            "drilldown":"Correo Electrónico DataCompletitud",
                                            "color":"rgb(124, 181, 236)"
                                        },
                                        {
                                            "name":"Teléfono Residencial",
                                            "y":JSON.parse(dato[0][1].Cantidad_FHResidencial),
                                            "porcentaje": JSON.parse(dato[0][1].Porcentaje_FHResidencial),
                                            "drilldown":"Teléfono Residencial DataCompletitud",
                                            "color":"rgb(124, 181, 236)"
                                        }
                                    ]
                                },
                                {
                                    "name":"Baja",
                                    "color":"#454d55",
                                    "data":[
                                        {
                                            "name":"Teléfono Celular",
                                            "y":JSON.parse(dato[0][2].Cantidad_Fijo_Hogar_Celular),
                                            "porcentaje":JSON.parse(dato[0][2].Porcentaje_Fijo_Hogar_Celular),
                                            "drilldown":"Teléfono Celular DataCompletitud",
                                            "color":"#454d55"
                                        },
                                        {
                                            "name":"Correo Electrónico",
                                            "y":JSON.parse(dato[0][2].Cantidad_FHCorreo),
                                            "porcentaje":JSON.parse(dato[0][2].Porcentaje_FHCorreo),
                                            "drilldown":"Correo Electrónico DataCompletitud",
                                            "color":"#454d55"
                                        },
                                        {
                                            "name":"Teléfono Residencial",
                                            "y":JSON.parse(dato[0][2].Cantidad_FHResidencial),
                                            "porcentaje": JSON.parse(dato[0][2].Porcentaje_FHResidencial),
                                            "drilldown":"Teléfono Residencial DataCompletitud",
                                            "color":"#454d55"
                                        }
                                    ]
                                },
                                {
                                    "name":"Sin Contacto",
                                    "color":"#E5EBF2",
                                    "data":[
                                        {
                                            "name":"Teléfono Celular",
                                            "y":JSON.parse(dato[0][3].Cantidad_Fijo_Hogar_Celular),
                                            "porcentaje":JSON.parse(dato[0][3].Porcentaje_Fijo_Hogar_Celular),
                                            "drilldown":"Teléfono Celular DataCompletitud",
                                            "color":"#E5EBF2"
                                        },
                                        {
                                            "name":"Correo Electrónico",
                                            "y":JSON.parse(dato[0][3].Cantidad_FHCorreo),
                                            "porcentaje":JSON.parse(dato[0][3].Porcentaje_FHCorreo),
                                            "drilldown":"Correo Electrónico DataCompletitud",
                                            "color":"#E5EBF2"
                                        },
                                        {
                                            "name":"Teléfono Residencial",
                                            "y":JSON.parse(dato[0][3].Cantidad_FHResidencial),
                                            "porcentaje": JSON.parse(dato[0][3].Porcentaje_FHResidencial),
                                            "drilldown":"Teléfono Residencial DataCompletitud",
                                            "color":"#E5EBF2"
                                        }
                                    ]
                                }
                            ],//fin grafica principal
                            "drilldown":{
                                    drillUpButton: {
                                    relativeTo: 'spacingBox',
                                    position: {
                                        y: 0,
                                        x: 0
                                    }
                                },
                                "series":[
                                    {
                                        "name":"Completitud",
                                        "id":"Teléfono Celular DataCompletitud",
                                        "data":dato['dataCompletitud_FH_TC']
                                        
                                    },
                                    {
                                        "name":"Completitud",
                                        "id":"Correo Electrónico DataCompletitud",
                                        "data":dato['dataCompletitud_FH_CE']
                                    },
                                    {
                                        "name":"Completitud",
                                        "id":"Teléfono Residencial DataCompletitud",
                                        "data":dato['dataCompletitud_FH_TF']
                                    },
                                   
                                ]
                            }
                        });
                    },
                    
                });
                
            });
          
        </script>


	</body>
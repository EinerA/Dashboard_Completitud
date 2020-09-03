<div id="Grafica_M_B2C" style="min-width: 310px; height: 400px; margin: 10 10 auto"></div>
        <script type="text/javascript">
            window.addEventListener('DOMContentLoaded', (event) => {
                $.ajax({
                    url: "Conexion/DatosGrafica_M_B2C.php",
                    method: "GET",
                    dataType: 'json',
                    contentType: "application/json; charset=utf-8",
                    data:'unit='+0 ,
                    success: function(dato) {                       
                        console.log(dato);
                        Highcharts.chart('Grafica_M_B2C', {
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
                                text: 'MOVIL - B2C' // nombre principal
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
                                            "name":"Correo Electrónico",
                                            "y":JSON.parse(dato[0][0].Cantidad_M_B2CCorreo),
                                            "porcentaje":JSON.parse(dato[0][0].Porcentaje_M_B2CCorreo),
                                            "drilldown":"Correo Electrónico DataCompletitud",
                                            "color":"#00377b"
                                        },
                                        {
                                            "name":"Teléfono Residencial",
                                            "y":JSON.parse(dato[0][0].Cantidad_M_B2CResidencial),
                                            "porcentaje": JSON.parse(dato[0][0].Porcentaje_M_B2CResidencial),
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
                                            "name":"Correo Electrónico",
                                            "y":JSON.parse(dato[0][1].Cantidad_M_B2CCorreo),
                                            "porcentaje":JSON.parse(dato[0][1].Porcentaje_M_B2CCorreo),
                                            "drilldown":"Correo Electrónico DataCompletitud",
                                            "color":"rgb(124, 181, 236)"
                                        },
                                        {
                                            "name":"Teléfono Residencial",
                                            "y":JSON.parse(dato[0][1].Cantidad_M_B2CResidencial),
                                            "porcentaje": JSON.parse(dato[0][1].Porcentaje_M_B2CResidencial),
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
                                            "name":"Correo Electrónico",
                                            "y":JSON.parse(dato[0][2].Cantidad_M_B2CCorreo),
                                            "porcentaje":JSON.parse(dato[0][2].Porcentaje_M_B2CCorreo),
                                            "drilldown":"Correo Electrónico DataCompletitud",
                                            "color":"#454d55"
                                        },
                                        {
                                            "name":"Teléfono Residencial",
                                            "y":JSON.parse(dato[0][2].Cantidad_M_B2CResidencial),
                                            "porcentaje": JSON.parse(dato[0][2].Porcentaje_M_B2CResidencial),
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
                                            "name":"Correo Electrónico",
                                            "y":JSON.parse(dato[0][3].Cantidad_M_B2CCorreo),
                                            "porcentaje":JSON.parse(dato[0][3].Porcentaje_M_B2CCorreo),
                                            "drilldown":"Correo Electrónico DataCompletitud",
                                            "color":"#E5EBF2"
                                        },
                                        {
                                            "name":"Teléfono Residencial",
                                            "y":JSON.parse(dato[0][3].Cantidad_M_B2CResidencial),
                                            "porcentaje": JSON.parse(dato[0][3].Porcentaje_M_B2CResidencial),
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
                                        "id":"Correo Electrónico DataCompletitud",
                                        "data":dato['dataCompletitud_M_B2C_CE']
                                    },
                                    {
                                        "name":"Completitud",
                                        "id":"Teléfono Residencial DataCompletitud",
                                        "data":dato['dataCompletitud_M_B2C_TF']
                                    },
                                   
                                ]
                            }
                        });
                    },
                    
                });
                
            });         
        </script>

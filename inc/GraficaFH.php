<div id="GraficaFH" style="min-width: 310px; height: 400px; margin: 10 10 auto"></div>
        <script type="text/javascript">
            window.addEventListener('DOMContentLoaded', (event) => {
                $.ajax({
                    url: "Conexion/DatosGrafica_FH.php",
                    method: "GET",
                    dataType: 'json',
                    contentType: "application/json; charset=utf-8",
                    data:'unit='+0 ,
                    success: function(dato) {                       

                        Highcharts.chart('GraficaFH', {
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

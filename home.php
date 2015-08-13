<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="RDS">
        <link rel="shortcut icon" href="img/favicon.png">

        <title>iPump - Supervisório</title>

        <!-- Bootstrap CSS -->    
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- bootstrap theme -->
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <!--external css-->
        <!-- font icon -->
        <link href="css/elegant-icons-style.css" rel="stylesheet" />
        <link href="css/font-awesome.min.css" rel="stylesheet" />
        <!-- Custom styles -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/style-responsive.css" rel="stylesheet" />

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
          <script src="js/lte-ie7.js"></script>
        <![endif]-->


        <!-- javascripts -->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- nice scroll -->
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->

    </head>

    <script>
        function conectar(chkbox) {

            var div = document.getElementById("conectarDiv");

            if (chkbox.checked)
            {
                div.innerHTML = '<span class="label label-success">HOST - 127.0.0.1</span>';

//                $.get("getData.php?sensor=1", function (data) {
//                    alert(data);
//                });

            } else {
                div.innerHTML = '<span class="label label-danger">DESCONECTADO</span>';
            }

//            document.getElementById("conectarDiv").innerHTML = '<span class="label label-success">HOST - 127.0.0.1</span>';
        }
    </script>



    <body>


        <!--  highcharts -->
        <script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/highcharts-more.js"></script>
        <script src="http://code.highcharts.com/modules/exporting.js"></script>

        <script type="text/javascript">
        //tanque 01
        $(function () {

            $('#chart_tanque1').highcharts({
                title: {
                    text: ' '
                },
                chart: {
                    type: 'column'
                },
                xAxis: {
                    categories: [' ']
                },
                yAxis: {
                    min: 0,
                    max: 30,
                    title: {
                        text: 'Nivel (cm)'
                    },
                    stackLabels: {
                        enabled: false,
                        style: {
                            fontWeight: 'bold',
                            color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                        }
                    }
                },
                tooltip: {
                    formatter: function () {
                        return 'Total: ' + this.y + ' cm';
                    }
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:.1f} cm'
                        }
                    }
                },
                series: [{
                        name: 'Nível ',
                        data: [0.0],
                        tooltip: {
                            valueSuffix: ' cm'
                        }
                    }],
                exporting: {
                    enabled: false
                },
                credits: {
                    enabled: false
                }
            },
            function (chart) {
                if (!chart.renderer.forExport) {
                    setInterval(function () {
                        var point = chart.series[0].points[0];//,
                        var setPoint = document.getElementById("iptq1").value;
                        var urlMap = "getData.php?tanque=0&nivel=" + setPoint;
                        console.log(urlMap);
                        $.getJSON(urlMap, function (data) {
                            point.update(data);
                        });

                    }, 500);
                }
            });
        });

        //tanque 02
        $(function () {
            $('#chart_tanque2').highcharts({
                title: {
                    text: ' '
                },
                chart: {
                    type: 'column'
                },
                xAxis: {
                    categories: [' ']
                },
                yAxis: {
                    min: 0,
                    max: 30,
                    title: {
                        text: 'Nivel (cm)'
                    },
                    stackLabels: {
                        enabled: false,
                        style: {
                            fontWeight: 'bold',
                            color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                        }
                    }
                },
                tooltip: {
                    formatter: function () {
                        return 'Total: ' + this.y + ' cm';
                    }
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:.1f} cm'
                        }
                    }
                },
                series: [{
                        name: 'Nível ',
                        data: [0.0],
                        tooltip: {
                            valueSuffix: ' cm'
                        }
                    }],
                exporting: {
                    enabled: false
                },
                credits: {
                    enabled: false
                }
            }, 
            function (chart) {
                if (!chart.renderer.forExport) {
                    setInterval(function () {
                        var point = chart.series[0].points[0];//,
                        var setPoint = document.getElementById("iptq2").value;
                        var urlMap = "getData.php?tanque=1&nivel=" + setPoint;
                        console.log(urlMap);
                        $.getJSON(urlMap, function (data) {
                            point.update(data);
                        });

                    }, 500);
                }
            });
        });

        //bomba
        $(function () {
            $('#chart_bomba').highcharts({
                chart: {
                    type: 'gauge',
                    plotBackgroundColor: null,
                    plotBackgroundImage: null,
                    plotBorderWidth: 0,
                    plotShadow: false
                },
                title: {
                    text: ' '
                },
                exporting: {
                    enabled: false
                },
                credits: {
                    enabled: false
                },
                pane: {
                    startAngle: -90,
                    endAngle: 90,
                    background: [{
                            backgroundColor: {
                                linearGradient: {x1: 0, y1: 0, x2: 0, y2: 1},
                                stops: [
                                    [0, '#FFF'],
                                    [1, '#333']
                                ]
                            },
                            borderWidth: 0,
                            outerRadius: '109%'
                        }, {
                            backgroundColor: {
                                linearGradient: {x1: 0, y1: 0, x2: 0, y2: 1},
                                stops: [
                                    [0, '#333'],
                                    [1, '#FFF']
                                ]
                            },
                            borderWidth: 1,
                            outerRadius: '107%'
                        }, {
                            // default background
                        }, {
                            backgroundColor: '#DDD',
                            borderWidth: 0,
                            outerRadius: '105%',
                            innerRadius: '103%'
                        }]
                },
                // the value axis
                yAxis: {
                    min: -6,
                    max: 6,
                    minorTickInterval: 'auto',
                    minorTickWidth: 1,
                    minorTickLength: 10,
                    minorTickPosition: 'inside',
                    minorTickColor: '#666',
                    tickPixelInterval: 30,
                    tickWidth: 2,
                    tickPosition: 'inside',
                    tickLength: 10,
                    tickColor: '#666',
                    labels: {
                        step: 2,
                        rotation: 'auto'
                    },
                    title: {
                        text: 'Volts'
                    },
                    plotBands: [
                        {
                            from: -6,
                            to: -3,
                            color: '#DF5353' // red
                        }, {
                            from: -3,
                            to: -2,
                            color: '#DDDF0D' // yellow
                        }, {
                            from: -2,
                            to: 2,
                            color: '#55BF3B' // green
                        }, {
                            from: 2,
                            to: 3,
                            color: '#DDDF0D' // yellow
                        }, {
                            from: 3,
                            to: 6,
                            color: '#DF5353' // red
                        }]
                },
                series: [{
                        name: 'Tensão ',
                        data: [0.0],
                        tooltip: {
                            valueSuffix: ' Volts'
                        }
                    }]

            },
            // Add some life             
            function (chart) {
                if (!chart.renderer.forExport) {
                    setInterval(function () {
                        var point = chart.series[0].points[0];//,
                        var setPoint = document.getElementById("voltimetro").value;
                        var urlMap = "getData.php?bomba=1&tensao=" + setPoint;
                        console.log(urlMap);
                        $.getJSON(urlMap, function (data) {
                            point.update(data);
                        });

                    }, 500);
                }
            });
        });
        </script>



        <!-- container section start -->
        <section id="container" class="">
            <!--header start-->

            <header class="header dark-bg">
                <div class="toggle-nav">
                    <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"></div>
                </div>

                <!--logo start-->
                <a href="index.html" class="logo">iPump <span class="lite">Supervisório</span></a>
                <!--logo end-->

                <div class="top-nav notification-row">                
                    <!-- notificatoin dropdown start-->
                    <ul class="nav pull-right top-menu">

                        <!-- user login dropdown start-->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="profile-ava">
                                    <img alt="" src="img/rodrigo_small.jpg">
                                </span>
                                <span class="username">Rodrigo Silva</span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
                                <div class="log-arrow-up"></div>
                                <li class="eborder-top">
                                    <a href="#"><i class="icon_profile"></i> Meu Perfil</a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon_clock_alt"></i> Timeline</a>
                                </li>
                                <li>
                                    <a href="index.php"><i class="icon_key_alt"></i> Log Out</a>
                                </li>
                            </ul>
                        </li>
                        <!-- user login dropdown end -->
                    </ul>
                    <!-- notificatoin dropdown end-->
                </div>
                    <!--<span>DESCONECTADO</span>-->
            </header>      
            <!--header end-->

            <!--sidebar start-->
            <aside>
                <div id="sidebar"  class="nav-collapse ">
                    <!-- sidebar menu start-->
                    <ul class="sidebar-menu">                
                        <li class="active">
                            <a class="" href="index.php">
                                <i class="icon_house_alt"></i>
                                <span>Home</span>
                            </a>
                        </li>
                        <li>
                            <a class="" href="index.php">
                                <i class="icon_documents_alt"></i>
                                <span>Historico</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon_desktop"></i>
                                <span>Configurações</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="#">Servidor</a></li>                          
                                <li><a class="" href="#">Malha</a></li>
                                <li><a class="" href="#">Usuários</a></li>
                            </ul>
                        </li>       
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon_genius"></i>
                                <span>Sobre</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="#">Equipe</a></li>
                                <li><a class="" href="#">Projetos</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- sidebar menu end-->
                </div>
            </aside>
            <!--sidebar end-->

            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">
                    <div class="row">
                        <!--<div class="col-lg-12">-->
                        <div class="col-lg-2" style="overflow: hidden">
                            <section class="panel">
                                <header class="panel-heading">
                                    Tanque 01
                                </header>
                                <div class="panel-body text-center">
                                    <div class="flot-chart">
                                        <div id="chart_tanque1" style="margin: 0 auto"></div>
                                    </div>
                                    <div class="row" style="padding-top: 10px;">
                                        <div class="text-center">
                                            <input class="form-control input-sm m-bot15" id="iptq1" type="number" min="0.0" max="28.0" step="0.1" value="0.0" style="width: 80%; display: inline; margin-bottom: 0px" />
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="col-lg-2" style="overflow: hidden">
                            <section class="panel">
                                <header class="panel-heading">
                                    Tanque 02
                                </header>
                                <div class="panel-body text-center">
                                    <div class="flot-chart">
                                        <div id="chart_tanque2" style="margin: 0 auto"></div>
                                    </div>
                                    <div class="row" style="padding-top: 10px;">
                                        <div class="text-center">
                                            <input class="form-control input-sm m-bot15" id="iptq2" type="number" min="0.0" max="28.0" step="0.1" value="0.0" style="width: 80%; display: inline; margin-bottom: 0px" />
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4" style="overflow: hidden">
                            <section class="panel">
                                <header class="panel-heading">
                                    Bomba
                                </header>
                                <div class="panel-body text-center">
                                    <div class="flot-chart">
                                        <div id="chart_bomba" style="margin: 0 auto"></div>
                                    </div>
                                    <div class="row" style="padding-top: 10px;">
                                        <div class="text-center">
                                            <input class="form-control input-sm m-bot15" id="voltimetro" type="number" min="-4.0" max="4.0" step="0.1" value="0.0" style="width: 80%; display: inline; margin-bottom: 0px" />
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4" style="overflow: hidden">
                            <section class="panel">
                                <header class="panel-heading">
                                    <div class="col-lg-6" style="padding-left: 0px">
                                        Controle
                                    </div>
                                    <div class="col-lg-6 text-right" id="conectarDiv" style="padding-right: 0px">
                                        <span class="label label-danger">DESCONECTADO</span>
                                    </div>
                                </header>
                                <div class="panel-body text-center">
                                    <div class="flot-chart">
                                        <div class="form-group">
                                            <div class="row m-bot15" style="padding-top: 2px; padding-bottom: 1px">
                                                <div class="col-sm-6 text-right">
                                                    <h4>CONECTAR</h4>
                                                </div>
                                                <div class="col-sm-6 text-left" style="padding-top: 7px">
                                                    <input type="checkbox" onchange="conectar(this)" type="checkbox" data-toggle="switch" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row m-bot15" style="padding-top: 1px">
                                                <div class="col-sm-6 text-right">
                                                    <h4>EMERGÊNCIA</h4>
                                                </div>
                                                <div class="col-sm-6 text-left" style="padding-top: 7px">
                                                    <input type="checkbox" data-toggle="switch" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row m-bot15" style="padding-top: 1px; padding-bottom: 1px">
                                                <div class="col-sm-6 text-right">
                                                    <h4>MALHA ABERTA</h4>
                                                </div>
                                                <div class="col-sm-6 text-left" style="padding-top: 7px">
                                                    <input type="checkbox" checked="" data-toggle="switch" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <div class="row" style="padding-top: 6px">
                                <div class="col-lg-12" style="overflow: hidden">
                                    <section class="panel">
                                        <header class="panel-heading">
                                            Sinal
                                        </header>
                                        <div class="panel-body text-center">
                                            <select class="form-control input-sm m-bot15">
                                                <option>Sinal 1</option>
                                                <option>Sinal 2</option>
                                                <option>Sinal 3</option>
                                                <option>Sinal 4</option>
                                            </select>
                                            <div class="row">
                                                <div class="col-lg-6" style="overflow: hidden">
                                                    <div class="row" style="padding-top: 10px;">
                                                        <div class="text-center">
                                                            Amplitute (V)
                                                            <input class="form-control input-sm m-bot15" type="number" min="-4.0" max="4.0" step="0.1" value="0.0" style="width: 80%; display: inline; margin-bottom: 0px" />
                                                        </div>
                                                    </div>
                                                    <div class="row" style="padding-top: 10px;">
                                                        <div class="text-center">
                                                            Período (s)
                                                            <input class="form-control input-sm m-bot15" type="number" min="-4.0" max="4.0" step="0.1" value="0.0" style="width: 80%; display: inline; margin-bottom: 0px" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6" style="overflow: hidden; padding-left: 0px">
                                                    <img alt="" src="img/gambi.jpg">
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <!--</div>-->
                    </div>
                </section>
            </section>
            <!--main content end-->
        </section>

        <!-- container section end -->
        <!-- jquery ui -->
        <script src="js/jquery-ui-1.9.2.custom.min.js"></script>

        <!--custom checkbox & radio-->
        <script type="text/javascript" src="js/ga.js"></script>
        <!--custom switch-->
        <script src="js/bootstrap-switch.js"></script>
        <!--custom tagsinput-->
        <script src="js/jquery.tagsinput.js"></script>

        <!-- colorpicker -->

        <!-- bootstrap-wysiwyg -->
        <script src="js/jquery.hotkeys.js"></script>
        <script src="js/bootstrap-wysiwyg.js"></script>
        <script src="js/bootstrap-wysiwyg-custom.js"></script>
        <!-- ck editor -->
        <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
        <!-- custom form component script for this page-->
        <script src="js/form-component.js"></script>
        <!-- custome script for all page -->
        <script src="js/scripts.js"></script>
    </body>
</html>

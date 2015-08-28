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
        function tanque_sup() {
            var chart = $('#chart_tanque1').highcharts();
            var point = chart.series[0].points[0]; //,
            var setPoint = document.getElementById("iptq1").value;
            var urlMap = "getData.php?tanque=0&nivel=" + setPoint;
            console.log(urlMap);
            $.getJSON(urlMap, function (data) {
                point.update(data);
            });
        }
        function tanque_inf() {
            var chart = $('#chart_tanque2').highcharts();
            var point = chart.series[0].points[0]; //,
            var setPoint = document.getElementById("iptq2").value;
            var urlMap = "getData.php?tanque=1&nivel=" + setPoint;
            console.log(urlMap);
            $.getJSON(urlMap, function (data) {
                point.update(data);
            });
        }
        function bomba() {
            var chart = $('#chart_bomba').highcharts();
            var point = chart.series[0].points[0]; //,
            var setPoint = document.getElementById("voltimetro").value;
            var urlMap = "getData.php?bomba=1&tensao=" + setPoint;
            console.log(urlMap);
            $.getJSON(urlMap, function (data) {
                point.update(data);
            });
        }
        function malha(chkbox) {

            if (chkbox.checked)
            {
                document.getElementById('iptq1').disable = false;
                document.getElementById('iptq2').disable = false;
                document.getElementById('voltimetro').disable = false;
            } else {
                document.getElementById('iptq1').disable = true;
                document.getElementById('iptq2').disable = true;
                document.getElementById('voltimetro').disable = true;
            }

        }

        function updateTst() {
            var chart = $('#sinais').highcharts();
            var series1 = chart.series[0];
            var series2 = chart.series[1];
            var series3 = chart.series[2];
            var series4 = chart.series[3];
            setInterval(function () {
                var x = (new Date()).getTime();

                var y1 = Math.random();
                series1.addPoint([x, y1], true, true);
                console.log([x, y1]);

                var y2 = Math.random();
                series2.addPoint([x, y2], true, true);
                console.log([x, y1]);

                var y3 = Math.random();
                series3.addPoint([x, y3], true, true);
                console.log([x, y1]);

                var y4 = Math.random();
                series4.addPoint([x, y4], true, true);
                console.log([x, y1]);
            }, 1000);
        }

    </script>



    <body>


        <!--  highcharts -->
        <!--<script src="http://code.highcharts.com/highcharts.js"></script>-->
        <script src="http://code.highcharts.com/stock/highstock.js"></script>
        <script src="http://code.highcharts.com/highcharts-more.js"></script>
        <script src="http://code.highcharts.com/stock/modules/exporting.js"></script>

        <script type="text/javascript">
        //tanque 01
        $(function () {
            $('#chart_tanque1').highcharts({
                title: {
                    text: ' '
                },
                chart: {
                    type: 'column',
                    height: 300
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
            }
//            ,function (chart) {
//                if (!chart.renderer.forExport) {
//                    setInterval(function () {
//                        var point = chart.series[0].points[0];//,
//                        var setPoint = document.getElementById("iptq1").value;
//                        var urlMap = "getData.php?tanque=0&nivel=" + setPoint;
//                        console.log(urlMap);
//                        $.getJSON(urlMap, function (data) {
//                            point.update(data);
//                        });
//
//                    }, 500);
//                }
//            }
            );
        });
        //tanque 02
        $(function () {
            $('#chart_tanque2').highcharts({
                title: {
                    text: ' '
                },
                chart: {
                    type: 'column',
                    height: 300
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
            }
//            ,function (chart) {
//                if (!chart.renderer.forExport) {
//                    setInterval(function () {
//                        var point = chart.series[0].points[0];//,
//                        var setPoint = document.getElementById("iptq2").value;
//                        var urlMap = "getData.php?tanque=1&nivel=" + setPoint;
//                        console.log(urlMap);
//                        $.getJSON(urlMap, function (data) {
//                            point.update(data);
//                        });
//
//                    }, 500);
//                }
//            }
            );
        });
        //bomba
        $(function () {
            $('#chart_bomba').highcharts({
                chart: {
                    type: 'gauge',
                    plotBackgroundColor: null,
                    plotBackgroundImage: null,
                    plotBorderWidth: 0,
                    plotShadow: false,
                    height: 300
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

            }
//            ,function (chart) {
//                if (!chart.renderer.forExport) {
//                    setInterval(function () {
//                        var point = chart.series[0].points[0];//,
//                        var setPoint = document.getElementById("voltimetro").value;
//                        var urlMap = "getData.php?bomba=1&tensao=" + setPoint;
//                        console.log(urlMap);
//                        $.getJSON(urlMap, function (data) {
//                            point.update(data);
//                        });

//                    }, 500);
//                }
//            }
            );
        });
        //sinais - LEITURA TANQUE 1
        $(function () {
            $(document).ready(function () {
                Highcharts.setOptions({
                    global: {
                        useUTC: false
                    }
                });

                // Create the chart
                $('#leitura_tq_1').highcharts('StockChart', {
                    chart: {
                        events: {
                            load: function () {

                                // set up the updating of the chart each second
                                var series = this.series[0];
                                setInterval(function () {
                                    var x = (new Date()).getTime(), // current time
                                            y = Math.round(Math.random() * 100);
                                    series.addPoint([x, y], true, true);
                                }, 1000);
                            }
                        }
                    },
                    rangeSelector: {
                        buttons: [{
                                count: 1,
                                type: 'minute',
                                text: '1M'
                            }, {
                                count: 5,
                                type: 'minute',
                                text: '5M'
                            }, {
                                type: 'all',
                                text: 'Tudo'
                            }],
                        inputEnabled: false,
                        selected: 0
                    },
                    title: {
                        text: ' '
                    },
                    tooltip: {
                        formatter: function () {
                            return 'Nível : ' + this.y + ' cm';
                        }
                    },
                    exporting: {
                        enabled: false
                    },
                    credits: {
                        enabled: false
                    },
                    series: [{
                            name: 'Nível ',
                            color: 'green',
                            data: (function () {
                                // generate an array of random data
                                var data = [], time = (new Date()).getTime(), i;

                                for (i = -999; i <= 0; i += 1) {
                                    data.push([
                                        time + i * 1000,
                                        Math.round(Math.random() * 100)
                                    ]);
                                }
                                return data;
                            }())
                        }]
                });
            });
        });
        //sinais - LEITURA TANQUE 2
        $(function () {
            $(document).ready(function () {
                Highcharts.setOptions({
                    global: {
                        useUTC: false
                    }
                });

                // Create the chart
                $('#leitura_tq_2').highcharts('StockChart', {
                    chart: {
                        events: {
                            load: function () {

                                // set up the updating of the chart each second
                                var series = this.series[0];
                                setInterval(function () {
                                    var x = (new Date()).getTime(), // current time
                                            y = Math.round(Math.random() * 100);
                                    series.addPoint([x, y], true, true);
                                }, 1000);
                            }
                        }
                    },
                    rangeSelector: {
                        buttons: [{
                                count: 1,
                                type: 'minute',
                                text: '1M'
                            }, {
                                count: 5,
                                type: 'minute',
                                text: '5M'
                            }, {
                                type: 'all',
                                text: 'Tudo'
                            }],
                        inputEnabled: false,
                        selected: 0
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
                    tooltip: {
                        formatter: function () {
                            return 'Nível : ' + this.y + ' cm';
                        }
                    },
                    series: [{
                            name: 'Nível ',
                            color: 'green',
                            data: (function () {
                                // generate an array of random data
                                var data = [], time = (new Date()).getTime(), i;

                                for (i = -999; i <= 0; i += 1) {
                                    data.push([
                                        time + i * 1000,
                                        Math.round(Math.random() * 100)
                                    ]);
                                }
                                return data;
                            }())
                        }]
                });
            });
        });
        //sinais - ESCRITA TANQUE 1
        $(function () {
            $(document).ready(function () {
                Highcharts.setOptions({
                    global: {
                        useUTC: false
                    }
                });

                // Create the chart
                $('#escrita_tq_1').highcharts('StockChart', {
                    chart: {
                        events: {
                            load: function () {

                                // set up the updating of the chart each second
                                var series = this.series[0];
                                setInterval(function () {
                                    var x = (new Date()).getTime(), // current time
                                            y = Math.round(Math.random() * 100);
                                    series.addPoint([x, y], true, true);
                                }, 1000);
                            }
                        }
                    },
                    rangeSelector: {
                        buttons: [{
                                count: 1,
                                type: 'minute',
                                text: '1M'
                            }, {
                                count: 5,
                                type: 'minute',
                                text: '5M'
                            }, {
                                type: 'all',
                                text: 'Tudo'
                            }],
                        inputEnabled: false,
                        selected: 0
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
                    tooltip: {
                        formatter: function () {
                            return 'Nível : ' + this.y + ' cm';
                        }
                    },
                    series: [{
                            name: 'Nível ',
                            color: 'red',
                            data: (function () {
                                // generate an array of random data
                                var data = [], time = (new Date()).getTime(), i;

                                for (i = -999; i <= 0; i += 1) {
                                    data.push([
                                        time + i * 1000,
                                        Math.round(Math.random() * 100)
                                    ]);
                                }
                                return data;
                            }())
                        }]
                });
            });
        });
        //sinais - ESCRITA TANQUE 2
        $(function () {
            $(document).ready(function () {
                Highcharts.setOptions({
                    global: {
                        useUTC: false
                    }
                });

                // Create the chart
                $('#escrita_tq_2').highcharts('StockChart', {
                    chart: {
                        events: {
                            load: function () {

                                // set up the updating of the chart each second
                                var series = this.series[0];
                                setInterval(function () {
                                    var x = (new Date()).getTime(), // current time
                                            y = Math.round(Math.random() * 100);
                                    series.addPoint([x, y], true, true);
                                }, 1000);
                            }
                        }
                    },
                    rangeSelector: {
                        buttons: [{
                                count: 1,
                                type: 'minute',
                                text: '1M'
                            }, {
                                count: 5,
                                type: 'minute',
                                text: '5M'
                            }, {
                                type: 'all',
                                text: 'Tudo'
                            }],
                        inputEnabled: false,
                        selected: 0
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
                    tooltip: {
                        formatter: function () {
                            return 'Nível : ' + this.y + ' cm';
                        }
                    },
                    series: [{
                            name: 'Nível ',
                            color: 'red',
                            data: (function () {
                                // generate an array of random data
                                var data = [], time = (new Date()).getTime(), i;

                                for (i = -999; i <= 0; i += 1) {
                                    data.push([
                                        time + i * 1000,
                                        Math.round(Math.random() * 100)
                                    ]);
                                }
                                return data;
                            }())
                        }]
                });
            });
        });
        //sinais - BOMBA
        $(function () {
            $(document).ready(function () {
                Highcharts.setOptions({
                    global: {
                        useUTC: false
                    }
                });

                // Create the chart
                $('#sinal_bomba').highcharts('StockChart', {
                    chart: {
                        events: {
                            load: function () {

                                // set up the updating of the chart each second
                                var series = this.series[0];
                                setInterval(function () {
                                    var x = (new Date()).getTime(), // current time
                                            y = Math.round(Math.random() * 100);
                                    series.addPoint([x, y], true, true);
                                }, 1000);
                            }
                        }
                    },
                    rangeSelector: {
                        buttons: [{
                                count: 1,
                                type: 'minute',
                                text: '1M'
                            }, {
                                count: 5,
                                type: 'minute',
                                text: '5M'
                            }, {
                                type: 'all',
                                text: 'Tudo'
                            }],
                        inputEnabled: false,
                        selected: 0
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
                    tooltip: {
                        formatter: function () {
                            return 'Nível : ' + this.y + ' cm';
                        }
                    },
                    series: [{
                            name: 'Nível ',
                            data: (function () {
                                // generate an array of random data
                                var data = [], time = (new Date()).getTime(), i;

                                for (i = -999; i <= 0; i += 1) {
                                    data.push([
                                        time + i * 1000,
                                        Math.round(Math.random() * 100)
                                    ]);
                                }
                                return data;
                            }())
                        }]
                });
            });
        });
        //sinais - CONTROLE
        $(function () {
            $(document).ready(function () {
                Highcharts.setOptions({
                    global: {
                        useUTC: false
                    }
                });

                // Create the chart
                $('#sinal_controle').highcharts('StockChart', {
                    chart: {
                        events: {
                            load: function () {

                                // set up the updating of the chart each second
                                var series = this.series[0];
                                setInterval(function () {
                                    var x = (new Date()).getTime(), // current time
                                            y = Math.round(Math.random() * 100);
                                    series.addPoint([x, y], true, true);
                                }, 1000);
                            }
                        }
                    },
                    rangeSelector: {
                        buttons: [{
                                count: 1,
                                type: 'minute',
                                text: '1M'
                            }, {
                                count: 5,
                                type: 'minute',
                                text: '5M'
                            }, {
                                type: 'all',
                                text: 'Tudo'
                            }],
                        inputEnabled: false,
                        selected: 0
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
                    tooltip: {
                        formatter: function () {
                            return 'Nível : ' + this.y + ' cm';
                        }
                    },
                    series: [{
                            name: 'Nível ',
                            color: 'yellow',
                            data: (function () {
                                // generate an array of random data
                                var data = [], time = (new Date()).getTime(), i;

                                for (i = -999; i <= 0; i += 1) {
                                    data.push([
                                        time + i * 1000,
                                        Math.round(Math.random() * 100)
                                    ]);
                                }
                                return data;
                            }())
                        }]
                });
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

            <!--main content start-->
            <section id="main-content" style="margin-left: 0px">
                <section class="wrapper">
                    <section class="panel">
                        <header class="panel-heading tab-bg-primary ">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a data-toggle="tab" href="#supervisorio">
                                        <i class="icon_house_alt"></i>
                                        <span>Home</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#graficos">
                                        <i class="icon_datareport"></i>
                                        <span>Gráficos</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#config">
                                        <i class="icon_desktop"></i>
                                        <span>Configurações</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#historico">
                                        <i class="icon_documents_alt"></i>
                                        <span>Histórico</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#sobre">
                                        <i class="icon_genius"></i>
                                        <span>Sobre</span>
                                    </a>
                                </li>
                            </ul>
                        </header>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="supervisorio" class="tab-pane active">
                                    <div class="row" style="margin-top: 30px">
                                        <!--<div class="col-lg-12">-->
                                        <div class="col-lg-2" style="overflow: hidden;">
                                            <section class="panel" style="margin-bottom: 5px">
                                                <header class="panel-heading">
                                                    Tanque 01
                                                </header>
                                                <div class="panel-body text-center">
                                                    <div class="flot-chart">
                                                        <div id="chart_tanque1" style="margin: 0 auto"></div>
                                                    </div>
                                                    <div class="row" style="padding-top: 10px;">
                                                        <div class="text-center">
                                                            <input class="form-control input-sm m-bot15" id="iptq1" onchange="tanque_sup()" type="number" min="0.0" max="28.0" step="0.1" value="0.0" style="width: 80%; display: inline; margin-bottom: 0px" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="col-lg-2" style="overflow: hidden">
                                            <section class="panel" style="margin-bottom: 5px">
                                                <header class="panel-heading">
                                                    Tanque 02
                                                </header>
                                                <div class="panel-body text-center">
                                                    <div class="flot-chart">
                                                        <div id="chart_tanque2" style="margin: 0 auto"></div>
                                                    </div>
                                                    <div class="row" style="padding-top: 10px;">
                                                        <div class="text-center">
                                                            <input class="form-control input-sm m-bot15" id="iptq2" onchange="tanque_inf()" type="number" min="0.0" max="28.0" step="0.1" value="0.0" style="width: 80%; display: inline; margin-bottom: 0px" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4" style="overflow: hidden">
                                            <section class="panel" style="margin-bottom: 5px">
                                                <header class="panel-heading">
                                                    Bomba
                                                </header>
                                                <div class="panel-body text-center">
                                                    <div class="flot-chart">
                                                        <div id="chart_bomba" style="margin: 0 auto"></div>
                                                    </div>
                                                    <div class="row" style="padding-top: 10px;">
                                                        <div class="text-center">
                                                            <input class="form-control input-sm m-bot15" id="voltimetro" onchange="bomba()" type="number" min="-4.0" max="4.0" step="0.1" value="0.0" disabled="true" style="width: 80%; display: inline; margin-bottom: 0px" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4" style="overflow: hidden">
                                            <section class="panel" style="margin-bottom: 3px">
                                                <header class="panel-heading">
                                                    <div class="col-lg-6" style="padding-left: 0px">
                                                        Controle
                                                    </div>
                                                    <div class="col-lg-6 text-right" id="conectarDiv" style="padding-right: 0px">
                                                        <span class="label label-danger">DESCONECTADO</span>
                                                    </div>
                                                </header>
                                                <div class="panel-body text-center" style="padding-top: 5px; padding-bottom: 1px">
                                                    <div class="flot-chart">
                                                        <div class="form-group" style="margin-bottom: 3px">
                                                            <div class="row m-bot15" style="margin-bottom: 3px">
                                                                <div class="col-sm-6 text-right">
                                                                    <h4>CONECTAR</h4>
                                                                </div>
                                                                <div class="col-sm-6 text-left">
                                                                    <input type="checkbox" onchange="conectar(this)" data-toggle="switch" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group" style="margin-bottom: 3px">
                                                            <div class="row m-bot15" style="margin-bottom: 3px">
                                                                <div class="col-sm-6 text-right">
                                                                    <h4>EMERGÊNCIA</h4>
                                                                </div>
                                                                <div class="col-sm-6 text-left">
                                                                    <input type="checkbox" onchange="updateTst()" data-toggle="switch" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group" style="margin-bottom: 3px">
                                                            <div class="row m-bot15" style="margin-bottom: 3px">
                                                                <div class="col-sm-6 text-right">
                                                                    <h4>MALHA ABERTA</h4>
                                                                </div>
                                                                <div class="col-sm-6 text-left">
                                                                    <input type="checkbox" onchange="malha(this)" checked="" data-toggle="switch" /> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <div class="row">
                                                <div class="col-lg-12" style="overflow: hidden">
                                                    <section class="panel" style="margin-bottom: 5px">
                                                        <header class="panel-heading">
                                                            Sinal
                                                        </header>
                                                        <div class="panel-body text-center">
                                                            <select class="form-control input-sm m-bot15">
                                                                <option>Escolha um sinal...</option>
                                                                <option>Degrau</option>
                                                                <option>Senoidal</option>
                                                                <option>Quadrado</option>
                                                                <option>Dente de Serra</option>
                                                                <option>Aleatório</option>
                                                            </select>
                                                            <div class="row">
                                                                <div class="col-lg-6" style="overflow: hidden">
                                                                    <div class="row">
                                                                        <div class="text-center">
                                                                            Amplitute (V)
                                                                            <input class="form-control input-sm m-bot15" type="number" min="-4.0" max="4.0" step="0.1" value="0.0" style="width: 80%; display: inline; margin-bottom: 0px" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
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
                                </div>
                                <div id="graficos" class="tab-pane">
                                    <div class="row" style="margin-top: 30px">
                                        <h4 style="margin-left: 15px">Tanque 01</h4>
                                        <div class="col-lg-6" style="overflow: hidden;">
                                            <section class="panel" style="margin-bottom: 0px">
                                                <header class="panel-heading">
                                                    Leitura
                                                </header>
                                                <div class="panel-body text-center">
                                                    <div class="flot-chart">
                                                        <div id="leitura_tq_1" style="height: 250px; margin: 0 auto"></div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="col-lg-6" style="overflow: hidden;">
                                            <section class="panel" style="margin-bottom: 0px">
                                                <header class="panel-heading">
                                                    Escrita
                                                </header>
                                                <div class="panel-body text-center">
                                                    <div class="flot-chart">
                                                        <div id="escrita_tq_1" style="height: 250px; margin: 0 auto"></div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 5px">
                                        <h4 style="margin-left: 15px">Tanque 02</h4>
                                        <div class="col-lg-6" style="overflow: hidden;">
                                            <section class="panel" style="margin-bottom: 0px">
                                                <header class="panel-heading">
                                                    Leitura
                                                </header>
                                                <div class="panel-body text-center">
                                                    <div class="flot-chart">
                                                        <div id="leitura_tq_2" style="height: 250px; margin: 0 auto"></div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="col-lg-6" style="overflow: hidden;">
                                            <section class="panel" style="margin-bottom: 0px">
                                                <header class="panel-heading">
                                                    Escrita
                                                </header>
                                                <div class="panel-body text-center">
                                                    <div class="flot-chart">
                                                        <div id="escrita_tq_2" style="height: 250px; margin: 0 auto"></div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 5px">
                                        <div class="col-lg-6" style="overflow: hidden;">
                                            <h4>Bomba</h4>
                                            <section class="panel" style="margin-bottom: 0px">
                                                <header class="panel-heading">

                                                </header>
                                                <div class="panel-body text-center">
                                                    <div class="flot-chart">
                                                        <div id="sinal_bomba" style="height: 250px; margin: 0 auto"></div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="col-lg-6" style="overflow: hidden;">
                                            <h4>Sinal de Controle</h4>
                                            <section class="panel" style="margin-bottom: 0px">
                                                <header class="panel-heading">

                                                </header>
                                                <div class="panel-body text-center">
                                                    <div class="flot-chart">
                                                        <div id="sinal_controle" style="height: 250px; margin: 0 auto"></div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div id="config" class="tab-pane">Configurações</div>
                                <div id="historico" class="tab-pane">
                                    <div class="row" style="margin-top: 30px">
                                        <div class="col-sm-12">
                                            <section class="panel">
                                                <header class="panel-heading">
                                                    Histórico
                                                </header>
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Usuário</th>
                                                            <th>Ação</th>
                                                            <th>Valor</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Rodrigo Silva</td>
                                                            <td>Leitura - Tanque 01</td>
                                                            <td>12 cm</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Rodrigo Silva</td>
                                                            <td>Leitura - Tanque 01</td>
                                                            <td>12.0 cm</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Rodrigo Silva</td>
                                                            <td>Leitura - Tanque 02</td>
                                                            <td>3.2 cm</td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>Rodrigo Silva</td>
                                                            <td>Escrita - Tanque 01</td>
                                                            <td>15.5 cm</td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>Rodrigo Silva</td>
                                                            <td>Escrita - Bomba</td>
                                                            <td>+2.75 Volts</td>
                                                        </tr>
                                                        <tr>
                                                            <td>6</td>
                                                            <td>Rodrigo Silva</td>
                                                            <td>Acionamento de Malha</td>
                                                            <td>Fechada</td>
                                                        </tr>
                                                        <tr>
                                                            <td>7</td>
                                                            <td>Rodrigo Silva</td>
                                                            <td>Leitura - Tanque 01</td>
                                                            <td>12 cm</td>
                                                        </tr>
                                                        <tr>
                                                            <td>8</td>
                                                            <td>Rodrigo Silva</td>
                                                            <td>Leitura - Tanque 01</td>
                                                            <td>12.0 cm</td>
                                                        </tr>
                                                        <tr>
                                                            <td>9</td>
                                                            <td>Rodrigo Silva</td>
                                                            <td>Leitura - Tanque 02</td>
                                                            <td>3.2 cm</td>
                                                        </tr>
                                                        <tr>
                                                            <td>10</td>
                                                            <td>Rodrigo Silva</td>
                                                            <td>Escrita - Tanque 01</td>
                                                            <td>15.5 cm</td>
                                                        </tr>
                                                        <tr>
                                                            <td>11</td>
                                                            <td>Rodrigo Silva</td>
                                                            <td>Escrita - Bomba</td>
                                                            <td>+2.75 Volts</td>
                                                        </tr>
                                                        <tr>
                                                            <td>12</td>
                                                            <td>Rodrigo Silva</td>
                                                            <td>Acionamento de Malha</td>
                                                            <td>Fechada</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div id="sobre" class="tab-pane">
                                    <div class="row" style="margin-top: 30px">
                                        <div class="col-md-4 portlets">
                                            <!-- Widget -->
                                            <div class="panel">
                                                <header class="panel-heading">
                                                    Equipe
                                                </header>

                                                <div class="panel-body">
                                                    <!-- Widget content -->
                                                    <div class="padd sscroll">

                                                        <ul class="chats">

                                                            <!-- Chat by us. Use the class "by-me". -->
                                                            <li class="by-me">
                                                                <!-- Use the class "pull-left" in avatar -->
                                                                <div class="avatar pull-left">
                                                                    <img src="img/usr_Augusto.jpg" alt=""/>
                                                                </div>

                                                                <div class="chat-content">
                                                                    <!-- In meta area, first include "name" and then "time" -->
                                                                    <div class="chat-meta">Augusto Matheus<span class="pull-right">Eng. de Computação</span></div>
                                                                    Vivamus diam elit diam, consectetur dapibus adipiscing elit.
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </li> 

                                                            <!-- Chat by other. Use the class "by-other". -->
                                                            <li class="by-other">
                                                                <!-- Use the class "pull-right" in avatar -->
                                                                <div class="avatar pull-right">
                                                                    <img src="img/usr_marcel.jpg" alt=""/>
                                                                </div>

                                                                <div class="chat-content">
                                                                    <!-- In the chat meta, first include "time" then "name" -->
                                                                    <div class="chat-meta">Eng. de Computação<span class="pull-right">Marcel Ribeiro Dantas</span></div>
                                                                    Vivamus diam elit diam, consectetur fconsectetur dapibus adipiscing elit.
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </li>   

                                                            <li class="by-me">
                                                                <div class="avatar pull-left">
                                                                    <img src="img/usr_pablo.jpg" alt=""/>
                                                                </div>

                                                                <div class="chat-content">
                                                                    <div class="chat-meta">Pablo Holanda<span class="pull-right">Eng. de Computação</span></div>
                                                                    Vivamus diam elit diam, consectetur fermentum sed dapibus eget, Vivamus consectetur dapibus adipiscing elit.
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </li>  

                                                            <li class="by-other">
                                                                <!-- Use the class "pull-right" in avatar -->
                                                                <div class="avatar pull-right">
                                                                    <img src="img/usr_Pedro.jpg" alt=""/>
                                                                </div>

                                                                <div class="chat-content">
                                                                    <!-- In the chat meta, first include "time" then "name" -->
                                                                    <div class="chat-meta">Eng. de Computação<span class="pull-right">Pedro de Castro</span></div>
                                                                    Vivamus diam elit diam, consectetur fermentum sed dapibus eget, Vivamus consectetur dapibus adipiscing elit.
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </li> 
                                                            <li class="by-me">
                                                                <div class="avatar pull-left">
                                                                    <img src="img/usr_rodrigo.jpg" alt=""/>
                                                                </div>

                                                                <div class="chat-content">
                                                                    <div class="chat-meta">Rodrigo Silva<span class="pull-right">Eng. de Computação</span></div>
                                                                    Vivamus diam elit diam, consectetur fermentum sed dapibus eget, Vivamus consectetur dapibus adipiscing elit.
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </li> 
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>

                                        <div class="col-lg-8">
                                            <!--Project Activity start-->
                                            <section class="panel">
                                                <header class="panel-heading">
                                                    Sobre o Sistema
                                                </header>

                                                <div class="panel-group m-bot20" id="accordion">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                                    Projeto - Versão 1
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapseOne" class="panel-collapse collapse in">
                                                            <div class="panel-body">
                                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                                    Projeto - Versão 2
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapseTwo" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                                    Projeto - Versão 3
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapseThree" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <!--Project Activity end-->
                                        </div>
                                    </div><br><br>
                                </div>
                            </div>
                        </div>
                    </section>
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

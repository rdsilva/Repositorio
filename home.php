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

        <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">

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

        <!--<script src="sweetalert-master/dist/sweetalert-dev.js" type="text/javascript"></script>-->
        <script src="sweetalert-master/dist/sweetalert.min.js" type="text/javascript"></script>


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
        function tanque_sup(nivel) {
            var chart = $('#chart_tanque1').highcharts();
            var point = chart.series[0].points[0];
//            console.log(urlMap);
//            $.getJSON(urlMap, function (data) {
            point.update(nivel);
//            });
        }
        function tanque_inf(nivel) {
            var chart = $('#chart_tanque2').highcharts();
            var point = chart.series[0].points[0];
//            console.log(urlMap);
//            $.getJSON(urlMap, function (data) {
            point.update(nivel);
//            });
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
                document.getElementById("malha").innerHTML = '<img src="img/malha_aberta.png" style="width: 275px;"> ';
                $('#div_malha_select :input').attr('disabled', true);
                $('#div_sptq1 :input').attr('disabled', true);
//                $('#div_sinal :input').removeAttr('disabled');
            } else {
                document.getElementById("malha").innerHTML = '<img src="img/malha_fechada.png" style="width: 275px;"> ';
                $('#div_malha_select :input').removeAttr('disabled');
                $('#div_sptq1 :input').removeAttr('disabled');
                $('#div_malha_kp :input').attr('disabled', true);
                $('#div_malha_ki :input').attr('disabled', true);
                $('#div_malha_kd :input').attr('disabled', true);
//                $('#div_sinal :input').attr('disabled', true);
            }

        }

        function selectCtrl(select) {
            var index = Number(select.value);
//            console.log(index);
            switch (index) {
                case 0:
//                    alert('selecione....');
                    $('#div_malha_kp :input').attr('disabled', true);
                    $('#div_malha_ki :input').attr('disabled', true);
                    $('#div_malha_kd :input').attr('disabled', true);
                    break;
                case 1:
//                    alert('caso P');
                    $('#div_malha_kp :input').removeAttr('disabled');
                    $('#div_malha_ki :input').attr('disabled', true);
                    $('#div_malha_kd :input').attr('disabled', true);
                    break;
                case 2:
//                    alert('caso PI');
                    $('#div_malha_kp :input').removeAttr('disabled');
                    $('#div_malha_ki :input').removeAttr('disabled');
                    $('#div_malha_kd :input').attr('disabled', true);
                    break;
                case 3:
//                    alert('caso PD');
                    $('#div_malha_kp :input').removeAttr('disabled');
                    $('#div_malha_ki :input').attr('disabled', true);
                    $('#div_malha_kd :input').removeAttr('disabled');
                    break;
                case 4:
//                    alert('caso PID');
                    $('#div_malha_kp :input').removeAttr('disabled');
                    $('#div_malha_ki :input').removeAttr('disabled');
                    $('#div_malha_kd :input').removeAttr('disabled');
                    break;
                case 5:
//                    alert('caso PI-D');
                    $('#div_malha_kp :input').removeAttr('disabled');
                    $('#div_malha_ki :input').removeAttr('disabled');
                    $('#div_malha_kd :input').removeAttr('disabled');
                    break;
            }
        }

        function selectSgn(select) {
            var index = Number(select.value);

            if (index === 5) {
                document.getElementById("input_amplitude").innerHTML = '<input class="form-control input-sm m-bot15" type="number" min="-4.0" max="4.0" step="0.1" value="0.0" style="width: 40%; display: inline; margin-bottom: 0px" />' +
                        '<input class="form-control input-sm m-bot15" type="number" min="-4.0" max="4.0" step="0.1" value="0.0" style="width: 40%; display: inline; margin-bottom: 0px" />';
                document.getElementById("input_periodo").innerHTML = '<input class="form-control input-sm m-bot15" type="number" min="-4.0" max="4.0" step="0.1" value="0.0" style="width: 40%; display: inline; margin-bottom: 0px" />' +
                        '<input class="form-control input-sm m-bot15" type="number" min="-4.0" max="4.0" step="0.1" value="0.0" style="width: 40%; display: inline; margin-bottom: 0px" />';
            } else {
                document.getElementById("input_amplitude").innerHTML = '<input class="form-control input-sm m-bot15" type="number" min="-4.0" max="4.0" step="0.1" value="0.0" style="width: 80%; display: inline; margin-bottom: 0px" />'
                document.getElementById("input_periodo").innerHTML = '<input class="form-control input-sm m-bot15" type="number" min="-4.0" max="4.0" step="0.1" value="0.0" style="width: 80%; display: inline; margin-bottom: 0px" />'
            }
        }

        function abortar(select) {
            if (select.checked) {
                swal({
                    title: "ABORTAR!",
                    text: "Você realmente desejar para a planta?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "SIM!",
                    cancelButtonText: "NÃO, CANCELAR!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (isConfirm) {
                    if (isConfirm) {
                        alert("As operações da planta foram abortadas!");
                        //swal("Deleted!", "Your imaginary file has been deleted.", "success");
                    } else {
                        alert("O funcionamento continua normalmente!");
                        //swal("Cancelled", "Your imaginary file is safe :)", "error");
                    }
                });
            }
        }

        function updateSinais(sp, pv, mv) {
            var chart_sgn = $('#sinais').highcharts();
            var sinalSP = chart_sgn.series[0];
            var sinalPV = chart_sgn.series[1];
            var sinalMV = chart_sgn.series[2];

            var x = (new Date()).getTime();

            sinalSP.addPoint([x, sp], true, true);
            sinalPV.addPoint([x, pv], true, true);
            sinalMV.addPoint([x, mv], true, true);
        }

        //script de leitura das variaveis e atualização dos graficos 
        $(document).ready(function () {

            var urlMap = "getData.php?leitura=true";

            setInterval(function () {
                $.getJSON(urlMap, function (data) {

                    updateSinais(data.sptq_1, data.pvtq_1, data.mvtq_1);
                    tanque_sup(data.sptq_1);

                });
            }, 1000);
        });

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
        //sinais
        $(function () {
            $(document).ready(function () {
                Highcharts.setOptions({
                    global: {
                        useUTC: false
                    }
                });

                // Create the chart
                $('#sinaisxxx').highcharts('StockChart', {
                    chart: {
                        events: {
                            load: function () {

                                // set up the updating of SP. PV, MV
                                var series1 = this.series[0];
                                var series2 = this.series[1];
                                var series3 = this.series[2];
                                setInterval(function () {
//                                    var x = (new Date()).getTime();
//                                    var y1 = Math.round(Math.random() * 100);
//                                    var y2 = Math.round(Math.random() * 100);
//                                    var y3 = Math.round(Math.random() * 100);
//                                    series1.addPoint([x, y1], true, true);
//                                    series2.addPoint([x, y2], true, true);
//                                    series3.addPoint([x, y3], true, true);
                                }, 2000);

                            }
                        },
                        height: 280,
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
                        pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.change}%)<br/>',
                        valueDecimals: 2
                    },
                    yAxis: {
                        min: 0,
                        max: 30,
                        startOnTick: false,
                        endOnTick: false
                    },
                    series: [{
                            name: 'SP ',
                            color: 'black',
                            data: (function () {
                                // generate an array of random data
                                var data = [],
                                        time = (new Date()).getTime(),
                                        i;

                                for (i = -29; i <= 0; i += 1) {
                                    data.push({
                                        x: time + i * 1000,
                                        y: 0
                                    });
                                }
                                return data;
                            }())
                        }, {
                            name: 'PV ',
                            color: 'green',
                            data: (function () {
                                // generate an array of random data
                                var data = [],
                                        time = (new Date()).getTime(),
                                        i;

                                for (i = -29; i <= 0; i += 1) {
                                    data.push({
                                        x: time + i * 1000,
                                        y: 0
                                    });
                                }
                                return data;
                            }())
                        }, {
                            name: 'MV ',
                            color: 'red',
                            data: (function () {
                                // generate an array of random data
                                var data = [],
                                        time = (new Date()).getTime(),
                                        i;

                                for (i = -29; i <= 0; i += 1) {
                                    data.push({
                                        x: time + i * 1000,
                                        y: 0
                                    });
                                }
                                return data;
                            }())
                        }]
                });

                $(document).ready(function () {
                    var chart = $('#sinais').highcharts();
                    var sinalSP = chart.series[0];
                    var sinalPV = chart.series[1];
                    var sinalMV = chart.series[2];
                    setInterval(function () {
                        var x = (new Date()).getTime();

                        var setPoint = Number(document.getElementById("sptq1").value);

                        sinalSP.addPoint([x, setPoint], true, true);
                        sinalPV.addPoint([x, 0], true, true);
                        sinalMV.addPoint([x, 0], true, true);
//                        console.log('X=0 ; Y=' + setPoint);
                    }, 1000);
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

                $('#sinais').highcharts({
                    chart: {
//                        type: 'spline',
                        animation: Highcharts.svg, // don't animate in old IE
                        marginRight: 10,
                        height: 280,
                    },
                    title: {
                        text: ' ',
                        x: -20 //center
                    },
                    xAxis: {
                        type: 'datetime',
                        tickPixelInterval: 150
                    },
                    yAxis: {
                        title: {
                            text: ' '
                        },
                        plotLines: [{
                                value: 0,
                                width: 1,
                                color: '#808080'
                            }]
                    },
                    exporting: {
                        enabled: false
                    },
                    credits: {
                        enabled: false
                    },
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'top',
                        margin: 30
                    },
                    scrollbar: {
                        enabled: true
                    },
                    rangeSelector: {
                        selected: 1
                    },
                    series: [{
                            name: 'SP',
                            color: 'black',
                            step: true,
                            data: (function () {
                                // generate an array of random data
                                var data = [],
                                        time = (new Date()).getTime(),
                                        i;

                                for (i = -29; i <= 0; i += 1) {
                                    data.push({
                                        x: time + i * 1000,
                                        y: 0
                                    });
                                }
                                return data;
                            }())
                        }, {
                            name: 'PV',
                            color: 'green',
                            type: 'spline',
                            data: (function () {
                                // generate an array of random data
                                var data = [],
                                        time = (new Date()).getTime(),
                                        i;

                                for (i = -29; i <= 0; i += 1) {
                                    data.push({
                                        x: time + i * 1000,
                                        y: 0
                                    });
                                }
                                return data;
                            }())
                        }, {
                            name: 'MV',
                            color: 'red',
                            type: 'spline',
                            data: (function () {
                                // generate an array of random data
                                var data = [],
                                        time = (new Date()).getTime(),
                                        i;

                                for (i = -29; i <= 0; i += 1) {
                                    data.push({
                                        x: time + i * 1000,
                                        y: 0
                                    });
                                }
                                return data;
                            }())
                        }]
                });

                $(document).ready(function () {
                    var chart = $('#sinais').highcharts();
                    var sinalSP = chart.series[0];
                    var sinalPV = chart.series[1];
                    var sinalMV = chart.series[2];
                    setInterval(function () {
                        var x = (new Date()).getTime();

                        var setPoint = Number(document.getElementById("sptq1").value);
                        var rand = 0;
//                        var rand = Math.random();

                        sinalSP.addPoint([x, setPoint], true, true);
                        sinalPV.addPoint([x, rand], true, true);
                        sinalMV.addPoint([x, rand], true, true);
//                        console.log('X=0 ; Y=' + setPoint);
                    }, 1000);
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
                        <div class="panel-body">
                            <div class="row">
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
                                                <div class="panel-body" style="border: none; padding-bottom: 0px">
                                                    <form class="form-horizontal " method="get">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">SP</label>
                                                            <div class="col-sm-10" id="div_sptq1">
                                                                <input class="form-control input-sm m-bot15" id="sptq1" onchange="tanque_sup()" disabled="true" type="number" min="0.0" max="28.0" step="0.1" value="0.0" style="width: 80%; display: inline; margin-bottom: 0px" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">PV</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control input-sm m-bot15" id="pvtq1" type="number" disabled="true" value="0.0" style="width: 80%; display: inline; margin-bottom: 0px" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">MV</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control input-sm m-bot15" id="mvtq1" type="number" disabled="true" value="0.0" style="width: 80%; display: inline; margin-bottom: 0px" />
                                                            </div>
                                                        </div>
                                                    </form>
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
                                                <div class="panel-body" style="border: none; padding-bottom: 0px">
                                                    <form class="form-horizontal " method="get">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">SP</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control input-sm m-bot15" id="sptq2" disabled="true" onchange="tanque_inf()" type="number" min="0.0" max="28.0" step="0.1" value="0.0" style="width: 80%; display: inline; margin-bottom: 0px" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">PV</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control input-sm m-bot15" id="pvtq2" type="number" disabled="true" value="0.0" style="width: 80%; display: inline; margin-bottom: 0px" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">MV</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control input-sm m-bot15" id="mvtq2" type="number" disabled="true" value="0.0" style="width: 80%; display: inline; margin-bottom: 0px" />
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8" style="overflow: hidden">
                                    <section class="panel" style="margin-bottom: 5px">
                                        <header class="panel-heading">
                                            Sinais
                                        </header>
                                        <div class="panel-body text-center" style="padding: 0px">
                                            <div class="flot-chart">
                                                <div id="sinais" style="margin: 0 auto"></div>
                                            </div>
                                        </div>
                                    </section>
                                    <section class="panel" style="margin-bottom: 0px">
                                        <header class="panel-heading">
                                            Controle
                                        </header>
                                        <div class="panel-body text-center" style="padding-bottom: 10px">
                                            <div class="flot-chart">
                                                <div id="controle" style="margin: 0 auto">
                                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                                        <div class="form-group" style="margin-bottom: 3px">
                                                            <div class="row m-bot15" style="margin-bottom: 3px">
                                                                <div class="col-sm-6 text-right">
                                                                    <h5>EMERGÊNCIA</h5>
                                                                </div>
                                                                <div class="col-sm-6 text-left">
                                                                    <input type="checkbox" id="plantaAbortar" onchange="abortar(this)" data-toggle="switch" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group" style="margin-bottom: 3px">
                                                            <div class="row m-bot15" style="margin-bottom: 3px">
                                                                <div class="col-sm-6 text-right">
                                                                    <h5>MALHA ABERTA</h5>
                                                                </div>
                                                                <div class="col-sm-6 text-left">
                                                                    <input type="checkbox" onchange="malha(this)" checked="" data-toggle="switch" /> 
                                                                </div>
                                                            </div>
                                                            <div class="row m-bot15" style="margin-bottom: 3px">
                                                                <div id='malha' class="col-sm-6 text-left" style="margin-top: 15px">
                                                                    <img src="img/malha_aberta.png" style="width: 275px;"> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4" id="div_sinal">
                                                        <select class="form-control input-sm m-bot15" onchange="selectSgn(this)">
                                                            <option value=0>Escolha um sinal...</option>
                                                            <option value=1>Degrau</option>
                                                            <option value=2>Senoidal</option>
                                                            <option value=3>Quadrado</option>
                                                            <option value=4>Dente de Serra</option>
                                                            <option value=5>Aleatório</option>
                                                        </select>
                                                        <div class="row m-bot15" style="margin-bottom: 3px">
                                                            <div class="col-sm-6 text-right">
                                                                <h5>Amplitude (V)</h5>
                                                            </div>
                                                            <div class="col-sm-6 text-left" style="padding: 0px" id="input_amplitude">
                                                                <input class="form-control input-sm m-bot15" type="number" min="-4.0" max="4.0" step="0.1" value="0.0" style="width: 80%; display: inline; margin-bottom: 0px" />
                                                            </div>
                                                        </div>
                                                        <div class="row m-bot15" style="margin-bottom: 3px">
                                                            <div class="col-sm-6 text-right">
                                                                <h5>Período (s)</h5>
                                                            </div>
                                                            <div class="col-sm-6 text-left" style="padding: 0px" id="input_periodo">
                                                                <input class="form-control input-sm m-bot15" type="number" min="-4.0" max="4.0" step="0.1" value="0.0" style="width: 80%; display: inline; margin-bottom: 0px" />
                                                            </div>
                                                        </div>
                                                        <div class="row m-bot15" style="margin-bottom: 3px">
                                                            <div class="col-sm-6 text-right">
                                                                <h5>Off Set (s)</h5>
                                                            </div>
                                                            <div class="col-sm-6 text-left" style="padding: 0px">
                                                                <input class="form-control input-sm m-bot15" type="number" min="-4.0" max="4.0" step="0.1" value="0.0" style="width: 80%; display: inline; margin-bottom: 0px" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4" id="div_malha_select">
                                                        <select id="malha_select" class="form-control input-sm m-bot15" disabled="true" onchange="selectCtrl(this)">
                                                            <option value=0>Escolha um controle...</option>
                                                            <option value=1>P</option>
                                                            <option value=2>PI</option>
                                                            <option value=3>PD</option>
                                                            <option value=4>PID</option>
                                                            <option value=5>PI-D</option>
                                                        </select>
                                                        <div class="row m-bot15" style="margin-bottom: 3px">
                                                            <div class="col-sm-6 text-right">
                                                                <h5>Kp</h5>
                                                            </div>
                                                            <div class="col-sm-6 text-left" id="div_malha_kp">
                                                                <input class="form-control input-sm m-bot15" id="malha_kp" disabled="true" type="number" min="-4.0" max="4.0" step="0.1" value="0.0" style="width: 80%; display: inline; margin-bottom: 0px" />
                                                            </div>
                                                        </div>
                                                        <div class="row m-bot15" style="margin-bottom: 3px">
                                                            <div class="col-sm-6 text-right">
                                                                <h5>Ki</h5>
                                                            </div>
                                                            <div class="col-sm-6 text-left" id="div_malha_ki">
                                                                <input class="form-control input-sm m-bot15" id="malha_ki" disabled="true" type="number" min="-4.0" max="4.0" step="0.1" value="0.0" style="width: 80%; display: inline; margin-bottom: 0px" />
                                                            </div>
                                                        </div>
                                                        <div class="row m-bot15" style="margin-bottom: 3px">
                                                            <div class="col-sm-6 text-right">
                                                                <h5>Kd</h5>
                                                            </div>
                                                            <div class="col-sm-6 text-left" id="div_malha_kd">
                                                                <input class="form-control input-sm m-bot15" id="malha_kd" disabled="true" type="number" min="-4.0" max="4.0" step="0.1" value="0.0" style="width: 80%; display: inline; margin-bottom: 0px" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                </section>
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

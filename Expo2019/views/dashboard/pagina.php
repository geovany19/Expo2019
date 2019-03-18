<?php
include('../../core/helpers/dashboard/navbaradmin.php');
include('../../core/helpers/dashboard/footeradmin.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="../../resources/img/jardin-iso.png">
    <link rel="stylesheet" type="text/css" href="../../resources/css/dashboard/estilos_admin.css">
    <link rel="stylesheet" href="../../resources/css/materialize.css">
    <link rel="stylesheet" type="text/css" href="../../resources/css/material-icons.css">
    <link rel="stylesheet" type="text/css" href="../../resources/css/Chart.css">
    <title>Administrador</title>
</head>

<body class="has-fixed-sidenav">
    <header>
        <?php
        echo navbar::nav();
        echo navbar::sidenav();
        ?>
    </header>
    <main>
        <div class="container">
            <div id="chart-dashboard">
                <div class="row">
                    <div class="col s12 m6 l6">
                        <canvas id="myChart" width="400" height="400"></canvas>
                        <script>
                            var ctx = document.getElementById('myChart');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                    datasets: [{
                                        label: '# of Votes',
                                        data: [12, 19, 3, 5, 2, 3],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(255, 206, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(255, 159, 64, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }
                            });
                        </script>
                        <!--<div class="card">
                            <div class="card-move-up waves-effect waves-block waves-light">
                                <div class="move-up cyan darken-1">
                                    <div>
                                        <span class="chart-title white-text">Revenue</span>
                                        <div class="chart-revenue cyan darken-2 white-text">
                                            <p class="chart-revenue-total">$4,500.85</p>
                                            <p class="chart-revenue-per"><i class="mdi-navigation-arrow-drop-up"></i> 21.80 %</p>
                                        </div>
                                        <div class="switch chart-revenue-switch right">
                                            <label class="cyan-text text-lighten-5">
                                                Month
                                                <input type="checkbox">
                                                <span class="lever"></span> Year
                                            </label>
                                        </div>
                                    </div>
                                    <div class="trending-line-chart-wrapper">
                                        <canvas id="trending-line-chart" height="284" width="1224" style="width: 612px; height: 142px;"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <a class="btn-floating btn-move-up waves-effect waves-light darken-2 right"><i class="mdi-content-add activator"></i></a>
                                <div class="col s12 m3 l3">
                                    <div id="doughnut-chart-wrapper">
                                        <canvas id="doughnut-chart" height="178" width="268" style="width: 134px; height: 89px;"></canvas>
                                        <div class="doughnut-chart-status">4500
                                            <p class="ultra-small center-align">Sold</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m2 l2">
                                    <ul class="doughnut-chart-legend">
                                        <li class="mobile ultra-small"><span class="legend-color"></span>Mobile</li>
                                        <li class="kitchen ultra-small"><span class="legend-color"></span> Kitchen</li>
                                        <li class="home ultra-small"><span class="legend-color"></span> Home</li>
                                    </ul>
                                </div>
                                <div class="col s12 m5 l6">
                                    <div class="trending-bar-chart-wrapper">
                                        <canvas id="trending-bar-chart" height="174" width="580" style="width: 290px; height: 87px;"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Revenue by Month <i class="mdi-navigation-close right"></i></span>
                                <table class="responsive-table">
                                    <thead>
                                        <tr>
                                            <th data-field="id">ID</th>
                                            <th data-field="month">Month</th>
                                            <th data-field="item-sold">Item Sold</th>
                                            <th data-field="item-price">Item Price</th>
                                            <th data-field="total-profit">Total Profit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>January</td>
                                            <td>122</td>
                                            <td>100</td>
                                            <td>$122,00.00</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>February</td>
                                            <td>122</td>
                                            <td>100</td>
                                            <td>$122,00.00</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>March</td>
                                            <td>122</td>
                                            <td>100</td>
                                            <td>$122,00.00</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>April</td>
                                            <td>122</td>
                                            <td>100</td>
                                            <td>$122,00.00</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>May</td>
                                            <td>122</td>
                                            <td>100</td>
                                            <td>$122,00.00</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>June</td>
                                            <td>122</td>
                                            <td>100</td>
                                            <td>$122,00.00</td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>July</td>
                                            <td>122</td>
                                            <td>100</td>
                                            <td>$122,00.00</td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>August</td>
                                            <td>122</td>
                                            <td>100</td>
                                            <td>$122,00.00</td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>Septmber</td>
                                            <td>122</td>
                                            <td>100</td>
                                            <td>$122,00.00</td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>Octomber</td>
                                            <td>122</td>
                                            <td>100</td>
                                            <td>$122,00.00</td>
                                        </tr>
                                        <tr>
                                            <td>11</td>
                                            <td>November</td>
                                            <td>122</td>
                                            <td>100</td>
                                            <td>$122,00.00</td>
                                        </tr>
                                        <tr>
                                            <td>12</td>
                                            <td>December</td>
                                            <td>122</td>
                                            <td>100</td>
                                            <td>$122,00.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="sample-chart-wrapper">
            <canvas id="line-chart-sample" height="588" width="1472" style="width: 736px; height: 294px;"></canvas>
        </div>
    </main>
</body>

</html> 
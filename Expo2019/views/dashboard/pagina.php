<?php
include "../../core/helpers/dashboard/dashboard_helper.php";
dashboard_helper::head("Dashboard");
dashboard_helper::nav();
?>

<div>
    <div id="chart-dashboard">
        <div class="row">
            <div class="col col-sm-12 col-md-6 col-lg-6">
                <!--Creación de gráficos de especialidad y citas-->
                <div id="highcharts-117b751e-2302-4fb5-bca1-a47be71d51e3"></div>
                <script>
                    (function() {
                        var files = ["https://code.highcharts.com/stock/highstock.js", "https://code.highcharts.com/highcharts-more.js", "https://code.highcharts.com/highcharts-3d.js", "https://code.highcharts.com/modules/data.js", "https://code.highcharts.com/modules/exporting.js", "https://code.highcharts.com/modules/funnel.js", "https://code.highcharts.com/modules/annotations.js", "https://code.highcharts.com/modules/solid-gauge.js"],
                            loaded = 0;
                        if (typeof window["HighchartsEditor"] === "undefined") {
                            window.HighchartsEditor = {
                                ondone: [cl],
                                hasWrapped: false,
                                hasLoaded: false
                            };
                            include(files[0]);
                        } else {
                            if (window.HighchartsEditor.hasLoaded) {
                                cl();
                            } else {
                                window.HighchartsEditor.ondone.push(cl);
                            }
                        }

                        function isScriptAlreadyIncluded(src) {
                            var scripts = document.getElementsByTagName("script");
                            for (var i = 0; i < scripts.length; i++) {
                                if (scripts[i].hasAttribute("src")) {
                                    if ((scripts[i].getAttribute("src") || "").indexOf(src) >= 0 || (scripts[i].getAttribute("src") === "http://code.highcharts.com/highcharts.js" && src === "https://code.highcharts.com/stock/highstock.js")) {
                                        return true;
                                    }
                                }
                            }
                            return false;
                        }

                        function check() {
                            if (loaded === files.length) {
                                for (var i = 0; i < window.HighchartsEditor.ondone.length; i++) {
                                    try {
                                        window.HighchartsEditor.ondone[i]();
                                    } catch (e) {
                                        console.error(e);
                                    }
                                }
                                window.HighchartsEditor.hasLoaded = true;
                            }
                        }

                        function include(script) {
                            function next() {
                                ++loaded;
                                if (loaded < files.length) {
                                    include(files[loaded]);
                                }
                                check();
                            }
                            if (isScriptAlreadyIncluded(script)) {
                                return next();
                            }
                            var sc = document.createElement("script");
                            sc.src = script;
                            sc.type = "text/javascript";
                            sc.onload = function() {
                                next();
                            };
                            document.head.appendChild(sc);
                        }

                        function each(a, fn) {
                            if (typeof a.forEach !== "undefined") {
                                a.forEach(fn);
                            } else {
                                for (var i = 0; i < a.length; i++) {
                                    if (fn) {
                                        fn(a[i]);
                                    }
                                }
                            }
                        }
                        var inc = {},
                            incl = [];
                        each(document.querySelectorAll("script"), function(t) {
                            inc[t.src.substr(0, t.src.indexOf("?"))] = 1;
                        });

                        function cl() {
                            if (typeof window["Highcharts"] !== "undefined") {
                                var options = {
                                    "title": {
                                        "text": "Citas por especialidad"
                                    },
                                    "subtitle": {
                                        "text": ""
                                    },
                                    "exporting": {},
                                    "chart": {
                                        "plotBackgroundColor": null,
                                        "plotBorderWidth": null,
                                        "plotShadow": false,
                                        "type": "pie"
                                    },
                                    "tooltip": {
                                        "pointFormat": "{series.name}: <b>{point.percentage:.1f}%</b>"
                                    },
                                    "plotOptions": {
                                        "pie": {
                                            "allowPointSelect": true,
                                            "cursor": "pointer",
                                            "dataLabels": {
                                                "enabled": false
                                            },
                                            "showInLegend": true
                                        },
                                        "series": {
                                            "animation": false
                                        }
                                    },
                                    "series": [{
                                        "name": "Brands",
                                        "turboThreshold": 0,
                                        "colorByPoint": true
                                    }],
                                    "data": {
                                        "csv": "\"Category\";\"Porcentaje\"\n\"Medicina general\";61.41\n\"Ortopedia\";11.84\n\"Pediatría\";10.85\n\"Nutrición\";4.67\n\"Cardiología\";4.18\n\"Otros\";7.05",
                                        "googleSpreadsheetKey": false,
                                        "googleSpreadsheetWorksheet": false
                                    },
                                    "yAxis": [{
                                        "title": {}
                                    }],
                                    "legend": {}
                                };
                                /*
                                // Sample of extending options:
                                Highcharts.merge(true, options, {
                                    chart: {
                                        backgroundColor: "#bada55"
                                    },
                                    plotOptions: {
                                        series: {
                                            cursor: "pointer",
                                            events: {
                                                click: function(event) {
                                                    alert(this.name + " clicked\n" +
                                                          "Alt: " + event.altKey + "\n" +
                                                          "Control: " + event.ctrlKey + "\n" +
                                                          "Shift: " + event.shiftKey + "\n");
                                                }
                                            }
                                        }
                                    }
                                });
                                */
                                new Highcharts.Chart("highcharts-117b751e-2302-4fb5-bca1-a47be71d51e3", options);
                            }
                        }
                    })();
                </script>
            </div>
            <div class="col col-sm-12 col-md-6 col-lg-6">
                <div id="highcharts-ab7518ab-2f32-418c-9fdd-b600afde09cf"></div>
                <script>
                    (function() {
                        var files = ["https://code.highcharts.com/stock/highstock.js", "https://code.highcharts.com/highcharts-more.js", "https://code.highcharts.com/highcharts-3d.js", "https://code.highcharts.com/modules/data.js", "https://code.highcharts.com/modules/exporting.js", "https://code.highcharts.com/modules/funnel.js", "https://code.highcharts.com/modules/annotations.js", "https://code.highcharts.com/modules/solid-gauge.js"],
                            loaded = 0;
                        if (typeof window["HighchartsEditor"] === "undefined") {
                            window.HighchartsEditor = {
                                ondone: [cl],
                                hasWrapped: false,
                                hasLoaded: false
                            };
                            include(files[0]);
                        } else {
                            if (window.HighchartsEditor.hasLoaded) {
                                cl();
                            } else {
                                window.HighchartsEditor.ondone.push(cl);
                            }
                        }

                        function isScriptAlreadyIncluded(src) {
                            var scripts = document.getElementsByTagName("script");
                            for (var i = 0; i < scripts.length; i++) {
                                if (scripts[i].hasAttribute("src")) {
                                    if ((scripts[i].getAttribute("src") || "").indexOf(src) >= 0 || (scripts[i].getAttribute("src") === "http://code.highcharts.com/highcharts.js" && src === "https://code.highcharts.com/stock/highstock.js")) {
                                        return true;
                                    }
                                }
                            }
                            return false;
                        }

                        function check() {
                            if (loaded === files.length) {
                                for (var i = 0; i < window.HighchartsEditor.ondone.length; i++) {
                                    try {
                                        window.HighchartsEditor.ondone[i]();
                                    } catch (e) {
                                        console.error(e);
                                    }
                                }
                                window.HighchartsEditor.hasLoaded = true;
                            }
                        }

                        function include(script) {
                            function next() {
                                ++loaded;
                                if (loaded < files.length) {
                                    include(files[loaded]);
                                }
                                check();
                            }
                            if (isScriptAlreadyIncluded(script)) {
                                return next();
                            }
                            var sc = document.createElement("script");
                            sc.src = script;
                            sc.type = "text/javascript";
                            sc.onload = function() {
                                next();
                            };
                            document.head.appendChild(sc);
                        }

                        function each(a, fn) {
                            if (typeof a.forEach !== "undefined") {
                                a.forEach(fn);
                            } else {
                                for (var i = 0; i < a.length; i++) {
                                    if (fn) {
                                        fn(a[i]);
                                    }
                                }
                            }
                        }
                        var inc = {},
                            incl = [];
                        each(document.querySelectorAll("script"), function(t) {
                            inc[t.src.substr(0, t.src.indexOf("?"))] = 1;
                        });

                        function cl() {
                            if (typeof window["Highcharts"] !== "undefined") {
                                var options = {
                                    "title": {
                                        "text": "Doctores por especialidad"
                                    },
                                    "subtitle": {
                                        "text": ""
                                    },
                                    "exporting": {},
                                    "chart": {
                                        "plotBackgroundColor": null,
                                        "plotBorderWidth": null,
                                        "plotShadow": false,
                                        "type": "pie"
                                    },
                                    "tooltip": {
                                        "pointFormat": "{series.name}: <b>{point.percentage:.1f}%</b>"
                                    },
                                    "plotOptions": {
                                        "pie": {
                                            "allowPointSelect": true,
                                            "cursor": "pointer",
                                            "dataLabels": {
                                                "enabled": false
                                            },
                                            "showInLegend": true
                                        },
                                        "series": {
                                            "animation": false
                                        }
                                    },
                                    "series": [{
                                        "name": "Brands",
                                        "turboThreshold": 0,
                                        "colorByPoint": true
                                    }],
                                    "data": {
                                        "csv": "\"Category\";\"Porcentaje\"\n\"Medicina general\";61.41\n\"Ortopedia\";11.84\n\"Pediatría\";10.85\n\"Nutrición\";4.67\n\"Cardiología\";4.18\n\"Otros\";7.05",
                                        "googleSpreadsheetKey": false,
                                        "googleSpreadsheetWorksheet": false
                                    },
                                    "legend": {},
                                    "xAxis": [{
                                        "title": {},
                                        "labels": {}
                                    }],
                                    "yAxis": [{
                                        "title": {},
                                        "labels": {}
                                    }]
                                };
                                /*
                                // Sample of extending options:
                                Highcharts.merge(true, options, {
                                    chart: {
                                        backgroundColor: "#bada55"
                                    },
                                    plotOptions: {
                                        series: {
                                            cursor: "pointer",
                                            events: {
                                                click: function(event) {
                                                    alert(this.name + " clicked\n" +
                                                          "Alt: " + event.altKey + "\n" +
                                                          "Control: " + event.ctrlKey + "\n" +
                                                          "Shift: " + event.shiftKey + "\n");
                                                }
                                            }
                                        }
                                    }
                                });
                                */
                                new Highcharts.Chart("highcharts-ab7518ab-2f32-418c-9fdd-b600afde09cf", options);
                            }
                        }
                    })();
                </script>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col col-sm-12">
            <h3>Doctores</h3>
            <table class="table table-responsive table-hover">
                <thead class="thead-dark">
                    <!--Agregando los campos fijos a la tabla-->
                    <tr>
                        <th scope="col">Código del doctor</th>
                        <th scope="col">Nombre del doctor</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Especialidad</th>
                        <th scope="col">Disponibilidad</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <!--Agregando registros a la tabla-->
                <tbody>
                    <tr>
                        <td scope="row">1</td>
                        <td>Juan Pérez</td>
                        <td><img class="rounded" src="../../resources/img/dashboard/img2.jpg" alt="Responsive-image" width="200px" height="200px"></td>
                        <td>Medicina general</td>
                        <td>
                            <p>
                                <label>
                                    <input type="checkbox" class="filled-in" checked="checked" disabled="disabled" />
                                    <span>Disponible</span>
                                </label>
                            </p>
                        </td>
                        <!---Declarando que al interactuar con el icono "delete" activará un modal que sirve para borrar o uno un registro-->
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal1">border_color</a></i></td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Alberto Laínez</td>
                        <td><img class="col col-sm-12 col-md-6" src="../../resources/img/dashboard/img2.jpg" alt=""></td>
                        <td>Pediatría</td>
                        <td>
                            <p>
                                <label>
                                    <input type="checkbox" class="filled-in" checked="checked" disabled="disabled" />
                                    <span>Disponible</span>
                                </label>
                            </p>
                        </td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal1">border_color</a></i></td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Pedro Andrade</td>
                        <td><img class="col col-sm-12 col-md-6" src="../../resources/img/dashboard/img2.jpg" alt=""></td>
                        <td>Cardiología</td>
                        <td>
                            <p>
                                <label>
                                    <input type="checkbox" class="filled-in" checked="checked" disabled="disabled" />
                                    <span>Disponible</span>
                                </label>
                            </p>
                        </td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal1">border_color</a></i></td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Benjamin Contreras</td>
                        <td><img class="col col-sm-12 col-md-6" src="../../resources/img/dashboard/img2.jpg" alt=""></td>
                        <td>Ortodoncia</td>
                        <td>
                            <p>
                                <label>
                                    <input type="checkbox" disabled="disabled" />
                                    <span>No disponible</span>
                                </label>
                            </p>
                        </td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal1">border_color</a></i></td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <div class="col col-sm-12">
            <h3>Pacientes</h3>
            <table class="table table-responsive table-hover">
                <thead class="thead-dark">
                    <!--Agregando los campos fijos a la tabla-->
                    <tr>
                        <th scope="col">Código del paciente</th>
                        <th scope="col">Nombre del paciente</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Padecimiento</th>
                        <th scope="col">Fecha de la cita</th>
                        <th scope="col">Peso</th>
                        <th scope="col">Altura</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <!--Agregando registros a la tabla-->
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Juan Pérez</td>
                        <td><img class="col col-sm-12 col-md-6" src="../../resources/img/dashboard/img2.jpg" alt=""></td>
                        <td>Medicina general</td>
                        <td>24/05/19</td>
                        <td>67 kg</td>
                        <td>1.82 m</td>
                        <!--Declarando que al interactuar con el icono "delete" activará un modal que sirve para borrar o uno un registro-->
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal1">border_color</a></i></td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Alberto Laínez</td>
                        <td><img class="col col-sm-12 col-md-6" src="../../resources/img/dashboard/img2.jpg" alt=""></td>
                        <td>Pediatría</td>
                        <td>02/11/18</td>
                        <td>67 kg</td>
                        <td>1.82 m</td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal1">border_color</a></i></td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Pedro Andrade</td>
                        <td><img class="col col-sm-12 col-md-6" src="../../resources/img/dashboard/img2.jpg" alt=""></td>
                        <td>Cardiología</td>
                        <td>07/02/19</td>
                        <td>67 kg</td>
                        <td>1.82 m</td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal1">border_color</a></i></td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Benjamin Contreras</td>
                        <td><img class="col col-sm-12 col-md-6" src="../../resources/img/dashboard/img2.jpg" alt=""></td>
                        <td>Ortodoncia</td>
                        <td>09/02/19</td>
                        <td>67 kg</td>
                        <td>1.82 m</td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal1">border_color</a></i></td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <div class="col col-sm-12">
            <h3>Citas</h3>
            <table class="table table-responsive table-hover">
                <thead class="thead-dark">
                    <!--Agregando los campos fijos a la tabla-->
                    <tr>
                        <th scope="col">Código de la cita</th>
                        <th scope="col">Nombre del paciente</th>
                        <th scope="col">Nombre del doctor</th>
                        <th scope="col">Padecimiento</th>
                        <th scope="col">Fecha de la cita</th>
                        <th scope="col">Hora de la cita</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <!--Agregando registros a la tabla-->
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Juan Pérez</td>
                        <td>Juan Pérez</td>
                        <td>Medicina general</td>
                        <td>24/05/19</td>
                        <td>8:30 AM</td>
                        <!--Declarando que al interactuar con el icono "delete" activará un modal que sirve para borrar o uno un registro-->
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal1">border_color</a></i></td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Alberto Laínez</td>
                        <td>Alberto Laínez</td>
                        <td>Pediatría</td>
                        <td>24/05/19</td>
                        <td>8:30 AM</td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal1">border_color</a></i></td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Pedro Andrade</td>
                        <td>Pedro Andrade</td>
                        <td>Cardiología</td>
                        <td>24/05/19</td>
                        <td>8:30 AM</td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal1">border_color</a></i></td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Benjamin Contreras</td>
                        <td>Pedro Andrade</td>
                        <td>Cardiología</td>
                        <td>24/05/19</td>
                        <td>8:30 AM</td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal1">border_color</a></i></td>
                        <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
dashboard_helper::footer();
?> 
<?php
include "../../core/helpers/dashboard/dashboard_helper.php";
dashboard_helper::head("Dashboard");
dashboard_helper::nav();
?>

        <div class="container">
            <div class="row">
                <div class="col s12 m8 l12">
                    <div id="highcharts-8af0f14d-1b1c-4dcf-ac5f-c27650922349"></div>
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
                                            "text": "Citas mensuales"
                                        },
                                        "subtitle": {
                                            "text": ""
                                        },
                                        "exporting": {},
                                        "chart": {
                                            "type": "line"
                                        },
                                        "xAxis": [{
                                            "categories": []
                                        }],
                                        "yAxis": [{
                                            "title": {
                                                "text": "Citas"
                                            }
                                        }],
                                        "plotOptions": {
                                            "line": {
                                                "dataLabels": {
                                                    "enabled": true
                                                },
                                                "enableMouseTracking": false
                                            },
                                            "series": {
                                                "animation": false
                                            }
                                        },
                                        "series": [{
                                            "name": "Pediatría",
                                            "turboThreshold": 0
                                        }, {
                                            "name": "Medicina general",
                                            "turboThreshold": 0
                                        }],
                                        "data": {
                                            "csv": "\"Category\";\"Pediatría\";\"Medicina general\"\n\"Jan\";7;3.9\n\"Feb\";6.9;4.2\n\"Mar\";9.5;5.7\n\"Apr\";14.5;8.5\n\"May\";18.4;11.9\n\"Jun\";21.5;15.2\n\"Jul\";25.4;17\n\"Aug\";27.3;16.6\n\"Sep\";23.3;14.2\n\"Oct\";18.3;10.3\n\"Nov\";13.9;6.6\n\"Dec\";9.6;4.8",
                                            "googleSpreadsheetKey": false,
                                            "googleSpreadsheetWorksheet": false
                                        }
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
                                    new Highcharts.Chart("highcharts-8af0f14d-1b1c-4dcf-ac5f-c27650922349", options);
                                }
                            }
                        })();
                    </script>
                </div>
                <br>
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
<?php
dashboard_helper::footer();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.5.0/echarts.min.js"
        integrity="sha512-k37wQcV4v2h6jgYf5IUz1MoSKPpDs630XGSmCaCCOXxy2awgAWKHGZWr9nMyGgk3IOxA1NxdkN8r1JHgkUtMoQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Smart Management App</title>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Device 1</h5>
                        <button type="button" class="btn btn-primary" onclick="chart('dev1')">
                            Chart
                        </button>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="card-body row">
                                <div class=" col">
                                    <h5 class="card-title">Relay 1</h5>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="input-group input-group-sm coll-2 mb-1">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">W</span>
                                            <input type="text" class="form-control" id="dev1w0">
                                        </div>
                                        <div class="input-group input-group-sm coll-2 mb-1">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">V</span>
                                            <input type="text" class="form-control" id="dev1v0">
                                        </div>
                                        <div class="input-group input-group-sm coll-2 mb-1">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">I</span>
                                            <input type="text" class="form-control" id="dev1i0">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <button id="dev1on0" class="btn btn-success" onclick="setStatus('dev1','on',0)">On
                                    </button>
                                    <button id="dev1off0" class="btn btn-danger"
                                        onclick="setStatus('dev1','off',0)">Off </button>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="card-body row">
                                <div class=" col">
                                    <h5 class="card-title">Relay 2</h5>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="input-group input-group-sm coll-2 mb-1">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">W</span>
                                            <input type="text" class="form-control" id="dev1w1">
                                        </div>
                                        <div class="input-group input-group-sm coll-2 mb-1">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">V</span>
                                            <input type="text" class="form-control" id="dev1v1">
                                        </div>
                                        <div class="input-group input-group-sm coll-2 mb-1">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">I</span>
                                            <input type="text" class="form-control" id="dev1i1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <button id="dev1on1" class="btn btn-success" onclick="setStatus('dev1','on',1)">On
                                    </button>
                                    <button id="dev1off1" class="btn btn-danger"
                                        onclick="setStatus('dev1','off',1)">Off </button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Device 2</h5>
                        <button type="button" class="btn btn-primary" onclick="chart('dev2')">
                            Chart
                        </button>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="card-body row">
                                <div class=" col">
                                    <h5 class="card-title">Relay 1</h5>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="input-group input-group-sm coll-2 mb-1">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">W</span>
                                            <input type="text" class="form-control" id="dev2w0">
                                        </div>
                                        <div class="input-group input-group-sm coll-2 mb-1">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">V</span>
                                            <input type="text" class="form-control" id="dev2v0">
                                        </div>
                                        <div class="input-group input-group-sm coll-2 mb-1">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">I</span>
                                            <input type="text" class="form-control" id="dev2i0">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <button id="dev2on0" class="btn btn-success"
                                        onclick="setStatus('dev2','on',0)">On </button>
                                    <button id="dev2off0" class="btn btn-danger"
                                        onclick="setStatus('dev2','off',0)">Off </button>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="card-body row">
                                <div class=" col">
                                    <h5 class="card-title">Relay 2</h5>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="input-group input-group-sm coll-2 mb-1">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">W</span>
                                            <input type="text" class="form-control" id="dev2w1">
                                        </div>
                                        <div class="input-group input-group-sm coll-2 mb-1">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">V</span>
                                            <input type="text" class="form-control" id="dev2v1">
                                        </div>
                                        <div class="input-group input-group-sm coll-2 mb-1">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">I</span>
                                            <input type="text" class="form-control" id="dev2i1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <button id="dev2on1" class="btn btn-success"
                                        onclick="setStatus('dev2','on',1)">On </button>
                                    <button id="dev2off1" class="btn btn-danger"
                                        onclick="setStatus('dev2','off',1)">Off </button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Device 3</h5>
                        <button type="button" class="btn btn-primary" onclick="chart('dev3')">
                            Chart
                        </button>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="card-body row">
                                <div class=" col">
                                    <h5 class="card-title">Relay 1</h5>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="input-group input-group-sm coll-2 mb-1">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">W</span>
                                            <input type="text" class="form-control" id="dev3w0">
                                        </div>
                                        <div class="input-group input-group-sm coll-2 mb-1">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">V</span>
                                            <input type="text" class="form-control" id="dev3v0">
                                        </div>
                                        <div class="input-group input-group-sm coll-2 mb-1">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">I</span>
                                            <input type="text" class="form-control" id="dev3i0">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <button id="dev3on0" class="btn btn-success"
                                        onclick="setStatus('dev3','on',0)">On </button>
                                    <button id="dev3off0"class="btn btn-danger"
                                        onclick="setStatus('dev3','off',0)">Off </button>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="card-body row">
                                <div class=" col">
                                    <h5 class="card-title">Relay 2</h5>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="input-group input-group-sm coll-2 mb-1">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">W</span>
                                            <input type="text" class="form-control" id="dev3w1">
                                        </div>
                                        <div class="input-group input-group-sm coll-2 mb-1">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">V</span>
                                            <input type="text" class="form-control" id="dev3v1">
                                        </div>
                                        <div class="input-group input-group-sm coll-2 mb-1">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">I</span>
                                            <input type="text" class="form-control" id="dev3i1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <button id="dev3on1" class="btn btn-success"
                                        onclick="setStatus('dev3','on',1)">On </button>
                                    <button id="dev3off1" class="btn btn-danger"
                                        onclick="setStatus('dev3','off',1)">Off </button>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="card-body row">
                                <div class=" col">
                                    <h5 class="card-title">Relay 3</h5>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="input-group input-group-sm coll-2 mb-1">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">W</span>
                                            <input type="text" class="form-control" id="dev3w2">
                                        </div>
                                        <div class="input-group input-group-sm coll-2 mb-1">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">V</span>
                                            <input type="text" class="form-control" id="dev3v2">
                                        </div>
                                        <div class="input-group input-group-sm coll-2 mb-1">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">I</span>
                                            <input type="text" class="form-control" id="dev3i2">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <button id="dev3on2" class="btn btn-success"
                                        onclick="setStatus('dev3','on',2)">On </button>
                                    <button id="dev3off2" class="btn btn-danger"
                                        onclick="setStatus('dev3','off',2)">Off </button>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="card-body row">
                                <div class=" col">
                                    <h5 class="card-title">Relay 4</h5>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="input-group input-group-sm coll-2 mb-1">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">W</span>
                                            <input type="text" class="form-control" id="dev3w3">
                                        </div>
                                        <div class="input-group input-group-sm coll-2 mb-1">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">V</span>
                                            <input type="text" class="form-control" id="dev3v3">
                                        </div>
                                        <div class="input-group input-group-sm coll-2 mb-1">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">I</span>
                                            <input type="text" class="form-control" id="dev3i3">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <button id="dev3on3" class="btn btn-success"
                                        onclick="setStatus('dev3','on',3)">On </button>
                                    <button id="dev3off3" class="btn btn-danger"
                                        onclick="setStatus('dev3','off',3)">Off </button>
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Device 4</h5>
                        <button type="button" class="btn btn-primary" onclick="chart('dev4')">
                            Chart
                        </button>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="card-body row">
                                <div class=" col">
                                    <h5 class="card-title">Relay 1</h5>
                                </div>

                                <div class="col">
                                    <button id="dev2on0" class="btn btn-success"
                                        onclick="setStatus('dev4','on',0)">On </button>
                                    <button id="dev2off0" class="btn btn-danger"
                                        onclick="setStatus('dev4','off',0)">Off </button>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="card-body row">
                                <div class=" col">
                                    <h5 class="card-title">Sensor 1</h5>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="input-group input-group-sm coll-2 mb-1">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">W</span>
                                            <input type="text" class="form-control" id="dev4w0">
                                        </div>
                                        <div class="input-group input-group-sm coll-2 mb-1">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">W</span>
                                            <input type="text" class="form-control" id="dev4r0">
                                        </div>
                                        <div class="input-group input-group-sm coll-2 mb-1">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">V</span>
                                            <input type="text" class="form-control" id="dev4v0">
                                        </div>

                                        <div class="input-group input-group-sm coll-2 mb-1">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">W/h</span>
                                            <input type="text" class="form-control" id="dev4t0">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="card-body row">
                                <div class=" col">
                                    <h5 class="card-title">Sensor 2</h5>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="input-group input-group-sm coll-2 mb-1">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">W</span>
                                            <input type="text" class="form-control" id="dev4w1">
                                        </div>
                                        <div class="input-group input-group-sm coll-2 mb-1">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">W</span>
                                            <input type="text" class="form-control" id="dev4r1">
                                        </div>
                                        <div class="input-group input-group-sm coll-2 mb-1">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">V</span>
                                            <input type="text" class="form-control" id="dev4v1">
                                        </div>

                                        <div class="input-group input-group-sm coll-2 mb-1">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">W/h</span>
                                            <input type="text" class="form-control" id="dev4t1">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>



        <!-- Modal -->
        <div class="modal fade" id="chartModal" tabindex="-1" aria-labelledby="chartModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Device Chart</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div id="devchart" style="position: relative; width: 450px; height: 400px">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script>
        function setStatus(dev, act, relay) {
            $.ajax({
                url: "{{ route('setaction') }}",
                type: 'POST',
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                data: {
                    device: dev,
                    action: act,
                    relay: relay
                },
                success: function(data) {
                    getInfo(dev, relay);

                }
            });
        }

        function getInfo(dev, relay) {
            $.ajax({
                url: "{{ route('getinfo') }}",
                type: 'POST',
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                data: {
                    device: dev,
                    relay: relay
                },
                success: function(data) {
                    if (dev === 'dev4') {
                        document.getElementById(dev + 'w' + relay).value = data.power;
                        document.getElementById(dev + 'v' + relay).value = data.voltage;
                        document.getElementById(dev + 'r' + relay).value = data.reactive;
                        document.getElementById(dev + 't' + relay).value = data.energy;
                    } else {
                        document.getElementById(dev + 'on' + relay).disabled = data.output;
                        document.getElementById(dev + 'off' + relay).disabled = data.output ? false : true;
                        document.getElementById(dev + 'v' + relay).value = data.voltage;
                        document.getElementById(dev + 'i' + relay).value = data.current;
                        document.getElementById(dev + 'w' + relay).value = Math.abs(data.power);
                    }
                    // log response into console

                    // $(dev+'on'+relay).prop('disabled', data.output);
                    // $(dev+'off'+relay).prop('disabled', !data.output);

                }
            });
        }

        let device = {
            dev1: {
                name: 'dev1',
                relays: [0, 1]
            },
            dev2: {
                name: 'dev2',
                relays: [0, 1]
            },
            dev3: {
                name: 'dev3',
                relays: [0, 1, 2, 3]
            },
            dev4: {
                name: 'dev4',
                relays: [0],
                meters: [0, 1]
            }
        }

        Object.keys(device).forEach(item => {
            device[item].relays.forEach(relay => {
                getInfo(device[item].name, relay);
            })
            if (device[item].name === 'dev4') {
                device[item].meters.forEach(relay => {
                    getInfo(device[item].name, relay);
                })
            }
        })

        // setInterval(function() {
        //     device.forEach(item => {
        //         item.relays.forEach(relay => {
        //             getInfo(item.name, relay);
        //         })
        //     })
        // }, 100000);


        function getDeviceHistory(device, chart) {
            $.ajax({
                url: "{{ route('gethistory') }}",
                type: 'POST',
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                data: {
                    device: device,
                },
                success: function(data) {
                    var dates = [];
                    var voltage = [];
                    var current = [];
                    var reactive = [];
                    var energy = [];
                    var power = [];
                    var legend = []
                    let series = [];
                    data.forEach(item => {
                        var created = new Date(item.created_at);
                        dates.push(created.toLocaleDateString());
                        var log = JSON.parse(item.data);

                        if (typeof voltage[item.relay] === 'undefined') {
                            voltage[item.relay] = [];
                        }
                        voltage[item.relay].push(log.voltage);
                        if (device !== 'dev4') {
                            if (typeof current[item.relay] === 'undefined') {
                                current[item.relay] = [];
                            }
                            current[item.relay].push(log.current);
                        } else {
                            if (typeof reactive[item.relay] === 'undefined') {
                                reactive[item.relay] = [];
                            }
                            reactive[item.relay].push(log.reactive);
                            if (typeof energy[item.relay] === 'undefined') {
                                energy[item.relay] = [];
                            }
                            energy[item.relay].push(log.reactive);
                        }
                        if (typeof power[item.relay] === 'undefined') {
                            power[item.relay] = [];
                        }
                        power[item.relay].push(Math.abs(log.power));


                    })

                    voltage.forEach(function(value, index) {
                        series.push({
                            data: value,
                            name: 'Voltage ' + index,
                            type: 'line',
                            stack: 'Total',
                        })
                        series.push({
                            data: power[index],
                            name: 'Power ' + index,
                            type: 'line',
                            stack: 'Total',
                        })
                        legend.push('Voltage ' + index);
                        legend.push('Power ' + index);
                        if (device !== 'dev4') {
                            series.push({
                                data: current[index],
                                name: 'Current ' + index,
                                type: 'line',
                                stack: 'Total',
                            })
                            legend.push('Current ' + index);
                        } else {
                            series.push({
                                data: reactive[index],
                                name: 'Reactive ' + index,
                                type: 'line',
                                stack: 'Total',
                            })
                            legend.push('Reactive ' + index);
                            series.push({
                                data: energy[index],
                                name: 'Energy ' + index,
                                type: 'line',
                                stack: 'Total',
                            })
                            legend.push('Energy ' + index);
                        }



                    });
                    var option = {
                        tooltip: {
                            trigger: 'axis'
                        },
                        grid: {
                            left: '3%',
                            right: '4%',
                            bottom: '3%',
                            containLabel: true
                        },

                        legend: {
                            left: 1,
                            data: legend
                        },
                        dataZoom: [{
                                type: 'inside',
                                start: 98,
                                end: 100,
                                minValueSpan: 10
                            },
                            {
                                show: true,
                                type: 'slider',
                                bottom: 60,
                                start: 98,
                                end: 100,
                                minValueSpan: 10
                            }
                        ],
                        xAxis: {
                            data: dates
                        },
                        yAxis: {},
                        series: series
                    };
                    console.log(option);
                    chart.setOption(option);
                }
            });
        }

        function chart(device) {
            var devChart = echarts.init(document.getElementById('devchart'));
            $("#chartModal").modal('show');
            getDeviceHistory(device, devChart);
        }

        // getDeviceHistory('dev1', dev1Chart);
        // getDeviceHistory('dev2', dev2Chart);
        // getDeviceHistory('dev3', dev3Chart);
    </script>

</body>

</html>

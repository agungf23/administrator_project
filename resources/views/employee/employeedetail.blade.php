@extends('layouts.app')

@section('employeedetail')
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Main</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Employee Detail</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Employee Detail</h6>
            </nav>
        </div>
    </nav>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Bootstrap Data Table with Filter Row Feature</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
        <style>
            body {
                color: #566787;
                background: #f5f5f5;
                font-family: 'Roboto', sans-serif;
            }

            .table-responsive {
                margin: 30px 0;
            }

            .table-wrapper {
                width: 850px;
                background: #fff;
                margin: 0 auto;
                padding: 20px 30px 5px;
                box-shadow: 0 0 1px 0 rgba(0, 0, 0, .25);
            }

            .table-title .btn-group {
                float: right;
            }

            .table-title .btn {
                min-width: 50px;
                border-radius: 2px;
                border: none;
                padding: 6px 12px;
                font-size: 95%;
                outline: none !important;
                height: 30px;
            }

            .table-title {
                min-width: 100%;
                border-bottom: 1px solid #e9e9e9;
                padding-bottom: 15px;
                margin-bottom: 5px;
                background: rgb(0, 50, 74);
                margin: -20px -31px 10px;
                padding: 15px 30px;
                color: #fff;
            }

            .table-title h2 {
                margin: 2px 0 0;
                font-size: 24px;
            }

            table.table {
                min-width: 100%;
            }

            table.table tr th,
            table.table tr td {
                border-color: #e9e9e9;
                padding: 12px 15px;
                vertical-align: middle;
            }

            table.table tr th:first-child {
                width: 40px;
            }

            table.table tr th:last-child {
                width: 100px;
            }

            table.table-striped tbody tr:nth-of-type(odd) {
                background-color: #fcfcfc;
            }

            table.table-striped.table-hover tbody tr:hover {
                background: #f5f5f5;
            }

            table.table td a {
                color: #2196f3;
            }

            table.table td .btn.manage {
                padding: 2px 10px;
                background: #37BC9B;
                color: #fff;
                border-radius: 2px;
            }

            table.table td .btn.manage:hover {
                background: #2e9c81;
            }
        </style>
        <script>
            $(document).ready(function() {
                $(".btn-group .btn").click(function() {
                    var inputValue = $(this).find("input").val();
                    if (inputValue != 'all') {
                        var target = $('table tr[data-status="' + inputValue + '"]');
                        $("table tbody tr").not(target).hide();
                        target.fadeIn();
                    } else {
                        $("table tbody tr").fadeIn();
                    }
                });

                $(".badge").each(function() {
                    var classStr = $(this).attr("class");
                    var newClassStr = classStr.replace(/label/g, "badge");
                    $(this).removeAttr("class").addClass(newClassStr);
                });
            });
        </script>
    </head>

    <body>
        <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>Employee <b>Detail</b></h2>
                            </div>
                            <div class="col-sm-6">
                                <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-info active">
                                        <input type="radio" name="status" value="all" checked="checked"> All
                                    </label>
                                    <label class="btn btn-success">
                                        <input type="radio" name="status" value="active"> Active
                                    </label>
                                    <label class="btn btn-warning">
                                        <input type="radio" name="status" value="deactive"> Deactive
                                    </label>
                                    <label class="btn btn-danger">
                                        <input type="radio" name="status" value="out"> Out
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Created&nbsp;At</th>
                                <th>Updated&nbsp;On</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="employeeTableBody">
                            <!-- Employee data will be filled here by JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                // Function to fetch employees from API and populate table
                function fetchEmployees() {
                    axios.get('/api/employees')
                        .then(response => {
                            let employees = response.data.data;
                            let employeeTableBody = $('#employeeTableBody');
                            employeeTableBody.empty();
                            employees.forEach(employee => {
                                let statusClass = 'badge ';
                                if (employee.status === 'active') statusClass += 'badge-success';
                                else if (employee.status === 'deactive') statusClass += 'badge-warning';
                                else if (employee.status === 'out') statusClass += 'badge-danger';

                                employeeTableBody.append(`
                                    <tr data-status="${employee.status}">
                                        <td>${employee.id}</td>
                                        <td>${employee.name}</td>
                                        <td>${new Date(employee.created_at).toLocaleString()}</td>
                                        <td>${new Date(employee.updated_at).toLocaleString()}</td>
                                        <td><span class="${statusClass}">${employee.status.charAt(0).toUpperCase() + employee.status.slice(1)}</span></td>
                                    </tr>
                                `);
                            });
                        })
                        .catch(error => {
                            console.log(error);
                        });
                }

                // Initialize fetching employees when page loads
                fetchEmployees();

                // Activate tooltips
                $('[data-toggle="tooltip"]').tooltip();

                // Filter table rows based on status filter buttons
                $(".btn-group .btn").click(function() {
                    let inputValue = $(this).find('input').val();
                    if (inputValue === 'all') {
                        $("table tbody tr").fadeIn();
                    } else {
                        $("table tbody tr").each(function() {
                            let rowStatus = $(this).attr('data-status');
                            if (rowStatus === inputValue) {
                                $(this).fadeIn();
                            } else {
                                $(this).hide();
                            }
                        });
                    }
                });

                // Refresh employees data on refresh button click
                $(".btn-refresh").on("click", function() {
                    fetchEmployees();
                });

                // Filter table rows based on search input
                $("#search").on("keyup", function() {
                    let term = $(this).val().toLowerCase();
                    $("table tbody tr").each(function() {
                        let name = $(this).find("td:nth-child(2)").text().toLowerCase();
                        if (name.includes(term)) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });
                });
            });
        </script>

    </body>

    </html>
@endsection

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

            .pagination {
                float: right;
                margin: 0 0 5px;
            }

            .pagination li a {
                border: none;
                font-size: 13px;
                min-width: 30px;
                min-height: 30px;
                color: #999;
                margin: 0 2px;
                line-height: 30px;
                border-radius: 2px !important;
                text-align: center;
                padding: 0 6px;
            }

            .pagination li a:hover {
                color: #666;
            }

            .pagination li.active a,
            .pagination li.active a.page-link {
                background: #03A9F4;
            }

            .pagination li.active a:hover {
                background: #0397d6;
            }

            .pagination li.disabled i {
                color: #ccc;
            }

            .pagination li i {
                font-size: 16px;
                padding-top: 6px
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
                    <div class="clearfix">
                        <div class="hint-text">Showing <b id="showing-entries">0</b> out of <b id="total-entries">0</b>
                            entries</div>
                        <ul class="pagination" id="pagination">
                            <li class="page-item disabled" id="prevPage">
                                <a href="javascript:void(0)" class="page-link">Previous</a>
                            </li>
                            <li class="page-item disabled" id="nextPage">
                                <a href="javascript:void(0)" class="page-link">Next</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                let currentPage = 1;
                const perPage = 10;
                let totalEntries = 0;
                let currentStatus = 'all';

                function fetchEmployees(page, perPage, status) {
                    let apiUrl = `/api/employees?page=${page}&perPage=${perPage}`;
                    if (status !== 'all') {
                        apiUrl += `&status=${status}`;
                    }

                    axios.get(apiUrl)
                        .then(response => {
                            const data = response.data;
                            const employees = data.data;
                            totalEntries = data.total;
                            const totalPages = Math.ceil(totalEntries / perPage);

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

                            updatePagination(page, totalPages);
                            $('#showing-entries').text((page - 1) * perPage + 1);
                            $('#showing-to-entries').text(Math.min(page * perPage, totalEntries));
                            $('#total-entries').text(totalEntries);
                        })
                        .catch(error => {
                            console.log(error);
                        });
                }

                function updatePagination(page, totalPages) {
                    let pagination = $('#pagination');
                    pagination.empty();

                    if (page > 1) {
                        pagination.append(
                            `<li class="page-item"><a href="javascript:void(0)" class="page-link" onclick="changePage(${page - 1})">Previous</a></li>`
                        );
                    } else {
                        pagination.append(
                            `<li class="page-item disabled"><a href="javascript:void(0)" class="page-link">Previous</a></li>`
                        );
                    }

                    for (let i = 1; i <= totalPages; i++) {
                        if (i === page) {
                            pagination.append(
                                `<li class="page-item active"><a href="javascript:void(0)" class="page-link" onclick="changePage(${i})">${i}</a></li>`
                            );
                        } else {
                            pagination.append(
                                `<li class="page-item"><a href="javascript:void(0)" class="page-link" onclick="changePage(${i})">${i}</a></li>`
                            );
                        }
                    }

                    if (page < totalPages) {
                        pagination.append(
                            `<li class="page-item"><a href="javascript:void(0)" class="page-link" onclick="changePage(${page + 1})">Next</a></li>`
                        );
                    } else {
                        pagination.append(
                            `<li class="page-item disabled"><a href="javascript:void(0)" class="page-link">Next</a></li>`
                        );
                    }
                }

                window.changePage = function(page) {
                    currentPage = page;
                    fetchEmployees(currentPage, perPage, currentStatus);
                }

                function handleFilterAndPagination(status) {
                    currentStatus = status;
                    currentPage = 1; // Reset to first page when filter changes
                    fetchEmployees(currentPage, perPage, currentStatus);
                }

                // Filter based on status without resetting the page
                $(".btn-group .btn").click(function() {
                    const selectedStatus = $(this).find("input").val();
                    handleFilterAndPagination(selectedStatus);
                });

                // Initial fetch
                fetchEmployees(currentPage, perPage, currentStatus)
            });
        </script>
    </body>

    </html>
@endsection

@extends('layouts.app')

@section('employeelist')
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Main</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Employee List</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Employee List</h6>
            </nav>
        </div>
    </nav>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Bootstrap Table with Search Column Feature</title>
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
                background: #f7f5f2;
                font-family: 'Roboto', sans-serif;
            }

            .table-responsive {
                margin: 30px 0;
            }

            .table-wrapper {
                background: #fff;
                padding: 20px 25px;
                border-radius: 3px;
                min-width: 1000px;
                box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
            }

            .table-title {
                padding-bottom: 15px;
                background: #435d7d;
                color: #fff;
                padding: 16px 30px;
                min-width: 100%;
                margin: -20px -25px 10px;
                border-radius: 3px 3px 0 0;
            }

            .table-title h2 {
                margin: 5px 0 0;
                font-size: 24px;
            }

            .table-title .btn-group {
                float: right;
            }

            .table-title .btn {
                color: #fff;
                float: right;
                font-size: 13px;
                border: none;
                min-width: 50px;
                border-radius: 2px;
                border: none;
                outline: none !important;
                margin-left: 10px;
            }

            .table-title .btn i {
                float: left;
                font-size: 21px;
                margin-right: 5px;
            }

            .table-title .btn span {
                float: left;
                margin-top: 2px;
            }

            table.table tr th,
            table.table tr td {
                border-color: #e9e9e9;
                padding: 12px 15px;
                vertical-align: middle;
            }

            table.table tr th:first-child {
                width: 60px;
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

            table.table th i {
                font-size: 13px;
                margin: 0 5px;
                cursor: pointer;
            }

            table.table td:last-child i {
                opacity: 0.9;
                font-size: 22px;
                margin: 0 5px;
            }

            table.table td a {
                font-weight: bold;
                color: #566787;
                display: inline-block;
                text-decoration: none;
                outline: none !important;
            }

            table.table td a:hover {
                color: #2196F3;
            }

            table.table td a.edit {
                color: #FFC107;
            }

            table.table td a.delete {
                color: #F44336;
            }

            table.table td i {
                font-size: 19px;
            }

            table.table .avatar {
                border-radius: 50%;
                vertical-align: middle;
                margin-right: 10px;
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

            .search-box {
                position: relative;
                float: right;
            }

            .search-box .input-group {
                min-width: 300px;
                position: absolute;
                right: 0;
            }

            .search-box .input-group-addon,
            .search-box input {
                border-color: #ddd;
                border-radius: 0;
            }

            .search-box input {
                height: 34px;
                padding-right: 35px;
                background: #f4fcfd;
                border: none;
                border-radius: 2px !important;
            }

            .search-box input:focus {
                background: #fff;
            }

            .search-box input::placeholder {
                font-style: italic;
            }

            .search-box .input-group-addon {
                min-width: 35px;
                border: none;
                background: transparent;
                position: absolute;
                right: 0;
                z-index: 9;
                padding: 6px 0;
            }

            .search-box i {
                color: #a0a5b1;
                font-size: 19px;
                position: relative;
                top: 2px;
            }
        </style>
        <script>
            $(document).ready(function() {
                // Activate tooltips
                $('[data-toggle="tooltip"]').tooltip();

                // Filter table rows based on searched term
                $("#search").on("keyup", function() {
                    var term = $(this).val().toLowerCase();
                    $("table tbody tr").each(function() {
                        $row = $(this);
                        var name = $row.find("td:nth-child(2)").text().toLowerCase();
                        console.log(name);
                        if (name.search(term) < 0) {
                            $row.hide();
                        } else {
                            $row.show();
                        }
                    });
                });
            });
        </script>
    </head>

    <body>
        <div class="container-lg">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>Employee <b>List</b></h2>
                            </div>
                            <div class="col-sm-6">
                                <div class="search-box">
                                    <div class="input-group">
                                        <input type="text" id="search" class="form-control"
                                            placeholder="Search by Name">
                                        <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone Number</th>
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
                let searchTerm = '';

                fetchEmployees(currentPage, perPage, searchTerm);

                function fetchEmployees(page, perPage, search) {
                    let apiUrl = `/api/employees?page=${page}&perPage=${perPage}`;
                    if (search) {
                        apiUrl += `&search=${encodeURIComponent(search)}`;
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
                                employeeTableBody.append(`
                                <tr>
                                    <td>${employee.id}</td>
                                    <td>${employee.name}</td>
                                    <td>${employee.email}</td>
                                    <td>${employee.address}</td>
                                    <td>${employee.phone_number}</td>
                                </tr>
                            `);
                            });

                            $('#showing-entries').text((page - 1) * perPage + 1);
                            $('#showing-to-entries').text(Math.min(page * perPage, totalEntries));
                            $('#total-entries').text(totalEntries);
                            updatePagination(page, totalPages);
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
                    fetchEmployees(currentPage, perPage, searchTerm);
                }

                // Apply search function without filtering client-side
                $('#search').on('keyup', function() {
                    searchTerm = $(this).val().toLowerCase();
                    currentPage = 1; // Reset to first page on search
                    fetchEmployees(currentPage, perPage, searchTerm);
                });
            });
        </script>
    </body>

    </html>
@endsection

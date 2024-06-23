@extends('layouts.app')

@section('employeeedit')
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Main</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Employee Edit</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Employee Edit</h6>
            </nav>
        </div>
    </nav>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>employee admin/edit</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


        <style>
            body {
                color: #566787;
                background: #f5f5f5;
                font-family: 'Varela Round', sans-serif;
                font-size: 13px;
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

            .hint-text {
                float: left;
                margin-top: 10px;
                font-size: 13px;
            }

            /* Custom checkbox */
            .custom-checkbox {
                position: relative;
            }

            .custom-checkbox input[type="checkbox"] {
                opacity: 0;
                position: absolute;
                margin: 5px 0 0 3px;
                z-index: 9;
            }

            .custom-checkbox label:before {
                width: 18px;
                height: 18px;
            }

            .custom-checkbox label:before {
                content: '';
                margin-right: 10px;
                display: inline-block;
                vertical-align: text-top;
                background: white;
                border: 1px solid #bbb;
                border-radius: 2px;
                box-sizing: border-box;
                z-index: 2;
            }

            .custom-checkbox input[type="checkbox"]:checked+label:after {
                content: '';
                position: absolute;
                left: 6px;
                top: 3px;
                width: 6px;
                height: 11px;
                border: solid #000;
                border-width: 0 3px 3px 0;
                transform: inherit;
                z-index: 3;
                transform: rotateZ(45deg);
            }

            .custom-checkbox input[type="checkbox"]:checked+label:before {
                border-color: #03A9F4;
                background: #03A9F4;
            }

            .custom-checkbox input[type="checkbox"]:checked+label:after {
                border-color: #fff;
            }

            .custom-checkbox input[type="checkbox"]:disabled+label:before {
                color: #b8b8b8;
                cursor: auto;
                box-shadow: none;
                background: #ddd;
            }

            /* Modal styles */
            .modal .modal-dialog {
                max-width: 400px;
            }

            .modal .modal-header,
            .modal .modal-body,
            .modal .modal-footer {
                padding: 20px 30px;
            }

            .modal .modal-content {
                border-radius: 3px;
                font-size: 14px;
            }

            .modal .modal-footer {
                background: #ecf0f1;
                border-radius: 0 0 3px 3px;
            }

            .modal .modal-title {
                display: inline-block;
            }

            .modal .form-control {
                border-radius: 2px;
                box-shadow: none;
                border-color: #dddddd;
            }

            .modal textarea.form-control {
                resize: vertical;
            }

            .modal .btn {
                border-radius: 2px;
                min-width: 100px;
            }

            .modal form label {
                font-weight: normal;
            }
        </style>
        <script>
            $(document).ready(function() {
                // Activate tooltip
                $('[data-toggle="tooltip"]').tooltip();

                // Select/Deselect checkboxes
                var checkbox = $('table tbody input[type="checkbox"]');
                $("#selectAll").click(function() {
                    if (this.checked) {
                        checkbox.each(function() {
                            this.checked = true;
                        });
                    } else {
                        checkbox.each(function() {
                            this.checked = false;
                        });
                    }
                });
                checkbox.click(function() {
                    if (!this.checked) {
                        $("#selectAll").prop("checked", false);
                    }
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
                                <h2>Employees <b>Edit</b></h2>
                            </div>
                            <div class="col-sm-6">
                                <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
                                        class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="selectAll">
                                        <label for="selectAll"></label>
                                    </span>
                                </th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone Number</th>
                                <th>Position</th>
                                <th>Status</th>
                                <th>Actions</th>
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

        <!-- Add Modal HTML -->
        <div id="addEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="createEmployeeForm">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">Add Employee</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" id="address" name="address" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" id="phone_number" name="phone_number" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Position</label>
                                <input type="text" id="position" name="position" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select id="status" name="status" class="form-control" required>
                                    <option value="active">Active</option>
                                    <option value="deactive">Deactive</option>
                                    <option value="out">Out</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-success" value="Add">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Modal HTML -->
        <div id="editEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="updateEmployeeForm">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="update_id" name="id">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Employee</h4>
                            <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" id="update_name" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" id="update_email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" id="update_address" name="address" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" id="update_phone_number" name="phone_number" class="form-control"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Position</label>
                                <input type="text" id="update_position" name="position" class="form-control"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select id="update_status" name="status" class="form-control" required>
                                    <option value="active">Active</option>
                                    <option value="deactive">Deactive</option>
                                    <option value="out">Out</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-info" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Modal HTML -->
        <div id="deleteEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="deleteEmployeeForm">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                let currentPage = 1;
                const perPage = 10;
                let totalEmployees = 0;

                fetchEmployees(currentPage, perPage);

                // Update employee data every 5 seconds
                setInterval(() => fetchEmployees(currentPage, perPage), 5000);

                // Function to retrieve all employee data
                function fetchEmployees(page = 1, limit = perPage) {
                    axios.get(`/api/employees?page=${page}&perPage=${limit}`)
                        .then(response => {
                            const data = response.data;
                            const employees = data.data;
                            totalEmployees = data.total;

                            // Update totalEmployees with the total entries from the API
                            const totalPages = Math.ceil(totalEmployees / perPage);

                            let employeeTableBody = $('#employeeTableBody');
                            employeeTableBody.empty();
                            employees.forEach(employee => {
                                employeeTableBody.append(`
                                <tr>
                                    <td>
                                        <span class="custom-checkbox">
                                            <input type="checkbox" id="selectAll${employee.id}" name="options[]" value="${employee.id}">
                                            <label for="checkbox${employee.id}"></label>
                                        </span>
                                    </td>
                                    <td>${employee.id}</td>
                                    <td>${employee.name}</td>
                                    <td>${employee.email}</td>
                                    <td>${employee.address}</td>
                                    <td>${employee.phone_number}</td>
                                    <td>${employee.position}</td>
                                    <td>${employee.status}</td>
                                    <td>
                                        <a href="#editEmployeeModal" class="edit" data-toggle="modal" onclick="editEmployee(${employee.id})">
                                            <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                        </a>
                                        <a href="#deleteEmployeeModal" class="delete" data-toggle="modal" onclick="deleteEmployee(${employee.id})">
                                            <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                        </a>
                                    </td>
                                </tr>
                        `);
                            });

                            updatePagination(page, totalPages);
                            addCheckboxEventListeners(); // Ensure checkboxes work properly
                        })
                        .catch(error => {
                            console.log(error);
                        });
                }

                function updatePagination(currentPage, totalPages) {
                    let pagination = $('#pagination');
                    pagination.empty();

                    // Previous button
                    let previousClass = currentPage === 1 ? 'disabled' : '';
                    pagination.append(
                        `<li class="page-item ${previousClass}"><a href="#" class="page-link" onclick="changePage(${currentPage - 1})">Previous</a></li>`
                    );

                    // Page numbers
                    for (let i = 1; i <= totalPages; i++) {
                        let activeClass = currentPage === i ? 'active' : '';
                        pagination.append(
                            `<li class="page-item ${activeClass}"><a href="#" class="page-link" onclick="changePage(${i})">${i}</a></li>`
                        );
                    }

                    // Next button
                    let nextClass = currentPage === totalPages ? 'disabled' : '';
                    pagination.append(
                        `<li class="page-item ${nextClass}"><a href="#" class="page-link" onclick="changePage(${currentPage + 1})">Next</a></li>`
                    );

                    // Update hint text with correct entry count
                    let startEntry = (currentPage - 1) * perPage + 1;
                    let endEntry = Math.min(currentPage * perPage, totalEmployees);
                    $('.hint-text').html(
                        `Showing <b>${startEntry}</b> to <b>${endEntry}</b> of <b>${totalEmployees}</b> entries`);
                }

                // Change page function
                window.changePage = function(page) {
                    if (page > 0 && page <= Math.ceil(totalEmployees / perPage)) {
                        currentPage = page;
                        fetchEmployees(currentPage, perPage);
                    }
                }

                // Function to create new employees
                $('#createEmployeeForm').submit(function(event) {
                    event.preventDefault();
                    let formData = $(this).serialize();
                    axios.post('/api/employees', formData)
                        .then(response => {
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "Employee has been added",
                                showConfirmButton: false,
                                timer: 3000
                            }).then(() => {
                                $('#addEmployeeModal').modal('hide');
                                fetchEmployees();
                            });
                        })
                        .catch(error => {
                            console.log(error);
                        });
                });

                // Function to retrieve employee data to be edited
                window.editEmployee = function(id) {
                    axios.get(`/api/employees/${id}`)
                        .then(response => {
                            let employee = response.data.data;
                            $('#update_id').val(employee.id);
                            $('#update_name').val(employee.name);
                            $('#update_email').val(employee.email);
                            $('#update_address').val(employee.address);
                            $('#update_phone_number').val(employee.phone_number);
                            $('#update_position').val(employee.position);
                            $('#update_status').val(employee.status);
                        })
                        .catch(error => {
                            console.log(error);
                        });
                };

                // Function to update employee data
                $('#updateEmployeeForm').submit(function(event) {
                    event.preventDefault();
                    let id = $('#update_id').val();
                    let formData = $(this).serialize();

                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: "btn btn-success",
                            cancelButton: "btn btn-danger"
                        },
                        buttonsStyling: false
                    });

                    swalWithBootstrapButtons.fire({
                        title: "Are you sure?",
                        text: "You are about to update this employee data!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Yes, update it!",
                        cancelButtonText: "No, cancel!",
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            axios.put(`/api/employees/${id}`, formData)
                                .then(response => {
                                    swalWithBootstrapButtons.fire({
                                        title: "Updated!",
                                        text: "Employee data has been updated.",
                                        icon: "success",
                                        timer: 3000,
                                        showConfirmButton: false
                                    }).then(() => {
                                        $('#editEmployeeModal').modal('hide');
                                        fetchEmployees();
                                    });
                                })
                                .catch(error => {
                                    swalWithBootstrapButtons.fire({
                                        title: "Error!",
                                        text: "Failed to update employee data.",
                                        icon: "error"
                                    });
                                    console.log(error);
                                });
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            swalWithBootstrapButtons.fire({
                                title: "Cancelled",
                                text: "Employee data update cancelled.",
                                icon: "error"
                            });
                        }
                    });
                });

                // Function to delete employees
                window.deleteEmployee = function(id) {
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: "btn btn-success",
                            cancelButton: "btn btn-danger"
                        },
                        buttonsStyling: false
                    });

                    swalWithBootstrapButtons.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, cancel!",
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            axios.delete(`/api/employees/${id}`)
                                .then(response => {
                                    swalWithBootstrapButtons.fire({
                                        title: "Deleted!",
                                        text: "Employee has been deleted.",
                                        icon: "success",
                                        timer: 3000,
                                        showConfirmButton: false
                                    }).then(() => {
                                        $('#deleteEmployeeModal').modal('hide');
                                        fetchEmployees();
                                    });
                                })
                                .catch(error => {
                                    swalWithBootstrapButtons.fire({
                                        title: "Error!",
                                        text: "Failed to delete employee.",
                                        icon: "error"
                                    });
                                    console.log(error);
                                });
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            swalWithBootstrapButtons.fire({
                                title: "Cancelled",
                                text: "Employee data is safe.",
                                icon: "error"
                            });
                        }
                    });
                };

                // Add event listeners to checkboxes
                function addCheckboxEventListeners() {
                    var checkbox = $('table tbody input[type="checkbox"]');
                    $("#selectAll").off('click').on('click', function() {
                        if (this.checked) {
                            checkbox.each(function() {
                                this.checked = true;
                            });
                        } else {
                            checkbox.each(function() {
                                this.checked = false;
                            });
                        }
                    });
                    checkbox.off('click').on('click', function() {
                        if (!this.checked) {
                            $("#selectAll").prop("checked", false);
                        }
                    });
                }
            });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

    </html>
@endsection

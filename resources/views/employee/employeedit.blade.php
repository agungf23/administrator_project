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
        <title>Bootstrap CRUD Data Table for Database with Modal Form</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>

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
                    <table id="employeeTable" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="selectAll">
                                        <label for="selectAll"></label>
                                    </span>
                                </th>
                                <th>Number</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone Number</th>
                                <th>Position</th>
                                <th>Status</th>
                                <th>City</th>
                                <th>Country</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="employeeTable">
                            <!-- Device data will be filled here by JavaScript -->
                        </tbody>
                    </table>
                    <div class="clearfix">
                        <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                        <ul class="pagination">
                            <li class="page-item disabled"><a href="#">Previous</a></li>
                            <li class="page-item"><a href="#" class="page-link">1</a></li>
                            <li class="page-item"><a href="#" class="page-link">2</a></li>
                            <li class="page-item active"><a href="#" class="page-link">3</a></li>
                            <li class="page-item"><a href="#" class="page-link">4</a></li>
                            <li class="page-item"><a href="#" class="page-link">5</a></li>
                            <li class="page-item"><a href="#" class="page-link">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Modal HTML -->
        <div id="addEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="addEmployeeForm">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">Add Employee</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Number</label>
                                <input type="text" class="form-control" name="Number" required>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="Name" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="Email" required>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" name="Address" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" name="Phone Number" required>
                            </div>
                            <div class="form-group">
                                <label>Position</label>
                                <input type="text" class="form-control" name="Position" required>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="Status" required>
                                    <option value="Active">Active</option>
                                    <option value="Deactive">Deactive</option>
                                    <option value="Out">Out</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control" name="City" required>
                            </div>
                            <div class="form-group">
                                <label>Country</label>
                                <input type="text" class="form-control" name="Country" required>
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
                    <form id="editEmployeeForm">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Employee</h4>
                            <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Number</label>
                                <input type="text" class="form-control" name="Number" required>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="Name" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="Email" required>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" name="Address" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" name="Phone Number" required>
                            </div>
                            <div class="form-group">
                                <label>Position</label>
                                <input type="text" class="form-control" name="Position" required>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="Status" required>
                                    <option value="Active">Active</option>
                                    <option value="Deactive">Deactive</option>
                                    <option value="Out">Out</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control" name="City" required>
                            </div>
                            <div class="form-group">
                                <label>Country</label>
                                <input type="text" class="form-control" name="Country" required>
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
                        <div class="modal-header">
                            <h4 class="modal-title">Delete Employee</h4>
                            <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this record?</p>
                            <p class="text-warning"><small>This action cannot be undone.</small></p>
                            <!-- Hidden input to store the ID of the employee to be deleted -->
                            <input type="hidden" name="id" id="employeeIdToDelete">
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Fetch and display employees when the page loads
                fetchEmployees();

                // Add Employee
                document.getElementById('addEmployeeForm').addEventListener('submit', function(event) {
                    event.preventDefault();
                    let formData = new FormData(this);
                    axios.post('/api/employees', formData)
                        .then(response => {
                            console.log('Employee added successfully:', response.data);
                            $('#addEmployeeModal').modal('hide');
                            fetchEmployees();
                            alert(response.data.message);
                        })
                        .catch(error => {
                            console.error('Error adding employee:', error.response ? error.response.data :
                                error);
                            alert('Error adding employee: ' + (error.response ? error.response.data
                                .message : error.message));
                        });
                });

                // Edit Employee
                document.getElementById('editEmployeeForm').addEventListener('submit', function(event) {
                    event.preventDefault();
                    let formData = new FormData(this);
                    let employeeId = formData.get('id');
                    axios.put(`/api/employees/${employeeId}`, formData)
                        .then(response => {
                            console.log('Employee updated successfully:', response.data);
                            $('#editEmployeeModal').modal('hide');
                            fetchEmployees();
                            alert(response.data.message);
                        })
                        .catch(error => {
                            console.error('Error editing employee:', error.response ? error.response.data :
                                error);
                            alert('Error editing employee: ' + (error.response ? error.response.data
                                .message : error.message));
                        });
                });

                // Delete Employee
                document.getElementById('deleteEmployeeForm').addEventListener('submit', function(event) {
                    event.preventDefault();
                    let employeeId = document.getElementById('employeeIdToDelete').value;
                    axios.delete(`/api/employees/${employeeId}`)
                        .then(response => {
                            console.log('Employee deleted successfully:', response.data);
                            $('#deleteEmployeeModal').modal('hide');
                            fetchEmployees();
                            alert(response.data.message);
                        })
                        .catch(error => {
                            console.error('Error deleting employee:', error.response ? error.response.data :
                                error);
                            alert('Error deleting employee: ' + (error.response ? error.response.data
                                .message : error.message));
                        });
                });
            });

            function fetchEmployees() {
                console.log('Fetching employees...');
                axios.get('/api/employees')
                    .then(response => {
                        console.log('Employees fetched successfully:', response.data);
                        let employees = response.data.data;
                        let employeeTableBody = document.querySelector('#employeeTable tbody');
                        employeeTableBody.innerHTML = '';
                        employees.forEach(employee => {
                            let row = `<tr>
                    <td>${employee.Number}</td>
                    <td>${employee.Name}</td>
                    <td>${employee.Email}</td>
                    <td>${employee.Address}</td>
                    <td>${employee['Phone Number']}</td>
                    <td>${employee.Position}</td>
                    <td>${employee.Status}</td>
                    <td>${employee.City}</td>
                    <td>${employee.Country}</td>
                    <td>
                        <button class="btn btn-info" onclick="openEditModal(${employee.id})">Edit</button>
                        <button class="btn btn-danger" onclick="openDeleteModal(${employee.id})">Delete</button>
                    </td>
                </tr>`;
                            employeeTableBody.insertAdjacentHTML('beforeend', row);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching employees:', error.response ? error.response.data : error);
                        alert('Error fetching employees: ' + (error.response ? error.response.data.message : error
                        .message));
                    });
            }

            function openEditModal(employeeId) {
                axios.get(`/api/employees/${employeeId}`)
                    .then(response => {
                        let employee = response.data;
                        document.getElementById('editEmployeeForm').elements['id'].value = employee.id;
                        document.getElementById('editEmployeeForm').elements['Number'].value = employee.Number;
                        document.getElementById('editEmployeeForm').elements['Name'].value = employee.Name;
                        document.getElementById('editEmployeeForm').elements['Email'].value = employee.Email;
                        document.getElementById('editEmployeeForm').elements['Address'].value = employee.Address;
                        document.getElementById('editEmployeeForm').elements['Phone Number'].value = employee[
                            'Phone Number'];
                        document.getElementById('editEmployeeForm').elements['Position'].value = employee.Position;
                        document.getElementById('editEmployeeForm').elements['Status'].value = employee.Status;
                        document.getElementById('editEmployeeForm').elements['City'].value = employee.City;
                        document.getElementById('editEmployeeForm').elements['Country'].value = employee.Country;
                        $('#editEmployeeModal').modal('show');
                    })
                    .catch(error => console.error('Error fetching employee data:', error.response ? error.response.data :
                        error));
            }

            function openDeleteModal(employeeId) {
                document.getElementById('employeeIdToDelete').value = employeeId;
                $('#deleteEmployeeModal').modal('show');
            }
        </script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

    </html>
@endsection

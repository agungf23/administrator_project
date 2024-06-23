<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{

    // Total Employee
    public function dashboard()
    {
        $totalEmployees = Employee::count();
        $activeEmployees = Employee::where('status', 'active')->count();
        $deactiveEmployees = Employee::where('status', 'deactive')->count();
        return view('dashboard', compact('totalEmployees', 'activeEmployees', 'deactiveEmployees'));
    }

    // Show Data
    public function index(Request $request)
    {
        $perPage = $request->query('perPage', 10);
        $page = $request->query('page', 1);
        $search = $request->query('search', '');
        $status = $request->query('status', 'all');

        // Validate parameters
        $perPage = filter_var($perPage, FILTER_VALIDATE_INT, [
            'options' => [
                'default' => 10,
                'min_range' => 1,
                'max_range' => 100 // example: max 100 per page
            ]
        ]);

        $page = filter_var($page, FILTER_VALIDATE_INT, [
            'options' => [
                'default' => 1,
                'min_range' => 1
            ]
        ]);

        $query = Employee::query();

        if (!empty($search)) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        }

        if ($status !== 'all') {
            $query->where('status', $status);
        }

        // Paginate with the filtered query
        $employees = $query->paginate($perPage, ['*'], 'page', $page);

        return response()->json($employees);
    }

    // CREATE Method
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'address'      => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'position'     => 'required|string|max:255',
            'status'       => 'required|in:active,deactive,out',
        ]);

        $employee = Employee::create($validatedData);

        return response()->json(['message' => 'Employee data has been added successfully', 'data' => $employee], 201);
    }

    // READ Method
    public function show(string $id)
    {
        $employee = Employee::findOrFail($id);
        return response()->json(['data' => $employee]);
    }

    // UPDATE Method
    public function update(Request $request, string $id)
    {
        $employee = Employee::findOrFail($id);

        $validatedData = $request->validate([
            'name'         => 'sometimes|string|max:255',
            'email'        => 'sometimes|email|max:255',
            'address'      => 'sometimes|string|max:255',
            'phone_number' => 'sometimes|string|max:255',
            'position'     => 'sometimes|string|max:255',
            'status'       => 'sometimes|in:active,deactive,out',
        ]);

        $employee->update($validatedData);

        return response()->json(['message' => 'Employee updated successfully', 'data' => $employee]);
    }

    // DELETE Method
    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return response()->json(['message' => 'Employee deleted successfully']);
    }
}

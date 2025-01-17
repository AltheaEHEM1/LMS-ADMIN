<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form inputs
        $validated = $request->validate([
            'firstName' => 'required|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees,email',
            'password' => 'required|string|min:8|confirmed',
            'phoneNo' => 'required|string|max:15',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:500',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Store photo if uploaded
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('employee_photos', 'public');
        }

        // Create and save the new employee
        $employee = Employee::create([
            'first_name' => $validated['firstName'],
            'middle_name' => $validated['middleName'] ?? null,
            'last_name' => $validated['lastName'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone_no' => $validated['phoneNo'],
            'date_of_birth' => $validated['date_of_birth'] ?? null,
            'address' => $validated['address'] ?? null,
            'photo' => $photoPath,
            'activate' => false, // Default to inactive
            'access_dashboard' => $request->has('dashboard'),
            'access_employee' => $request->has('employee'),
            'access_reservation' => $request->has('reservation'),
            'access_catalog' => $request->has('catalog'),
            'access_members' => $request->has('members'),
            'access_circulations' => $request->has('circulations'),
            'access_circulation_reports' => $request->has('circulationsReports'),
            'access_member_reports' => $request->has('membersReports'),
            'access_overdue_reports' => $request->has('overdueReports'),
            'access_catalog_reports' => $request->has('catalogReports'),
            'created_by' => auth()->id(), // Assuming the authenticated user creates the record
        ]);

        // Redirect back with success message
        return redirect()->route('employee.page')->with('success', 'Employee added successfully!');
    }
    public function activateUser(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
        ]);

        // Retrieve the email from the request
        $email = $request->input('email');

        // Find the employee by email
        $employee = Employee::where('email', $email)->first();

        if ($employee) {
            // Update the activate column to true
            $employee->activate = true;
            $employee->save();

            return response()->json([
                'message' => 'Employee activated successfully.',
                'employee' => $employee
            ], 200);
        }

        // If employee not found
        return response()->json([
            'message' => 'Employee not found.',
        ], 404);
    }

    public function deactivateUser(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
        ]);

        // Retrieve the email from the request
        $email = $request->input('email');

        // Find the employee by email
        $employee = Employee::where('email', $email)->first();

        if ($employee) {
            // Update the activate column to true
            $employee->activate = false;
            $employee->save();

            return response()->json([
                'message' => 'Employee activated successfully.',
                'employee' => $employee
            ], 200);
        }

        // If employee not found
        return response()->json([
            'message' => 'Employee not found.',
        ], 404);
    }
}

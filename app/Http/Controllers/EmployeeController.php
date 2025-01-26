<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

class EmployeeController extends Controller
{   

    

    public function update(Request $request)
    {
        $validated = $request->validate([
            'recordId' => 'required|string', // Validate as a string initially
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_no' => 'required|string|max:15',
            'date_of_birth' => 'required|date',
            'email' => 'required|email|max:255',
            'address' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $recordId = intval($validated['recordId']); // Convert recordId to integer

        try {
            // Search for the employee by the primary key (id)
            $employee = Employee::findOrFail($recordId);

            // Update employee details
            $employee->first_name = $validated['first_name'];
            $employee->middle_name = $validated['middle_name'];
            $employee->last_name = $validated['last_name'];
            $employee->phone_no = $validated['phone_no'];
            $employee->date_of_birth = $validated['date_of_birth'];
            $employee->email = $validated['email'];
            $employee->address = $validated['address'];
            $employee->access_dashboard = $request->has('dashboard');
            $employee->access_employee = $request->has('employee');
            $employee->access_reservation = $request->has('reservation');
            $employee->access_catalog = $request->has('catalog');
            $employee->access_members = $request->has('members');
            $employee->access_circulations = $request->has('circulations');
            $employee->access_circulation_reports = $request->has('circulationReports');
            $employee->access_member_reports = $request->has('membersReports');
            $employee->access_overdue_reports = $request->has('overdueReports');
            $employee->access_catalog_reports = $request->has('catalogReports');

            // Handle photo upload
            if ($request->hasFile('photo')) {
                $path = $request->file('photo')->store('employees', 'public');
                $employee->photo = $path;
            }

            $employee->save();

            return redirect()->back()->with('success', 'Employee updated successfully.');
        } catch (QueryException $e) {
            // Handle duplicate email error
            if ($e->getCode() === '23000') {
                return redirect()->back()->withErrors(['email' => 'The email provided is already in use. Please use a different email address.']);
            }

            // Handle other query exceptions
            return redirect()->back()->withErrors(['error' => 'An unexpected database error occurred. Please try again later.']);
        } catch (\Exception $e) {
            // Handle any other exceptions
            return redirect()->back()->withErrors(['error' => 'An unexpected error occurred. Please try again later.']);
        }
    }

    



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
            'access_circulation_reports' => $request->has('circulationReports'),
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


    public function showEmployee()
    {
        $employees = Employee::all(); // 
        return view('/EMPLOYEE', compact('employees')); 
    }

    public function showUser()
    {
        $users = User::all();
        return view('/MEMBERS', compact('users')); 
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'phone_no' => 'required|string|max:15',
            'date_of_birth' => 'required|date',
            'address' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('employee_photos', 'public');
        }

        Employee::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'date_of_birth' => $request->date_of_birth,
            'address' => $request->address,
            'photo' => $photoPath,
            'activate' => true,
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
            'created_by' => auth()->id(), // If using authentication
            'password' => Hash::make('defaultpassword'), // Set a default password
        ]);

        return redirect()->back()->with('success', 'Employee added successfully!');
    }
}

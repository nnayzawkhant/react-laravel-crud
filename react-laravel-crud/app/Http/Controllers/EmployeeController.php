<?php
// namespace App\Http\Controllers;
// use Illuminate\Http\Request;
// use App\Models\Employee;
 
// class EmployeeController extends Controller
// {  
//     public function index()
//     {
//         $employees = Employee::all();
//         return response()->json($employees);
//     }  
//     public function store(Request $request)
//     {
//         $employees = new Employee([
//             'name' => $request->input('name'),
//             'address' => $request->input('address'),
//             'mobile' => $request->input('mobile'),
//         ]);
//         $employees->save();
//         return response()->json('Employee created!');
//     }
//     public function show($id)
//     {
//         $contact = Employee::find($id);
//         return response()->json($contact);
//     }
//     public function update(Request $request, $id)
//     {
//        $employees = Employee::find($id);
//        $employees->update($request->all());
//        return response()->json('Employee updated');
//     }
//     public function destroy($id)
//     {
//         $employees = Employee::find($id);
//         $employees->delete();
//         return response()->json(' deleted!');
//     }
// }

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{  
    public function index()
    {
        $employees = Employee::all();
        return response()->json([
            'status' => 'success',
            'data' => $employees
        ]);
    }  
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
        ]);

        $employee = new Employee([
            'name' => $validatedData['name'],
            'address' => $validatedData['address'],
            'mobile' => $validatedData['mobile'],
        ]);

        $employee->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Employee created!'
        ]);
    }
    
    public function show($id)
    {
        $employee = Employee::find($id);
        
        if (!$employee) {
            return response()->json([
                'status' => 'error',
                'message' => 'Employee not found.'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $employee
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
        ]);

        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json([
                'status' => 'error',
                'message' => 'Employee not found.'
            ], 404);
        }

        $employee->update($validatedData);

        return response()->json([
            'status' => 'success',
            'message' => 'Employee updated'
        ]);
    }
    
    public function destroy($id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json([
                'status' => 'error',
                'message' => 'Employee not found.'
            ], 404);
        }

        $employee->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Employee deleted!'
        ]);
    }
    
    public function edit($id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json([
                'status' => 'error',
                'message' => 'Employee not found.'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $employee
        ]);
    }
}

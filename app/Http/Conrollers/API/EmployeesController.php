<?php 
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function home()
    {
          return view('master');
    }
    
    public function index()
    {
        return Employees::latest()->get();
    }

    public function store(Request $request)
    {   
        $this->validate($request, [
            'name' => 'required',
            'role' => 'required',
            'salary' => 'required',
            'employment_type' => 'required',
            'employment_status' => 'required',
            'duration' => 'required',
        ]);

        return Employees::create([
           'name' => $request['name'],
           'role' => $request['role'],
           'salary' => $request['salary'],
           'employment_type' => $request['employment_type'],
           'employment_status' => $request['employment_status'],
           'duration' => $request['duration'],
           
        ]);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {   
        $this->validate($request, [
            'name' => 'required',
            'role' => 'required',
            'salary' => 'required',
            'employment_type' => 'required',
            'employment_status' => 'required',
            'duration' => 'required',
        ]);

        $user = Employees::findOrFail($id);

        $user->update($request->all());
    }

    public function destroy($id)
    {
        $user = Employees::findOrFail($id);
        $user->delete();
        return response()->json([
         'message' => 'Employee deleted successfully'
        ]);
    }
}

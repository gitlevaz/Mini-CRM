<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employees;
use App\Company;
use Validator;
use DB;

class EmployeeController   extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $result = Company::all()->where('status', 1);
        return view('employee.index')->with(compact('result'));
    }

    public function Add(Request $request)
    {

        $rules = [
            'f_name' => 'required',
            'l_name' => 'required',
            'company' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response([
                'message' => 'Please fill required fields!'
            ], 500);
        }

        $result = Employees::create([
            'f_name' => $request->f_name,
            'email' => $request->email,
            'l_name' => $request->l_name,
            'company' => $request->company,
            'phone' => $request->phone,
            'status' => $request->status
        ]);
        // $data['sucess'] = "Successfully Updated!";
        return response([
            'message' => 'Data Successfully Updated!'
        ], 500);
        // dd($result);
        return 1;
    }

    public function GetAll()
    {
        // $result = Employees::all()->where('status', 1);
        // return $result;
        $getresult = DB::table('employees')
        ->select('employees.*','companies.name as comapny_name')
        ->join('companies', 'employees.company', '=', 'companies.id')
        ->where('employees.status', 1)->orderBY('employees.id', 'DESC')->paginate(10)->toArray();
        $result = json_encode($getresult);
        return $result;
    }

    public function Getone(Request $request)
    {
        $result = Employees::find($request->id);
        return $result;
    }

    public function Update(Request $request)
    {


        $result = Employees::where('id', $request->id)->update(
            [
                'f_name' => $request->f_name, 'l_name' => $request->l_name,
                'company' => $request->company, 'email' => $request->email,
                'phone' => $request->phone, 'status' => $request->status
            ]
        );
        return $result;
    }


    public function Delete(Request $request)
    {
        $result = Employees::where('id', $request->id)->update(['status' => 0]);;
        return $result;
    }
}

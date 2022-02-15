<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Validator;
use DB;

class CompanyController  extends Controller
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
        return view('company.index')->with(compact('result'));
    }

    public function Add(Request $request)
    {

        $rules = [
            'name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response([
                'message' => 'Please fill required fields!'
            ], 500);
        }

        if ($request->hasFile('image')) {
            $destinationPath = public_path() . '/img/';
            $files = $request->file('image'); // will get all files     
            $file_name = $files->getClientOriginalName(); //Get file original name
            $files->move($destinationPath, $file_name); // move files to destination folder
        } else {
            $file_name = NULL;
        }

        $result = Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $file_name,
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
        // $result = Company::all()->where('status', 1);
      $getresult = DB::table('companies')->where('status', 1)->orderBY('id','DESC')->paginate(10)->toArray();
      $result= json_encode( $getresult);
        return $result;
    }

    public function Getone(Request $request)
    {
        $result = Company::find($request->id);
        return $result;
    }

    public function Update(Request $request)
    {
        if ($request->hasFile('image')) {
            $destinationPath = public_path().'/img/';
            $files = $request->file('image'); // will get all files     
            $file_name = $files->getClientOriginalName(); //Get file original name
            $files->move($destinationPath , $file_name); // move files to destination folder
        }else{
            $file_name =NULL;
        }


        $result = Company::where('id', $request->id)->update(
            ['name' => $request->name, 'email' => $request->email,'logo' => $file_name, 'website' => $request->website,'status' => $request->status]
        );
        return $result;
    }


    public function Delete(Request $request)
    {
        $result = Company::where('id', $request->id)->update(['status' => 0]);;
        return $result;
    }
}

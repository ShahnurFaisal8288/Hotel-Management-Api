<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\TeamLeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
    //employeeList
    public function employee()
    {
        $data = array();
        $data['active_menu'] = 'employeeList';
        $data['page_title'] = 'Employee List';
        $employee = Employee::all();
        if (request()->isMethod('post')) {
            try {
                request()->validate([
                    'name' => 'required',
                    'email' => 'required',
                    'phone' => 'required',
                    'designation' => 'required',
                ]);
                if(request()->hasFile('image')){
                    $extension = request()->file('image')->extension();
                    $photo_name= "backend/img/employee/".uniqid().'.'.$extension;
                    request()->file('image')->move('backend/img/employee', $photo_name);
                }else{
                    $photo_name = null;
                }
                if(request('team_leader')){
                    $TeamLeader = new TeamLeader();
                    $TeamLeader->name = request('name');
                    $TeamLeader->email = request('email');
                    $TeamLeader->phone = request('phone');
                    $TeamLeader->designation = request('designation');
                   if (request()->hasFile('image')) {
                    $TeamLeader->image = $photo_name;
                   }
                    $TeamLeader->save();
                    return back()->with('message','TeamLeader Created Successfully');
                }else{
                    $employee = new Employee();
                    $employee->name = request('name');
                    $employee->email = request('email');
                    $employee->phone = request('phone');
                    $employee->designation = request('designation');
                   if (request()->hasFile('image')) {
                    $employee->image = $photo_name;
                   }
                    $employee->save();
                    return back()->with('message','Employee Created Successfully');
                }


            } catch (\Throwable $th) {
                // return back()->with('message','Unauthorize Data');
                return $th;
            }
        }
        return view('backend.employee.employeeList',compact('data','employee'));
    }
    //employeeDelete
    public function employeeDelete($id){
        $employee = Employee::find($id);
        $image = $employee->image;
        if (File::exists($image)) {
            File::delete($image);
        }
        $employee->delete();
        return back()->with('message','Lead Deleted Successfully!!!');
    }
    //employeeEdit
    public function employeeEdit($id){
        $employee = Employee::find($id);
        $data = array();
        $data['active_menu'] = 'employeeList';
        $data['page_title'] = 'Employee Update';
        if (request()->isMethod('post')) {
            try {

                if(request()->hasFile('image')){
                    $extension = request()->file('image')->extension();
                    $photo_name= "backend/img/employee/".uniqid().'.'.$extension;
                    request()->file('image')->move('backend/img/employee', $photo_name);
                }else{
                    $photo_name = null;
                }
                $employee->name = request('name');
                $employee->email = request('email');
                $employee->phone = request('phone');
                $employee->designation = request('designation');
               if (request()->hasFile('image')) {
                $employee->image = $photo_name;
               }
                $employee->save();
                return redirect('/employee')->with('message','Employee Updated Successfully');

            } catch (\Throwable $th) {
                // return back()->with('message','Unauthorize Data');
                return $th;
            }
        }
        return view('backend.employee.employeeEdit',compact('data','employee'));

    }
}

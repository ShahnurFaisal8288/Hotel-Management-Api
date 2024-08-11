<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminAuth;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\TeamLeader;

class CreateAdminController extends Controller
{
    public function adminList()
    {
        $data = array();
        $data['active_menu'] = 'adminList';
        $data['page_title'] = 'Employee List';

        $list = AdminAuth::latest()->get();
        return view('backend.createAdmin.adminList', compact('list','data'));
    }


    public function createAdmin()
    {
        $data = array();
        $data['active_menu'] = 'adminCreate';
        $data['page_title'] = 'Admin Create';
        $adminCreate = Role::all();
        return view('backend.createAdmin.createAdmin', compact('adminCreate','data'));
    }

    public function adminCreate()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',

            'password' => 'required',
            'user_role' => 'required',
        ]);


        $admin = AdminAuth::create([
            'name' => request('name'),
            'email' => request('email'),

            'password' => bcrypt(request('password')),
            'user_role' => request('user_role'),
            'designation' => request('designation'),
            'booking_ratio' => request('booking_ratio'),
            'installment_ratio' => request('installment_ratio'),
           

        ]);
        $admin->roles()->attach(request('user_role'));
        if(request('designation') == 'sales_person'){
            Employee::create([
                'name' => request('name'),
                'email' => request('email'),

            ]);
        }elseif(request('designation') == 'team_leader'){
            TeamLeader::create([
                'name' => request('name'),
                'email' => request('email'),

            ]);
        }


        return to_route('adminList');
    }
    public function showEditAdmin($id){
        $data = array();
        $data['active_menu'] = 'adminEdit';
        $data['page_title'] = 'Admin Edit';
       $adminCreate = Role::get();
        $test = AdminAuth::find($id);
        return view('backend.createAdmin.editAdmin', compact('test','adminCreate','data'));
    }

    public function editAdmin($id)
    {

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',

            'password' => 'required',

            'user_role' => 'required',
        ]);

        $test = AdminAuth::find($id);
        $test->update([
            'name' => request('name'),
            'email' => request('email'),

            'password' => bcrypt(request('password')),

            'user_role' => request('user_role'),
            'booking_ratio' => request('booking_ratio'),
            'installment_ratio' => request('installment_ratio'),


        ]);
        return redirect()->route('adminList');
    }
    public function deleteAdmin($id)
    {

        AdminAuth::findOrFail($id)->delete();
        return redirect()->back();
    }

}

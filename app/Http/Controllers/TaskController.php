<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Lead;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];
        $data['active_menu'] = 'ourTeam';
        $data['page_title'] = 'Task List';
        $task = Task::all();
        $lead = Lead::all();
        return view('backend.task.task', compact('data', 'task', 'lead'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];
        $data['active_menu'] = 'ourTeam';
        $data['page_title'] = 'Task List';
        $employee = Employee::all();
        $administrate = Auth::guard('admin')->user()->name;

        $salesMan = Employee::where('name', $administrate)->select('id')->first();
        if($salesMan){
            $salesManId  = $salesMan->id;
            $leadUser = Lead::where('sales_officer', $salesManId)->select('full_name', 'id')->get();
            return view('backend.task.addTask', compact('leadUser', 'data', 'employee', 'administrate'));
        }else{
            $salesManId = Auth::guard('admin')->id();
            $leadUser = Lead::where('sales_officer', $salesManId)->select('full_name', 'id')->get();
            return view('backend.task.addTask', compact('leadUser', 'data', 'employee', 'administrate'));
        }


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $administrate = Auth::guard('admin')->user()->name;
        $salesMan = Employee::where('name', $administrate)->select('name')->first();
        $salesManName = $salesMan->name;

        $task = new Task();
        $task->lead_user = $request->lead_user;
        $task->todays_update  = $request->todays_update;
        $task->next_action  = $request->next_action;
        $task->status = $request->status;
        $task->employee_name = $salesManName;
        $task->review = $request->review;
        $task->save();
        return redirect('/tasks')->with('message', 'Task Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::find($id);
        $administrate = Auth::guard('admin')->user()->name;

        $salesMan = Employee::where('name', $administrate)->select('id')->first();
        $salesManId  = $salesMan->id;
        $leadUser = Lead::where('sales_officer', $salesManId)->select('full_name', 'id')->get();
        $data = [];
        $data['active_menu'] = 'ourTeam';
        $data['page_title'] = 'Task Update';
        return view('backend.task.taskEdit', compact('data', 'task', 'leadUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $task = Task::find($id);
        $task->lead_user = $request->lead_user;
        $task->todays_update  = $request->todays_update;
        $task->next_action  = $request->next_action;
        $task->status = $request->status;

        $task->save();
        return redirect('/tasks')->with('message', 'Task Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);
        $task->delete();
        return back()->with('message', 'Task Deleted Successfully');
    }
}

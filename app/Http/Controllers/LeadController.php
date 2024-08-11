<?php

namespace App\Http\Controllers;

use App\Imports\LeadImport;
use App\Models\Employee;
use App\Models\Investor;
use App\Models\Lead;
use App\Models\Task;
use App\Models\TeamLeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;
use PDF;

class LeadController extends Controller
{
    //Lead
    public function Lead()
    {
        $data = array();
        $data['active_menu'] = 'LeadList';
        $data['page_title'] = 'Lead List';
        $teamLeaders = TeamLeader::all();
        $employees = Employee::all();
        // auth('admin')->user()->assignRole('writer');
        if (request()->isMethod('post')) {
            if (request('import_file')) {
                Excel::import(new LeadImport, request('import_file'));
            } else {

                $salesOfficer = (array) request('sales_officer');
                $team_leader = (array) request('team_leader');

                $sales = implode(',', $salesOfficer);
                $team = implode(',', $team_leader);

                $lead = Lead::create([
                    'full_name' => request('full_name'),
                    'email' => request('email'),
                    'phone_number' => request('phone_number'),
                    'job_title' => request('job_title'),
                    'city' => request('city'),
                    'sales_officer' => $sales,
                    'team_leader' => $team
                ]);
            }

            return back()->with('message', 'Lead Created Successfully');
        }
        $lead = Lead::all();
        return view('backend.lead.lead', compact('data', 'teamLeaders', 'employees', 'lead'));
    }
    //leadEdit
    public function leadEdit($id)
    {
        $lead = Lead::find($id);
        $data = array();
        $data['active_menu'] = 'LeadList';
        $data['page_title'] = 'Lead Update';
        $teamLeaders = TeamLeader::all();
        $employees = Employee::all();
        if (request()->isMethod('post')) {
            try {
                $salesOfficer = (array) request('sales_officer');
                $team_leader = (array) request('team_leader');

                $sales = implode(',', $salesOfficer);
                $team = implode(',', $team_leader);

                $lead = Lead::find($id);
                $lead->update([
                    'full_name' => request('full_name'),
                    'email' => request('email'),
                    'phone_number' => request('phone_number'),
                    'job_title' => request('job_title'),
                    'city' => request('city'),
                    'sales_officer' => $sales,
                    'team_leader' => $team
                ]);
                return redirect('/lead')->with('message', 'Lead Updated Successfully');
            } catch (\Throwable $th) {
                return $th;
            }
        }
        return view('backend.lead.leadEdit', compact('data', 'lead', 'teamLeaders', 'employees'));
    }
    //leadDelete
    public function leadDelete($id)
    {
        $lead = Lead::find($id);
        $image = $lead->image;
        if (File::exists($image)) {
            File::delete($image);
        }
        $lead->delete();
        return back()->with('message', 'Lead Deleted Successfully');
    }
    //leadProcess
    public function leadProcess(Request $request)
    {
        $data = array();
        $data['active_menu'] = 'LeadProcess';
        $data['page_title'] = 'Lead Working Process';
        $start_date = $request->from_date;
        $end_date = $request->to_date;

        // Ensure that start date and end date are not null
        if ($start_date && $end_date) {
            $task = Task::whereDate('created_at', '>=', $start_date)
                        ->whereDate('created_at', '<=', $end_date)
                        ->get();
        } else {
            // If either start date or end date is not provided, fetch all tasks
            $task = Task::all();
        }

        return view('backend.lead.leadProcess', compact('data', 'task'));
    }
    //leadToInvestor
    public function leadToInvestor($id)
    {
        $lead = Lead::find($id);
        $data = array();
        $data['active_menu'] = 'LeadProcess';
        $data['page_title'] = 'Lead To Investor';
        $team_lead = TeamLeader::all();
        $employee = Employee::all();

        if (request()->isMethod('post')) {

            try {
                if (request()->hasFile('user_image')) {
                    $extension = request()->file('user_image')->extension();
                    $photo_name = 'backend/img/user/' . uniqid() . '.' . $extension;
                    request()->file('user_image')->move('backend/img/user', $photo_name);
                } else {
                    $photo_name = null;
                }
                if (request()->hasFile('nominee_image')) {
                    $extension = request()->file('nominee_image')->extension();
                    $image_name = 'backend/img/nominee/' . uniqid() . '.' . $extension;
                    request()->file('nominee_image')->move('backend/img/nominee', $image_name);
                } else {
                    $image_name = null;
                }
                $status = 'accept';
                $investor = new Investor();
                $investor->status = $status;
                $investor->serial_number = request('serial_number');
                $investor->name = request('name');
                $investor->user_image = $photo_name;
                $investor->fathers_name = request('fathers_name');
                $investor->mothers_name = request('mothers_name');
                $investor->spouse_name = request('spouse_name');
                $investor->birth_date = request('birth_date');
                $investor->spouse_date_birth = request('spouse_date_birth');
                $investor->marriage = request('marriage');
                $investor->present_address = request('present_address');
                $investor->permanent_address = request('permanent_address');
                $investor->phone = request('phone');
                $investor->main_amount = request('main_amount');
                $investor->email = request('email');
                $investor->quarterly = request('quarterly');
                $investor->facebook = request('facebook');
                $investor->Profession = request('Profession');
                $investor->religion = request('religion');
                $investor->office_address = request('office_address');
                $investor->nid_passport = request('nid_passport');
                $investor->nationality = request('nationality');
                $investor->project_name = request('project_name');
                $investor->project_address = request('project_address');
                $investor->ownership_size = request('ownership_size');
                $investor->category_ownership = request('category_ownership');
                $investor->no_ownership = request('no_ownership');
                $investor->price_ownership = request('price_ownership');
                $investor->special_discount = request('special_discount');
                $investor->special_discount_word = request('special_discount_word');
                $investor->agreed_price = request('agreed_price');
                $investor->agreed_price_word = request('agreed_price_word');
                $investor->installment = request('installment');
                $investor->nominee_name = request('nominee_name');
                $investor->nominee_cell_no = request('nominee_cell_no');
                $investor->relation_to_nominee = request('relation_to_nominee');
                $investor->nominee_image = $image_name;
                $investor->reference_name_a = request('reference_name_a');
                $investor->reference_cell_a = request('reference_cell_a');
                $investor->reference_name_b = request('reference_name_b');
                $investor->reference_cell_b = request('reference_cell_b');
                $investor->down_payment = request('down_payment');
                $investor->down_payment_date = request('down_payment_date');
                $investor->down_payment_inWord = request('down_payment_inWord');
                $investor->payment_type2 = request('payment_type2');
                $investor->payment_type_date2 = request('payment_type_date2');
                $investor->no_of_installment = request('no_of_installment');
                $investor->inst_per_month = request('inst_per_month');
                $investor->start_from = request('start_from');
                $investor->start_to = request('start_to');
                $investor->others_instruction = request('others_instruction');
                $investor->save();

                $investor->employees()->attach(request('employee_id'));
                $investor->employees()->attach(request('team_leader'));
                $investorWithEmployees = $investor->with('employees')->first();
                $employees = $investorWithEmployees->employees;
                if (request('investorPdfGenerate') == '1') {
                    $pdf = PDF::loadView('backend.pdf.investorListPdf', compact('investorListPdf', 'employees', 'investorWithEmployees'));
                    return $pdf->download('Investor_details.pdf');
                }

                return redirect()->route('lead.process')->with('message', 'Investor Created Successfully!!!');
            } catch (PDOException $e) {
                return $e;
            }
        } else {
        }
        return view('backend.lead.leadToInvestor', compact('data', 'lead', 'team_lead', 'employee'));
    }
    //leadReview
    public function leadReview($id)
    {
        $task = Task::find($id);
        $data = array();
        $data['active_menu'] = 'LeadProcess';
        $data['page_title'] = 'Lead Review';
        return view('backend.lead.lead_review', compact('data', 'task'));
    }
    //reviewLead
    public function reviewLead(Request $request, $id)
    {
        $task = Task::find($id);
        $task->review = $request->review;
        $task->save();
        return redirect('/lead/process')->with('message', 'Lead Review Updated Successfully');
    }
}

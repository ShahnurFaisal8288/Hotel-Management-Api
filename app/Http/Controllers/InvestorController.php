<?php

namespace App\Http\Controllers;

use App\Mail\InvestorEmail;
use App\Models\AdminAuth;
use App\Models\Employee;
use App\Models\Investor;
use App\Models\InvestorPay;
use App\Models\TeamLeader;
use Illuminate\Http\Request;
use PDOException;
use PDF;
use Session;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;


class InvestorController extends Controller
{
    public function investor_create()
    {
        $data = array();
        $data['active_menu'] = 'Investor';
        $data['page_title'] = 'Tenant Create';
        // $employee = Employee::all();
        $team_lead = TeamLeader::all();
        $employee = Employee::all();
        // $investor = Investor::select('serial_number');
        if (request()->isMethod('post')) {
            

            try {
                if (request()->hasFile('user_image')) {
                    $extension = request()->file('user_image')->extension();
                    $photo_name = 'backend/img/user/' . uniqid() . '.' . $extension;
                    request()->file('user_image')->move('backend/img/user', $photo_name);
                } else {
                    $photo_name = null;
                }
                if (request()->hasFile('nid_image')) {
                    $extension = request()->file('nid_image')->extension();
                    $image_name = 'backend/img/nid_image/' . uniqid() . '.' . $extension;
                    request()->file('nid_image')->move('backend/img/nid_image', $image_name);
                } else {
                    $image_name = null;
                }
              

             

                $investorListPdf = Investor::create([
                    'name' => request('name'),
                    'user_image' => $photo_name,
                    'permanent_address' => request('permanent_address'),
                    'phone' => request('phone'),
                    
                    'shopNo' => request('shopNo'),
                    'monthly_rent' => request('monthly_rent'),
                    'advance_amount' => request('advance_amount'),
                    'nid_image' => $image_name,
                    'reference_name_a' => request('reference_name_a'),
                    'reference_cell_a' => request('reference_cell_a'),
                    'start_from' => request('start_from'),
                    'start_to' => request('start_to'),
                    
                ]);

                // $inv = Investor::all()->last()->id;
                // $investorData = Investor::where('id', $inv)->first();
                // $investorArray = ['investor' => $investorData];
                // $pdf = PDF::loadView('backend.pdf.investorPdf', $investorArray);


                // $data = ['name' => request('email'), 'email' => request('email')];

                // Mail::send('email.investorMail', $data, function ($message) use ($data, $pdf) {
                //     $message->from('qrcode950@gmail.com', 'Admin');
                //     $message->to($data['email'], $data['name'])
                //         ->subject('Investor Created')
                //         ->attachData($pdf->output(), "investor.pdf");
                // });


                // if (request('investorPdfGenerate') == '1') {
                //     $pdf = PDF::loadView('backend.pdf.investorListPdf', compact('investorListPdf', 'employees', 'investorWithEmployees'));
                //     return $pdf->stream('Investor_details.pdf');

                // }


                return redirect()->route('investor_create')->with('message', 'Tenant Created Successfully!!!');
            } catch (PDOException $e) {
                return $e;
            }
        } else {
        }
        return view('backend.investor.investorCreate', compact('data', 'employee', 'team_lead'));
    }
    //investorApprove
    public function investorApprove()
    {
        $data = array();
        $data['active_menu'] = 'investorApprove';
        $data['page_title'] = 'Tenant Approve List';
        $investor = Investor::where('investor_status', 'pending')->get();

        return view('backend.investor.investorApproveList', compact('data', 'investor'));
    }
    //comment
    public function comment($id)
    {
        try {
            $investor = Investor::find($id);
            $investor->comments = request('comments');
            $investor->investor_status = 'approve';
            $investor->save();
            return back()->with('message', 'Comment Done For Approval');
        } catch (\Throwable $th) {
            return $th;
        }
    }
    //approve
    public function approve($id)
    {
        $investor = Investor::find($id);
        $investor->investor_status = 'approve';
        $investor->save();
        return back()->with('message', 'Tenant Approved Successfully!!!');
    }
    //investorList
    public function investorList()
    {
        $data = array();
        $data['active_menu'] = 'investorList';
        $data['page_title'] = 'Tenant List';
        $investor = Investor::where('investor_status', 'approve')->get();

        return view('backend.investor.investorList', compact('data', 'investor'));
    }
    //investor_delete
    public function investor_delete($id)
    {
        $investor = Investor::find($id);
        $investors = $investor->user_image;
        $investorsNominee = $investor->nominee_image;
        if (File::exists($investors)) {
            File::delete($investors);
        }
        if (File::exists($investorsNominee)) {
            File::delete($investorsNominee);
        }
        $investor->delete();
        return back()->with('message', 'Tenant Deleted Successfully!!!');
    }
    //investorShow
    public function investorShow($id)
    {
        $investor = Investor::find($id);
        $employee = Employee::all();
        $team_lead = TeamLeader::all();
        $data = array();
        $data['active_menu'] = 'investorList';
        $data['page_title'] = 'Tenant Show';
        if (request()->isMethod('post')) {
            $investor = Investor::find($id);
            try {
                // Initialize the variables
                $photo_name = $investor->user_image;
                $image_name = $investor->nid_image;
        
                if (request()->hasFile('user_image')) {
                    $extension = request()->file('user_image')->extension();
                    $photo_name = 'backend/img/user/' . uniqid() . '.' . $extension;
                    request()->file('user_image')->move('backend/img/user', $photo_name);
                    $investorImage =  $investor->user_image;
                    if (File::exists($investorImage)) {
                        File::delete($investorImage);
                    }
                } 
        
                if (request()->hasFile('nid_image')) {
                    $extension = request()->file('nid_image')->extension();
                    $image_name = 'backend/img/nid_image/' . uniqid() . '.' . $extension;
                    request()->file('nid_image')->move('backend/img/nid_image', $image_name);
                    $nid_imagee =  $investor->nid_image;
                    if (File::exists($nid_imagee)) {
                        File::delete($nid_imagee);
                    }
                } 
        
                $investor->update([
                    'name' => request('name'),
                    'user_image' => $photo_name,
                    'permanent_address' => request('permanent_address'),
                    'phone' => request('phone'),

                    'shopNo' => request('shopNo'),
                    'monthly_rent' => request('monthly_rent'),
                    'advance_amount' => request('advance_amount'),
                    'nid_image' => $image_name,
                    'reference_name_a' => request('reference_name_a'),
                    'reference_cell_a' => request('reference_cell_a'),
                    'start_from' => request('start_from'),
                    'start_to' => request('start_to'),
                ]);
        
                return redirect()->route('investorList')->with('message', 'Tenant Updated Successfully!!!');
            } catch (PDOException $e) {
                return $e;
            }
        }
        
        return view('backend.investor.investorshow', compact('data', 'investor', 'employee','team_lead'));
    }
    //unpaidInvestor
    public function unpaidInvestor()
    {
        $data = array();
        $data['active_menu'] = 'investorList';
        $data['page_title'] = 'Tenant UnPaid List';
        $currentMonth = Carbon::now()->format('m');
        $paidInvestorIds = InvestorPay::whereMonth('created_at', '=', $currentMonth)->pluck('investor_id');
        $investorPay = Investor::whereNotIn('id', $paidInvestorIds)->get();

        return view('backend.investor.unPaidInvestor', compact('data', 'investorPay'));
    }
    //investor_org_show
    public function investor_org_show($id)
    {
        $investor = Investor::find($id);
        return view('backend.investor.investorOrgShow', compact('investor'));
    }
    //investorAdminShow
    public function investorAdminShow($id)
    {
        $investor = Investor::find($id);
        return view('backend.investor.investorOrgShow', compact('investor'));
    }
}

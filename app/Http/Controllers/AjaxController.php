<?php

namespace App\Http\Controllers;

use App\Models\Investor;
use App\Models\InvestorPay;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    //getName
    public function getName()
    {
        $id = request()->serial_No;
        $investorPay=InvestorPay::where('investor_id',$id)->latest()->first();
        $paidMonth=$investorPay->end_month ?? 'null';
        $investor = Investor::where('id', $id)->first();
        $invPaid=InvestorPay::where('investor_id',$id)->sum('total') + $investor->down_payment;
       // $mainamount=$investor->no_of_installment*$investor->inst_per_month;
        $invDue=$investor->allow_amount-$invPaid;

        if ($investorPay) {
            $installment_number = InvestorPay::where('investor_id', $id)->count();
        } else {
            $installment_number = 0;
        }

        return response()->json([$investor,$paidMonth,$invPaid,$invDue,$installment_number]);

    }
    //getAssist
    public function getAssist(Request $request)
    {
        $lead = $request->lead;
        $assist = Lead::where('id',$lead)->get();
        $html = '<option value="">Select Sales Person</option>';
        foreach ($assist as $item){
            $html .= '<option value="'.$item->id.'">'.$item->employee->name ?? '-'.'</option>';
        }
        return response()->json($html);

    }
    //getTeamLeader
    public function getTeamLeader(Request $request)
    {
        $lead = $request->lead;
        $assist = Lead::where('id',$lead)->get();
        $html = '<option value="">Select Sales Person</option>';
        foreach ($assist as $item){
            $html .= '<option value="'.$item->id.'">'.$item->teamLeader->name ?? '-'.'</option>';
        }
        return response()->json($html);

    }
    //getPermission
    public function getPermission(Request $request){


        $module_id = $request->post('module_id');
        $subModule = DB::table('sub_modules')->where('module_id', $module_id)->get();
        $html = '<option value="">Select A Sub Module</option>';
        foreach ($subModule as $item){
            $html .= '<option value="'.$item->id.'">'.$item->subModule_name.'</option>';
        }
        return response()->json($html);

    }
    //ratio
    public function ratio(Request $request)
    {
        $rol = $request->user_role;

        $booking_ratio = DB::table('roles')->where('id',$rol)->first();
        $ratio1 = $booking_ratio->booking_ratio;
        $ratio2 = $booking_ratio->installment_ratio;
        return response()->json([$ratio1,$ratio2]);
    }
}

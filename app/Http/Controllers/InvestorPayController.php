<?php

namespace App\Http\Controllers;

use App\Models\Investor;
use App\Models\InvestorPay;
use Illuminate\Http\Request;

class InvestorPayController extends Controller
{
    //InvestorPay
    public function investor_pay()
    {
        $data = array();
        $data['active_menu'] = 'InvestorPay';
        $data['page_title'] = 'Tenant Pay';
        $investor = Investor::all();

        if (request()->isMethod('post')) {
            try {
                // dd(request()->all());
                InvestorPay::create([
                    'investor_id' => request('serial_No'),
                    'start_month' => request('start_month'),
                    'end_month' => request('end_month'),
                    'per_int_amount_word' => request('per_int_amount_word'),
                    'bank_name' => request('bank_name'),
                    'branch_name' => request('branch_name'),
                    'payment_type' => request('payment_type'),
                    'chqNo' => request('chqNo'),
                    'number_installment_upcomming' => request('number_installment_upcomming'),
                    'total' => request('total'),
                ]);

             return back()->with('message','Tenant Payment Successfully!!!');
            } catch (\Throwable $th) {
                return  $th;
            }
        }
        return view('backend.investor.investorPay',compact('data','investor'));
    }
    //paymentList
    public function paymentList(){
        $data = array();
        $data['active_menu'] = 'InvestorList';
        $data['page_title'] = 'Payment List';
        $investorPay = InvestorPay::all();
        return view('backend.investor.paymentList',compact('data','investorPay'));
    }
    //investorPayDelete
    public function investorPayDelete($id){
      InvestorPay::find($id)->delete();
      return back()->with('message','Tenant Payment Deleted Successfully!!!');
    }
    ////investorPay_view
   public function investorPay_view($id)
   {
    $investorPay = InvestorPay::find($id);
    return view('backend.investor.investorPay_view',compact('investorPay'));
   }
}

<?php

namespace App\Http\Controllers;

use App\Mail\InvestorEmail;
use App\Models\Investor;
use App\Models\InvestorPay;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PdfController extends Controller
{
    //investorPdf
    public function investorPdf($id)
    {
        $investor = Investor::find($id);
       
        //  return view('backend.pdf.investorPdf',compact('investor'));

        // set_time_limit(1000);
        $pdf = PDF::loadView('backend.pdf.investorPdf', compact('investor'));
        return $pdf->stream('Tenant_details.pdf');
    }
    //investorPay_print
    public function investorPay_print($id)
    {
        $investorPay = InvestorPay::find($id);
        set_time_limit(1000);
        $pdf = PDF::loadView('backend.pdf.investorPayPdf', compact('investorPay'));
        return $pdf->download('money_receipt.pdf');
        //   return view('backend.pdf.investorPayPdf', compact('investorPay'));
    }
    //unpaidPdf
    public function unpaidPdf()
    {
        $currentMonth = Carbon::now()->format('m');
        $paidInvestorIds = InvestorPay::whereMonth('created_at', '=', $currentMonth)->pluck('investor_id');
        $investorPay = Investor::whereNotIn('id', $paidInvestorIds)->get();
        $pdf = PDF::loadView('backend.pdf.unPaidPdf', compact('investorPay'));
        return $pdf->download('unPaid_report.pdf');

        // return view('backend.pdf.unPaidPdf', compact( 'investorPay'));
    }
    //bookingPdf
    public function bookingPdf($id)
    {
        $investor = Investor::find($id);
        $date =  \Carbon\Carbon::parse($investor->created_at)->format('d-M-Y');
        set_time_limit(1000);
        $pdf = PDF::loadView('backend.pdf.bookingPdf',compact('investor','date'));
        return $pdf->download('advance_receipt.pdf');
    }
}

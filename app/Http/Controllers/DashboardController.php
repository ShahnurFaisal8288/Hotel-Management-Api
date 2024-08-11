<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\CoursePay;
use App\Models\Investor;
use App\Models\InvestorPay;
use App\Models\User;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data = array();
        $data['active_menu'] = 'dashboard';
        $data['page_title'] = 'Dashboard';
        //total tenant
        $investor = Investor::where('investor_status','approve')->count('id');
        $recievableAmount = Investor::sum('monthly_rent');
        $currentMonth = now()->format('F');
        $currentMonths = now()->month;
        $monthlyIncome = InvestorPay::whereMonth('created_at',$currentMonths)->sum('total');
        $monthlyUnpaid = $recievableAmount - $monthlyIncome;
        // $currentMonth = now()->month;
        // $investors = Investor::whereMonth('created_at',$currentMonth)->sum('inst_per_month');
        // $main_amount = Investor::sum('main_amount');
        // $down_payment = Investor::sum('down_payment');
        // $totalAmount = $main_amount+$down_payment;

        // $monthlyPaid = InvestorPay::whereMonth('created_at',$currentMonth)->sum('total');
        // $totalIncome = InvestorPay::sum('total');
        // $monthlyUnpaid = $investors -  $monthlyPaid;
        // $total_unpaid = $totalAmount-$totalIncome;
        // $currentMonthName = now()->format('F');
        return view('backend.dashboard.dashboard', compact('data','investor','recievableAmount','currentMonth','monthlyIncome','currentMonths','monthlyUnpaid'));
    }
}

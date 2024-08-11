<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\CoursePay;
use App\Models\Event;
use App\Models\Expense;
use App\Models\Investor;
use App\Models\InvestorPay;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //workReport
    public function workReport()
    {
        $data = array();
        $data['active_menu'] = 'reportList';
        $data['page_title'] = 'Selse Report';
        $task = Task::all();
        return view('backend.report.selseWorkReport', compact('data','task'));
    }
    //taskReport
    public function taskReport(Request $request)
    {
        $data = array();
        $data['active_menu'] = 'reportList';
        $data['page_title'] = 'Selse Report';
        $start_date = $request->from_date;
        $end_date = $request->to_date;

        $task = Task::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->get();
        return view('backend.report.selseWorkReport', compact('data','task'));
    }
    //investorReport
    public function investorReport(Request $request)
    {
        $data = array();
        $data['active_menu'] = 'investorReport';
        $data['page_title'] = 'Investor Report';

        $investor = Investor::all();
        return view('backend.report.investorReport', compact('data', 'investor'));
    }
    //postInvestorReport
    public function postInvestorReport(Request $request)
    {
        $data = array();
        $data['active_menu'] = 'investorReport';
        $data['page_title'] = 'Investor Report';
        $start_date = $request->from_date;
        $end_date = $request->to_date;

        $investor = Investor::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->get();

        return view('backend.report.investorReport', compact('data', 'investor'));
    }
    //dueReport
    public function dueReport(Request $request)
    {
        $data = array();
        $data['active_menu'] = 'dueReport';
        $data['page_title'] = 'Due Report';

        $currentMonth = Carbon::now()->format('m');
        $paidInvestorIds = InvestorPay::whereMonth('created_at', '=', $currentMonth)->pluck('investor_id');
        $investorPay = Investor::whereNotIn('id', $paidInvestorIds)->get();
        return view('backend.report.dueReport', compact('data', 'investorPay'));
    }
    //postDueReport
    public function postDueReport(Request $request)
    {
        $data = array();
        $data['active_menu'] = 'dueReport';
        $data['page_title'] = 'Due Report';
        $start_date = $request->from_date;
        $end_date = $request->to_date;

        $investor = InvestorPay::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->get();

        return view('backend.report.investorReport', compact('data', 'investor'));
    }
    //expenseReport
    public function expenseReport(Request $request){
        $data = array();
        $data['active_menu'] = 'expenseReport';
        $data['page_title'] = 'Expense Report';
        $date = $request->date;
        $expense = Expense::whereDate('created_at','>=',$date)->get();
        return view('backend.report.expenseReport', compact('data', 'expense'));
    }
}

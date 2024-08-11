<?php

namespace App\Http\Controllers;

use App\Models\CommunityCenter;
use PDF;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CommunityCenterController extends Controller
{
    //communityList
    public function communityList($id = null)
    {
        $data = array();
        $data['active_menu'] = 'booking';
        $data['page_title'] = 'Booking List';
    
        $communities = CommunityCenter::all();
        $community = null;
    
        if ($id) {
            $community = CommunityCenter::find($id);
        }
    
        return view('backend.community.community_list', compact('data', 'communities', 'community'));
    }
    //communityCreate
    public function communityCreate()
    {
        CommunityCenter::create([
            'name' => request('name'),
            'phone' => request('phone'),
            'date' => request('date'),
            'occasion' => request('occasion'),
            'extra_service' => request('extra_service'),
            'advance' => request('advance'),
            'due' => request('due'),
            'person_quantity' => request('person_quantity'),
            'total_amount' => request('total_amount'),
            'status' => 'offline',
        ]);
        return back()->with('message','Booking Successfully');
    }
    //communityDelete
    public function communityDelete($id)
    {
        CommunityCenter::findOrFail($id)->delete();
        return back()->with('message','Booking Deleted Successfully');
    }
    //communityPrint
    public function communityPrint($id)
    {
        $bookPdf = CommunityCenter::findOrFail($id);
        $date = \Carbon\Carbon::parse($bookPdf->date)->format('d-M-Y');
        // set_time_limit(1000);
        $pdf = PDF::loadView('backend.pdf.communityBookPdf',compact('bookPdf','date'));
        return $pdf->stream('bookingCommunity.pdf');

        // return view('backend.pdf.communityBookPdf',compact('bookPdf','date'));
    }
    //onlineBooking
    public function onlineBooking()
    {
        $data = array();
        $data['active_menu'] = 'onlineBooking';
        $data['page_title'] = 'Online booking List';
        $community = CommunityCenter::where('status','online')->get();
        return view('backend.community.onlineCommunity_list',compact('data','community'));
    }
    //offlineBooking
    public function offlineBooking(){
        $data = array();
        $data['active_menu'] = 'offlineBooking';
        $data['page_title'] = 'Offline booking List';
        $community = CommunityCenter::where('status','offline')->get();
        return view('backend.community.offlineCommunity_list',compact('data','community'));
    }
    //communityEditPost
    public function communityEditPost($id) {
        $community = CommunityCenter::find($id);
        $community->update([
            'name' => request('name'),
            'phone' => request('phone'),
            'date' => request('date'),
            'occasion' => request('occasion'),
            'extra_service' => request('extra_service'),
            'advance' => request('advance'),
            'due' => request('due'),
            'person_quantity' => request('person_quantity'),
            'total_amount' => request('total_amount'),
            'status' => 'offline',
        ]);
        return to_route('community.list')->with('message','Booking Data Updated Successfully');
    }
}

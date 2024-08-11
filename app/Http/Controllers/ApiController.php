<?php

namespace App\Http\Controllers;

use App\Mail\UserVerification;
use App\Models\Contact;
use App\Models\Event;
use App\Models\RealEvent;
use App\Models\User;
use App\Models\Advocate;
use App\Models\Attendance;
use App\Models\Batch;
use App\Models\CommunityCenter;
use App\Models\ContactInvestor;
use App\Models\CoursePay;
use App\Models\HighCourt;

use App\Models\LowerCourt;
use App\Models\Notice;
use App\Models\OurTeam;
use App\Models\Review;
use App\Models\UserEvent;
use App\Models\UserHigh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use DB;
use Illuminate\Support\Facades\Mail;

class ApiController extends Controller
{
    //chutiImagePost
    public function communityPost()
    {
        $community = CommunityCenter::create([
            'name' => request('name'),
            'phone' => request('phone'),
            'date' => request('date'),
            // 'shift' => request('shift'),
            'person_quantity' => request('person_quantity'),
            // 'total_amount' => request('total_amount'),

        ]);
        return response()->json($community, 200);
    }

    //chutiImageGet
    public function communityGet()
    {
        $community = CommunityCenter::all();
        return response()->json($community, 200);
    }
    //contactPost
    public function contactPost()
    {
        $ContactInvestor = ContactInvestor::create([
            'email' => request('email'),
            'phone' => request('phone'),
            'subject' => request('subject'),
            'message' => request('message'),
        ]);
        return response()->json($ContactInvestor, 200);
    }
    //contactGet
    public function contactGet()
    {
        $contact = ContactInvestor::all();
        return response()->json($contact, 200);
    }
}

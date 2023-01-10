<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Leave;
use App\Models\Member;
use App\Models\Penalty;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:member');
    }

    public function home(){
        return view('member.index');
    }

    public function markAttendance(){
        $currentTime = Carbon::now();

        return view('member.mark-attendance', compact('currentTime'));
    }

    public function storeAttendance(Request $request, Member $id){
        $currentTime = Carbon::now()->format('H:i:s');
        $date = date('Y-m-d');

        $attendance = new Attendance();

        $attendance->member_id = $request->member_id;
        $attendance->date = $date;
        $attendance->time = $currentTime;
        $attendance->action = $request->action;
        
        $pending = Penalty::where('status', 0)->count();

        if(Auth::user()->status == "Past"){
            return back()->with("error", "This state code is no longer active!");
        }
        //if user has already marked attendance
        else if(DB::table('attendances')
            ->where('date', $date)
            ->where('member_id', $request->member_id)
            ->exists()){
            return back()->with("error", "You have already marked today's attendance");          
        }
        //if pending penalties is >= 4
        else if($pending >= 4){
            return redirect('/member/mark-attendance')->with('error', 'You have four or more pending penalties. You cannot sign in until these penalties are cleared');
        }
        else if($currentTime > '08:00:00'){
            //Insert to attendance table
            $attendance->save();

            //Insert into member table
            Member::whereId(auth()->user()->id)->update([
            'penalty_status' => false
        ]);
    
            //Insert into penalty table
            $penalty = new Penalty();
            $penalty->member_id = $request->member_id;
            $penalty->date = $date;
    
            $penalty->save();
    
            return redirect('/member/mark-attendance')->with("error", "You're late!. You will pay a penalty fee of 100 naira. Attendance has been marked successfully.");
        }
        else{
            $attendance->save();
            return redirect('/member/mark-attendance')->with("status", "Today's attendance has been marked successfully");
        }
    }

    public function penalties(){ 
        $penalties = Penalty::all();

        return view('member.penalties', compact('penalties'));
    }

    public function viewAttendance(){
        $attendances = Attendance::all();

        return view('member.view-attendance', compact('attendances'));
    }

    public function applyLeave(){
        return view('member.apply-leave');
    }

    public function storeLeave(Request $request){
        request()->validate([
            'reason' => 'required',
            'body' => 'required|min:30|string',
        ]);

        $leave = new Leave();
        $leave->member_id = $request->member_id;
        $leave->reason = $request->reason;
        $leave->body = $request->body;

        $leave->save();

        return redirect('/member/apply-leave')->with('success', 'Your leave application has been set and a message would be sent to you if it is approved');
    }

    public function viewLeave(){
        $leaves = Leave::all();

        return view('member.view-leave', compact('leaves'));
    }

    public function profile(){
        return view('member.profile');
    }

    public function changePassword(){
        return view('member.change-password');
    }

    public function updatePassword(Request $request){
        request()->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|string|confirmed',
        ]);

        //Match the old password
        if(!Hash::check($request->current_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't Match");
        }

        //Update the new  password
        Member::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully");
    }
}

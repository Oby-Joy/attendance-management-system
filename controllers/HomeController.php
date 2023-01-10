<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Leave;
use App\Models\Member;
use App\Models\Penalty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $groups = Group::all();
        $members = Member::all();
        $pending = Penalty::where('status', 0)->count();

        $leaves = Leave::all();

        return view('admin.index', compact('groups', 'members', 'pending', 'leaves'));
    }

    public function addGroup(){
        return view('admin.add-group');
    }

    public function storeGroup(){
        $properties = request()->validate([
            'group_name' => 'required|min:3|string',
            'date_created' => 'required'
        ]);

        Group::create($properties);

        Session::flash('success', 'Group Added Successfully');

        return redirect('/admin/add-group');
    }

    public function viewGroups(){
        $groups = Group::all();

        return view('admin.view-groups', compact('groups'));
    }

    public function addMember(){
        $groups = Group::all(); 

        return view('admin.add-member', compact('groups'));
    }

    public function storeMember(Request $request){
        request()->validate([
            'cds_group' => 'required',
            'first_name' => ['required', 'string', 'min:3'],
            'last_name' => ['required','string', 'min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'state_code' => 'required',
            'ppa' => ['required', 'string'],
            'batch' => 'required',
            'entry_date' => 'required',
            'exit_date' => 'required',
            'stream' => 'required',
        ]);

        $date = date('Y-m-d');

        $member = new Member();     
        $member->first_name = $request->first_name;
        $member->last_name = $request->last_name;
        $member->email = $request->email;
        $member->state_code = $request->state_code;
        $member->group_id = $request->cds_group;
        $member->ppa = $request->ppa;
        $member->batch = $request->batch;
        $member->stream = $request->stream;
        $member->penalty = false;
        $member->entry_date = $request->entry_date;
        $member->exit_date = $request->exit_date;
        if($request->exit_date <= $date){
            $member->status = 'Past';
        }
        else{
            $member->status = 'Present';
        }
        $member->password = $request->last_name;

        $member->save();

        Session::flash('success', 'Member Added Successfully');

        return redirect('/admin/add-member');
    }

    public function viewPresentMembers($id){
        $group = Group::findOrFail($id);

        return view('admin.present-members', compact('group'));
    }

    public function viewPastMembers($id){
        $group = Group::findOrFail($id);

        return view('admin.past-members', compact('group'));
    }

    public function penalties($id){
        $member = Member::findOrFail($id);

        return view('admin.penalties', compact('member'));
    }

    /*public function deletePenalties($id){
        $member = Member::findOrFail($id);

        foreach($member->penalties as $penalty){
            $penalty->delete();
        }

        return back()->with('success', 'Penalties cleared successfully');      
    }*/

    public function updatePenalties($id){
        $member = Member::findOrFail($id);

        foreach($member->penalties as $penalty){
            $penalty->status = true;
            $penalty->save();
        }

        $member->penalty = true;
        $member->save();

        return back()->with('success', 'Penalties cleared successfully');
    }
}

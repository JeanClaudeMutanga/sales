<?php

namespace App\Http\Controllers;

use App\User;
use App\Clocking;
use App\CreditHistory;
use App\CustomerOrder;
use App\Opportunity;
use App\CreditManager;
use App\Updates;
use App\Cof2Client;
use App\Cof2Admin;
use App\FollowUp;
use App\ReceiveCof;
use App\InformClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\School;
use App\Fibre;
use App\Event;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opportunities = Opportunity::latest()->paginate(10);
        return view('admin.opportunities')->with('opportunities', $opportunities);
    }

    public function open()
    {
        $opportunities = Opportunity::latest()->paginate(10);
        return view('admin.open')->with('opportunities', $opportunities);
    }

    public function closed()
    {
        $opportunities = Opportunity::latest()->paginate(10);
        return view('admin.closed')->with('opportunities', $opportunities);
    }
    
    public function redheart()
    {
        $schools = School::latest()->paginate(10);
        return view('management.red')->with('schools',$schools);
    }

    public function fibre()
    {
        $fibres = Fibre::latest()->paginate(10);
        return view('management.fibre_total')->with('fibres',$fibres);
    }

    public function team()
    {
        $users = User::all();
        return view('admin.team')->with('users',$users);
    }

    public function red($id)
    {
        $school = School::findOrFail($id);
        return view('admin.school')->with('school',$school);
    }

    public function fib($id)
    {
        $fibre = Fibre::find(10);
        return view('admin.red')->with('fibre',$fibre);
    }

    public function mytime()
    {
        $user_id = auth()->user()->id;
        $today = date('Y-m-d');
        $times = Clocking::query()->where('user_id',$user_id)->latest()->get();
        return view('admin.checkin')->with([
            'today'=> $today,
            'times' =>$times
            ]);
        return $today;
    }

    public function clockin()
    {
        $user_id = auth()->user()->id;
        $today = date('Y-m-d');
        $time = date('H:i:s');
       

        $clocking = new Clocking();
        $clocking->user_id = $user_id;
        $clocking->checkIn = $time;
        $clocking->day = $today;
        $clocking->save();
        return redirect()->back();
    }

    public function checkout()
    {
        $time = date('H:i:s');

        $user_id = auth()->user()->id;
        $today = date('Y-m-d');

        $start = DB::table('clockings')->select('id')->where([
        'user_id' => $user_id,
        'day' => $today
        ])->get();

        foreach ($start as $data) {
            $starting = Clocking::find($data->id);
            $starting->checkOut = $time;
            $starting->save();
        }

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    
    public function edit_event($id)
    {
        $totals =Event::latest()->paginate(6);
        $event = Event::FindOrFail($id);
        return view('admin.update')->with([
            'totals'=> $totals,
            'event'=> $event
            ]);
    }
    
    public function update_event(Request $request,$id)
    {
        $event = Event::find($id);
        $event->title = $request->input('title');
        $event->start = $request->input('start');
        $event->end = $request->input('end');
        $event->save();
        return redirect()->back()->with('success','Updated Successfully');
        
    }
    
    public function edit_event_agent($id)
    {
        $totals =Event::latest()->paginate(6);
        $event = Event::FindOrFail($id);
        return view('update')->with([
            'totals'=> $totals,
            'event'=> $event
            ]);
    }
    
    public function update_event_agent(Request $request,$id)
    {
        $event = Event::find($id);
        $event->title = $request->input('title');
        $event->start = $request->input('start');
        $event->end = $request->input('end');
        $event->save();
        return redirect()->back()->with('success','Updated Successfully');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $opportunity = Opportunity::find($id);
        return view('admin.single')->with('opportunity',$opportunity);
    }

    public function Receivecof()
    {
        $tasks = ReceiveCof::query()->where('status','0')->latest()->get();
        return view('admin.receive_cof')->with('tasks',$tasks);
    }

    public function cof2client()
    {
        $tasks = Cof2Client::query()->where('status','0')->latest()->get();
        return view('admin.cof2client')->with('tasks',$tasks);
    }

    public function followups()
    {
        $tasks = FollowUp::query()->where('status','0')->latest()->get();
        return view('admin.followups')->with('tasks',$tasks);
    }

    public function cof2admin()
    {
        $tasks = Cof2Admin::query()->where('status','0')->latest()->get();
        return view('admin.cof2admin')->with('tasks',$tasks);
    }

    public function inform()
    {
        $tasks = InformClient::query()->where('status','0')->latest()->get();
        return view('admin.inform')->with('tasks',$tasks);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $opportunity = Opportunity::find($id);
        $opportunity->opportunity_no = $request->input('opportunity_no');
        $opportunity->save();

        return redirect('/admin/opportunity/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function delete($id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect()->back();
    }
}

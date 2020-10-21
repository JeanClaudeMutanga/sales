<?php

namespace App\Http\Controllers;

use App\User;
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
use App\School;
use App\Fibre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opportunities = Opportunity::latest()->get();
        return view('management.total')->with('opportunities',$opportunities);
    }
    
    public function school($id)
    {
        $school = School::findOrFail($id);
        return view('management.school')->with('school',$school);
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

    public function Receivecof()
    {
        $tasks = ReceiveCof::query()->where('status','0')->get();
        return view('management.receive_cof')->with('tasks',$tasks);
    }

    public function cof2client()
    {
        $tasks = Cof2Client::query()->where('status','0')->get();
        return view('management.cof2client')->with('tasks',$tasks);
    }

    public function followups()
    {
        $tasks = FollowUp::query()->where('status','0')->get();
        return view('management.followups')->with('tasks',$tasks);
    }

    public function cof2admin()
    {
        $tasks = Cof2Admin::query()->where('status','0')->get();
        return view('management.cof2admin')->with('tasks',$tasks);
    }

    public function inform()
    {
        $tasks = InformClient::query()->where('status','0')->get();
        return view('management.inform')->with('tasks',$tasks);
    }

    public function team()
    {
        $users = User::all();
        return view('management.team')->with('users',$users);
    }

    public function agent($id)
    {
        $user = User::findOrFail($id);

        $opportunities = Opportunity::query()->where('user_id',$id)->latest()->paginate(5);
        
        $schools = School::query()->where('user_id',$id)->latest()->paginate(5);

        $fibres = Fibre::query()->where('user_id',$id)->latest()->paginate(5);
        return view('management.agent')->with([
            'user'=> $user,
            'opportunities' => $opportunities,
            'schools' => $schools,
            'fibres' => $fibres
            ]);
        return view('management.agent')->with([
            'user'=> $user,
            'opportunities' => $opportunities
            ]);
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
        return view('management.single')->with('opportunity',$opportunity);
    }

    public function report()
    {
        //$data = Opportunity::query()->groupBy('created_at')->get();
        //return $data;
        $year = 2020;
        $result = Opportunity::selectRaw('year(created_at) year, monthname(created_at) month, count(*) data')->where('created_at','like','%'.$year.'%')
                ->groupBy('year', 'month')
                ->orderBy('month', 'desc')
                ->get();
                //return $result;
        return view('management.report')->with('result',$result); 
        
        /* $month = Opportunity::selectRaw(' monthname(created_at) month, count(*) data')->where('created_at','like','%'.$year.'%')
                ->groupBy('month')
                ->orderBy('month', 'desc')
                ->get();
        return $month;
        $test = Opportunity::query()->select(); */
       
     
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
        //
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
}

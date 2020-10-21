<?php

namespace App\Http\Controllers;
use App\Clocking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClokingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    
    public function management()
    {
        $times = Clocking::latest()->paginate(20);
        return view('management.times')->with('times',$times);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = auth()->user()->id;
        $today = date('Y-m-d');
        $times = Clocking::query()->where('user_id',$user_id)->latest()->get();
        return view('checkin')->with([
            'today'=> $today,
            'times' =>$times
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set('Africa/Johannesburg');
        //$curDate = date('Y-m-d H:i:s');
        //$time =  date_format($curDate,'H:i:s');
        
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request)
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        $date = date('Y-m-d');
        return view('management.events')->with([
            'events'=>$events,
            'date' => $date
        ]);
    }
    
    public function admin()
    {
        $events = Event::all();
        $all = Event::latest()->paginate(10);
        $date = date('Y-m-d');
        return view('admin.events')->with([
            'events'=>$events,
            'all' => $all,
            'date' => $date
        ]);
        
    }
    
    public function agent()
    {
        $events = Event::all();
        $date = date('Y-m-d');
        return view('events')->with([
            'events'=>$events,
            'date' => $date
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
        Event::create($request->all());
        return redirect()->back();
    }
    
    public function admin_store(Request $request)
    {
        Event::create($request->all());
        return redirect()->back();
    }
    
    public function agent_store(Request $request)
    {
        Event::create($request->all());
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
    public function edit()
    {
        $all = Event::latest()->paginate(10);
        return view('admin.edit')->with('all', $all);
    }
    
    public function edit_agent()
    {
        $all = Event::latest()->paginate(10);
        return view('edit')->with('all', $all);
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

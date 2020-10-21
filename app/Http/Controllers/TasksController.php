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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TasksController extends Controller
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
    public function update(Request $request, $id)
    {
        //
    }

    public function receivecof(Request $request)
    {
        
        $opportunity_id = $request->input('opportunity_id');
        $opportunity = Opportunity::find($opportunity_id);
        $task_id = $opportunity->ReceiveCof->id;

        $task = ReceiveCof::find($task_id);
        $task->status = $request->input('status');
        $task->save();

        $updates = new Updates();        
        $updates->user_id = auth()->user()->id;
        $updates->opportunity_id = $opportunity_id;
        $updates->comments = $request->input('comments');
        $updates->save();
        return redirect('/opportunity/'.$opportunity_id);
       

    }

    public function Cof2Client(Request $request)
    {
        $opportunity_id = $request->input('opportunity_id');
        $opportunity = Opportunity::find($opportunity_id);
        $task_id = $opportunity->Cof2Client->id;

        $task = Cof2Client::find($task_id);
        $task->status = $request->input('status');
        $task->save();

        $updates = new Updates();        
        $updates->user_id = auth()->user()->id;
        $updates->opportunity_id = $opportunity_id;
        $updates->comments = $request->input('comments');
        $updates->save();
        return redirect('/opportunity/'.$opportunity_id);
    }

    public function FollowUp(Request $request)
    {
        $opportunity_id = $request->input('opportunity_id');
        $opportunity = Opportunity::find($opportunity_id);
        $task_id = $opportunity->FollowUp->id;

        $task = FollowUp::find($task_id);
        $task->status = $request->input('status');
        $task->save();

        $updates = new Updates();        
        $updates->user_id = auth()->user()->id;
        $updates->opportunity_id = $opportunity_id;
        $updates->comments = $request->input('comments');
        $updates->save();
        return redirect('/opportunity/'.$opportunity_id);
    }

    public function Cof2Admin(Request $request)
    {
        $opportunity_id = $request->input('opportunity_id');
        $opportunity = Opportunity::find($opportunity_id);
        $task_id = $opportunity->Cof2Admin->id;

        $task = Cof2Admin::find($task_id);
        $task->status = $request->input('status');
        $task->save();

        $updates = new Updates();        
        $updates->user_id = auth()->user()->id;
        $updates->opportunity_id = $opportunity_id;
        $updates->comments = $request->input('comments');
        $updates->save();
        return redirect('/opportunity/'.$opportunity_id);
    }

    //Last Tasks

    public function InformClient(Request $request)
    {
        $opportunity_id = $request->input('opportunity_id');
        $opportunity = Opportunity::find($opportunity_id);
        $task_id = $opportunity->InformClient->id;

        $task = InformClient::find($task_id);
        $task->status = $request->input('status');
        $task->save();

        $updates = new Updates();        
        $updates->user_id = auth()->user()->id;
        $updates->opportunity_id = $opportunity_id;
        $updates->comments = $request->input('comments');
        $updates->save();

        if ($request->input('status') == 1){
        $end ="Closed";
        $opportunity->status = $end;
        $opportunity->save();  
        return redirect('/opportunity/'.$opportunity_id);
        }else{
            return redirect('/opportunity/'.$opportunity_id);
        }


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

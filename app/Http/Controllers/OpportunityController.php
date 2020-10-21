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

class OpportunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::find($id);
        return $user->opportunity;
    }

    public function main()
    {
        $user_id = auth()->user()->id;
        $opportunity = Opportunity::query()->where('user_id',$user_id)->latest()->get();
        //$opportunity = auth()->user()->opportunity; 
        return view('total')->with('opportunity',$opportunity);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

     return view('new_opportunity');
   

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        //Updates::create($request->all());

        
        //static variables
        //$user_id = auth()->user()->id;
        //add Opportunity
        $track_id = rand(10000,9999999);
        $opp = new Opportunity();
        //$opp->account_no = $request->input('account_no');
        //$opp->opportunity_no = $request->input('opportunity_no');

        $opp->track_id = $track_id;
        $opp->user_id = $request->user_id;
        $opp->clientName = $request->clientName;
        $opp->companyRegId = $request->companyRegId;
        $opp->companyName = $request->companyName;
        $opp->vat = $request->vat;
        $opp->physicalAddress = $request->physicalAddress;
        $opp->postalAddress = $request->postalAddress;
        $opp->billingAddress = $request->billingAddress;
        $opp->status = "Opened";
        $opp->save(); 

        //add CreditHistory
        $items = DB::table('opportunities')->select('id')->where('track_id',$track_id)->get();

        foreach($items as $item){

        $opportunity_id = $item->id;

        $cred = new CreditHistory();
        $cred->opportunity_id = $opportunity_id;
        $cred->servicesRequested = $request->servicesRequested;
        $cred->quoteSigned = $request->quoteSigned;
        $cred->quoteSigner = $request->quoteSigner;
        $cred->authorizedSigner = $request->authorizedSigner;
        $cred->customerOrderForm = $request->customerOrderForm;
        $cred->MRC = $request->MRC;
        $cred->creditLimit = $request->creditLimit;
        $cred->comments = $request->comments;
        $cred->save();

        //add CustomerOrder
        $order = new CustomerOrder();
        $order->opportunity_id = $opportunity_id;
        $order->servicesRequested = $request->servicesRequested2;
        $order->quoteSigned = $request->quoteSigned2;
        $order->quoteSigner = $request->quoteSigner2;
        $order->authorizedSigner = $request->authorizedSigner2;
        $order->customerOrderForm = $request->customerOrderForm2;
        $order->MRC = $request->MRC2;
        $order->creditLimit = $request->creditLimit2;
        $order->cycle = $request->cycle;
        $order->save();

        
        //add CreditManager
        $manager = new CreditManager();
        $manager->opportunity_id = $opportunity_id;
        $manager->managerName = $request->managerName;
        $manager->refNo = $request->refNo;
        $manager->vettingSuccessful = $request->vettingSuccessful;
        $manager->depositRequired = $request->depositRequired;
        $manager->comments = $request->comments2;
        $manager->reason = $request->reason;
        $manager->approval = $request->approval;
        $manager->approvalMD = $request->approvalMD;
        $manager->save();

        //Expiry
        $today = date('Y-m-d H:i:s');
        $carbon_date = Carbon::parse($today);
        $expiry = $carbon_date->addHours(12);
    

        //Creating Tasks
        $cof2admin = new Cof2Admin();
        $cof2admin->opportunity_id = $opportunity_id;
        $cof2admin->user_id = $request->user_id;
        $cof2admin->expiry = $expiry;
        $cof2admin->status=0;
        $cof2admin->save();

        $cof2client = new Cof2Client();
        $cof2client->opportunity_id = $opportunity_id;
        $cof2client->user_id = $request->user_id;
        $cof2client->expiry = $expiry;
        $cof2client->status = 0;
        $cof2client->save();

        $follow = new FollowUp();
        $follow->opportunity_id = $opportunity_id;
        $follow->user_id = $request->user_id;
        $follow->expiry = $expiry;
        $follow->status = 0;
        $follow->save();

        $receive = new ReceiveCof();
        $receive->opportunity_id = $opportunity_id;
        $receive->user_id = $request->user_id;
        $receive->expiry = $expiry;
        $receive->status = 0;
        $receive->save();

        $inform = new InformClient();
        $inform->opportunity_id = $opportunity_id;
        $inform->user_id = $request->user_id;
        $inform->expiry = $expiry;
        $inform->status = 0;
        $inform->save();
 
        }

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
        return view('single')->with('opportunity',$opportunity);
    }

    public function receivecof()
    {
        $user_id = auth()->user()->id;
        $tasks = ReceiveCof::query()->where([
            'status'=>'0',
            'user_id'=> $user_id
            ])->latest()->get();
        return view('receive_cof')->with('tasks',$tasks);
    }

    public function cof2client()
    {
        $user_id = auth()->user()->id;
        $tasks = Cof2Client::query()->where([
            'status'=>'0',
            'user_id'=> $user_id
            ])->latest()->get();
        return view('cof2Client')->with('tasks',$tasks);
    }

    public function followups()
    {
        $user_id = auth()->user()->id;
        $tasks = FollowUp::query()->where([
            'status'=>'0',
            'user_id'=> $user_id
            ])->latest()->get();
        return view('followups')->with('tasks',$tasks);
    }

    public function cof2admin()
    {
        $user_id = auth()->user()->id;
        $tasks = Cof2Admin::query()->where([
            'status'=>'0',
            'user_id'=> $user_id
            ])->latest()->get();
        return view('cof2Admin')->with('tasks',$tasks);
    }

    public function inform()
    {
        $user_id = auth()->user()->id;
        $tasks = InformClient::query()->where([
            'status'=>'0',
            'user_id'=> $user_id
            ])->latest()->get();
        return view('inform')->with('tasks',$tasks);
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

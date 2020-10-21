<?php

/*
    public function store(Request $request)
    {
    
        //Updates::create($request->all());

        
        //static variables
        $user_id = auth()->user()->id;
        //add Opportunity
        $track_id = rand(10000,9999999);
        $opp = new Opportunity();
        //$opp->account_no = $request->input('account_no');
        //$opp->opportunity_no = $request->input('opportunity_no');
        $opp->track_id = $track_id;
        $opp->clientName = $request->input('clientName');
        $opp->companyRegId = $request->input('companyRegId');
        $opp->companyName = $request->input('companyName');
        $opp->vat = $request->input('vat');
        $opp->physicalAddress = $request->input('physicalAddress');
        $opp->postalAddress = $request->input('postalAddress');
        $opp->billingAddress = $request->input('billingAddress');
        $opp->status = "Opened";
        $opp->save(); 

        //add CreditHistory
        $opportunity_id = DB::table('opportunities')->select('id')->where('track_id',$track_id)->get();
        $cred = new CreditHistory();
        $cred->opportunity_id = $opportunity_id;
        $cred->servicesRequested = $request->input('servicesRequested');
        $cred->quoteSigned = $request->input('quoteSigned');
        $cred->quoteSigner = $request->input('quoteSigner');
        $cred->authorizedSigner = $request->input('authorizedSigner');
        $cred->customerOrderForm = $request->input('customerOrderForm');
        $cred->MRC = $request->input('MRC');
        $cred->creditLimit = $request->input('creditLimit');
        $cred->comments = $request->input('comments');
        $cred->save();

        //add CustomerOrder
        $oder = new CustomerOrder();
        $order->opportunity_id = $opportunity_id;
        $order->servicesRequested = $request->input('servicesRequested2');
        $order->quoteSigned = $request->input('quoteSigned2');
        $order->quoteSigner = $request->input('quoteSigner2');
        $order->authorizedSigner = $request->input('authorizedSigner2');
        $order->customerOrderForm = $request->input('customerOrderForm2');
        $order->MRC = $request->input('MRC2');
        $order->creditLimit = $request->input('creditLimit2');
        $order->cycle = $request->input('cycle');
        $order->save();

        //add CreditManager
        $manager = new CreditManager();
        $manager->opportunity_id = $opportunity_id;
        $manager->managerName = $request->input('managerName');
        $manager->refNo = $request->input('refNo');
        $manager->vettingSuccessful = $request->input('vettingSuccessful');
        $manager->depositRequired = $request->input('depositRequired');
        $manager->comments = $request->input('comments2');
        $manager->reason = $request->input('reason');
        $manager->approval = $request->input('approval');
        $manager->approvalMD = $request->input('approvalMD');
        $manager->save();

        //add Tasks
        $task = new Tasks();
        $task->opportunity_id = $opportunity_id;
        $task->save();

        //Creating Tasks
        $cof2admin = new Cof2Admin();
        $cof2admin->opportunity_id = $opportunity_id;
        $cof2admin->user_id = $user_id;
        $cof2admin->status=0;
        $cof2admin->save();

        $cof2client = new Cof2Client();
        $cof2client->opportunity_id = $opportunity_id;
        $cof2client->user_id = $user_id;
        $cof2client->status = 0;
        $cof2client->save();

        $follow = new FollowUp();
        $follow->opportunity_id = $opportunity_id;
        $follow->user_id = $user_id;
        $follow->status = 0;
        $follow->save();

        $receive = new ReceiveCof();
        $receive->opportunity_id = $opportunity_id;
        $receive->user_id = $user_id;
        $receive->status = 0;
        $receive->save();

        $inform = new InformClient();
        $inform->opportunity_id = $opportunity_id;
        $inform->user_id = $user_id;
        $inform->status = 0;
        $inform->save();

        return 1;
        
        
    }
<?php

namespace App\Http\Controllers;

use App\School;
use App\Banking;
use App\Shop;
use App\Docs;
use Illuminate\Http\Request;

class RedHeartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::query()->where('user_id',auth()->user()->id)->paginate(10);
        return view('red_total')->with('schools',$schools);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new_red');
    }

    public function docs(Request $request, $id)
    {
        $user_id = auth()->user()->id;
        $document = $request->url->store('uploads','public');

        $docs = new Docs();
        $docs->user_id = $user_id;
        $docs->school_id = $id;
        $docs->title = $request->input('title');
        $docs->url = $document;
        $docs->save();
        return redirect()->back()->with('success', 'Document Uploaded Successfully'); 
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $string = str_shuffle($pin);
        //-------end generating pin
        //return $string;

       $school = new School();
       $school->user_id= $user_id;
       $school->name= $request->input('name');
       $school->contact= $request->input('contact');
       $school->learners= $request->input('learners');
       $school->phone= $request->input('phone');
       //$school->fax= $request->input('name');
       $school->email= $request->input('email');
       $control = $request->input('email');
       $school->address= $request->input('address');
       $school->city= $request->input('city');
       $school->state= $request->input('state');
       $school->postcode= $request->input('postcode');
       $school->duration= $request->input('postcode');
       $school->type= $request->input('type');
       $school->internet= $request->input('access');
       $school->provider= $request->input('isp');
       $school->provider_co= $request->input('ispcontact');
       $school->terms= $request->input('terms');
       $school->save();

       $school_id =$school->id;

       $shopowner = new Shop();
       $shopowner->school_id = $school_id;
       $shopowner->ownership = $request->input('ownership');
       $shopowner->name = $request->input('ownername');
       $shopowner->address = $request->input('owneraddress');
       $shopowner->postcode = $request->input('ownerpostcode');
       $shopowner->phone = $request->input('ownerphone');
       $shopowner->fax = $request->input('ownerfax');
       $shopowner->email = $request->input('owneremail');
       $shopowner->city = $request->input('ownercity');
       $shopowner->save();

       $bankings = new Banking();
       $bankings->school_id = $school_id;
       $bankings->name = $request->input('bank');
       $bankings->branch = $request->input('branch');
       $bankings->code = $request->input('code');
       $bankings->account = $request->input('account');
       $bankings->type = $request->input('accountype');
       $bankings->method = $request->input('method');
       $bankings->save();
       
       $request->session()->put('key', $control);

       //$sales = 'channelpartners@afrigoteltech.co.za';
       //Mail::to($sales)->send(new Alert());
       //Mail::to($control)->send(new PocketCashMail());
       return redirect()->back()->with('success', 'School Recorded Successfully'); 
      // return $control;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $school = School::find($id);
        return view('school')->with('school',$school);
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

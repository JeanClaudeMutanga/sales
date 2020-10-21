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
use App\Fibre;
use App\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function index()
    {
        $today = date('Y-m-d');
        
        //Today Fibre
        $fibre_today = DB::table('fibres')->where('created_at','LIKE','%'.$today.'%')->get();
        //Red Heart Today
        $red_today = DB::table('schools')->where('created_at','LIKE','%'.$today.'%')->get();
        
        $opportunities_today = DB::table('opportunities')->where('created_at','LIKE','%'.$today.'%')->get();
        $opportunities = Opportunity::latest()->get();

        //receiving_cof
        $receivingcof_done = ReceiveCof::query()->where('status','1')->count();
        if($receivingcof_done ==0)
        {
            $receivingcof_percentage=0;
        }else{
            $receivingcof_total = ReceiveCof::query()->count();
            $receivingcof_percentage = round(($receivingcof_done/$receivingcof_total)*100);
        }
        

        //Cof2Client
        $cof2client_done = Cof2Client::query()->where('status','1')->count();
        if($cof2client_done==0){
            $cof2client_percentage=0;
        }else{
            $cof2client_total = Cof2Client::query()->count();
            $cof2client_percentage = round(($cof2client_done/$cof2client_total)*100);
        }
        

        //Follow Up with Client
        $FollowUp_done = FollowUp::query()->where('status','1')->count();
        if($FollowUp_done==0){
            $FollowUp_percentage=0;
        }else{
            $FollowUp_total = FollowUp::query()->count();
            $FollowUp_percentage = round(($FollowUp_done/$FollowUp_total)*100);
        }
        

        //Cof2Admin
        $Cof2Admin_done = Cof2Admin::query()->where('status','1')->count();
        if($Cof2Admin_done==0){
            $Cof2Admin_percentage=0;
        }else{
            $Cof2Admin_total = Cof2Admin::query()->count();
            $Cof2Admin_percentage = round(($Cof2Admin_done/$Cof2Admin_total)*100);
        }
        

        //InformClient
        $InformClient_done = InformClient::query()->where('status','1')->count();
        if($InformClient_done ==0){
            $InformClient_percentage=0;
        }else{
            $InformClient_total = InformClient::query()->count();
            $InformClient_percentage = round(($InformClient_done/$InformClient_total)*100);
        }
        

        //Open Tasks
        $rez1 = ReceiveCof::query()->where('status','0')->count();
        $rez2 = Cof2Client::query()->where('status','0')->count();
        $rez3 = FollowUp::query()->where('status','0')->count();
        $rez4 = Cof2Admin::query()->where('status','0')->count();
        $rez5 = InformClient::query()->where('status','0')->count();

        $totals = $rez1+$rez2+$rez3+$rez4+$rez5;

        $year = 2020;
        $result = School::selectRaw('year(created_at) year, monthname(created_at) month, count(*) data')->where('created_at','like','%'.$year.'%')
                ->groupBy('year', 'month')
                ->orderBy('month', 'desc')
                ->get();

        $fibre = Fibre::selectRaw('year(created_at) year, monthname(created_at) month, count(*) data')->where('created_at','like','%'.$year.'%')
                ->groupBy('year', 'month')
                ->orderBy('month', 'desc')
                ->get();
                
        $connect = Fibre::all();
        $kids = School::all();


        
        $account = auth()->user()->account;
        $user_id = auth()->user()->id;
        if($account == "manager")
        {
            return view('management.home')->with([
                'opportunities' => $opportunities,
                'today' => $opportunities_today,
                'receive_cof' => $receivingcof_percentage,
                'cof2client' => $cof2client_percentage,
                'followup'=> $FollowUp_percentage,
                'cof2admin' => $Cof2Admin_percentage,
                'inform' => $InformClient_percentage,
                'total_tasks' => $totals,
                'fibre' => $fibre,
                'result' =>$result,
                'fibre_today' => $fibre_today,
                'red_today' => $red_today,
                'connect' => $connect,
                'kids' => $kids
            ]);
        }

        elseif($account == "external")
        {
            return view('external.home')->with([
                'opportunities' => $opportunities,
                'today' => $opportunities_today,
                'receive_cof' => $receivingcof_percentage,
                'cof2client' => $cof2client_percentage,
                'followup'=> $FollowUp_percentage,
                'cof2admin' => $Cof2Admin_percentage,
                'inform' => $InformClient_percentage,
                'total_tasks' => $totals,
                'result' =>$result
            ]);
        }
        elseif($account == "sales"){
            //receiving_cof
            $receivingcof_done = ReceiveCof::query()->where(['status'=>'1', 'user_id'=>$user_id])->count();
            if($receivingcof_done == 0){
                $receivingcof_percentage = 0;
            }else{
                $receivingcof_total = ReceiveCof::query()->where('user_id',$user_id)->count();
                $receivingcof_percentage = round(($receivingcof_done/$receivingcof_total)*100);
            }
            

            //Cof2Client
            $cof2client_done = Cof2Client::query()->where(['status'=>'1', 'user_id'=>$user_id])->count();
            if($cof2client_done ==0){
                $cof2client_percentage =0;
            }else{
                $cof2client_total = Cof2Client::query()->where('user_id',$user_id)->count();
                $cof2client_percentage = round(($cof2client_done/$cof2client_total)*100);
            }
            

            //Follow Up with Client
            $FollowUp_done = FollowUp::query()->where(['status'=>'1', 'user_id'=>$user_id])->count();
            if($FollowUp_done ==0){
                
                $FollowUp_percentage = 0;
            }else{
                $FollowUp_total = FollowUp::query()->where('user_id',$user_id)->count();
                $FollowUp_percentage = round(($FollowUp_done/$FollowUp_total)*100);
            }
            

            //Cof2Admin
            $Cof2Admin_done = Cof2Admin::query()->where(['status'=>'1', 'user_id'=>$user_id])->count();
            if($Cof2Admin_done ==0){
                $Cof2Admin_percentage=0;
            }else{
                $Cof2Admin_total = Cof2Admin::query()->where('user_id',$user_id)->count();
                $Cof2Admin_percentage = round(($Cof2Admin_done/$Cof2Admin_total)*100);
            }
            

            //InformClient
            $InformClient_done = InformClient::query()->where(['status'=>'1', 'user_id'=>$user_id])->count();
            if($InformClient_done==0){
                $InformClient_percentage=0;
            }else{
                $InformClient_total = InformClient::query()->where('user_id',$user_id)->count();
                $InformClient_percentage = round(($InformClient_done/$InformClient_total)*100);
            }
            
            return view('home')->with([
                'opportunities' => $opportunities,
                'today' => $opportunities_today,
                'receive_cof' => $receivingcof_percentage,
                'cof2client' => $cof2client_percentage,
                'followup'=> $FollowUp_percentage,
                'cof2admin' => $Cof2Admin_percentage,
                'inform' => $InformClient_percentage,
                'total_tasks' => $totals
            ]);
        }elseif($account=="admin")
        {

             //receiving_cof
             $receivingcof_done = ReceiveCof::query()->where(['status'=>'1'])->count();
             if($receivingcof_done == 0){
                 $receivingcof_percentage = 0;
             }else{
                 $receivingcof_total = ReceiveCof::all()->count();
                 $receivingcof_percentage = round(($receivingcof_done/$receivingcof_total)*100);
             }
             
 
             //Cof2Client
             $cof2client_done = Cof2Client::query()->where(['status'=>'1'])->count();
             if($cof2client_done ==0){
                 $cof2client_percentage =0;
             }else{
                 $cof2client_total = Cof2Client::all()->count();
                 $cof2client_percentage = round(($cof2client_done/$cof2client_total)*100);
             }
             
 
             //Follow Up with Client
             $FollowUp_done = FollowUp::query()->where(['status'=>'1'])->count();
             if($FollowUp_done ==0){
                 
                 $FollowUp_percentage = 0;
             }else{
                 $FollowUp_total = FollowUp::all()->count();
                 $FollowUp_percentage = round(($FollowUp_done/$FollowUp_total)*100);
             }
             
 
             //Cof2Admin
             $Cof2Admin_done = Cof2Admin::query()->where(['status'=>'1'])->count();
             if($Cof2Admin_done ==0){
                 $Cof2Admin_percentage=0;
             }else{
                 $Cof2Admin_total = Cof2Admin::all()->count();
                 $Cof2Admin_percentage = round(($Cof2Admin_done/$Cof2Admin_total)*100);
             }
             
 
             //InformClient
             $InformClient_done = InformClient::query()->where(['status'=>'1'])->count();
             if($InformClient_done==0){
                 $InformClient_percentage=0;
             }else{
                 $InformClient_total = InformClient::all()->count();
                 $InformClient_percentage = round(($InformClient_done/$InformClient_total)*100);
             }

            $date = date("Y-m-d h:i:s");
            $ReceiveCof_data = ReceiveCof::query()->whereDate('expiry','<',$date)->count();
            $Cof2Client_data = Cof2Client::query()->whereDate('expiry','<',$date)->count();
            $FollowUp_data = FollowUp::query()->whereDate('expiry','<',$date)->count();
            $Cof2Admin_data = Cof2Admin::query()->whereDate('expiry','<',$date)->count();
            $InformClient_data = InformClient::query()->whereDate('expiry','<',$date)->count();

            //return $receivecof;
            $users = User::all();
            $opportunities = Opportunity::all();
            return view('admin.home')->with([
                'opportunities'=>$opportunities,
                
                'ReceiveCof_data'=> $ReceiveCof_data,
                'Cof2Client_data'=> $Cof2Client_data,
                'FollowUp_data'=> $FollowUp_data,
                'Cof2Admin_data'=> $Cof2Admin_data,
                'InformClient_data'=> $InformClient_data,
                
                'receive_cof' => $receivingcof_percentage,
                'cof2client' => $cof2client_percentage,
                'followup'=> $FollowUp_percentage,
                'cof2admin' => $Cof2Admin_percentage,
                'inform' => $InformClient_percentage,
                'schools' => $result,
                'fibre' =>$fibre
                ]);
        }elseif($account==""){
            return view('auth.pending');
        }
            
    }
}


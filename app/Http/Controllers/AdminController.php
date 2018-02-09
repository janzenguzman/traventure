<?php

namespace App\Http\Controllers;

use App\Agents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Charts;
use Datatables;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

     public function showHomePage(){
        $totalAccredited = DB::table('agents')->where('status', 'Accepted')->count();
        $totalActive = DB::table('agents')->where([['active', 1],['status', 'Accepted']])->count();
        $totalInactive = DB::table('agents')->where([['active', 0],['status', 'Accepted']])->WhereNotNull('last_signed_in')->count();
        $totalRequests = DB::table('agents')->where('status', 'Pending')->count();

        $chart = Charts::create('area', 'highcharts')
                ->title('COMPANY OVERVIEW')
                ->elementLabel('Total')
                ->labels(['Accredited Companies', 'Active Companies', 'Inactive Companies'])
                ->values([$totalAccredited, $totalActive, $totalInactive])
                ->dimensions(50, 100)
                ->responsive(true);

        $now = Carbon::now();
        $agents = Agents::all();
        
        foreach($agents as $agent){
            $lastSignedIn = new Carbon($agent->last_signed_in);
            $diffMonths = $lastSignedIn->diffInMonths($now);
            if($diffMonths < 12){
                DB::table('agents')->where([['id', $agent->id], ['status', 'Accepted']])
                    ->whereNotNull('last_signed_in')
                    ->update(['active' => 1]);
            }elseif($diffMonths >= 12){
                DB::table('agents')->where([['id', $agent->id], ['status', 'Accepted']])
                    ->whereNotNull('last_signed_in')
                    ->update(['active' => 0]);
            }
        }


        return view ('\Admin\HomePage', ['totalAccredited' => $totalAccredited, 'totalActive' => $totalActive,
            'totalInactive' => $totalInactive, 'totalRequests' => $totalRequests, 'chart' => $chart]);
    }

    public function showRequestsPage(){
        $totalRequests = DB::table('agents')->where('status', 'Pending')->count();
        return view ('\Admin\RequestsPage', ['totalRequests' => $totalRequests]);
    }

    public function showStatusPage(){
        $totalRequests = DB::table('agents')->where('status', 'Pending')->count();
        return view ('\Admin\StatusPage', ['totalRequests' => $totalRequests]);
    }

    public function requests($id, $action){
        if($action == 'accept'){
             DB::table('agents')->where('id', $id)->update(['status' => 'Accepted']);
             return redirect()->back()->with('accepted', 'Request Successfully Accepted!');
        }else{
             DB::table('agents')->where('id', $id)->update(['status' => 'Declined']);
             return redirect()->back()->with('declined', 'Request Successfully Declined!');
        }
    }

    public function deactivateAgent(Request $request){
        $id = $request->input('id');
        $agents = DB::table('agents')->where('id', $id)->get();
            foreach($agents as $agent){
                DB::table('deleted_agents')->insert(
                    [
                        'id' => $agent->id,
                        'company_name' => $agent->company_name,
                        'fname' => $agent->fname,
                        'lname' => $agent->lname,
                        'job_position' => $agent->job_position,
                        'contact_no' => $agent->contact_no,
                        'email' => $agent->email,
                        'password' => $agent->password,
                        'status' => $agent->status,
                        'remember_token' => $agent->remember_token,
                        'created_at' => $agent->created_at,
                        'updated_at' => $agent->updated_at,
                    ]
                );
            }
        DB::table('agents')->where('id', $id)->delete();
        return redirect()->back()->with('deactivated', 'Succesfully Deactivated!');
    }

    public function declineAgent(Request $request){
        $id = $request->input('id');
        $agents = DB::table('agents')->where('id', $id)->get();
            foreach($agents as $agent){
                DB::table('deleted_agents')->insert(
                    [
                        'id' => $agent->id,
                        'company_name' => $agent->company_name,
                        'fname' => $agent->fname,
                        'lname' => $agent->lname,
                        'job_position' => $agent->job_position,
                        'contact_no' => $agent->contact_no,
                        'email' => $agent->email,
                        'password' => $agent->password,
                        'status' => $agent->status,
                        'remember_token' => $agent->remember_token,
                        'created_at' => $agent->created_at,
                        'updated_at' => $agent->updated_at,
                    ]
                );
            }
        DB::table('agents')->where('id', $id)->delete();
        return redirect()->back()->with('deactivated', 'Succesfully Deactivated!');
    }


    // DATATABLE REQUESTS

    public function requestsDatatable(){
        $requests = DB::table('agents')->where('status', 'Pending')->get();
       
        return Datatables::of($requests)
               ->editColumn('applicant', function($row){
                   return $row->fname.' '.$row->lname;
               })
               ->addColumn('action', function($row){
                   if($row->status == 'Pending'){
                       return '<a href= "'.route("requests", ["id" => $row->id, "action" => "accept"]).'" class="btn btn-info btn-circle" style="margin-right:20%"><i class="fa fa-check"></i></a>
                       <a type="submit" data-toggle="modal" data-target="#declineModal" data-id="'.$row->id.'" id="declineButton" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>';
                   }else if($row->status == 'Accepted'){
                       return '<span class="label label-table label-success">Accepted</span>';
                   }else{
                       return '<span class="label label-table label-danger">Declined</span>';
                   }                
               })
               ->make(true);

               
                        
   }

   public function accreditedDatatable(){
        $accredited = DB::table('agents')->where('status', 'Accepted')->get();
    
        return Datatables::of($accredited)
                ->editColumn('name', function($row){
                    return '<span class="text-semibold">'.$row->fname." ".$row->lname.'</span>
                    <br>
                    <small class="text-muted">'.$row->job_position.'</small>';
                })
                ->editColumn('status', function($row){
                    return '<center><span class="label label-table label-success">Accepted</span></center>';
                })
                ->rawColumns(['name', 'status'])
                ->make(true);
   }

   public function activeDatatable(){
        $active = DB::table('agents')->where([
                    ['active', 1],
                    ['status', 'Accepted']
                    ])->get();

        return Datatables::of($active)
            ->editColumn('name', function($row){
                return '<span class="text-semibold">'.$row->fname." ".$row->lname.'</span>
                <br>
                <small class="text-muted">'.$row->job_position.'</small>';
            })
            ->editColumn('status', function($row){
                // $now = Carbon::now();
                // $lastSignedIn = new Carbon($row->last_signed_in);
                // $diffHours = $lastSignedIn->diffInHours($now);

                // if($diffHours < 1){
                //     return '<center><span class="label label-table label-primary">Active</span></center>';
                // }else{
                //     return DB::table('agents')->where('id', $row->id)->update(['active' => 0]);                    
                // }
                return '<center><span class="label label-table label-primary">Active</span></center>';
            })
            ->rawColumns(['name', 'status'])
            ->make(true);
    }

    public function inactiveDatatable(){
        $inactive = DB::table('agents')->where([
            ['active', 0],
            ['status', 'Accepted']
            ])
            ->WhereNotNull('last_signed_in')
            ->get();

        return Datatables::of($inactive)
            ->editColumn('name', function($row){
                return '<span class="text-semibold">'.$row->fname." ".$row->lname.'</span>
                <br><small class="text-muted">'.$row->job_position.'</small>';
            })
            ->editColumn('status', function($row){
                $now = Carbon::now();
                $lastSignedIn = new Carbon($row->last_signed_in);
                $diffMonths = $lastSignedIn->diffInMonths($now);
                

                if($diffMonths == 12){
                    return '<center><span class="label label-table label-warning">Inactive</span>
                    <br><small class="text-muted text-semibold">'.$diffMonths.' month ago</small></center>';
                }else if($diffMonths > 12){
                    return '<center><span class="label label-table label-warning">Inactive</span>
                    <br><small class="text-muted text-semibold">'.$diffMonths.' months ago</small></center>';
                }
                
                // else if($diffHours >=0){
                //     return DB::table('agents')->where('id', $row->id)->update(['active' => 0]);
                // }else{
                //     return DB::table('agents')->where('id', $row->id)->update(['active' => 1]);
                // }
            })
            ->addColumn('action', function($row){   
                return '<center>
                <a type="submit" data-toggle="modal" data-target="#deactivateModal" data-id="'.$row->id.'" id="deactivateButton" class="btn btn-default btn-xs">Deactivate</a><center>';
            })
            ->rawColumns(['name', 'status', 'action'])
            ->make(true);
    }
}
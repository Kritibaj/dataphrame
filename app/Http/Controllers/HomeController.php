<?php

namespace BPMS\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use Session;
use BPMS\JobOrder;
use BPMS\User;

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

        $job = array();

        $data = array(
            'jobs' => '',
            'today'=> '',
            'week'=> '',
            'month'=>'',
            'graph'=>''

        );

        $jobs = JobOrder::groupBy("status")
                            ->get(array(
                            DB::raw('status,COUNT(status) as "cdata"')
            ));


        foreach($jobs as $val){
            if($val->status == 0){
                $job[] = array('label'=>"Not posted Jobs",'value' => $val->cdata);
            }else if($val->status == 1){
                $job[] = array('label'=>"Posted Jobs",'value'=> $val->cdata);
            }else if($val->status == 2){
                $job[] = array('label'=>"Execution Started",'value' => $val->cdata);
            }
        }


        $jobsdata = JobOrder::orderBy('created_at', 'ASC')

            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))
            // ->take(10)
            ->get(array(
                DB::raw('Date(created_at) as date'),
                DB::raw('COUNT(*) as "views"')
            ));

        $today = 0;
        $week = 0;
        $mdata = 0;
        $cdata  = array();
        $month = date('m');
        $t = strtotime(date("Y-$month-d",strtotime("-1 days")));
        $w = strtotime(date("Y-$month-d",strtotime("-7 days")));
        $m = strtotime(date("Y-$month-01"));

        foreach($jobsdata as $jgraph){
           $create = strtotime($jgraph->date);
           $isAct = false;
            if( $t <= $create){
                 $today = $today + $jgraph->views;
                 //array_push($cdata,$jgraph->views);
                 $isAct = true;
            }
            if( $w <= $create){
                $week = $week + $jgraph->views;
                //array_push($cdata,$jgraph->views);
                $isAct = true;
            }
            if( $m <= $create){
                $mdata=$mdata + $jgraph->views;
                $isAct = true;
            }
            if( $isAct ){
                array_push($cdata,$jgraph->views);
            }

        }

        if(Auth::user()['roles'][0]['name'] == 'Accounts' || Auth::user()['roles'][0]['name'] == 'Admin'){
            $data = array(
                            'jobs' => json_encode($job),
                            'today'=> $today,
                            'week'=> $week,
                            'month'=>$mdata,
                            'graph'=>implode(',',$cdata)

                        );

        };
        //die(print_r($data));
        return view('home',$data);
    }
}

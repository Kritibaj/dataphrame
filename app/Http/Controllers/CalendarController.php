<?php

namespace BPMS\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        return view('calendar');
    }
}

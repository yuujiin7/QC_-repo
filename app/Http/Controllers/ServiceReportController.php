<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ServiceReport;
use App\Models\SR;

use Illuminate\Http\Request;

class ServiceReportController extends Controller
{
    public function index()
    {

        // $data = Tsg::all();
        // $data = Tsg::where('age','>','20') -> orderBy('first_name', 'asc') -> get();
        // dd($data);
        // $data = DB::table('tsgs') 
        //         -> select(DB::raw('count(*) as gender_count, gender'
        //         )) -> groupBy('gender') -> get();

        $data = ServiceReport::where('id', 10) -> firstOrFail() -> get();


        return view('service_report.index', ['service_reports' => $data]);
    }

    public function show($id)
    {
        $data = ServiceReport::findOrFail($id);
        dd($data);
        return view('service_report.show', ['service_reports' => $data]);
    }

   
}

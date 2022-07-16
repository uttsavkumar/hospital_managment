<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Doctors;
use App\Models\Patients;
use App\Models\Staffs;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    public function home(){
         $data['branch'] = Branch::all();
         $data['patient'] = Patients::all();
         $data['staff'] = Staffs::all();

        return view('Doctor.home',$data);
    }
    public function nav(){
        $data['branch'] = Branch::all();
        return view('Doctor.docnav',$data);
    }
    public function graph($id){
        //incomplete
        $data['branch'] = Branch::all();
        $pat= Patients::where('branch_id',$id)->get();
        $date = [];
        foreach($pat as $p){
            $d = $p->created_at->format('d-m-Y');
          if($d == $p->created_at->format('d-m-Y') ){
            $date['date'][] = $p->created_at->format('d-m-Y');
            if($count = Patients::where('created_at',$p->created_at)->get()->count()){
                $date['count'][] = $count;
            }
            $d = $p->created_at->format('d-m-Y');
          }
           
        }
        $data['chart_data'] = json_encode($date); 
        return view('Doctor.graph',$data);
    }
}

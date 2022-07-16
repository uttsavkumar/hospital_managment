<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use App\Models\Staffs;
use Illuminate\Http\Request;

class StaffsController extends Controller
{
   
    public function index(Request $request)
    {
        $staff = Staffs::where('staff_email',$request->session()->get('staff_email'))->first();
        $data['patients'] = Patients::where('staffs_id',$staff->id)->count();
        return view('Staff.home',$data);
    }

    public function patient(Request $request){
        $staff = Staffs::where('staff_email',$request->session()->get('staff_email'))->first();
        $data['patient'] = Patients::where('staffs_id',$staff->id)->get();
        return view('Staff.patient',$data);
    }
    public function create()
    {
    return view('Staff.patientinsert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $staff = Staffs::where('staff_email',$request->session()->get('staff_email'))->first();

        $pat = new Patients();
        $pat->patient_name = $request->name;
        $pat->patient_phone_no = $request->phone;
        $pat->patient_age = $request->age;
        $pat->branch_id = $staff->branch_id;
        $pat->staffs_id = $staff->id;
        $pat->save();

        return redirect()->route('staff.patient');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staffs  $staffs
     * @return \Illuminate\Http\Response
     */
    public function show(Staffs $staffs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staffs  $staffs
     * @return \Illuminate\Http\Response
     */
    public function edit(Staffs $staffs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staffs  $staffs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staffs $staffs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staffs  $staffs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $p = Patients::find($id);
    $p->delete();
    return redirect()->route('staff.patient');   
    }
}

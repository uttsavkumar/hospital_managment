<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Doctors;
use App\Models\Staffs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function home(){ 
        $data['admin'] = User::all()->count();
        $data['staff'] = Staffs::all()->count();
        $data['doctor'] = Doctors::all()->count();
        return view('Admin.home',$data);
    }

    //branch logic
    public function branch(){
        $data = [
            'branch' => Branch::all(),
        ];
        return view('Admin.branch',$data);
    }

    public function deletebranch($id){
        $branch = Branch::find($id);
        $branch->delete();
        return redirect()->route('admin.branch');
    }

    public function insertbranch(Request $request){
       
        if($request->method() == 'POST'){
            $request->validate([
                'name' => 'required',
                'amount' => 'required'
            ]);

            $branch = new Branch();
            $branch->branch_name = $request->name;
            $branch->amount_per_patient = $request->amount;

            $branch->save();
            return redirect()->route('admin.branch');       
        }

        return view('Admin.branchinsert');
    }

    //doctor logic
    public function doctor(){
        $data = [
            'doctor' => Doctors::all(),
        ];
        return view('Admin.doctor',$data);
    }

    public function deletedoctor($id){
        $doc = Doctors::find($id);
        $doc->delete();
        return redirect()->route('admin.doctor');
    }

    public function insertdoctor(Request $request){
       
        if($request->method() == 'POST'){
            $email = $request->email;
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]);

            if($email){
                $admin = User::where('admin_email',$email)->first();
                if($admin){
                    echo"Email is already registered as admin";
                }
                else{
                    $staff = Staffs::where('staff_email',$email)->first();
                    if($staff){
                        echo"Email is already registered as staff";
                    }
                    else{
                        $doc = Doctors::where('doctor_email',$email)->first();
                        if($doc){
                            echo"Email is already registered as doc";
                        }
                        else{
                            $doc = new Doctors();
                            $doc->doctor_name = $request->name;
                            $doc->doctor_email = $request->email;
                            $doc->doctor_password = Hash::make($request->password);
                
                            $doc->save();
                            return redirect()->route('admin.doctor');  
                        }
                    }
                }
            }      
        }

        return view('Admin.doctorinsert');
    }
    //staff logic
    public function staff(){
        $data = [
            'staff' => Staffs::all(),
        ];
        return view('Admin.staff',$data);
    }

    public function deletestaff($id){
        $doc = Staffs::find($id);
        $doc->delete();
        return redirect()->route('admin.staff');
    }

    public function insertstaff(Request $request){
        
        $data['branch'] = Branch::all();

        if($request->method() == 'POST'){
            $email = $request->email;
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:6',
                'branch' => 'required'
            ]);

            if($email){
                $admin = User::where('admin_email',$email)->first();
                if($admin){
                    echo"Email is already registered as admin";
                }
                else{
                    $staff = Staffs::where('staff_email',$email)->first();
                    if($staff){
                        echo"Email is already registered as staff";
                    }
                    else{
                        $doc = Doctors::where('doctor_email',$email)->first();
                        if($doc){
                            echo"Email is already registered as doc";
                        }
                        else{
                            $doc = new Staffs();
                            $doc->staff_name = $request->name;
                            $doc->staff_email = $request->email;
                            $doc->staff_password = Hash::make($request->password);
                            $doc->branch_id = $request->branch;
                            $doc->save();
                            return redirect()->route('admin.staff');  
                        }
                    }
                }
            }      
        }
        return view('Admin.staffinsert',$data);
    }

    //admin
      public function newadmin(){
        $data = [
            'admin' => User::all(),
        ];
        return view('Admin.newadmin',$data);
    }

    public function deletenewadmin($id){
        $admin = User::find($id);
        $admin->delete();
        return redirect()->route('admin.newadmin');
    }

    public function insertnewadmin(Request $request){
        

        if($request->method() == 'POST'){
            $email = $request->email;
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);

            if($email){
                $admin = User::where('admin_email',$email)->first();
                if($admin){
                    echo"Email is already registered as admin";
                }
                else{
                    $staff = Staffs::where('staff_email',$email)->first();
                    if($staff){
                        echo"Email is already registered as staff";
                    }
                    else{
                        $doc = Doctors::where('doctor_email',$email)->first();
                        if($doc){
                            echo"Email is already registered as doc";
                        }
                        else{
                            $adm = new User();
                            $adm->admin_name = $request->name;
                            $adm->admin_email = $request->email;
                            $adm->admin_password = Hash::make($request->password);
                            $adm->save();
                            return redirect()->route('admin.newadmin');  
                        }
                    }
                }
            }      
        }
        return view('Admin.newadmininsert');
    }

}

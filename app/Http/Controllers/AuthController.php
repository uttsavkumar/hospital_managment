<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use App\Models\Staffs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        if ($request->method() == "POST") {

            $request->validate([
                'email' => 'email|required',
                'password' => 'required|min:6',
                'name' => 'required'
            ]);

            $admin = new User();
            $admin->admin_name = $request->name;
            $admin->admin_email = $request->email;
            $admin->admin_password = Hash::make($request->password);

            if ($admin->save()) {
                $request->session()->put('admin', $request->name);
                $request->session()->put('admin_email',$admin->admin_email);
                return redirect()->route('login');
            }
            return redirect()->route('register');
        }
        return view('Auth.register');
    }

    public function login(Request $request)
    {



        $email = $request->email;
        $password = $request->password;
        if ($request->method() == 'POST') {

            $flash = $request->session()->flash('password','Please enter a correct password ');

            $request->validate([
                'email' => 'email|required',
                'password' => 'required',
            ]);

            if ($admin = User::where('admin_email', $email)->first()) {
                $check = Hash::check($password, $admin->admin_password);
                if ($check) {
                    $request->session()->put('admin',$admin->admin_name);
                    $request->session()->put('admin_email',$admin->admin_email);
                    return redirect()->route('admin.home');
                } else {
                    echo $flash;
                }
            } else if ($doctor = Doctors::where('doctor_email', $email)->first()) {
                $check = Hash::check($password, $doctor->doctor_password);
                if ($check) {
                    $request->session()->put('doctor',$doctor->doctor_name);
                    $request->session()->put('doctor_email',$doctor->doctor_email);
                    return redirect()->route('doctor.home');
                } else {
                    echo $flash;
                }
            } else if ($staff = Staffs::where('staff_email', $email)->first()) {
                $check = Hash::check($password, $staff->staff_password);
                if ($check) {
                    $request->session()->put('staff',$staff->staff_name);
                    $request->session()->put('staff_branch',$staff->branch->branch_name);
                    $request->session()->put('staff_email',$staff->staff_email);
                    return redirect()->route('staff.index');
                } else {
                    echo $flash;
                }
            } else {
                $request->session()->flash(
                    'email',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close float-end"  data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>Incorrect!</strong>Please enter a registered email!
                </div>'
               
                );
            }
        }
        return view('Auth.login');
    }
    public function adminlogout(Request $request){
        $request->session()->forget(['admin','admin_email']);
       return redirect()->route('login');
    }

    public function stafflogout(Request $request){
        $request->session()->forget(['staff','staff_branch','staff_email']);
       return redirect()->route('login');
    }
    public function doctorlogout(Request $request){
        $request->session()->forget(['doctor','doctor_email']);
       return redirect()->route('login');
    }
}


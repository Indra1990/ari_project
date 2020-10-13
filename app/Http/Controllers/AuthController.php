<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Privileges;

class AuthController extends Controller
{
 

    public function login()
    {
        return view('contents.login.index');
    }

    public function do_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            $datauser = User::where('email',$request->email)->first();
            $datauser->last_login = date('Y-m-d H:i:s');
            $datauser->save();
            // user session 
            $alldata = [
                'idusers' => $datauser->idusers,
                'name' => $datauser->name,
                'email' => $datauser->email,
                'role' => $datauser->role,
            ];
            // privileges session
            $privileges = $this->get_user_privileges($datauser->idusers);
            // store session
            Session::put('users',$alldata);
            Session::put('privileges',$privileges);

            return redirect('/');
        }else{
            return redirect('login')->with('status_warning','email or password something went wrong');
        }


    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('login');
    }

    protected function get_user_privileges($idusers)
    {
        $data = [];
        //get privileges
        $privileges = Privileges::select('module_code')
            ->where('idusers',$idusers)
            ->get();

        //collect data
        foreach ($privileges as $pvl) {
            array_push($data, $pvl->module_code);
        }
        return $data;
    }

}

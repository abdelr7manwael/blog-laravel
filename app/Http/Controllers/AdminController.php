<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
class AdminController extends Controller
{
    public function index()
    {
        //
        $admins = Admin::get();
        return view('admins/list',['admins'=>$admins]);

    }


    public function create()
    {
        //
        return view('admins/create');
    }


    public function store(Request $request)
    {
        //

        $validator = \Validator::make($request->all(),[
            'username'=>'required||string|min:3',
            'email'=>'required|email|unique:App\Models\Admin,email',
            'password'=>'required|confirmed'
        ]);
        if($validator->fails()){
            return redirect('admins/create')
                ->withErrors($validator)
                ->withInput();
        }
        $admin = new Admin;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->password = \Hash::make($request->password);
        $admin->save();
        return redirect('admins/create');
    }




    public function destroy($id)
    {
        //
        $admin = Admin::find($id);
        $admin->delete();
        return redirect('admins/list');
    }

    function login(){
        if(Auth::user())
        {return redirect('admins/list');}
        return view('admins/login');
    }
    function handleLogin(Request $request){
        $validator = \Validator::make($request->all(),
        [
            'email'=>'required|email|string',
            'password'=>'required|string'
        ]);
        if($validator->fails()){
            return redirect('admins/login')
            ->withErrors($validator)
            ->withInputs();
        }
        $cred=array("email" =>$request->email,
        "password"=>$request->password);
        if(Auth::attempt($cred)){
            return redirect ('admins/list');
        }
        else{
            return redirect('admins/login')->withErrors([
                'email' => 'The provided credentials do not match our records.'])->withInput();
        }

    }

    function logout(){
        Auth::logout();
        return redirect('admins/login');
    }

}

<?php

namespace App\Http\Controllers\BackHome;

use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user)
    {


        return  'hello from backend';
    }

    public function checkUser(Request  $request)
    {

       $validator =  Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        return redirect()->back()->with('message' ,'success');

    }
}

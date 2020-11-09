<?php

namespace App\Http\Controllers\FrontHome;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function index(User $user)
    {



        $response = Http::get('https://jsonplaceholder.typicode.com/users')->json();
//        Session::flush();
//        Session::put('users' , $response);
        return view('home' ,['users'=> $response]);
    }

    public function postpo(Request  $request)
    {

        // file
        $file = $request->file('file');
        // file name
        $file_name =  time().'-'.$file->getClientOriginalName();
        // store file to local storage
        $file->move('files' , $file_name);
         File::delete(public_path('files/'.User::find(1)->file));
         User::find(1)->update(['file' => $file_name]);
        return redirect()->back();
    }
}

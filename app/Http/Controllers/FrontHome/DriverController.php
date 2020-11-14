<?php

namespace App\Http\Controllers\FrontHome;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class DriverController extends Controller
{
    public function getDriver($driver){
        return Socialite::driver($driver)->redirect();
    }

    public function getDriverCallBack($driver){
        return  $driver;
        return Socialite::with($driver)->user();
    }
}

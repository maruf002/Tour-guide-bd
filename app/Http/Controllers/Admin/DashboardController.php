<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use App\place;

class DashboardController extends Controller
{
    public function index(){
        $user= User::get();
        $total_post = place::get()->count();
        $pending = Place::where('approve',0)->count();
        return view('admin.dashboard',compact('user','total_post','pending'));
    }

    public function destroy($id){
      $user = User::where('id',$id)->delete();
      return redirect()->back();
     
    }
}

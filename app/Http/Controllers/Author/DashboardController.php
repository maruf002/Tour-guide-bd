<?php

namespace App\Http\Controllers\Author;

use App\place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
   public function index(){
    $total_post = place::where('user_id',Auth::id())->count();
    $pending = Place::where('approve',0)->count();
       return view('author.dashboard',compact('total_post','pending'));
   }
}
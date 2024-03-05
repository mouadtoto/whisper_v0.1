<?php

namespace App\Http\Controllers;

use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
    $pending = ModelsRequest::where('to_id' , auth()->user()->id)->where('status' , 'pending')->get();
    $friends = ModelsRequest::where('to_id' , auth()->user()->id)->where('status' , 'approved')->get();
    return view('friends' , ['pending'=>$pending , 'friends'=>$friends]) ; 
    }
}

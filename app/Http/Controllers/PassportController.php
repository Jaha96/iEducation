<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PassportController extends Controller
{
    public function index(){

    	return view('home');
    }
}
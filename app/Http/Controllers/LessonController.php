<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Go\Go;
use Illuminate\Support\Facades\Auth;


class ContentController extends Controller
{
    public function showList()
    {
        return view('lessonList');
    }
}

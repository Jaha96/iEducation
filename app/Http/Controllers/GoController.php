<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class GoController extends Controller
{
    function index()
    {
        return view('go.index');
    }

    function EntryPoint($slug, $action = 'index')
    {
        if (!method_exists($this, $slug))
            abort(404);
        else
            return $this->$slug($action);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class FilterController extends Controller
{
    function index(){
        return view('go.search');
    }

    function filter(Request $request){
        $length = $request->input('length');
        $start = $request->input('start');
        $order = $request->input('order');
        $search = $request->input('search');
        $page = $start / ($length + 1);

        Paginator::currentPageResolver(function () use ($page) {
            return $page;
        });

        $data = DB::table('autoparts as a')
            ->join('users as u', 'a.uid', '=', 'u.id')
            ->join('factory as f', 'a.factory_id', '=', 'f.id')
            ->join('model as m', 'a.model_id', '=', 'm.id')
            ->join('parts_category as c', 'a.parts_category_id', '=', 'c.id')
            ->join('parts_sub_category as sc', 'a.parts_sub_category_id', '=', 'sc.id');

        $data->select('u.name', 'f.factory_name', 'm.model_name', 'c.category_name', 'sc.sub_category_name', 'a.ad_code', 'a.phone');

        if ($search['value'] && $search['value'] != '') {
            $searchV = $search['value'];
            $data->where('u.name', 'like', "%$searchV%")
                ->orWhere('f.factory_name', 'like', "%$searchV%")
                ->orWhere('m.model_name', 'like', "%$searchV%")
                ->orWhere('c.category_name', 'like', "%$searchV%")
                ->orWhere('sc.sub_category_name', 'like', "%$searchV%")
                ->orWhere('a.ad_code', 'like', "%$searchV%")
                ->orWhere('a.phone', 'like', "%$searchV%");
        }

        $data = $data->orderBy('a.id', $order[0]['dir'])->paginate($length);
        $data = $data->toArray();
        $result = [
            'data' => $data['data'],
            'options' => [],
            'files' => [],
            'draw' => 0,
            'recordsTotal' => $data['total'],
            'recordsFiltered' => $data['total']
        ];
        return $result;

    }
}

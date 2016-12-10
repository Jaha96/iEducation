<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Go\Go;

class BarterController extends Controller
{

    function EntryPoint($slug, $action = 'index')
    {
        if (!method_exists($this, $slug))
            abort(404);
        else
            return $this->$slug($action);
    }

    function price($action)
    {
        $go = new Go();
        $go->viewName = 'go.barter';
        $go->table = 'barter_price';

        $go->page_name = 'Бартерийн үнэ';
        $go->identity_name = 'priceid';
        $go->grid_columns = ['priceid', 'minprice', 'maxprice'];
        $go->grid_default_order_by = 'priceid ASC';
        $go->formType = 'inline';
        $go->formClassName = 'user-form col-sm-12 col-md-8 col-lg-6';
        $go->after_save_stay_at_form = true;

        $go->grid_output_control = [
            ['column' => 'minprice', 'title' => 'Доод үнэ', 'type' => '--text'],
            ['column' => 'maxprice', 'title' => 'Дээд үнэ', 'type' => '--text']
        ];

        $go->form_input_control = [
            ['column' => 'minprice', 'title' => 'Доод үнэ', 'type' => '--text', 'value' => null, 'validate' => 'required'],
            ['column' => 'maxprice', 'title' => 'Доод үнэ', 'type' => '--text', 'value' => null, 'validate' => 'required']
        ];
        return $go->run($action);
    }

    function country($action)
    {
        $go = new Go();
        $go->viewName = 'go.barter';
        $go->table = 'country';

        $go->page_name = 'Улс';
        $go->identity_name = 'id';
        $go->grid_columns = ['country_name'];
        $go->grid_default_order_by = 'country_name ASC';
        $go->formType = 'inline';
        $go->formClassName = 'user-form col-sm-12 col-md-8 col-lg-6';
        $go->after_save_stay_at_form = true;

        $go->grid_output_control = [
            ['column' => 'country_name', 'title' => 'Улс', 'type' => '--text']
        ];

        $go->form_input_control = [
            ['column' => 'country_name', 'title' => 'Улс', 'type' => '--text', 'value' => null, 'validate' => 'required']
        ];
        return $go->run($action);
    }

}

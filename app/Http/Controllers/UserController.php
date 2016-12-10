<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Go\Go;

class UserController extends Controller
{
    function EntryPoint($slug, $action = 'index')
    {
        if (!method_exists($this, $slug))
            abort(404);
        else
            return $this->$slug($action);
    }

    function crud($action)
    {
        $go = new Go();
        $go->viewName = 'go.user';
        $go->table = 'users';

        $go->page_name = 'Гишүүд';
        $go->identity_name = 'id';
        $go->grid_columns = ['role_id', 'users.name', 'users.email', 'users.id'];
        $go->grid_default_order_by = 'users.id DESC';
        $go->formType = 'page';
        $go->where_condition = [['users.id', '!=', 1]];
        $go->created_at = 'created_at';
        $go->updated_at = 'updated_at';
        $go->formClassName = 'user-form col-sm-12 col-md-8 col-lg-6';
//        $go->after_save_stay_at_form = true;

        $go->grid_output_control = [
            ['column' => 'role_id', 'title' => 'Гишүүдийн зэрэглэл', 'type' => '--combobox', 'options' => [
                'valueField' => 'id',
                'textField' => 'role',
                'table' => 'role',
                'identity_name' => 'id',
                'grid_columns' => ['id', 'role'],
                'where_condition' => [['id', '!=', 1]],
                'grid_default_order_by' => 'id ASC'
            ]],

            ['column' => 'name', 'title' => 'Гишүүний нэр', 'type' => '--text'],
            ['column' => 'email', 'title' => 'Имэйл', 'type' => '--email']
        ];

        $go->form_input_control = [
            ['column' => 'role_id', 'title' => 'Гишүүдийн зэрэглэл', 'type' => '--combobox', 'value' => null, 'validate' => 'required', 'options' => [
                'valueField' => 'id',
                'textField' => 'role',
                'table' => 'role',
                'identity_name' => 'id',
                'grid_columns' => ['id', 'role'],
                'grid_default_order_by' => 'id ASC',
            ]],

            ['column' => 'name', 'title' => 'Гишүүний нэр', 'type' => '--text', 'value' => null, 'validate' => 'required'],
            ['column' => 'email', 'title' => 'Имайл', 'type' => '--email', 'value' => null, 'validate' => 'required|email|unique:users,email,NULL,'],
            ['column' => 'password', 'title' => 'Нууц үг', 'type' => '--password', 'value' => null, 'validate' => 'required'],
            ['column' => 'password_confirm', 'title' => 'Нууц үг баталгаажуулах', 'type' => '--password-confirm', 'value' => null, 'validate' => '']
        ];
        return $go->run($action);
    }

    function role($action){
        $go = new Go();
        $go->viewName = 'go.user';
        $go->table = 'role';

        $go->page_name = 'Гишүүдийн зэрэглэл';
        $go->identity_name = 'id';
        $go->grid_columns = ['role', 'level', 'id'];
        $go->grid_default_order_by = 'level ASC';
        $go->formType = 'page';
        $go->where_condition = [['id', '!=', 1]];
        $go->created_at = 'created_at';
        $go->updated_at = 'updated_at';
        $go->formClassName = 'user-form col-sm-12 col-md-8 col-lg-6';

        $go->grid_output_control = [
            ['column' => 'role', 'title' => 'Зэрэглэлийн нэр', 'type' => '--text'],
            ['column' => 'level', 'title' => 'Зэрэглэлийн түвшин', 'type' => '--number']
        ];

        $go->form_input_control = [
            ['column' => 'role', 'title' => 'Зэрэглэлийн нэр', 'type' => '--text', 'value' => null, 'validate' => 'required'],
            ['column' => 'level', 'title' => 'Зэрэглэлийн түвшин', 'type' => '--number', 'value' => null, 'validate' => 'required'],
        ];
        return $go->run($action);
    }
}

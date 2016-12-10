<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
//use Solarcms\Core\TableProperties\Tp\Tp as Go;
use Go\Go;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AutopartController extends Controller
{
    function EntryPoint($slug, $action = 'index')
    {
        if (!method_exists($this, $slug))
            abort(404);
        else
            return $this->$slug($action);
    }


    function factory($action)
    {
        $go = new Go();
        $go->viewName = 'go.auto';
        $go->table = 'factory';

        $go->page_name = 'Машин үйлдвэрлэгч';
        $go->identity_name = 'id';
        $go->grid_columns = ['factory_name', 'id'];
        $go->grid_default_order_by = 'factory_name ASC';
        $go->formType = 'inline';

        $go->grid_output_control = [
            ['column' => 'factory_name', 'title' => 'Нэр', 'type' => '--text', 'value' => null, 'validate' => 'required']
        ];

        $go->form_input_control = [
            ['column' => 'factory_name', 'title' => 'Нэр', 'type' => '--text', 'value' => null, 'validate' => 'required']
        ];

        return $go->run($action);
    }

    function model($action)
    {
        $time = Carbon::now();
        $time = $time->toDateTimeString();

        $go = new Go();
        $go->viewName = 'go.auto';
        $go->table = 'model';

        $go->page_name = 'Машины модел';
        $go->identity_name = 'id';
        $go->grid_columns = ['factory_id', 'model_name', 'aral', 'ognoo', 'model.id'];
        $go->grid_default_order_by = 'id DESC';
        $go->formType = 'inline';


        $go->grid_output_control = [
            ['column' => 'factory_id', 'title' => 'Үйлдэрлэгч', 'type' => '--combobox', 'value' => null, 'validate' => 'required', 'options' => [
                'parent' => 'factory_id',
                'valueField' => 'id',
                'textField' => 'factory_name',
                'table' => 'factory',
                'identity_name' => 'id',
                'grid_columns' => ['id', 'factory_name'],
                'grid_default_order_by' => 'factory_name DESC'
            ]],

            ['column' => 'ognoo', 'title' => 'Үйлдвэрлэсэн он', 'type' => '--text', 'value' => null, 'validate' => ''],
            ['column' => 'aral', 'title' => 'Арлын дугаар', 'type' => '--text', 'value' => null, 'validate' => ''],
            ['column' => 'model_name', 'title' => 'Модел', 'type' => '--text', 'value' => null, 'validate' => 'required']


        ];

        $go->form_input_control = [
            ['column' => 'factory_id', 'title' => 'Үйлдэрлэгч', 'type' => '--combobox', 'value' => null, 'validate' => 'required', 'options' => [
                'parent' => 'factory_id',
                'valueField' => 'id',
                'textField' => 'factory_name',
                'table' => 'factory',
                'identity_name' => 'id',
                'grid_columns' => ['id', 'factory_name'],
                'grid_default_order_by' => 'factory_name DESC'
            ]],

            ['column' => 'ognoo', 'title' => 'Үйлдвэрлэсэн он', 'type' => '--text', 'value' => null, 'validate' => ''],
            ['column' => 'aral', 'title' => 'Арлын дугаар', 'type' => '--text', 'value' => null, 'validate' => ''],
            ['column' => 'model_name', 'title' => 'Нэр', 'type' => '--text', 'value' => null, 'validate' => 'required']

        ];

        return $go->run($action);
    }


    function color($action)
    {
        $go = new Go();
        $go->viewName = 'go.auto';
        $go->table = 'color';

        $go->page_name = 'Өнгө';
        $go->identity_name = 'id';
        $go->grid_columns = ['colors', 'color_code', 'id'];
        $go->grid_default_order_by = 'colors ASC';
        $go->formType = 'inline';


        $go->grid_output_control = [
            ['column' => 'color_code', 'title' => 'Өнгөний код', 'type' => '--text', 'value' => null, 'validate' => ''],
            ['column' => 'colors', 'title' => 'Өнгө', 'type' => '--text', 'value' => null, 'validate' => 'required']
        ];

        $go->form_input_control = [
            ['column' => 'color_code', 'title' => 'Өнгөний код', 'type' => '--text', 'value' => null, 'validate' => ''],
            ['column' => 'colors', 'title' => 'Өнгө', 'type' => '--text', 'value' => null, 'validate' => 'required']
        ];

        return $go->run($action);
    }

    function category($action)
    {
        $go = new Go();
        $go->viewName = 'go.auto';
        $go->table = 'parts_category';

        $go->page_name = 'Сэлбэгийн ангилал';
        $go->identity_name = 'id';
        $go->grid_columns = ['category_name', 'id'];
        $go->grid_default_order_by = 'category_name ASC';
        $go->formType = 'inline';


        $go->grid_output_control = [
            ['column' => 'category_name', 'title' => 'Ангилал', 'type' => '--text', 'value' => null, 'validate' => 'required']
        ];

        $go->form_input_control = [
            ['column' => 'category_name', 'title' => 'Ангилал', 'type' => '--text', 'value' => null, 'validate' => 'required']
        ];

        return $go->run($action);
    }


    function members($action)
    {
        $go = new Go();
        $go->viewName = 'go.auto';
        $go->table = 'users';

        $go->page_name = 'Гишүүн хэрэглэгчид';
        $go->identity_name = 'id';
        $go->grid_columns = ['users.name', 'users.email', 'users.phone', 'users.id'];
        $go->grid_default_order_by = 'users.id DESC';
        $go->formType = 'page';
        $go->where_condition = [['users.role_id', '=', 6]];
        $go->created_at = 'created_at';
        $go->updated_at = 'updated_at';
        $go->formClassName = 'user-form col-sm-12 col-md-8 col-lg-6';

        $go->grid_output_control = [
            ['column' => 'name', 'title' => 'Гишүүний нэр', 'type' => '--text'],
            ['column' => 'email', 'title' => 'Имэйл', 'type' => '--email'],
            ['column' => 'phone', 'title' => 'Утас', 'type' => '--text'],
        ];

        $go->form_input_control = [
            ['column' => 'role_id', 'title' => 'Гишүүдийн зэрэглэл', 'type' => '--hidden', 'value' => 6, 'validate' => 'required'],
            ['column' => 'name', 'title' => 'Гишүүний нэр', 'type' => '--text', 'value' => null, 'validate' => 'required'],
            ['column' => 'email', 'title' => 'Имайл', 'type' => '--email', 'value' => null, 'validate' => 'required|email|unique:users,email,NULL,'],
            ['column' => 'phone', 'title' => 'Утас', 'type' => '--text', 'value' => null, 'validate' => ''],
            ['column' => 'address', 'title' => 'Хаяг', 'type' => '--text', 'value' => null, 'validate' => ''],
            ['column' => 'password', 'title' => 'Нууц үг', 'type' => '--password', 'value' => null, 'validate' => 'required'],
            ['column' => 'password_confirm', 'title' => 'Нууц үг баталгаажуулах', 'type' => '--password-confirm', 'value' => null, 'validate' => '']
        ];
        return $go->run($action);
    }

    function subcategory($action)
    {
        $go = new Go();
        $go->viewName = 'go.auto';
        $go->table = 'parts_sub_category';

        $go->page_name = 'Сэлбэгийн дэд ангилал';
        $go->identity_name = 'id';
        $go->grid_columns = ['parent_id', 'sub_category_name', 'parts_sub_category.id', 'tmp_id'];
        $go->grid_default_order_by = 'sub_category_name ASC';
        $go->formType = 'page';

        $go->grid_output_control = [
            ['column' => 'parent_id', 'title' => 'Үндсэн ангилал', 'type' => '--combobox', 'value' => null, 'validate' => '', 'options' => [
                'parent' => 'parent_id',
                'valueField' => 'id',
                'textField' => 'category_name',
                'table' => 'parts_category',
                'identity_name' => 'id',
                'grid_columns' => ['id', 'category_name'],
                'grid_default_order_by' => 'category_name ASC'
            ]],
            ['column' => 'sub_category_name', 'title' => 'Дэд ангилал', 'type' => '--text', 'value' => null, 'validate' => 'required']
        ];

        $go->form_input_control = [
            ['column' => 'parent_id', 'title' => 'Үндсэн ангилал', 'type' => '--combobox', 'value' => null, 'validate' => '', 'options' => [
                'parent' => 'parent_id',
                'valueField' => 'id',
                'textField' => 'category_name',
                'table' => 'parts_category',
                'identity_name' => 'id',
                'grid_columns' => ['id', 'category_name'],
                'grid_default_order_by' => 'category_name ASC',
                'child' => 'tmp_id'
            ]],

            ['column' => 'tmp_id', 'title' => 'Дэд ангилал', 'type' => '--combobox', 'value' => 0, 'validate' => '', 'options' => [
                'parent' => 'parent_id',
                'valueField' => 'id',
                'textField' => 'sub_category_name',
                'table' => 'parts_sub_category',
                'identity_name' => 'id',
                'grid_columns' => ['id', 'sub_category_name'],
                'grid_default_order_by' => 'sub_category_name ASC',
                'join' => false
            ]],

            ['column' => 'sub_category_name', 'title' => 'Дэд ангилал', 'type' => '--text', 'value' => null, 'validate' => '']
        ];

        return $go->run($action);
    }

    function autoparts($action)
    {

        $curUser = DB::table('users')->where('id', Auth::user()->id)->first();

        $go = new Go();
        $go->table = 'autoparts';

        $go->viewName = 'go.auto';
        $go->page_name = 'Сэлбэг бүртгэл';

        $go->formClassName = "autopart-form";

        $go->identity_name = 'id';
        $go->grid_columns = ['uid', 'autoparts.id', 'autoparts.factory_id', 'autoparts.part_code', 'model_id', 'parts_category_id', 'parts_sub_category_id', 'title', 'quantity', 'autoparts.created_at', 'phone', 'address'];
        $go->grid_default_order_by = 'title DESC';
        $go->created_at = 'created_at';
        $go->updated_at = 'updated_at';

        if (Auth::user()->role_id == 6) {
            $go->where_condition = [['uid', '=', Auth::user()->id]];
        }


        $go->grid_output_control = [
            ['column' => 'uid', 'title' => 'Гишүүн', 'type' => '--combobox', 'options' => [
                'valueField' => 'id',
                'textField' => 'name',
                'table' => 'users',
                'identity_name' => 'id',
                'grid_columns' => ['id', 'name'],
                'grid_default_order_by' => 'name ASC'
            ]],
            ['column' => 'factory_id', 'title' => 'Үйлдвэрлэгч', 'type' => '--combobox', 'options' => [
                'valueField' => 'id',
                'textField' => 'factory_name',
                'table' => 'factory',
                'identity_name' => 'id',
                'grid_columns' => ['id', 'factory_name'],
                'grid_default_order_by' => 'factory_name ASC'
            ]],
            ['column' => 'model_id', 'title' => 'Модел, Арлын дугаар', 'type' => '--combobox', 'options' => [
                'valueField' => 'id',
                'textField' => ['model_name', 'aral'],
                'table' => 'model',
                'identity_name' => 'id',
                'grid_columns' => ['id', 'model_name', 'aral'],
                'grid_default_order_by' => 'model_name ASC'
            ]],
            ['column' => 'parts_category_id', 'title' => 'Сэлбэгийн ангилал', 'type' => '--combobox', 'options' => [
                'parent' => 'parts_category_id',
                'valueField' => 'id',
                'textField' => 'category_name',
                'table' => 'parts_category',
                'identity_name' => 'id',
                'grid_columns' => ['id', 'category_name'],
                'grid_default_order_by' => 'category_name ASC'
            ]],
            ['column' => 'parts_sub_category_id', 'title' => 'Дэд ангилал', 'type' => '--combobox', 'options' => [
                'valueField' => 'id',
                'textField' => 'sub_category_name',
                'table' => 'parts_sub_category',
                'identity_name' => 'id',
                'grid_columns' => ['id', 'sub_category_name'],
                'grid_default_order_by' => 'sub_category_name ASC',
                'join' => false
            ]],

            ['column' => 'part_code', 'title' => 'Код', 'type' => '--text'],
            ['column' => 'phone', 'title' => 'Утас', 'type' => '--text'],
            ['column' => 'address', 'title' => 'Хаяг', 'type' => '--text'],
            ['column' => 'quantity', 'title' => 'Тоо ширхэг', 'type' => '--text']
        ];

        $go->formType = 'page';
        $go->form_input_control = [
            ['column' => 'uid', 'title' => 'Гарчиг', 'type' => '--hidden', 'value' => Auth::user()->id, 'validate' => 'required', 'className' => 'col-lg-4 col-md-4'],
            ['column' => 'title', 'title' => 'Гарчиг', 'type' => '--hidden', 'value' => 'selbeg', 'validate' => 'required', 'className' => 'col-lg-4 col-md-4'],
            ['column' => 'part_code', 'title' => 'Сэлбэгийн код', 'type' => '--text', 'value' => null, 'validate' => '', 'className' => 'col-lg-3 col-md-4'],

            ['type' => '--group', 'title' => 'Үйлдвэрлэгч, машины загвар, он', 'className' => 'col-sm-12 col-lg-6 col-md-6',
                'controls' => [
                    ['column' => 'factory_id', 'title' => 'Үйлдвэрлэгч', 'type' => '--combobox', 'value' => null, 'className' => 'cols-sm-12 col-md-6 col-lg-6', 'validate' => 'required', 'options' => [
                        'valueField' => 'id',
                        'textField' => 'factory_name',
                        'table' => 'factory',
                        'identity_name' => 'id',
                        'grid_columns' => ['id', 'factory_name'],
                        'grid_default_order_by' => 'factory_name ASC',
                        'child' => 'model_id'
                    ]],

                    ['column' => 'model_id', 'title' => 'Модел, арлын дугаар, он', 'type' => '--combobox', 'value' => null, 'className' => 'cols-sm-12 col-md-6 col-lg-6', 'validate' => 'required', 'options' => [
                        'parent' => 'model.factory_id',
                        'valueField' => 'id',
                        'textField' => ['model_name', 'aral', 'ognoo'],
                        'table' => 'model',
                        'identity_name' => 'id',
                        'grid_columns' => ['id', 'model_name', 'aral', 'ognoo'],
                        'grid_default_order_by' => 'model_name ASC'
                    ]]
                ]
            ],

            ['type' => '--group', 'title' => 'Сэлбэгийн ангилал', 'className' => 'col-sm-12 col-lg-6 col-md-6',
                'controls' => [

                    ['column' => 'parts_category_id', 'title' => 'Үндсэн ангилал', 'type' => '--combobox', 'value' => null, 'className' => 'cols-sm-12 col-md-6 col-lg-6', 'validate' => 'required', 'options' => [
                        'parent' => 'parts_category_id',
                        'valueField' => 'id',
                        'textField' => 'category_name',
                        'table' => 'parts_category',
                        'identity_name' => 'id',
                        'grid_columns' => ['id', 'category_name'],
                        'grid_default_order_by' => 'category_name ASC',
                        'child' => 'parts_sub_category_id'
                    ]],
                    ['column' => 'parts_sub_category_id', 'title' => 'Дэд ангилал', 'type' => '--combobox', 'value' => null, 'className' => 'cols-sm-12 col-md-6 col-lg-6', 'validate' => '', 'options' => [
                        'parent' => 'parts_sub_category.parent_id',
                        'valueField' => 'id',
                        'textField' => 'sub_category_name',
                        'table' => 'parts_sub_category',
                        'identity_name' => 'id',
                        'grid_columns' => ['id', 'sub_category_name'],
                        'grid_default_order_by' => 'sub_category_name ASC',
                        'join' => false
                    ]]
                ]
            ],

            ['type' => '--group', 'title' => 'Үзүүлэлт, шинж чанар', 'className' => 'col-sm-12 col-lg-6 col-md-6',
                'controls' => [

                    ['column' => 'price', 'title' => 'Үнэ', 'type' => '--text', 'value' => null, 'validate' => '', 'className' => 'col-lg-4 col-md-4'],
                    ['column' => 'motor', 'title' => 'Мотор', 'type' => '--text', 'value' => null, 'validate' => '', 'className' => 'col-lg-4 col-md-4'],
                    ['column' => 'quantity', 'title' => 'Тоо ширхэг', 'type' => '--number', 'value' => null, 'validate' => '', 'className' => 'col-lg-4 col-md-4'],
                    ['column' => 'color_id', 'title' => 'Өнгө', 'type' => '--combobox', 'value' => null, 'validate' => '', 'className' => 'col-lg-4 col-md-4', 'options' => [
                        'parent' => 'color_id',
                        'valueField' => 'id',
                        'textField' => 'colors',
                        'table' => 'color',
                        'identity_name' => 'id',
                        'grid_columns' => ['id', 'colors'],
                        'grid_default_order_by' => 'id DESC',
                        'join' => false
                    ]],
                    ['column' => 'position', 'title' => 'Сэлбэгийн байрлал', 'type' => '--combobox', 'value' => null, 'validate' => '', 'className' => 'col-lg-4 col-md-4', 'options' => [
                        'parent' => 'position',
                        'valueField' => 'id',
                        'textField' => 'position',
                        'table' => 'st_position',
                        'identity_name' => 'id',
                        'grid_columns' => ['id', 'position'],
                        'grid_default_order_by' => 'id DESC',
                        'join' => false
                    ]],

                    ['column' => 'state', 'title' => 'Төлөв', 'type' => '--radio', 'value' => 0, 'className' => 'col-lg-6 col-md-12', 'choices' => [
                        ['value' => 0, 'text' => 'Шинэ'],
                        ['value' => 1, 'text' => 'Хуучин'],
                    ], 'validate' => 'required'],

                    ['column' => 'drive_wheel', 'title' => 'Жолооны байрлал', 'type' => '--radio', 'value' => 0, 'className' => 'col-lg-6 col-md-12', 'choices' => [
                        ['value' => 0, 'text' => 'Баруун'],
                        ['value' => 1, 'text' => 'Зүүн'],
                    ], 'validate' => 'required'],


                    ['column' => 'photos', 'title' => 'Зураг', 'type' => '--multi-file', 'value' => null, 'validate' => '', 'className' => 'col-lg-12 col-md-10'],
                    ['column' => 'description', 'title' => 'Тайлбар', 'type' => '--textarea', 'value' => null, 'validate' => '', 'className' => 'col-lg-12 col-md-10'],
                ]
            ],

            ['type' => '--group', 'title' => 'Холбоо барих', 'className' => 'col-sm-12 col-lg-6 col-md-6',
                'controls' => [
                    ['column' => 'phone', 'title' => 'Утас', 'type' => '--text', 'value' => $curUser->phone, 'validate' => '', 'className' => 'col-lg-12 col-md-10'],
                    ['column' => 'address', 'title' => 'Хаяг', 'type' => '--text', 'value' => $curUser->address, 'validate' => '', 'className' => 'col-lg-12 col-md-10'],
                ]
            ]

        ];

        return $go->run($action);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Go\Go;
use Illuminate\Support\Facades\Auth;


class ContentController extends Controller
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
        $go->viewName = 'go.content';
        $go->table = 'content';

        $go->page_name = 'Контент';
        $go->identity_name = 'id';
        $go->grid_columns = ['content.title', 'content.thumb', 'content.created_at', 'category_id', 'content.id'];
        $go->grid_default_order_by = 'id DESC';
        $go->formType = 'page';
        $go->where_condition = [
            ['category_id', '!=', 4],
            ['sub_category_id', '!=', 2],
            ['sub_category_id', '!=', 5],
        ];
        $go->created_at = 'created_at';
        $go->updated_at = 'updated_at';
        $go->formClassName = "col-sm-12 col-md-8";

        $go->grid_output_control = [
            ['column' => 'category_id', 'title' => 'Ангилал', 'type' => '--combobox', 'value' => null, 'validate' => 'required', 'options' => [
                'valueField' => 'id',
                'textField' => 'category',
                'table' => 'category',
                'identity_name' => 'id',
                'grid_columns' => ['id', 'category'],
                'grid_default_order_by' => 'category ASC',
            ]],
            ['column' => 'title', 'title' => 'Нэр', 'type' => '--text', 'translate' => true],
            ['column' => 'created_at', 'title' => 'Сүүлд зассан огноо', 'type' => '--text']
        ];

        $go->form_input_control = [
            ['type' => '--group', 'title' => 'Контентын ангилал', 'className' => 'col-lg-8 col-md-8',
                'controls' => [
                    ['column' => 'category_id', 'title' => 'Ангилал', 'type' => '--combobox', 'value' => null, 'validate' => 'required', 'options' => [
                        'valueField' => 'id',
                        'textField' => 'category',
                        'table' => 'category',
                        'identity_name' => 'id',
                        'grid_columns' => ['id', 'category'],
                        'grid_default_order_by' => 'category ASC',
                        'where_condition' => [['id', '!=', 4]],
                        'child' => 'sub_category_id'
                    ]],
                    ['column' => 'sub_category_id', 'title' => 'Дэд ангилал', 'type' => '--combobox', 'value' => null, 'validate' => '', 'options' => [
                        'parent' => 'sub_category.parent_id',
                        'valueField' => 'id',
                        'textField' => 'sub_category',
                        'table' => 'sub_category',
                        'identity_name' => 'id',
                        'grid_columns' => ['id', 'sub_category'],
                        'grid_default_order_by' => 'sub_category ASC',
                        'join' => false
                    ]]
                ]
            ],

            ['column' => 'user_id', 'title' => 'user', 'type' => '--hidden', 'value' => Auth::user()->id, 'validate' => 'required'],
            ['column' => 'thumb', 'title' => 'Зураг', 'type' => '--single-file', 'value' => null, 'validate' => ''],
            ['column' => 'is_publish', 'title' => 'Нийтлэх эсэх', 'type' => '--checkbox', 'value' => true, 'validate' => ''],
            ['column' => 'is_comment', 'title' => 'Сэтгэгдэл авах эсэх', 'type' => '--checkbox', 'value' => null, 'validate' => '']
        ];

        $go->translate_form_input_control = [
            ['column' => 'title', 'title' => 'Гарчиг', 'type' => '--text', 'value' => null, 'validate' => 'required'],
            ['column' => 'description', 'title' => 'Товч агуулга', 'type' => '--textarea', 'value' => null, 'validate' => ''],
            ['column' => 'content', 'title' => 'Үндсэн агуулга', 'type' => '--ckeditor', 'value' => null, 'validate' => 'required']
        ];

        return $go->run($action);
    }

    function banner($action)
    {
        $go = new Go();
        $go->viewName = 'go.content';
        $go->table = 'content';

        $go->page_name = 'Контент';
        $go->identity_name = 'id';
        $go->grid_columns = ['content.title', 'content.thumb', 'content.created_at', 'category_id', 'content.id'];
        $go->grid_default_order_by = 'id DESC';
        $go->formType = 'page';
        $go->where_condition = [
            ['category_id', '=', 5]
        ];
        $go->created_at = 'created_at';
        $go->updated_at = 'updated_at';
        $go->formClassName = "col-sm-12 col-md-8";

        $go->grid_output_control = [
            ['column' => 'title', 'title' => 'Нэр', 'type' => '--text', 'translate' => true],
            ['column' => 'created_at', 'title' => 'Сүүлд зассан огноо', 'type' => '--text']
        ];

        $go->form_input_control = [
            ['column' => 'user_id', 'title' => 'user', 'type' => '--hidden', 'value' => Auth::user()->id, 'validate' => 'required'],
            ['column' => 'category_id', 'title' => 'media', 'type' => '--hidden', 'value' => 5, 'validate' => 'required'],
            ['column' => 'sub_category_id', 'title' => 'Дэд ангилал', 'type' => '--combobox', 'value' => null, 'validate' => '', 'options' => [
                'parent' => 'sub_category.parent_id',
                'valueField' => 'id',
                'textField' => 'sub_category',
                'table' => 'sub_category',
                'identity_name' => 'id',
                'grid_columns' => ['id', 'sub_category'],
                'grid_default_order_by' => 'sub_category ASC',
                'where_condition' => [['parent_id', '=', 5]],
                'join' => false
            ]],
            ['column' => 'thumb', 'title' => 'Зураг', 'type' => '--single-file', 'value' => null, 'validate' => ''],
            ['column' => 'content', 'title' => 'Видеоны хаяг', 'type' => '--text', 'value' => null, 'validate' => ''],
            ['column' => 'is_publish', 'title' => 'Нийтлэх эсэх', 'type' => '--checkbox', 'value' => null, 'validate' => '']
        ];

        $go->translate_form_input_control = [
            ['column' => 'title', 'title' => 'Гарчиг', 'type' => '--text', 'value' => null, 'validate' => 'required'],
            ['column' => 'description', 'title' => 'Товч агуулга', 'type' => '--textarea', 'value' => null, 'validate' => '']
        ];

        return $go->run($action);
    }

}

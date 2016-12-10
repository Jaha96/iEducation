<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Go\Go;
use Illuminate\Support\Facades\Auth;

class MediaController extends Controller
{
    function EntryPoint($slug, $action = 'index')
    {
        if (!method_exists($this, $slug))
            abort(404);
        else
            return $this->$slug($action);
    }

    function slider($action)
    {
        $go = new Go();
        $go->viewName = 'go.media';
        $go->table = 'content';

        $go->page_name = 'Контент';
        $go->identity_name = 'id';
        $go->grid_columns = ['content.title', 'content.thumb', 'content.created_at', 'category_id', 'content.id'];
        $go->grid_default_order_by = 'id DESC';
        $go->formType = 'page';
        $go->where_condition = [
            ['category_id', '=', 4],
            ['sub_category_id', '=', 2]
        ];
        $go->created_at = 'created_at';
        $go->updated_at = 'updated_at';
        $go->formClassName = "col-sm-12 col-md-8";

        $go->grid_output_control = [
            ['column' => 'thumb', 'title' => 'Зураг', 'type' => '--image', 'translate' => true],
            ['column' => 'title', 'title' => 'Нэр', 'type' => '--text', 'translate' => true],
            ['column' => 'created_at', 'title' => 'Сүүлд зассан огноо', 'type' => '--text']
        ];

        $go->form_input_control = [
            ['column' => 'user_id', 'title' => 'user', 'type' => '--hidden', 'value' => Auth::user()->id, 'validate' => 'required'],
            ['column' => 'category_id', 'title' => 'media', 'type' => '--hidden', 'value' => 4, 'validate' => 'required'],
            ['column' => 'sub_category_id', 'title' => 'slider', 'type' => '--hidden', 'value' => 2, 'validate' => 'required'],
            ['column' => 'thumb', 'title' => 'Зураг', 'type' => '--single-file', 'value' => null, 'validate' => 'required'],
            ['column' => 'is_publish', 'title' => 'Нийтлэх эсэх', 'type' => '--checkbox', 'value' => null, 'validate' => ''],
            ['column' => 'is_comment', 'title' => 'Сэтгэгдэл авах эсэх', 'type' => '--checkbox', 'value' => null, 'validate' => '']
        ];

        $go->translate_form_input_control = [
            ['column' => 'title', 'title' => 'Гарчиг', 'type' => '--text', 'value' => null, 'validate' => 'required'],
            ['column' => 'description', 'title' => 'Товч агуулга', 'type' => '--textarea', 'value' => null, 'validate' => '']
        ];

        return $go->run($action);
    }

    function gallery($action)
    {
        $go = new Go();
        $go->viewName = 'go.media';
        $go->table = 'content';

        $go->page_name = 'Контент';
        $go->identity_name = 'id';
        $go->grid_columns = ['content.title', 'content.thumb', 'content.created_at', 'category_id', 'content.id'];
        $go->grid_default_order_by = 'id DESC';
        $go->formType = 'page';
        $go->where_condition = [
            ['category_id', '=', 4],
            ['sub_category_id', '=', 3]
        ];
        $go->created_at = 'created_at';
        $go->updated_at = 'updated_at';
        $go->formClassName = "col-sm-12 col-md-8";

        $go->grid_output_control = [
            ['column' => 'thumb', 'title' => 'Зураг', 'type' => '--image', 'translate' => true],
            ['column' => 'title', 'title' => 'Нэр', 'type' => '--text', 'translate' => true],
            ['column' => 'created_at', 'title' => 'Сүүлд зассан огноо', 'type' => '--text']
        ];

        $go->form_input_control = [
            ['column' => 'user_id', 'title' => 'user', 'type' => '--hidden', 'value' => Auth::user()->id, 'validate' => 'required'],
            ['column' => 'category_id', 'title' => 'media', 'type' => '--hidden', 'value' => 4, 'validate' => 'required'],
            ['column' => 'sub_category_id', 'title' => 'slider', 'type' => '--hidden', 'value' => 3, 'validate' => 'required'],
            ['column' => 'thumb', 'title' => 'Зураг', 'type' => '--single-file', 'value' => null, 'validate' => 'required'],
            ['column' => 'is_publish', 'title' => 'Нийтлэх эсэх', 'type' => '--checkbox', 'value' => null, 'validate' => ''],
            ['column' => 'is_comment', 'title' => 'Сэтгэгдэл авах эсэх', 'type' => '--checkbox', 'value' => null, 'validate' => '']
        ];

        $go->translate_form_input_control = [
            ['column' => 'title', 'title' => 'Гарчиг', 'type' => '--text', 'value' => null, 'validate' => 'required'],
            ['column' => 'description', 'title' => 'Товч агуулга', 'type' => '--textarea', 'value' => null, 'validate' => '']
        ];

        return $go->run($action);
    }
}

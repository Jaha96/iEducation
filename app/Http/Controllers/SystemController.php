<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Go\Go;

class SystemController extends Controller
{
    function EntryPoint($slug, $action = 'index')
    {
        if (!method_exists($this, $slug))
            abort(404);
        else
            return $this->$slug($action);
    }

    function settings()
    {
        return view('go.system');
    }

    function info($action)
    {
        $go = new Go();
        $go->viewName = 'go.system';
        $go->table = 'info';
        $go->permission = ['c' => false, 'r' => false, 'u' => true, 'd' => false];
        $go->update_row = 1;

        $go->page_name = 'Ерөнхий мэдээлэл';
        $go->identity_name = 'id';
        $go->grid_columns = ['id'];
        $go->grid_default_order_by = 'id DESC';
        $go->formType = 'page';
        $go->formClassName = 'tp-form col-sm-12 col-md-8 col-lg-6';
        $go->googleMap = true;
        $go->single = true;

        $go->grid_output_control = [];

        $go->form_input_control = [
            ['column' => 'logo', 'title' => 'Лого', 'type' => '--single-file', 'value' => null, 'validate' => ''],
            ['column' => 'domain', 'title' => 'Домайн хаяг', 'type' => '--text', 'value' => null, 'validate' => ''],
            ['column' => 'phone', 'title' => 'Утас', 'type' => '--text', 'value' => null, 'validate' => ''],
            ['column' => 'fax', 'title' => 'Факс', 'type' => '--text', 'value' => null, 'validate' => ''],
            ['column' => 'email', 'title' => 'И-мэйл', 'type' => '--text', 'value' => null, 'validate' => ''],
            ['column' => 'socials', 'title' => 'Сошиал хаягууд', 'type' => '--text', 'value' => null, 'validate' => ''],
            ['column' => 'meta_keywords', 'title' => 'Түлхүүр үгс', 'type' => '--text', 'value' => null, 'validate' => ''],
            ['column' => 'meta_description', 'title' => 'Товч тодорхойлолт', 'type' => '--text', 'value' => null, 'validate' => ''],
        ];

        $go->translate_form_input_control = [
            ['column' => 'name', 'title' => 'Сайтын нэр', 'type' => '--text', 'value' => null, 'validate' => 'required'],
            ['column' => 'address', 'title' => 'Хаяг', 'type' => '--text', 'value' => null, 'validate' => ''],
            ['column' => 'copyright', 'title' => 'Зохиогчийн эрх', 'type' => '--text', 'value' => null, 'validate' => ''],
            ['column' => 'maintenance_text', 'title' => 'Засварын текст', 'type' => '--text', 'value' => null, 'validate' => ''],
        ];

        return $go->run($action);
    }

    function category($action)
    {
        $go = new Go();
        $go->viewName = 'go.system';
        $go->table = 'category';

        $go->page_name = 'Контентын ангилал';
        $go->identity_name = 'id';
        $go->grid_columns = ['category', 'id'];
        $go->grid_default_order_by = 'id DESC';
        $go->formType = 'inline';

        $go->grid_output_control = [
            ['column' => 'category', 'title' => 'Ангилал', 'type' => '--text', 'value' => null, 'validate' => 'required']
        ];

        $go->form_input_control = [
            ['column' => 'category', 'title' => 'Ангилал', 'type' => '--text', 'value' => null, 'validate' => 'required']
        ];
        return $go->run($action);
    }

    function subcategory($action)
    {
        $go = new Go();
        $go->viewName = 'go.system';
        $go->table = 'sub_category';

        $go->page_name = 'Контентын дэд ангилал';
        $go->identity_name = 'id';
        $go->grid_columns = ['sub_category.parent_id', 'sub_category', 'sub_category.id'];
        $go->grid_default_order_by = 'parent_id ASC';
        $go->formType = 'inline';


        $go->grid_output_control = [
            ['column' => 'parent_id', 'title' => 'Үндсэн ангилал', 'type' => '--combobox', 'value' => null, 'validate' => '', 'options' => [
                'parent' => 'parent_id',
                'valueField' => 'id',
                'textField' => 'category',
                'table' => 'category',
                'identity_name' => 'id',
                'grid_columns' => ['id', 'category'],
                'grid_default_order_by' => 'category ASC'
            ]],
            ['column' => 'sub_category', 'title' => 'Дэд ангилал', 'type' => '--text', 'value' => null, 'validate' => 'required']
        ];

        $go->form_input_control = [
            ['column' => 'parent_id', 'title' => 'Үндсэн ангилал', 'type' => '--combobox', 'value' => null, 'validate' => '', 'options' => [
                'parent' => 'parent_id',
                'valueField' => 'id',
                'textField' => 'category',
                'table' => 'category',
                'identity_name' => 'id',
                'grid_columns' => ['id', 'category'],
                'grid_default_order_by' => 'category ASC'
            ]],
            ['column' => 'sub_category', 'title' => 'Дэд ангилал', 'type' => '--text', 'value' => null, 'validate' => 'required']
        ];

        return $go->run($action);
    }

    public function language($action)
    {
        $go = new Go();
        $go->viewName = 'go.system';
        $go->table = 'language';
        $go->page_name = 'Хэл';
        $go->identity_name = 'id';
        $go->grid_default_order_by = 'id DESC';
        $go->grid_columns = ['code', 'language', 'flag', 'id'];
        $go->formClassName = "col-sm-6";

        $go->grid_output_control = [
            ['column' => 'flag', 'title' => 'Туг', 'type' => '--image'],
            ['column' => 'code', 'title' => 'Улсын код', 'type' => '--text'],
            ['column' => 'language', 'title' => 'Хэл', 'type' => '--text'],
        ];
        $go->form_input_control = [

            ['column' => 'code', 'title' => 'Улсын код', 'type' => '--text', 'value' => null, 'validate' => 'required|max:7'],
            ['column' => 'language', 'title' => 'Хэл', 'type' => '--text', 'value' => null, 'validate' => 'required'],
            ['column' => 'flag', 'title' => 'Туг', 'type' => '--single-file', 'value' => null, 'validate' => ''],

        ];
        $go->formType = 'page';
        return $go->run($action);
    }

    function translation($action)
    {
        $go = new Go();
        $go->viewName = 'go.system';
        $go->table = 'translation';
        $go->page_name = 'Статик үгсийн сан';
        $go->generateLocaleFile = true;
        $go->identity_name = 'id';
        $go->grid_default_order_by = 'id DESC';
        $go->grid_columns = ['key', 'word', 'id'];
        $go->formClassName = 'tp-form col-sm-12 col-md-8 col-lg-6';

        $go->grid_output_control = [
            ['column' => 'key', 'title' => 'Түлхүүр үг', 'type' => '--text'],
            ['column' => 'word', 'title' => 'Орчуулга', 'type' => '--text', 'translate' => true],
        ];
        $go->form_input_control = [
            ['column' => 'key', 'title' => 'Түлхүүр үг', 'type' => '--text', 'value' => null, 'validate' => 'required'],
        ];

        $go->translate_form_input_control = [
            ['column' => 'word', 'title' => 'Орчуулга', 'type' => '--text', 'value' => null, 'validate' => 'required'],
        ];

        $go->formType = 'page';
        return $go->run($action);

    }

    function generateLocale()
    {
        $words = DB::table('static_words')->get();
        $locales = DB::table('locales')->get();
        $i18Path = public_path('i18');
        $localeArr = [];

        if (!is_dir($i18Path)) {
            mkdir($i18Path, 0755, true);
        }

        foreach ($locales as $l) {
            $localeArr[$l->code] = [];
        }

        foreach ($words as $w) {
            $translation = json_decode($w->translation);
            $key = $w->key;
            foreach ($translation as $t) {
                if (array_key_exists($t->locale, $localeArr)) {
                    $arr = [];
                    $arr[$key] = $t->value;
                    $localeArr[$t->locale][$key] = $t->value;
                }
            }
        }

        foreach ($localeArr as $key => $value) {
            $file = $i18Path . strtolower($key) . ".json";
            file_put_contents($file, json_encode($value, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }
    }

    function generateLocalePhp()
    {
        $words = DB::table('static_words')->get();
        $locales = DB::table('locales')->get();
        $i18Path = base_path('resources' . DIRECTORY_SEPARATOR . 'lang') . DIRECTORY_SEPARATOR;
        $localeArr = [];

        if (!is_dir($i18Path)) {
            mkdir($i18Path, 0755, true);
        }

        foreach ($locales as $l) {
            $localeArr[$l->code] = [];
        }

        foreach ($words as $w) {
            $translation = json_decode($w->translation);
            $key = $w->key;
            foreach ($translation as $t) {
                if (array_key_exists($t->locale, $localeArr)) {
                    $arr = [];
                    $arr[$key] = $t->value;
                    $localeArr[$t->locale][$key] = $t->value;
                }
            }
        }

        foreach ($localeArr as $key => $value) {
            $langFilePath = $i18Path . strtolower($key) . DIRECTORY_SEPARATOR;
            if (!is_dir($langFilePath)) {
                mkdir($langFilePath, 0755, true);
            }
            $file = $langFilePath . 'tr.php';
            $str = '<?php return ' . var_export($value, true) . ';';
            file_put_contents($file, $str);
        }
    }
}

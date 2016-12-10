<?php
/**
 * Created by PhpStorm.
 * User: n0m4dz
 * Date: 2/14/16
 * Time: 3:00 PM
 */
namespace Go\Utils;

use Illuminate\Support\Facades\Config;

class Translate
{
    public function translate($data)
    {
        @session_start();
        $data = json_decode($data);
        $val = "";
        $locale = isset($_SESSION['locale']) ? $_SESSION['locale'] : Config::get('app.locale');

        foreach ($data as $d) {
            if (strtolower($d->locale) == strtolower($locale)) {
                $val = $d->value;
                break;
            }
        }
        return $val;
    }
}
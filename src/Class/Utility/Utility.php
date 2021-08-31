<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 01-Nov-19
 * Time: 8:15 PM
 */

namespace App\Utility;


class Utility
{
    static function varDump($data)
    {
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
    }
    static function redirect($url)
    {
        header("Location:$url");
    }
}
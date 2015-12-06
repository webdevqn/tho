<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('create_token'))
{

    function create_token()
    {
        return random_string('alnum', 14);
    }

}

if (!function_exists('create_slug'))
{

    function create_slug($input)
    {
        $name = preg_replace('!\s+!', ' ', $input);
        $name = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $name));
        $name = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $name);
        $name = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $name);
        $name = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $name);
        $name = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $name);
        $name = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $name);
        $name = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $name);
        $name = preg_replace('/(đ)/', 'd', $name);
        preg_replace('/-+/', '-', $name);
        return $name;
    }

}

if (!function_exists('create_url'))
{

    function create_url($slug, $token)
    {
        return $slug . '-' . $token;
    }

}

if (!function_exists('check_input_element_valid'))
{

    function check_input_element_valid($input)
    {
        $count_false = 0;
        foreach ($input as $key => $value)
        {
            if (is_null($value) || $value === "" || !isset($value))
            {
                $count_false += 1;
            }
        }
        if ($count_false >= 1)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

}
?> 
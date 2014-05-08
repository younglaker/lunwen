<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');
if( ! function_exists('is_login') )
{
    function is_login()
    {
        $CI =& get_instance();
        $user_info = $CI->session->all_userdata();
        foreach ($user_info as $key => $value) 
        {
            if($key === 'id')
            {
                return TRUE;
                break;
            }
        }
    }

}

/**
* 输入的字符串只能用utf-8编码
*
* @param  mixed 要输出的对象
* @param  bool 是否输出后直接退出
* @return void
* @author ys
**/
function e($s, $is_exit = false)
{
    echo "<pre>";

    if(is_object($s))
    {
        print_r($s);

        echo 'Function ';
        print_r(get_class_methods($s));
    }
    else
    {
        echo htmlspecialchars(print_r($s, true));
    }

    echo "</pre>";

    if($is_exit)
        exit;
}
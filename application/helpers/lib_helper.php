<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');
if( ! function_exists('is_login') )
{
    function is_login()
    {
        $CI =& get_instance();
        $user_info = $CI->session->all_userdata();
        return $user_info;
    }

}

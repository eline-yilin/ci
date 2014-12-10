<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('my_process_db_request'))
{
    function my_process_db_request($table,$op = 'get', $param = array(), $target = null)
    {
        return $table;
    }   
}
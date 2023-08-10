<?php

if (!function_exists('prefixActive')) {
    function prefixActive($prefixName)
    {
        // echo 'test';
        // echo request()->route()->getName();
        return    request()->route()->getPrefix() == $prefixName ? 'active' : '';
    }
}

if (!function_exists('prefixBlock')) {
    function prefixBlock($prefixName)
    {
        return    request()->route()->getPrefix() == $prefixName ? 'block' : 'none';
    }
}

if (!function_exists('routeActive')) {
    function routeActive($routeName)
    {
        return    request()->routeIs($routeName) ? 'active' : '';
    }
}

//hàm xoá param trong url
if (!function_exists('revomeParam')) {
    function revomeParam($parameter)
    {
        $query = request()->query();
        unset($query[$parameter]);
        return $query;
    }
}
//hàm thêm param vào url
if (!function_exists('addParam')) {
    function addParam($parameter, $value)
    {
        $query = request()->query();
        // $query[$parameter] = $value;
        // return $query;
        // nếu tồn tại param 'page' thì xoá nó đi
        if (isset($query['page'])) {
            unset($query['page']);
        }
        //thêm param vào url
        $query[$parameter] = $value;
        return $query;
    }
}
//hàm check xem param có tồn tại trong url không
if (!function_exists('checkParam')) {
    function checkParam()
    {
        $query = request()->query();
        //nếu có nhiều hơn 1 param  và value của param đó != null thì trả về true
        //Nếu chỉ có 1 và param đó là page thì trả về false
        //Nếu không có param nào thì trả về false
        for($i = 0; $i < count($query); $i++){
            if(array_values($query)[$i] != null && array_keys($query)[$i] != 'page'){
                return true;
            }
        }
        return false;
    }
}

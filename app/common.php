<?php


if (!function_exists('print_true')) {
    function print_true($code = 1, $msg = '成功', $data = [])
    {
        return response()->json(
            [
                'code' => $code,
                'msg'  => $msg,
                'data' => $data
            ]
        );
    }
}

if (!function_exists('print_error')) {
    function print_error($msg = '失败')
    {
        return response()->json(
            [
                'msg'  => $msg,
            ]
        );
    }
}

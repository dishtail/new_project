<?php


if (!function_exists('print_true')) {
    /**
     * 后台json返回成功数据
     * Crated 10/12/21 by Phpstorm
     * author caiweiwei
     * @param int $code 状态码
     * @param string $msg 成功提示
     * @param array $data 返回数据
     * @return \Illuminate\Http\JsonResponse
     */
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
    /**
     * json返回错误提示
     * Crated 10/12/21 by Phpstorm
     * author caiweiwei
     * @param string $msg 返回错误提示
     * @return \Illuminate\Http\JsonResponse
     */
    function print_error($msg = '失败')
    {
        return response()->json(
            [
                'code' => 0,
                'msg'  => $msg,
            ]
        );
    }
}

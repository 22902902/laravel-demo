<?php

/**
 * 信息提示
 * @param $res 条件
 * @param $msg 提示信息
 */
function msg($res, $msg) {
    if($res) {
        $data = [
            'status' => 0,
            'message' => $msg .'成功'
        ];
    } else {
        $data = [
            'status' => 1,
            'message' => $msg .'失败'
        ];
    }
    return $data;
}

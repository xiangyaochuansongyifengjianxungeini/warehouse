<?php

/**
 * API接口数据输出
 *
 * @param [type] $code
 * @param [type] $message
 * @param array $result
 * @return void
 */
function respond($code,$message,$result=[])
{   

    return response()->json(
        [
            'code' => $code,
            'msg' => $message, 
            'data'=>$result
        ]
    );
}


/**
 * 获取截止时间为今天
 *
 * @param [type] $data
 * @return void
 */
function todayDate($data)
{
    $today = date('Y-m-d',time());

    $data['start_at'] = $data['start_at']??$today;
    $data['end_at'] = $data['end_at']??$today;
    $data['end_at'] = date('Y-m-d',strtotime($data['end_at']."+1 day"));

    return $data;
}
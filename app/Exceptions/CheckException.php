<?php

namespace App\Exceptions;

use Exception;

class CheckException extends Exception
{
    public $code = '';
    public $msg = '';

    public function __construct($code=0,$msg=null)
    {
        $this->code = $code;
        $this->msg = $msg;
    }


    public function render($request)
    {
        $result = [
            'code' => $this->code,
            'msg' => $this->msg,
        ];

        return response()->json($result);
    }
}

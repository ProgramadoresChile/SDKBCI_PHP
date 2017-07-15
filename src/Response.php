<?php

namespace Bci;


class Response
{
    public static function response($response)
    {
        return json_decode($response, true);
    }

    public static function responseError($message)
    {
        return ['error' => $message];
    }
}
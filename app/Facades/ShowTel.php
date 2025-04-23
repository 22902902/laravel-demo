<?php

namespace App\Facades;

/**
 * 标准实现门面形式
 * Class ShowTel
 * @package App\Facades
 */
class ShowTel extends \Illuminate\Support\Facades\Facade {

    protected static function getFacadeAccessor()
    {
        return new ShowTelImplement(); // new 一个具体实现对象
    }
}

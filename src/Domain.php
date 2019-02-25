<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2019/2/24
 * Time: 15:17
 */

namespace JoseChan\QttGame;


class Domain
{
    const SDK_DOMAIN_TEST = "http://newidea4-gamecenter-backend.qttcs3.cn";

    const SDK_DOMAIN_PROD = "https://newidea4-gamecenter-backend.1sapp.com";

    public static function get($debug = false)
    {
        return $debug ? self::SDK_DOMAIN_TEST : self::SDK_DOMAIN_PROD;
    }
}
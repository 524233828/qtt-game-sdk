<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2019/2/24
 * Time: 13:26
 */

namespace JoseChan\QttGame;


class Sdk
{

    protected $app_id;
    protected $app_key;
    protected $debug;

    public function __construct($app_id, $app_key, $debug = false)
    {
        $this->app_id = $app_id;
        $this->app_key = $app_key;
        $this->debug = $debug;
    }

    protected function sign($params)
    {
        unset($params['sign']);
        $params["app_key"] = $this->app_key;
        ksort($params, SORT_NATURAL);
        $sign = '';
        foreach ($params as $k => $v) {
            $sign .= $k . $v;
        }
        unset($params["app_key"]);
        return md5($sign);
    }


    public function checkSign($params)
    {
        if (empty($params["sign"])) {
            throw new \Exception("sign error");
        }
        $sign = $params["sign"];
        ksort($params, SORT_NATURAL);
        $sign2 = $this->sign($params);
        if ($sign != $sign2) {
            throw new \Exception("sign error");
        }
        return true;
    }
}
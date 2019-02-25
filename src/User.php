<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2019/2/24
 * Time: 15:55
 */

namespace JoseChan\QttGame;


use GuzzleHttp\Client;

class User extends Sdk
{

    public function __construct($app_id, $app_key, $debug = false)
    {
        parent::__construct($app_id, $app_key, $debug);
    }

    public function get($platform, $ticket)
    {
        $params = [
            "app_id" => $this->app_id,
            "platform" => $platform,
            "ticket" => $ticket,
            "time" => time(),
        ];

        $sign = $this->sign($params);

        $params['sign'] = $sign;

        $query = http_build_query($params);

        $url = Domain::get($this->debug). "/x/open/user/ticket";

        $client = new Client();
        $res = $client->request("GET", (string)$url."?{$query}");
        $str = (string)$res->getBody();

        return json_decode($str, true);
    }

    public function test($uid, $platform = "qtt")
    {
        $params = [
            "app_id" => $this->app_id,
            "platform" => $platform,
            "uid" => $uid,
        ];

        $query = http_build_query($params);

        $url = Domain::get($this->debug). "/x/open/test/game";

        $client = new Client();
        $res = $client->request("GET", (string)$url."?{$query}");
        $str = (string)$res->getBody();

        return json_decode($str, true);
    }
}
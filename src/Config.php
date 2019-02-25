<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2019/2/24
 * Time: 15:35
 */

namespace JoseChan\QttGame;

use GuzzleHttp\Client;
class Config extends Sdk
{

    public function __construct($app_id, $app_key, $debug = false)
    {
        parent::__construct($app_id, $app_key, $debug);
    }

    public function get($name, $project_url)
    {
        $client = new Client();
        $url = Domain::get($this->debug). "/x/open/test/game/config";

        $params = ["name" => $name, "url" => $project_url];

        $query = http_build_query($params);
        $res = $client->request("GET", (string)$url."?{$query}");
        $str = (string)$res->getBody();
        
        return json_decode($str, true);
    }
}
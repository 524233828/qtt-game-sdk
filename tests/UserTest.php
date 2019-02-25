<?php

/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2019/2/25
 * Time: 10:23
 */

require dirname(__FILE__)."/../vendor/autoload.php";


use PHPUnit\Framework\TestCase;
use JoseChan\QttGame\User;

class UserTest extends TestCase
{
    /**
     * @var User $sdk;
     */
    public $sdk;

    public function setUp()
    {
        $this->sdk = new User('a3y3YqVTgGJU', 'LFVemHyqyNHe1ALsADJALFHlPaE7mlApjbxudqJrAyGcjPnFLMbjygJbyhjyHjoP', true);
    }

    public function testTest()
    {
        $result = $this->sdk->test("600020");

        $this->assertNotEmpty($result['data']['url']);

        if(!empty($result['data']['url']))
        {
            $url = new \GuzzleHttp\Psr7\Uri($result['data']['url']);

            $query = $url->getQuery();

            parse_str($query, $query_array);
        }
        return $query_array['ticket'];
    }

    /**
     * @param $ticket
     * @depends testTest
     */
    public function testGet($ticket)
    {
        $result = $this->sdk->get("qtt", $ticket);

        $this->assertNotEmpty($result['data']['open_id']);
    }
}
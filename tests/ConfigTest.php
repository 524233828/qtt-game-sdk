<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2019/2/24
 * Time: 16:08
 */

require dirname(__FILE__)."/../vendor/autoload.php";


use PHPUnit\Framework\TestCase;
use JoseChan\QttGame\Config;

class ConfigTest extends TestCase
{
    /**
     * @var Config $sdk;
     */
    public $sdk;

    public function setUp()
    {
        $this->sdk = new Config('', '', true);
    }

    public function testGet()
    {
        $name = "易经算命";

        $url = "http://tjl.jyeg.net/index.html";

        $response = $this->sdk->get($name, $url);
        var_dump($response);

        $this->assertNotEmpty($response['open']['app']['id']);
        $this->assertNotEmpty($response['open']['app']['key']);
    }
}

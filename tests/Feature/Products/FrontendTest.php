<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-07-18 21:13
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Tests\Feature\Products;

use CrCms\Tests\TestCase;

/**
 * Class FrontendTest
 * @package CrCms\Mall\Tests\Feature\Products
 */
class FrontendTest extends TestCase
{

    public function testList()
    {
        //各类搜索条件
        $condition = [];

        $response = $this->get('api/v1/mall/products',$condition);

        $response->assertSuccessful();

        $content = $response->getContent();

        $content = json_decode($content,true);

        $this->assertEquals(0,json_last_error());

        $this->assertArrayHasKey('data',$content);

        if (isset($content['data'][0])) {
            $this->assertArrayHasKey('id',$content['data'][0]);
            $this->assertArrayHasKey('name',$content['data'][0]);
        }
    }

}
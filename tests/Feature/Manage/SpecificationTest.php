<?php

/**
 * @author simon <simon@crcms.cn>
 * @datetime 2018-07-28 16:44
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Modules\mall\tests\Feature\Manage;

use CrCms\Mall\Attributes\MallAttribute;
use CrCms\Tests\TestCase;
use Faker\Generator;
use Illuminate\Support\Str;

/**
 * Class SpecificationTest
 * @package CrCms\Modules\mall\tests\Feature\Manage
 */
class SpecificationTest extends TestCase
{


    public function testStore()
    {
        $data = [
            'name' => Str::random(30),
            'status' => MallAttribute::STATUS_ENABLE,
            'sort' => mt_rand(1, 999),
        ];

        $response = $this->postJson(route('mall.manage.specifications.store'), $data);

        $response->assertSuccessful();

        $data = json_decode($response->getContent(), true);

        $this->assertArrayHasKey('data', $data);
        $this->assertArrayHasKey('name', $data['data']);
        $this->assertArrayHasKey('sort', $data['data']);
        $this->assertArrayHasKey('status', $data['data']);
        $this->assertArrayHasKey('id', $data['data']);
        return $data['data'];
    }

    /**
     * @depends testStore
     * @param array $data
     */
    public function testUpdate(array $data)
    {
        $data['name'] = Str::random(10);
        $data['status'] = MallAttribute::STATUS_DISABLE;

        $response = $this->putJson(route('mall.manage.specifications.update',['specification'=>$data['id']]),$data);

        $response->assertSuccessful();

        $data = json_decode($response->getContent(), true);

        $this->assertArrayHasKey('data', $data);
        $this->assertArrayHasKey('name', $data['data']);
        $this->assertArrayHasKey('sort', $data['data']);
        $this->assertArrayHasKey('status', $data['data']);
        $this->assertArrayHasKey('id', $data['data']);
        return $data['data'];
    }

    /**
     * @depends testUpdate
     * @param array $data
     */
    public function testDestroy(array $data)
    {
        $response = $this->putJson(route('mall.manage.specifications.destroy',['specification'=>$data['id']]),$data);

        $response->assertSuccessful();
    }

}
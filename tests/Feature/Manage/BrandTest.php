<?php

/**
 * @author simon <simon@crcms.cn>
 * @datetime 2018-07-29 18:59
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Modules\mall\tests\Feature\Manage;

use CrCms\Mall\Attributes\MallAttribute;
use CrCms\Tests\TestCase;
use Illuminate\Support\Str;

/**
 * Class BrandTest
 * @package CrCms\Modules\mall\tests\Feature\Manage
 */
class BrandTest extends TestCase
{

    public function testStore()
    {
        $data = [
            'name' => Str::random(30),
            'logo' => 'https://ss0.bdstatic.com/70cFuHSh_Q1YnxGkpoWK1HF6hhy/it/u=2725050917,3093897147&fm=27&gp=0.jpg',
            'status' => MallAttribute::STATUS_ENABLE,
            'recommend' => MallAttribute::RECOMMEND_YES,
            'sort' => mt_rand(1, 999),
        ];

        $response = $this->postJson(route('mall.manage.brands.store'), $data);

        $response->assertSuccessful();

        $data = json_decode($response->getContent(), true);

        $this->assertArrayHasKey('data', $data);
        $this->assertArrayHasKey('name', $data['data']);
        $this->assertArrayHasKey('sort', $data['data']);
        $this->assertArrayHasKey('status', $data['data']);
        $this->assertArrayHasKey('logo', $data['data']);
        $this->assertArrayHasKey('recommend', $data['data']);
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

        $response = $this->putJson(route('mall.manage.brands.update',['brand'=>$data['id']]),$data);

        $response->assertSuccessful();

        $data = json_decode($response->getContent(), true);

        $this->assertArrayHasKey('data', $data);
        $this->assertArrayHasKey('name', $data['data']);
        $this->assertArrayHasKey('sort', $data['data']);
        $this->assertArrayHasKey('status', $data['data']);
        $this->assertArrayHasKey('logo', $data['data']);
        $this->assertArrayHasKey('recommend', $data['data']);
        $this->assertArrayHasKey('id', $data['data']);
        return $data['data'];
    }

    /**
     * @depends testUpdate
     * @param array $data
     */
    public function testDestroy(array $data)
    {
        $response = $this->putJson(route('mall.manage.brands.destroy',['brand'=>$data['id']]),$data);

        $response->assertSuccessful();
    }

}
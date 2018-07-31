<?php

/**
 * @author simon <simon@crcms.cn>
 * @datetime 2018-07-08 15:47
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Tests\Feature;

use CrCms\Mall\Attributes\MallAttribute;
use CrCms\Mall\Models\Product\CategoryModel as ProductCategoryModel;
use CrCms\Tests\CreatesApplication;
use Illuminate\Foundation\Testing\TestCase;
use Illuminate\Support\Str;

/**
 * Class CategoryTest
 * @package CrCms\Mall\Tests\Feature
 */
class CategoryTest extends TestCase
{
    use CreatesApplication;

    public function testStore()
    {
        $data = [
            'parent_id' => 0,
            'name' => Str::random(30),
            'status' => MallAttribute::STATUS_ENABLE,
            'sort' => mt_rand(5, 30)
        ];
//        'index' => 'mall.manage.categories.index',


        $response = $this->postJson(route('mall.manage.product.categories.index'), $data);

        $response->assertSuccessful();

        $array = json_decode($response->getContent(), true);

        foreach ($data as $key => $value) {
            if ($key === 'parent_id') continue;
            $this->assertEquals($array['data'][$key], $value);
        }

        return $array['data'];
    }

    /**
     * @depends testStore
     * @param array $mainData
     */
    public function testSonStore(array $mainData)
    {
        $sonData = [
            'parent_id' => $mainData['id'],
            'name' => 'son',
            'status' => MallAttribute::STATUS_DISABLE,
            'sort' => 0
        ];
////            'store' => 'mall.manage.categories.store',
        $response = $this->postJson(route('mall.manage.product.categories.store'), $sonData);

        $response->assertSuccessful();
        $array = json_decode($response->getContent(), true);

        $this->assertArrayHasKey('data', $array);

        $data = $array['data'];

        foreach ($data as $key => $value) {
            if ($key === 'parent_id') continue;
            $this->assertEquals($array['data'][$key], $value);
        }

        $this->assertEquals($data['parent']['id'], $mainData['id']);

        return $data;
    }

    /**
     * @depends testSonStore
     * @param array $data
     */
    public function testUpdate(array $data)
    {
        $newData = $data;
        $newData['name'] = Str::random(20);
        $newData['parent_id'] = $data['parent']['id'];
        unset($newData['sign']);

        $response = $this->putJson(route('mall.manage.product.categories.update', ['category' => $data['id']]), $newData);

        $response->assertSuccessful();

        $result = json_decode($response->getContent(), true);

        $this->assertArrayHasKey('data', $result);

        $result = $result['data'];

        $this->assertEquals($newData['name'], $result['name']);

    }

    /**
     * @depends  testStore
     * @param array $data
     */
    public function testDestroy(array $data)
    {
        $response = $this->deleteJson(route('mall.manage.product.categories.destroy', ['category' => $data['id']]));

        $response->assertSuccessful();

        $model = ProductCategoryModel::find($data['id']);
        $this->assertEquals(null, $model);
        $this->assertSoftDeleted(
            (new ProductCategoryModel())->getTable(),
            ['id' => $data['id'], 'name' => $data['name']]
        );
    }
}
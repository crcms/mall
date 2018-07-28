<?php

/**
 * @author simon <simon@crcms.cn>
 * @datetime 2018-07-14 11:35
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Tests\Feature\Specifications;

use CrCms\Mall\Models\CategoryModel;
use CrCms\Tests\TestCase;
use Illuminate\Support\Str;

/**
 * Class BaseTest
 * @package CrCms\Mall\Tests\Feature\Specifications
 */
class BaseTest extends TestCase
{

    public function dataProvider(): array
    {
        $category = CategoryModel::create([
            'name' => Str::random(10),
        ]);

        return [
            'name' => Str::random(10),
            'category_id' => $category->id,
            'sort' => 1,
            'status' => 1,
        ];
    }


    public function testCreate()
    {
        $data = $this->dataProvider();

        $response = $this->postJson('api/v1/mall/manage/specifications',$data);

        $response->assertSuccessful();

        $content = json_decode($response->getContent(),true);

        $this->assertArrayHasKey('data',$content);

        $content = $content['data'];


    }

}
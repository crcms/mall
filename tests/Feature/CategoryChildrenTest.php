<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-07-08 20:30
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Tests\Feature;

use CrCms\Mall\Models\CategoryModel;
use CrCms\Tests\TestCase;
use Illuminate\Support\Facades\DB;

/**
 * Class CategoryChildrenTest
 * @package CrCms\Mall\Tests\Feature
 */
class CategoryChildrenTest extends TestCase
{

    public function testChildren()
    {
        DB::table((new CategoryModel())->getTable())->truncate();

        $model1 = CategoryModel::create(['name' => 'abc', 'parent_id' => null]);

        $model2 = CategoryModel::create(['name' => 's_abc_1', 'parent_id' => $model1->id]);
        $model3 = CategoryModel::create(['name' => 's_abc_2', 'parent_id' => $model1->id]);

        $model4 = CategoryModel::create(['name' => 's_s_abc_1', 'parent_id' => $model2->id]);

        //必须要重新查，create后的model无用！！！！！尴尬
//        dump(count(CategoryModel::find(1)->descendants));

        $this->assertTrue(true,CategoryModel::find(4)->children->isEmpty());

        $response = $this->deleteJson('/api/v1/mall/manage/categories/'.strval($model1->id));

        dump($response->getStatusCode());
        $response->assertSuccessful();

        $this->assertEquals(DB::table((new CategoryModel())->getTable())->whereNull('deleted_at')->count(),0);

//        dump($model4->children);
        /*foreach ($model1->children()->get() as $sModel) {
            dump('==='.$sModel->id.'===');
        }*/

//        foreach ($model1->descendants()->get() as $sModel) {
//            dump('==='.$sModel->id.'===');
//        }
//        dump($model4->parent);
    }

}
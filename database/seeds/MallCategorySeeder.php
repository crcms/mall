<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use CrCms\Mall\Models\CategoryModel;
use CrCms\Mall\Attributes\MallAttribute;

class MallCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table((new CategoryModel())->getTable())->truncate();

        $mainIds = [];
        for ($i = 1;$i<=10;$i++) {
            $mainIds[] = CategoryModel::create([
                'name' => '一级分类'.strval($i),
                'status' => MallAttribute::STATUS_ENABLE,
                'sort' => mt_rand(1,9999),
            ])->id;
        }

        $twoIds = [];
        foreach ($mainIds as $mid) {
            for ($i = 1;$i<=15;$i++) {
                $twoIds[] = CategoryModel::create([
                    'name' => '二级分类'.strval($i),
                    'status' => MallAttribute::STATUS_ENABLE,
                    'sort' => mt_rand(1,9999),
                    'parent_id' => $mid
                ])->id;
            }
        }

        foreach ($twoIds as $sid) {
            for ($i = 1;$i<=15;$i++) {
                CategoryModel::create([
                    'name' => '三级分类'.strval($i),
                    'status' => MallAttribute::STATUS_ENABLE,
                    'sort' => mt_rand(1,9999),
                    'parent_id' => $sid
                ])->id;
            }
        }
    }
}

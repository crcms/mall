<?php

/**
 * @author simon <simon@crcms.cn>
 * @datetime 2018-07-17 21:52
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Http\Resources;

use CrCms\Foundation\App\Http\Resources\Resource;
use CrCms\Mall\Http\Resources\Product\BrandResource;
use CrCms\Mall\Http\Resources\Product\CategoryResource;
use CrCms\Mall\Http\Resources\Product\StockResource;
use CrCms\Mall\Models\ProductModel;
use CrCms\Modules\mall\src\Http\Resources\Product\DetailResource;

class ProductResource extends Resource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'market_price' => $this->market_price,
            'price' => $this->price,
            'image' => $this->image,
            $this->mergeWhen($request->route()->getName() === 'mall.products.show', [
                'stock' => $this->stock,
                'area_id' => $this->area_id,
                'mall_user_id' => $this->mall_user_id,
                'added_at' => $this->added_at->toDateTimeString(),
                'dismounted_at' => $this->dismounted_at->toDateTimeString(),
            ]),
        ];
    }

    protected function includeDetail(ProductModel $productModel): DetailResource
    {
        return new DetailResource($productModel->hasOneDetail);
    }

    protected function includeBrand(ProductModel $productModel): BrandResource
    {
        return new BrandResource($productModel->hasOneBrand);
    }

    protected function includeCategory(ProductModel $productModel): CategoryResource
    {
        return new CategoryResource($productModel->hasOneCategory);
    }

    protected function includeStocks(ProductModel $productModel)
    {
        return StockResource::collection($productModel->belongsToStocks()->get());
    }
}
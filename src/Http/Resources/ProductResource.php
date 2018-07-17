<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-07-17 21:52
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Http\Resources;

use CrCms\Foundation\App\Http\Resources\Resource;
use CrCms\Mall\Models\ProductModel;
use CrCms\Modules\mall\src\Http\Resources\ProductDetailResource;

/**
 * Class ProductResource
 * @package CrCms\Mall\Http\Resources
 */
class ProductResource extends Resource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'market_price' => $this->market_price,
            'price' => $this->price,
            'image' => $this->image,
            $this->mergeWhen(false, [
                'stock' => $this->stock,
                'area_id' => $this->area_id,
                'mall_user_id' => $this->mall_user_id,
                'added_at' => $this->added_at->toDateTimeString(),
                'dismounted_at' => $this->dismounted_at->toDateTimeString(),
            ]),
        ];
    }

    /**
     * @param ProductModel $productModel
     * @return ProductDetailResource
     */
    protected function includeDetail(ProductModel $productModel): ProductDetailResource
    {
        return new ProductDetailResource($productModel->belongsToDetail);
    }

    /**
     * @param ProductModel $productModel
     * @return ProductBrandResource
     */
    protected function includeBrand(ProductModel $productModel): ProductBrandResource
    {
        return new ProductBrandResource($productModel->hasOneBrand);
    }

    /**
     * @param ProductModel $productModel
     * @return ProductCategoryResource
     */
    protected function includeCategory(ProductModel $productModel): ProductCategoryResource
    {
        return new ProductCategoryResource($productModel->belongsToCategory);
    }

    /**
     * @param ProductModel $productModel
     * @return \CrCms\Foundation\App\Http\Resources\ResourceCollection
     */
    protected function includeStocks(ProductModel $productModel)
    {
        return ProductStockResource::collection($productModel->belongsToManyStocks);
    }
}
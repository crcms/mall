<?php

/**
 * @author simon <simon@crcms.cn>
 * @datetime 2018-07-18 06:54
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Http\Resources\Product;

use CrCms\Foundation\App\Http\Resources\Resource;

class BrandResource extends Resource
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
        ];
    }

    /**
     * @return CategoryResource
     */
    protected function includeCategory(): CategoryResource
    {
        return new CategoryResource($this->belongsToCategory);
    }
}
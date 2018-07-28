<?php

/**
 * @author simon <simon@crcms.cn>
 * @datetime 2018-04-10 21:30
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Http\Resources;

use CrCms\Mall\Attributes\CategoryAttribute;
use CrCms\Foundation\App\Http\Resources\Resource;
use Illuminate\Support\Arr;

class AttributeResource extends Resource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {
        $all = [
            'status' => CategoryAttribute::getStaticTransform(CategoryAttribute::KEY_STATUS),
        ];

        return $this->resource ? Arr::only($all, $this->resource) : $all;
    }
}
<?php

/**
 * @author simon <simon@crcms.cn>
 * @datetime 2018-07-29 18:01
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Http\Resources\Manage;

use CrCms\Foundation\App\Http\Resources\Resource;
use CrCms\Mall\Attributes\MallAttribute;

/**
 * Class ProductBrandResource
 * @package CrCms\Mall\Http\Resources\Manage
 */
class ProductBrandResource extends Resource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'status' => $this->status,
            'status_convert' => MallAttribute::getStaticTransform(MallAttribute::KEY_STATUS . '.' . strval($this->status)),
            'recommend' => $this->recommend,
            'recommend_convert' => MallAttribute::getStaticTransform(MallAttribute::KEY_RECOMMEND.'.'.strval($this->recommend)),
            'logo' => $this->logo,
            'name' => $this->name,
            'sort' => $this->sort,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }

}
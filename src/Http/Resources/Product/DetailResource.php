<?php

/**
 * @author simon <simon@crcms.cn>
 * @datetime 2018-07-18 06:56
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Modules\mall\src\Http\Resources\Product;

use CrCms\Foundation\App\Http\Resources\Resource;

class DetailResource extends Resource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'characteristic' => $this->characteristic,
            'detail' => $this->detail,
            'attributes' => $this->attributes,
        ];
    }
}
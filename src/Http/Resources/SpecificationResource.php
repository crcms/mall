<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-07-14 11:29
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Http\Resources;

use CrCms\Foundation\App\Http\Resources\Resource;
use CrCms\Mall\Attributes\MallAttribute;
use CrCms\Mall\Models\SpecificationModel;

/**
 * Class SpecificationResource
 * @package CrCms\Mall\Http\Resources
 */
class SpecificationResource extends Resource
{
    /**
     * @var array
     */
    protected $defaultIncludes = ['category'];

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'sort' => $this->sort,
            'status' => $this->status,
            'status_convert' => MallAttribute::getStaticTransform(MallAttribute::KEY_STATUS . '.' . strval($this->status)),
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }

    /**
     * @param SpecificationModel $specificationModel
     * @return CategoryResource
     */
    protected function includeCategory(SpecificationModel $specificationModel): CategoryResource
    {
        return new CategoryResource($specificationModel->belongsToCategory);
    }
}
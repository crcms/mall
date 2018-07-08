<?php

namespace CrCms\Mall\Http\Resources;

use CrCms\Mall\Attributes\CategoryAttribute;
use CrCms\Foundation\App\Http\Resources\Resource;
use Illuminate\Http\Request;

/**
 * Class CategoryResource
 * @package CrCms\Mall\Http\Resources
 */
class CategoryResource extends Resource
{
    /**
     * @var array
     */
    protected $defaultIncludes = [];

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'sign' => $this->sign,
            'status' => $this->status,
            'status_convert' => CategoryAttribute::getStaticTransform(CategoryAttribute::KEY_STATUS . '.' . strval($this->status)),
            'sort' => $this->sort,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
            $this->mergeWhen($request->route()->getName() === 'mall.manage.categories.index', function () {
                return ['children' => $this->children->isEmpty() ? null : self::collection($this->children)];
            }),

            $this->mergeWhen($request->route()->getName() !== 'mall.manage.categories.index', function () {
                return ['parent' => empty($this->parent) ? null : new self($this->parent),];
            }),
        ];
    }
}
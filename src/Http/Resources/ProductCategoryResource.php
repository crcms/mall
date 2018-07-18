<?php

namespace CrCms\Mall\Http\Resources;

use CrCms\Foundation\App\Http\Resources\Resource;
use Illuminate\Http\Request;

/**
 * Class ProductCategoryResource
 * @package CrCms\Mall\Http\Resources
 */
class ProductCategoryResource extends Resource
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
        ];
    }
}
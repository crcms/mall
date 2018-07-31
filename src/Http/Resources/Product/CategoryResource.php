<?php

namespace CrCms\Mall\Http\Resources\Product;

use CrCms\Foundation\App\Http\Resources\Resource;
use Illuminate\Http\Request;

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
        ];
    }
}
<?php

namespace CrCms\Mall\Http\Controllers\Api\Manage;

use CrCms\Mall\Handlers\Manage\Product\Category\DestroyHandler;
use CrCms\Mall\Handlers\Manage\Product\Category\ListHandler;
use CrCms\Mall\Handlers\Manage\Product\Category\StoreHandler;
use CrCms\Mall\Handlers\Manage\Product\Category\UpdateHandler;
use CrCms\Foundation\App\Http\Controllers\Controller;
use CrCms\Mall\Http\Resources\Manage\Product\CategoryResource as ProductCategoryResource;

/**
 * Class CategoryController
 * @package CrCms\Mall\Http\Controllers\Api\Manage
 */
class CategoryController extends Controller
{
    /**
     * @param ListHandler $handler
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ListHandler $handler)
    {
        return $this->response->collection(
            $handler,
            ProductCategoryResource::class
        );
    }

    /**
     * @param StoreHandler $handler
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreHandler $handler)
    {
        return $this->response->resource(
            $handler->handle(),
            ProductCategoryResource::class, ['children']
        );
    }

    /**
     * @param UpdateHandler $handler
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateHandler $handler, int $id)
    {
        return $this->response->resource(
            $handler->handle(),
            ProductCategoryResource::class, ['children']
        );
    }

    /**
     * @param DestroyHandler $handler
     * @param string|int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyHandler $handler, $id)
    {
        $rows = $handler->handle();

        return $this->response->noContent();
    }
}
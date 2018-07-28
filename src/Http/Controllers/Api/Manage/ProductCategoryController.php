<?php

namespace CrCms\Mall\Http\Controllers\Api\Manage;

use CrCms\Mall\Handlers\Manage\Product\Category\DestroyHandler;
use CrCms\Mall\Handlers\Manage\Product\Category\ListHandler;
use CrCms\Mall\Handlers\Manage\Product\Category\StoreHandler;
use CrCms\Mall\Handlers\Manage\Product\Category\UpdateHandler;
use CrCms\Mall\Repositories\ProductCategoryRepository;
use CrCms\Foundation\App\Http\Controllers\Controller;
use CrCms\Mall\Http\Resources\Manage\ProductCategoryResource;

/**
 * Class ProductCategoryController
 * @package CrCms\Mall\Http\Controllers\Api\Manage
 */
class ProductCategoryController extends Controller
{
    /**
     * ProductCategoryController constructor.
     * @param ProductCategoryRepository $categoryRepository
     */
    public function __construct(ProductCategoryRepository $categoryRepository)
    {
        parent::__construct();
        $this->repository = $categoryRepository;
    }

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
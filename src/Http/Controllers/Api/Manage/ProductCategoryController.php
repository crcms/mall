<?php

namespace CrCms\Mall\Http\Controllers\Api\Manage;

use CrCms\Mall\Http\Requests\Category\StoreRequest;
use CrCms\Mall\Http\Requests\Category\UpdateRequest;
use CrCms\Mall\Http\Resources\ProductCategoryResource;
use CrCms\Mall\Repositories\ProductCategoryRepository;
use CrCms\Foundation\App\Http\Controllers\Controller;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = $this->repository->tree();

        return $this->response->collection($models, ProductCategoryResource::class);
    }

    /**
     * @param StoreRequest $storeRequest
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $storeRequest)
    {
        $model = $this->repository->create($storeRequest->all());

        return $this->response->resource($model, ProductCategoryResource::class, ['children']);
    }

    /**
     * @param UpdateRequest $updateRequest
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $updateRequest, int $id)
    {
        $model = $this->repository->update($updateRequest->all(), $id);

        return $this->response->resource($model, ProductCategoryResource::class, ['children']);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rows = $this->repository->deleteSelfAndDescendants($id);

        return $this->response->noContent();
    }
}
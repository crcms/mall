<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-07-14 11:11
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Http\Controllers\Api\Manage;

use CrCms\Foundation\App\Http\Controllers\Controller;
use CrCms\Mall\Actions\Specification\StoreAction;
use CrCms\Mall\Actions\Specification\UpdateAction;
use CrCms\Mall\Http\Requests\Specification\QueryRequest;
use CrCms\Mall\Repositories\ProductSpecificationRepository;
use CrCms\Mall\Http\Resources\ProductSpecificationResource;

/**
 * Class ProductSpecificationController
 * @package CrCms\Mall\Http\Controllers\Api\Manage
 */
class ProductSpecificationController extends Controller
{
    /**
     * ProductSpecificationController constructor.
     * @param ProductSpecificationRepository $repository
     */
    public function __construct(ProductSpecificationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(QueryRequest $request)
    {

    }

    public function store(StoreAction $action)
    {
        return $this->response->resource($action->handle(), ProductSpecificationResource::class);
    }

    public function update(int $id, UpdateAction $action)
    {
        $model = $action->handle(['id' => $id]);

        return $this->response->resource($model, ProductSpecificationResource::class);
    }

    public function destroy()
    {

    }
}
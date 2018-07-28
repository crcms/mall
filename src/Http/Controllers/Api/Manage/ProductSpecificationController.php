<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-07-14 11:11
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Http\Controllers\Api\Manage;

use CrCms\Foundation\App\Http\Controllers\Controller;
use CrCms\Mall\Handlers\Product\Manage\Specification\DestroyHandler;
use CrCms\Mall\Handlers\Product\Manage\Specification\ListHandler;
use CrCms\Mall\Handlers\Product\Manage\Specification\StoreHandler;
use CrCms\Mall\Handlers\Product\Manage\Specification\UpdateHandler;
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

    /**
     * @param ListHandler $handler
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ListHandler $handler)
    {
        return $this->response->collection($handler->handle(), ProductSpecificationResource::class);
    }

    /**
     * @param StoreHandler $handler
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreHandler $handler)
    {
        return $this->response->resource($handler->handle(), ProductSpecificationResource::class);
    }

    /**
     * @param UpdateHandler $handler
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateHandler $handler, int $id)
    {
        return $this->response->resource($handler->handle(), ProductSpecificationResource::class);
    }

    /**
     * @param DestroyHandler $handler
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyHandler $handler)
    {
        $rows = $handler->handle();

        return $this->response->noContent();
    }
}
<?php

/**
 * @author simon <simon@crcms.cn>
 * @datetime 2018-07-14 11:11
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Http\Controllers\Api\Manage;

use CrCms\Foundation\App\Http\Controllers\Controller;
use CrCms\Mall\Handlers\Manage\Product\Specification\DestroyHandler;
use CrCms\Mall\Handlers\Manage\Product\Specification\ListHandler;
use CrCms\Mall\Handlers\Manage\Product\Specification\StoreHandler;
use CrCms\Mall\Handlers\Manage\Product\Specification\UpdateHandler;
use CrCms\Mall\Http\Resources\Product\SpecificationResource as ProductSpecificationResource;

class ProductSpecificationController extends Controller
{
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
<?php

/**
 * @author simon <simon@crcms.cn>
 * @datetime 2018-07-29 18:01
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Http\Controllers\Api\Manage;

use CrCms\Foundation\App\Http\Controllers\Controller;
use CrCms\Mall\Handlers\Manage\Product\Brand\DestroyHandler;
use CrCms\Mall\Handlers\Manage\Product\Brand\ListHandler;
use CrCms\Mall\Handlers\Manage\Product\Brand\StoreHandler;
use CrCms\Mall\Handlers\Manage\Product\Brand\UpdateHandler;
use CrCms\Mall\Http\Resources\Manage\Product\BrandResource as ProductBrandResource;

/**
 * Class BrandController
 * @package CrCms\Mall\Http\Controllers\Api\Manage
 */
class BrandController extends Controller
{
    /**
     * @param ListHandler $handler
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ListHandler $handler)
    {
        return $this->response->paginator($handler->handle(), ProductBrandResource::class);
    }

    /**
     * @param StoreHandler $handler
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreHandler $handler)
    {
        return $this->response->resource($handler->handle(), ProductBrandResource::class);
    }

    /**
     * @param UpdateHandler $handler
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateHandler $handler, int $id)
    {
        return $this->response->resource($handler->handle(), ProductBrandResource::class);
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
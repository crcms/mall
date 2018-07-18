<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-07-17 20:16
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Http\Controllers\Api;

use CrCms\Foundation\App\Http\Controllers\Controller;
use CrCms\Mall\Handlers\Product\ListHandler;
use CrCms\Mall\Handlers\Product\ShowHandler;
use CrCms\Mall\Http\Resources\ProductResource;
use CrCms\Repository\Exceptions\ResourceNotFoundException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class ProductController
 * @package CrCms\Mall\Http\Controllers\Api
 */
class ProductController extends Controller
{
    /**
     * @param ListHandler $handler
     * @return \Illuminate\Http\Response
     */
    public function index(ListHandler $handler)
    {
        return $this->response->paginator($handler->handle(), ProductResource::class);
    }

    /**
     * @param ShowHandler $handler
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowHandler $handler)
    {
        try {
            return $this->response->resource($handler->handle(), ProductResource::class);
        } catch (ModelNotFoundException | ResourceNotFoundException $exception) {
            throw new NotFoundHttpException();
        }
    }
}
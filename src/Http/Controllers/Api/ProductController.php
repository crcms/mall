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
use CrCms\Mall\Http\Resources\ProductResource;

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
}
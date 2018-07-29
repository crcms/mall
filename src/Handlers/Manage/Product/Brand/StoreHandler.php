<?php

/**
 * @author simon <simon@crcms.cn>
 * @datetime 2018-07-29 18:00
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Handlers\Manage\Product\Brand;

use CrCms\Foundation\App\Handlers\AbstractHandler;
use CrCms\Foundation\App\Handlers\Traits\RepositoryHandlerTrait;
use CrCms\Foundation\App\Handlers\Traits\RequestHandlerTrait;
use CrCms\Mall\Models\ProductBrandModel;
use CrCms\Mall\Repositories\ProductBrandRepository;
use Illuminate\Http\Request;

/**
 * Class StoreHandler
 * @package CrCms\Mall\Handlers\Manage\Product\Brand
 */
class StoreHandler extends AbstractHandler
{
    use RequestHandlerTrait, RepositoryHandlerTrait;

    /**
     * StoreHandler constructor.
     * @param Request $request
     * @param ProductBrandRepository $repository
     */
    public function __construct(Request $request, ProductBrandRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;
    }

    /**
     * @return ProductBrandModel
     */
    public function handle(): ProductBrandModel
    {
        return $this->repository->create($this->request->all());
    }
}
<?php

/**
 * @author simon <simon@crcms.cn>
 * @datetime 2018-07-29 18:01
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Handlers\Manage\Product\Brand;

use CrCms\Foundation\App\Handlers\AbstractHandler;
use CrCms\Foundation\App\Handlers\Traits\RepositoryHandlerTrait;
use CrCms\Foundation\App\Handlers\Traits\RequestHandlerTrait;
use CrCms\Mall\Repositories\Product\BrandRepository as ProductBrandRepository;
use Illuminate\Http\Request;

/**
 * Class DestroyHandler
 * @package CrCms\Mall\Handlers\Manage\Product\Brand
 */
class DestroyHandler extends AbstractHandler
{
    use RequestHandlerTrait, RepositoryHandlerTrait;

    /**
     * DestroyHandler constructor.
     * @param Request $request
     * @param ProductBrandRepository $repository
     */
    public function __construct(Request $request, ProductBrandRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;
    }

    /**
     * @return int
     */
    public function handle(): int
    {
        return $this->repository->delete($this->request->route()->parameter('brand'));
    }
}
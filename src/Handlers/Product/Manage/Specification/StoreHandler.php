<?php

/**
 * @author simon <simon@crcms.cn>
 * @datetime 2018-07-14 11:24
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Handlers\Product\Manage\Specification;

use CrCms\Foundation\App\Handlers\AbstractHandler;
use CrCms\Foundation\App\Handlers\Traits\RepositoryHandlerTrait;
use CrCms\Foundation\App\Handlers\Traits\RequestHandlerTrait;
use CrCms\Mall\Models\ProductSpecificationModel;
use CrCms\Mall\Repositories\ProductSpecificationRepository;
use Illuminate\Http\Request;

/**
 * Class StoreHandler
 * @package CrCms\Mall\Handlers\Product\Manage\Specification
 */
class StoreHandler extends AbstractHandler
{
    use RequestHandlerTrait, RepositoryHandlerTrait;

    /**
     * StoreHandler constructor.
     * @param Request $request
     * @param ProductSpecificationRepository $repository
     */
    public function __construct(Request $request, ProductSpecificationRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;
    }

    /**
     * @param array $data
     * @return ProductSpecificationModel
     */
    public function handle(): ProductSpecificationModel
    {
        //$this->validate();

        return $this->repository->create($this->request->all());
    }
}
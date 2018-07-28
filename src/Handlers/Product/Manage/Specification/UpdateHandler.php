<?php

/**
 * @author simon <simon@crcms.cn>
 * @datetime 2018-07-14 11:26
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
 * Class UpdateHandler
 * @package CrCms\Mall\Handlers\Product\Manage\Specification
 */
class UpdateHandler extends AbstractHandler
{
    use RequestHandlerTrait, RepositoryHandlerTrait;

    /**
     * UpdateAction constructor.
     * @param Request $request
     * @param ProductSpecificationRepository $repository
     */
    public function __construct(Request $request, ProductSpecificationRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;
    }

    /**
     * @return ProductSpecificationModel
     */
    public function handle(): ProductSpecificationModel
    {
        //$this->validate();

        return $this->repository->update($this->request->all(), $this->request->route()->parameter('specification'));
    }
}
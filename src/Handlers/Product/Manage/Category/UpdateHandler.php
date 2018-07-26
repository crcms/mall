<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-07-27 06:51
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Handlers\Product\Manage\Category;

use CrCms\Foundation\App\Handlers\AbstractHandler;
use CrCms\Foundation\App\Handlers\Traits\RepositoryHandlerTrait;
use CrCms\Foundation\App\Handlers\Traits\RequestHandlerTrait;
use CrCms\Mall\Models\ProductCategoryModel;
use CrCms\Mall\Repositories\ProductCategoryRepository;
use Illuminate\Http\Request;

/**
 * Class UpdateHandler
 * @package CrCms\Mall\Handlers\Product\Manage\Category
 */
class UpdateHandler extends AbstractHandler
{
    use RequestHandlerTrait, RepositoryHandlerTrait;

    /**
     * UpdateHandler constructor.
     * @param Request $request
     * @param ProductCategoryRepository $repository
     */
    public function __construct(Request $request, ProductCategoryRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;
    }

    /**
     * @return ProductCategoryModel
     */
    public function handle(): ProductCategoryModel
    {
        //$this->validate();

        return $this->repository->update($this->request->all(), intval($this->request->route()->parameters['category']));
    }
}
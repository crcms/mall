<?php

/**
 * @author simon <simon@crcms.cn>
 * @datetime 2018-07-27 06:54
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Handlers\Product\Manage\Category;

use CrCms\Foundation\App\Handlers\AbstractHandler;
use CrCms\Foundation\App\Handlers\Traits\RepositoryHandlerTrait;
use CrCms\Foundation\App\Handlers\Traits\RequestHandlerTrait;
use CrCms\Mall\Repositories\ProductCategoryRepository;
use Illuminate\Http\Request;

/**
 * Class DestroyHandler
 * @package CrCms\Mall\Handlers\Product\Manage\Category
 */
class DestroyHandler extends AbstractHandler
{
    use RequestHandlerTrait, RepositoryHandlerTrait;

    /**
     * DestroyHandler constructor.
     * @param Request $request
     * @param ProductCategoryRepository $repository
     */
    public function __construct(Request $request, ProductCategoryRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;
    }

    /**
     * @return int
     */
    public function handle(): int
    {
        return $this->repository->deleteSelfAndDescendants($this->request->route()->parameter('category'));
    }
}
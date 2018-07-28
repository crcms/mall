<?php

/**
 * @author simon <simon@crcms.cn>
 * @datetime 2018-07-27 06:45
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Handlers\Product\Manage\Category;


use CrCms\Foundation\App\Handlers\AbstractHandler;
use CrCms\Foundation\App\Handlers\Traits\RepositoryHandlerTrait;
use CrCms\Mall\Repositories\ProductCategoryRepository;
use Illuminate\Support\Collection;

/**
 * Class ListHandler
 * @package CrCms\Mall\Handlers\Product\Manage\Category
 */
class ListHandler extends AbstractHandler
{
    use RepositoryHandlerTrait;

    /**
     * ListHandler constructor.
     * @param ProductCategoryRepository $repository
     */
    public function __construct(ProductCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function handle(): Collection
    {
        return $this->repository->tree();
    }
}
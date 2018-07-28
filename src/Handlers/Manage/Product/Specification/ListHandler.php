<?php

/**
 * @author simon <simon@crcms.cn>
 * @datetime 2018-07-28 16:18
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Handlers\Manage\Product\Specification;

use CrCms\Foundation\App\Handlers\AbstractHandler;
use CrCms\Foundation\App\Handlers\Traits\RepositoryHandlerTrait;
use CrCms\Foundation\App\Handlers\Traits\RequestHandlerTrait;
use CrCms\Mall\Repositories\ProductSpecificationRepository;
use CrCms\Modules\mall\src\Repositories\Magic\ProductSpecificationMagic;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;

/**
 * Class ListHandler
 * @package CrCms\Mall\Handlers\Manage\Product\Specification
 */
class ListHandler extends AbstractHandler
{
    use RequestHandlerTrait, RepositoryHandlerTrait;

    /**
     * ListHandler constructor.
     * @param Request $request
     * @param ProductSpecificationRepository $repository
     */
    public function __construct(Request $request, ProductSpecificationRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;
    }

    /**
     * @return Paginator
     */
    public function handle(): Paginator
    {
        return $this->repository->paginate(new ProductSpecificationMagic([
            'sort' => ['created_at', 'desc']
        ]));
    }
}
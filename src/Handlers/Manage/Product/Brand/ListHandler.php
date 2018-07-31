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
use CrCms\Mall\Repositories\Magic\Product\BrandMagic as ProductBrandMagic;
use CrCms\Mall\Repositories\Product\BrandRepository as ProductBrandRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

/**
 * Class ListHandler
 * @package CrCms\Mall\Handlers\Manage\Product\Brand
 */
class ListHandler extends AbstractHandler
{
    use RequestHandlerTrait, RepositoryHandlerTrait;

    /**
     * ListHandler constructor.
     * @param Request $request
     * @param ProductBrandRepository $repository
     */
    public function __construct(Request $request, ProductBrandRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function handle(): LengthAwarePaginator
    {
        return $this->repository->paginate(new ProductBrandMagic(['sort' => ['created_at' => 'desc']]));
    }
}
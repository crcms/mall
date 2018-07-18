<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-07-18 21:48
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Handlers\Product;

use CrCms\Foundation\App\Handlers\AbstractHandler;
use CrCms\Foundation\App\Handlers\Traits\RequestHandlerTrait;
use CrCms\Foundation\App\Handlers\Traits\RepositoryHandlerTrait;
use CrCms\Mall\Models\ProductModel;
use CrCms\Mall\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class ShowHandler
 * @package CrCms\Mall\Handlers\Product
 */
class ShowHandler extends AbstractHandler
{
    use RequestHandlerTrait, RepositoryHandlerTrait;

    /**
     * ShowHandler constructor.
     * @param Request $request
     * @param ProductRepository $repository
     */
    public function __construct(Request $request, ProductRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;
    }

    /**
     * @return ProductModel
     */
    public function handle(): ProductModel
    {
        $model = $this->repository->byIntIdOrFail($this->request->route()->parameters['product']);

        if ($model->sales_status !== 1) {
            throw new ModelNotFoundException();
        }

        return $model;
    }
}
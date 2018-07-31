<?php

/**
 * @author simon <simon@crcms.cn>
 * @datetime 2018-07-14 11:26
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Handlers\Manage\Product\Specification;

use CrCms\Foundation\App\Handlers\AbstractHandler;
use CrCms\Foundation\App\Handlers\Traits\RepositoryHandlerTrait;
use CrCms\Foundation\App\Handlers\Traits\RequestHandlerTrait;
use CrCms\Mall\Models\Product\SpecificationModel as ProductSpecificationModel;
use CrCms\Mall\Repositories\Product\SpecificationRepository as ProductSpecificationRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 * Class UpdateHandler
 * @package CrCms\Mall\Handlers\Manage\Product\Specification
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
        $this->validateRule();

        return $this->repository->update($this->request->all(), $this->request->route()->parameter('specification'));
    }


    /**
     * @return array
     */
    protected function validateRule(): array
    {
        return $this->validate(
            $this->request,
            [
                'id' => ['required', 'integer', Rule::exists($this->repository->getModel()->getTable())],
                'name' => ['required', 'max:50'],
                'category_id' => ['integer',],
                'sort' => ['required', 'integer'],
                'status' => ['required', 'integer'],
            ],
            [],
            [
                'name' => trans('mall::lang.specifications.name'),
                'category_id' => trans('mall::lang.specifications.category_id'),
                'sort' => trans('mall::lang.specifications.sort'),
                'status' => trans('mall::lang.specifications.status'),
            ]
        );
    }
}
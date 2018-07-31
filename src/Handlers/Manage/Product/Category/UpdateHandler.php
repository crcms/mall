<?php

/**
 * @author simon <simon@crcms.cn>
 * @datetime 2018-07-27 06:51
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Handlers\Manage\Product\Category;

use CrCms\Foundation\App\Handlers\AbstractHandler;
use CrCms\Foundation\App\Handlers\Traits\RepositoryHandlerTrait;
use CrCms\Foundation\App\Handlers\Traits\RequestHandlerTrait;
use CrCms\Mall\Models\Product\CategoryModel;
use CrCms\Mall\Repositories\Product\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 * Class UpdateHandler
 * @package CrCms\Mall\Handlers\Manage\Product\Category
 */
class UpdateHandler extends AbstractHandler
{
    use RequestHandlerTrait, RepositoryHandlerTrait;

    /**
     * UpdateHandler constructor.
     * @param Request $request
     * @param CategoryRepository $repository
     */
    public function __construct(Request $request, CategoryRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;
    }

    /**
     * @return CategoryModel
     */
    public function handle(): CategoryModel
    {
        $this->validateRule();

        return $this->repository->update($this->request->all(), intval($this->request->route()->parameters['category']));
    }

    /**
     * @return array
     */
    protected function validateRule(): array
    {
        $this->validate($this->request, [
            'parent_id' => ['required', 'integer'],
            'name' => ['required', 'max:50'],
            $rules['sign'] = ['max:50', Rule::unique((new CategoryModel())->getTable())->ignore($this->route()->parameter('category'))],
            'sort' => ['required', 'integer'],
            'status' => ['required', 'integer'],
            'icon' => ['max:255']
        ], [], [
            'parent_id' => trans('mall::lang.category.parent_id'),
            'name' => trans('mall::lang.category.name'),
            'sign' => trans('mall::lang.category.sign'),
            'sort' => trans('mall::lang.category.sort'),
            'status' => trans('mall::lang.category.status'),
            'icon' => trans('mall::lang.category.icon'),
        ]);
    }
}
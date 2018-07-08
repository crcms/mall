<?php

namespace CrCms\Mall\Http\Requests\Category;

use CrCms\Mall\Models\CategoryModel;
use Illuminate\Validation\Rule;

trait RequestTrait
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'parent_id' => ['required', 'integer'],
            'name' => ['required', 'max:50'],
            'sign' => ['max:50', Rule::unique((new CategoryModel())->getTable())],
            'sort' => ['required', 'integer'],
            'status' => ['required', 'integer'],
            'icon' => ['max:255'],
        ];
    }

    /**
     * @return array
     */
    public function attributes(): array
    {
        return [
            'parent_id' => trans('mall::lang.category.parent_id'),
            'name' => trans('mall::lang.category.name'),
            'sign' => trans('mall::lang.category.sign'),
            'sort' => trans('mall::lang.category.sort'),
            'status' => trans('mall::lang.category.status'),
            'icon' => trans('mall::lang.category.icon'),
        ];
    }
}
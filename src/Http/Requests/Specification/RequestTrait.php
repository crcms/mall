<?php

namespace CrCms\Mall\Http\Requests\Specification;

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
            'name' => ['required', 'max:50'],
            'category_id' => ['required', ],//Rule::exists((new CategoryModel())->getTable())],
            'sort' => ['required', 'integer'],
            'status' => ['required', 'integer'],
        ];
    }

    /**
     * @return array
     */
    public function attributes(): array
    {
        return [
            'name' => trans('mall::lang.specifications.name'),
            'category_id' => trans('mall::lang.specifications.category_id'),
            'sort' => trans('mall::lang.specifications.sort'),
            'status' => trans('mall::lang.specifications.status'),
        ];
    }
}
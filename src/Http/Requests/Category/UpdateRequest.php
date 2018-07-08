<?php

namespace CrCms\Mall\Http\Requests\Category;

use CrCms\Mall\Models\CategoryModel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    use RequestTrait {
        rules as _rules;
    }

    public function rules() : array
    {
        $rules = $this->_rules();
        $rules['sign'] = [ 'max:50', Rule::unique((new CategoryModel())->getTable())->ignore($this->route()->parameter('category'))];
        return $rules;
    }

}
<?php

namespace CrCms\Mall\Http\Requests\Specification;

use CrCms\Mall\Models\SpecificationModel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class UpdateRequest
 * @package CrCms\Mall\Http\Requests\Specification
 */
class UpdateRequest extends FormRequest
{
    use RequestTrait {
        rules as _rules;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        $rules = $this->_rules();
        $rules['id'] = ['required', 'integer', Rule::exists((new SpecificationModel())->getTable())];
        return $rules;
    }
}
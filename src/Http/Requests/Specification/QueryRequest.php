<?php

namespace CrCms\Mall\Http\Requests\Specification;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class QueryRequest
 * @package CrCms\Mall\Http\Requests\Specification
 */
class QueryRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'id' => ['integer']
        ];
    }
}
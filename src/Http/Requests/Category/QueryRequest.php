<?php

namespace CrCms\Mall\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class QueryRequest
 * @package CrCms\Mall\Http\Requests\Category
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
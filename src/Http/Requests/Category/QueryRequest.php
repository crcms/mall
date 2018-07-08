<?php

namespace CrCms\Mall\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class QueryRequest extends FormRequest
{

    public function rules()
    {
        return [
            'id' => ['required','integer']
        ];
    }

}
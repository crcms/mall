<?php

/**
 * @author simon <simon@crcms.cn>
 * @datetime 2018-07-17 20:18
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class SearchRequest
 * @package CrCms\Mall\Http\Requests\Product
 */
class SearchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [];
    }
}
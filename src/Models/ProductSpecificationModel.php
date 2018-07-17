<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-07-14 11:06
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Models;

use CrCms\Foundation\App\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProductSpecificationModel
 * @package CrCms\Mall\Models
 */
class ProductSpecificationModel extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'mall_product_specifications';

    /**
     * 需要转换成日期的属性
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function belongsToCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategoryModel::class);
    }
}
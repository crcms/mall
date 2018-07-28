<?php

/**
 * @author simon <simon@crcms.cn>
 * @datetime 2018-07-18 06:33
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Models;

use CrCms\Foundation\App\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ProductBrandModel
 * @package CrCms\Mall\Models
 */
class ProductBrandModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'mall_product_brands';

    /**
     * @return BelongsTo
     */
    public function belongsCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategoryModel::class, 'category_id', 'id');
    }
}
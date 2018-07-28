<?php

/**
 * @author simon <simon@crcms.cn>
 * @datetime 2018-07-17 20:19
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Models;

use CrCms\Foundation\App\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProductModel
 * @package CrCms\Mall\Models
 */
class ProductModel extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'mall_products';

    /**
     * @var array
     */
    protected $dates = ['deleted_at', 'added_at', 'dismounted_at'];

    /**
     * @return HasOne
     */
    public function hasOneDetail(): HasOne
    {
        return $this->hasOne(ProductDetailModel::class, 'id', 'id');
    }

    /**
     * @return HasOne
     */
    public function hasOneBrand(): HasOne
    {
        return $this->hasOne(ProductBrandModel::class, 'id', 'brand_id');
    }

    /**
     * @return HasOne
     */
    public function hasOneCategory(): HasOne
    {
        return $this->hasOne(ProductCategoryModel::class, 'id', 'category_id');
    }

    /**
     * @return BelongsTo
     */
    public function belongsToStocks(): BelongsTo
    {
        return $this->belongsTo(ProductStockModel::class, 'id', 'product_id');
    }
}
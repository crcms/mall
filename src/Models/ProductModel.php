<?php

/**
 * @author simon <crcms@crcms.cn>
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
     * @return BelongsTo
     */
    public function belongsToBrand(): BelongsTo
    {
        return $this->belongsTo(ProductBrandModel::class, 'brand_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function belongsCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategoryModel::class, 'category_id', 'id');
    }

    /**
     * @return BelongsToMany
     */
    public function belongsToManyStocks(): BelongsToMany
    {
        return $this->belongsToMany(ProductStockModel::class);
    }
}
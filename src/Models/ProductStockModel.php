<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-07-18 07:07
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Models;

use CrCms\Foundation\App\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ProductStockModel
 * @package CrCms\Mall\Models
 */
class ProductStockModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'mall_product_stocks';

    /**
     * @return BelongsTo
     */
    public function belongsToSpecification(): BelongsTo
    {
        return $this->belongsTo(ProductSpecificationModel::class);
    }
}
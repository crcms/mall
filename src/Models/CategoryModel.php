<?php

namespace CrCms\Mall\Models;

use CrCms\Foundation\App\Models\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;

class CategoryModel extends Model
{
    use SoftDeletes, NodeTrait;

    /**
     * @var string
     */
    protected $dateFormat = 'U';

    /**
     * @var string
     */
    protected $table = 'mall_product_categories';

    /**
     * 需要转换成日期的属性
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @var array
     */
    protected $guarded = [];
}
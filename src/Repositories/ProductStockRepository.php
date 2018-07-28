<?php

/**
 * @author simon <simon@crcms.cn>
 * @datetime 2018-07-18 07:11
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Repositories;

use CrCms\Foundation\App\Repositories\AbstractRepository;
use CrCms\Mall\Models\ProductStockModel;

/**
 * Class ProductStockRepository
 * @package CrCms\Mall\Repositories
 */
class ProductStockRepository extends AbstractRepository
{
    /**
     * @return ProductStockModel
     */
    public function newModel(): ProductStockModel
    {
        return app(ProductStockModel::class);
    }
}
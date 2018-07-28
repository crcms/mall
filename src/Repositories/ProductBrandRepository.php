<?php

/**
 * @author simon <simon@crcms.cn>
 * @datetime 2018-07-18 06:45
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Repositories;

use CrCms\Foundation\App\Repositories\AbstractRepository;
use CrCms\Mall\Models\ProductBrandModel;

/**
 * Class ProductBrandRepository
 * @package CrCms\Mall\Repositories
 */
class ProductBrandRepository extends AbstractRepository
{
    /**
     * @return ProductBrandModel
     */
    public function newModel(): ProductBrandModel
    {
        return app(ProductBrandModel::class);
    }

}
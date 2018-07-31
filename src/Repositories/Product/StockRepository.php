<?php

/**
 * @author simon <simon@crcms.cn>
 * @datetime 2018-07-18 07:11
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Repositories;

use CrCms\Foundation\App\Repositories\AbstractRepository;
use CrCms\Mall\Models\Product\StockModel;

/**
 * Class StockRepository
 * @package CrCms\Mall\Repositories
 */
class StockRepository extends AbstractRepository
{
    /**
     * @return StockModel
     */
    public function newModel(): StockModel
    {
        return app(StockModel::class);
    }
}
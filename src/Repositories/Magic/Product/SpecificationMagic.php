<?php

/**
 * @author simon <simon@crcms.cn>
 * @datetime 2018-07-28 16:24
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Modules\mall\src\Repositories\Magic\Product;

use CrCms\Repository\AbstractMagic;
use CrCms\Repository\Contracts\QueryRelate;

/**
 * Class SpecificationMagic
 * @package CrCms\Modules\mall\src\Repositories\Magic\Product
 */
class SpecificationMagic extends AbstractMagic
{
    /**
     * @param QueryRelate $queryRelate
     * @param array $sorts
     * @return QueryRelate
     */
    public function bySort(QueryRelate $queryRelate, array $sorts): QueryRelate
    {
        return $queryRelate->orderByArray($sorts);
    }
}
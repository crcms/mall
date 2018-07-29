<?php

/**
 * @author simon <simon@crcms.cn>
 * @datetime 2018-07-29 18:49
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Repositories\Magic;

use CrCms\Repository\AbstractMagic;
use CrCms\Repository\Contracts\QueryRelate;

/**
 * Class ProductBrandMagic
 * @package CrCms\Mall\Repositories\Magic
 */
class ProductBrandMagic extends AbstractMagic
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
<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-07-17 21:48
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Repositories\Magic;

use CrCms\Repository\AbstractMagic;
use CrCms\Repository\Contracts\QueryRelate;

/**
 * Class ProductMagic
 * @package CrCms\Mall\Repositories\Magic
 */
class ProductMagic extends AbstractMagic
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
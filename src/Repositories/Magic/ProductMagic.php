<?php

/**
 * @author simon <simon@crcms.cn>
 * @datetime 2018-07-17 21:48
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Repositories\Magic;

use CrCms\Repository\AbstractMagic;
use CrCms\Repository\Contracts\QueryRelate;
use Illuminate\Support\Carbon;

/**
 * Class ProductMagic
 * @package CrCms\Mall\Repositories\Magic
 */
class ProductMagic extends AbstractMagic
{
    /**
     * @var array
     */
    protected $scenes = [
        self::SCENES_FRONTEND => ['sort', 'added_at']
    ];

    /**
     *
     */
    const SCENES_FRONTEND = 'frontend';

    /**
     * @param QueryRelate $queryRelate
     * @param array $sorts
     * @return QueryRelate
     */
    public function bySort(QueryRelate $queryRelate, array $sorts): QueryRelate
    {
        return $queryRelate->orderByArray($sorts);
    }

    /**
     * @param QueryRelate $queryRelate
     * @param string $dateTime
     * @return QueryRelate
     */
    public function byAddedAt(QueryRelate $queryRelate, string $dateTime)
    {
        return $queryRelate->where('added_at', '>=', Carbon::parse($dateTime)->getTimestamp());
    }
}
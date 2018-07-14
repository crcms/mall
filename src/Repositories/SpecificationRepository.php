<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-07-14 11:10
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Repositories;

use CrCms\Mall\Models\SpecificationModel;
use CrCms\Repository\AbstractRepository;

/**
 * Class SpecificationRepository
 * @package CrCms\Mall\Repositories
 */
class SpecificationRepository extends AbstractRepository
{
    /**
     * @var array
     */
    protected $guard = ['name', 'category_id', 'sort', 'status'];

    /**
     * @return SpecificationModel
     */
    public function newModel(): SpecificationModel
    {
        return app(SpecificationModel::class);
    }
}
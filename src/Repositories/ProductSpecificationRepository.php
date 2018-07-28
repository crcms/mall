<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-07-14 11:10
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Repositories;

use CrCms\Mall\Models\ProductSpecificationModel;
use CrCms\Repository\AbstractMagic;
use CrCms\Repository\AbstractRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class SpecificationRepository
 * @package CrCms\Mall\Repositories
 */
class ProductSpecificationRepository extends AbstractRepository
{
    /**
     * @var array
     */
    protected $guard = ['name', 'category_id', 'sort', 'status'];

    /**
     * @return ProductSpecificationModel
     */
    public function newModel(): ProductSpecificationModel
    {
        return app(ProductSpecificationModel::class);
    }

    /**
     * @param AbstractMagic|null $magic
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function paginate(AbstractMagic $magic = null, int $perPage = 15): LengthAwarePaginator
    {
        return $this->whenMagic($magic)->paginate($perPage);
    }
}
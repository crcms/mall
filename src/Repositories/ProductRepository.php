<?php

/**
 * @author simon <simon@crcms.cn>
 * @datetime 2018-07-17 20:21
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Repositories;

use CrCms\Foundation\App\Repositories\AbstractRepository;
use CrCms\Mall\Models\ProductModel;
use CrCms\Repository\AbstractMagic;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class ProductRepository
 * @package CrCms\Mall\Repositories
 */
class ProductRepository extends AbstractRepository
{
    /**
     * @return ProductModel
     */
    public function newModel(): ProductModel
    {
        return app(ProductModel::class);
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
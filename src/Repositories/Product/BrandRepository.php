<?php

/**
 * @author simon <simon@crcms.cn>
 * @datetime 2018-07-18 06:45
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Repositories;

use CrCms\Foundation\App\Repositories\AbstractRepository;
use CrCms\Mall\Models\Product\BrandModel;
use CrCms\Repository\AbstractMagic;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class BrandRepository
 * @package CrCms\Mall\Repositories
 */
class BrandRepository extends AbstractRepository
{
    /**
     * @var array
     */
    protected $scenes = [
        'default' => ['name', 'logo', 'status', 'recommend', 'sort'],
    ];

    /**
     * @return BrandModel
     */
    public function newModel(): BrandModel
    {
        return app(BrandModel::class);
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
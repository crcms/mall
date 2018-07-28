<?php

/**
 * @author simon <simon@crcms.cn>
 * @datetime 2018-07-17 21:00
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Handlers\Product;

use CrCms\Foundation\App\Handlers\AbstractHandler;
use CrCms\Foundation\App\Handlers\Traits\RequestHandlerTrait;
use CrCms\Foundation\App\Handlers\Traits\RepositoryHandlerTrait;
use CrCms\Mall\Repositories\Magic\ProductMagic;
use CrCms\Mall\Repositories\ProductRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

/**
 * Class ListHandler
 * @package CrCms\Mall\Handlers\Product
 */
class ListHandler extends AbstractHandler
{
    use RequestHandlerTrait, RepositoryHandlerTrait;

    /**
     * ListHandler constructor.
     * @param Request $request
     * @param ProductRepository $repository
     */
    public function __construct(Request $request, ProductRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function handle(): LengthAwarePaginator
    {
        //$this->validate();

        return $this->repository->paginate(new ProductMagic($this->options(), ProductMagic::SCENES_FRONTEND));
    }

    /**
     * @return array
     */
    protected function options(): array
    {
        $options = $this->request->all();

        if (empty($options['sort'])) {
            $options['sort'] = ['created_at' => 'desc'];
        }

        $options['added_at'] = Carbon::now()->toDateTimeString();

        return $options;
    }
}
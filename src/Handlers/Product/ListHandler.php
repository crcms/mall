<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-07-17 21:00
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Handlers\Product;

use CrCms\Foundation\App\Handlers\AbstractHandler;
use CrCms\Foundation\App\Handlers\Traits\HttpHandlerTrait;
use CrCms\Foundation\App\Handlers\Traits\RepositoryHandlerTrait;
use CrCms\Mall\Http\Resources\ProductResource;
use CrCms\Mall\Repositories\Magic\ProductMagic;
use CrCms\Mall\Repositories\ProductRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

/**
 * Class ListHandler
 * @package CrCms\Mall\Handlers\Product
 */
class ListHandler extends AbstractHandler
{
    use HttpHandlerTrait, RepositoryHandlerTrait;

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
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|mixed
     */
    public function handle(): LengthAwarePaginator
    {
        //$this->validate();

        return $this->repository->paginate(new ProductMagic($this->options()));
    }

    protected function options(): array
    {
        $options = $this->request->all();

        if (empty($options['sort'])) {
            $options['sort'] = ['created_at' => 'desc'];
        }
    }
}
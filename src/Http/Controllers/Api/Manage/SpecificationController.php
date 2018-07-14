<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-07-14 11:11
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Http\Controllers\Api\Manage;

use CrCms\Foundation\App\Http\Controllers\Controller;
use CrCms\Mall\Actions\Specification\StoreAction;
use CrCms\Mall\Actions\Specification\UpdateAction;
use CrCms\Mall\Http\Requests\Specification\QueryRequest;
use CrCms\Mall\Http\Requests\Specification\UpdateRequest;
use CrCms\Mall\Repositories\SpecificationRepository;
use CrCms\Mall\Http\Resources\SpecificationResource;

/**
 * Class SpecificationController
 * @package CrCms\Mall\Http\Controllers\Api\Manage
 */
class SpecificationController extends Controller
{
    /**
     * SpecificationController constructor.
     * @param SpecificationRepository $repository
     */
    public function __construct(SpecificationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(QueryRequest $request)
    {

    }

    public function store(StoreAction $action)
    {
        return $this->response->resource($action->handle(), SpecificationResource::class);
    }

    public function update(int $id, UpdateAction $action)
    {
        $model = $action->handle(['id' => $id]);

        return $this->response->resource($model, SpecificationResource::class);
    }

    public function destroy()
    {

    }
}
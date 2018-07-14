<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-07-14 11:24
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Actions\Specification;

use CrCms\Foundation\App\Actions\ActionContract;
use CrCms\Mall\Http\Requests\Specification\StoreRequest;
use CrCms\Mall\Models\SpecificationModel;
use CrCms\Mall\Repositories\SpecificationRepository;

/**
 * Class StoreAction
 * @package CrCms\Mall\Actions\Specification
 */
class StoreAction implements ActionContract
{
    /**
     * @var SpecificationRepository
     */
    protected $repository;

    /**
     * @var StoreRequest
     */
    protected $request;

    /**
     * StoreAction constructor.
     * @param SpecificationRepository $repository
     */
    public function __construct(StoreRequest $request, SpecificationRepository $repository)
    {
        $this->repository = $repository;
        $this->request = $request;
    }

    /**
     * @param array $data
     * @return SpecificationModel
     */
    public function handle(array $data = []): SpecificationModel
    {
        return $this->repository->create($this->request->all());
    }
}
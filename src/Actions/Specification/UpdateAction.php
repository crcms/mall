<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-07-14 11:26
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Mall\Actions\Specification;

use CrCms\Foundation\App\Actions\ActionContract;
use CrCms\Mall\Http\Requests\Specification\UpdateRequest;
use CrCms\Mall\Models\SpecificationModel;
use CrCms\Mall\Repositories\SpecificationRepository;
use Illuminate\Support\Arr;

/**
 * Class UpdateAction
 * @package CrCms\Mall\Actions\Specification
 */
class UpdateAction implements ActionContract
{
    /**
     * @var SpecificationRepository
     */
    protected $repository;

    /**
     * @var UpdateRequest
     */
    protected $request;

    /**
     * StoreAction constructor.
     * @param SpecificationRepository $repository
     */
    public function __construct(UpdateRequest $request, SpecificationRepository $repository)
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
        return $this->repository->update($this->request->all(), $data['id']);
    }
}
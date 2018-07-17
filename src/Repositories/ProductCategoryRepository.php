<?php

namespace CrCms\Mall\Repositories;

use CrCms\Mall\Attributes\CategoryAttribute;
use CrCms\Mall\Models\ProductCategoryModel;
use CrCms\Foundation\App\Repositories\AbstractRepository;
use Illuminate\Support\Collection;

class ProductCategoryRepository extends AbstractRepository
{
    /**
     * @var array
     */
    protected $guard = ['id', 'name', 'sign', 'sort', 'icon', 'status', 'parent_id'];

    /**
     * @return ProductCategoryModel
     */
    public function newModel(): ProductCategoryModel
    {
        return app(ProductCategoryModel::class);
    }

    /**
     * @return Collection
     */
    public function treeByStatusEnable(): Collection
    {
        return $this->newModel()->where('status', CategoryAttribute::STATUS_ENABLE)->orderBy($this->getModel()->getCreatedAtColumn(), 'desc')->toTree();
    }

    /**
     * @return Collection
     */
    public function tree(): Collection
    {
        return $this->newModel()->orderBy($this->getModel()->getCreatedAtColumn(), 'desc')->get();
    }

    /**
     * @param array|string|array $id
     * @return int
     */
    public function deleteSelfAndDescendants($id)
    {
        $models = collect((array)$id)->map(function ($id) {
            return $this->getModel()->newScopedQuery()->descendantsAndSelf($id);
        })->flatten(1)->unique('id');

        return $this->delete($models->map->id->toArray());
    }
}
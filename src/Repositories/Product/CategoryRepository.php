<?php

namespace CrCms\Mall\Repositories\Product;

use CrCms\Mall\Attributes\MallAttribute;
use CrCms\Mall\Models\Product\CategoryModel;
use CrCms\Foundation\App\Repositories\AbstractRepository;
use Illuminate\Support\Collection;

/**
 * Class CategoryRepository
 * @package CrCms\Mall\Repositories\Product
 */
class CategoryRepository extends AbstractRepository
{
    /**
     * @var array
     */
    protected $guard = ['id', 'name', 'sign', 'sort', 'icon', 'status', 'parent_id'];

    /**
     * @return CategoryModel
     */
    public function newModel(): CategoryModel
    {
        return app(CategoryModel::class);
    }

    /**
     * @return Collection
     */
    public function treeByStatusEnable(): Collection
    {
        return $this->newModel()->where('status', MallAttribute::STATUS_ENABLE)->orderBy($this->getModel()->getCreatedAtColumn(), 'desc')->toTree();
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
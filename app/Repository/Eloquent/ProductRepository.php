<?php

namespace App\Repository\Eloquent;

use App\Models\Product;
use App\Repository\ProductRepositoryInterface;
use Illuminate\Support\Collection;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
   /**
    * ProductRepository constructor.
    *
    * @param Product $model
    */
   public function __construct(Product $model)
   {
       parent::__construct($model);
   }

    /**
     * @return Collection
     */
    public function getProducts($attributes): Collection
    {
        return $this->model->where(['section_id' => $attributes])->get();
        // return $this->model->where(['section_id' => $attributes])->pluck("name", "id");
    }
}

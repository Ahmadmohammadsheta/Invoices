<?php

namespace App\Repository\Eloquent;

use App\Models\SubProduct;
use App\Repository\SubProductRepositoryInterface;

class SubProductRepository extends BaseRepository implements SubProductRepositoryInterface
{
   /**
    * SubProductRepository constructor.
    *
    * @param SubProduct $model
    */
   public function __construct(SubProduct $model)
   {
       parent::__construct($model);
   }
}

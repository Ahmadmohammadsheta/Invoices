<?php

namespace App\Repository\Eloquent;

use App\Models\Stock;
use App\Repository\StockRepositoryInterface;

class StockRepository extends BaseRepository implements StockRepositoryInterface
{
   /**
    * StockRepository constructor.
    *
    * @param Stock $model
    */
   public function __construct(Stock $model)
   {
       parent::__construct($model);
   }
}

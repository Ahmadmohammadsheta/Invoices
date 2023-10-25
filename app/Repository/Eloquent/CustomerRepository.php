<?php

namespace App\Repository\Eloquent;

use App\Models\Customer;
use App\Repository\CustomerRepositoryInterface;

class CustomerRepository extends BaseRepository implements CustomerRepositoryInterface
{
   /**
    * CustomerRepository constructor.
    *
    * @param Customer $model
    */
   public function __construct(Customer $model)
   {
       parent::__construct($model);
   }
}

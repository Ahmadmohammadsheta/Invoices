<?php
namespace App\Repository;

use App\Models\Customer;

interface CustomerRepositoryInterface {

   /**
    * @param array $attributes
    *
    * @return Customer
    */
   public function create(array $attributes): Customer;
}

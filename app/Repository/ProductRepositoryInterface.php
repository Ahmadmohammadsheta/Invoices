<?php
namespace App\Repository;

use Illuminate\Support\Collection;

interface ProductRepositoryInterface {

    /**
     * @return Collection
     */
    public function getProducts($attributes): Collection;
}

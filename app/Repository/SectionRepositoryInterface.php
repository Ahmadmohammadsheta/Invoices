<?php
namespace App\Repository;

use App\Models\Section;

interface SectionRepositoryInterface {

   /**
    * @param array $attributes
    *
    * @return Section
    */
   public function create(array $attributes): Section;
}

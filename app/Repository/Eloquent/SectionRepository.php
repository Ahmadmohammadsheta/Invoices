<?php

namespace App\Repository\Eloquent;

use App\Models\Section;
use App\Repository\SectionRepositoryInterface;

class SectionRepository extends BaseRepository implements SectionRepositoryInterface
{
   /**
    * SectionRepository constructor.
    *
    * @param Section $model
    */
   public function __construct(Section $model)
   {
       parent::__construct($model);
   }

   /**
    * @param array $attributes
    *
    * @return Section
    */
   public function create(array $attributes): Section
   {
        $attributes['created_by'] = 1;
        return $this->model->create($attributes);
   }
}

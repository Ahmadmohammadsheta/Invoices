<?php

namespace App\Repository\Eloquent;

use App\Models\Customer;
use App\Repository\CustomerRepositoryInterface;
use App\Http\Traits\ImageProccessingTrait as TraitImageProccessingTrait;

class CustomerRepository extends BaseRepository implements CustomerRepositoryInterface
{
    const IMAGE_PATH = 'customers';
    use TraitImageProccessingTrait;

   /**
    * CustomerRepository constructor.
    *
    * @param Customer $model
    */
   public function __construct(Customer $model)
   {
       parent::__construct($model);
   }

   /**
    * @param array $attributes
    *
    * @return Customer
    */
   public function create(array $attributes): Customer
   {
        $attributes['created_by'] = auth()->id();
        if (array_key_exists('img', $attributes)) {
            $attributes['img'] = $this->setfile($attributes['img'], $this::IMAGE_PATH . '/'. $attributes['name'] . '/' . randomCode(), 450, 450);
        }
        if (array_key_exists('national_id_image', $attributes)) {
            $attributes['national_id_image'] = $this->setfile($attributes['national_id_image'], $this::IMAGE_PATH . '/' . $attributes['name'] . '/' . randomCode(), 450, 450);
        }
        return $this->model->create($attributes);
   }
}

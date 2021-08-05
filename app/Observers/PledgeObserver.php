<?php

namespace App\Observers;

use App\Http\GreenPlacesHelpers;
use App\Models\Pledge;

class PledgeObserver
{
    public function creating(Pledge $model)
    {
        $slugStr = GreenPlacesHelpers::generateUniqueSlug( $model, $model->title  );
        $model->slug = $slugStr;
    }
  
    public function updating(Pledge $model)
    {
        if ($model->isDirty('title')) { 
            $slugStr = GreenPlacesHelpers::generateUniqueSlug( $model, $model->title, $model->id  );
            $model->slug = $slugStr;
        }
    } 
}

<?php

namespace App\Observers;

use App\Http\GreenPlacesHelpers;
use App\Models\Hashtag;

class HashtagObserver
{
    public function creating(Hashtag $model)
    {
        $slugStr = GreenPlacesHelpers::generateUniqueSlug( $model, $model->name  );
        $model->slug = $slugStr;
    }
  
    public function updating(Hashtag $model)
    {
        if ($model->isDirty('name')) { 
            $slugStr = GreenPlacesHelpers::generateUniqueSlug( $model, $model->name, $model->id  );
            $model->slug = $slugStr;
        }
    }
}

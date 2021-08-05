<?php

namespace App\Observers;

use App\Http\GreenPlacesHelpers;
use App\Models\Blog;

class BlogObserver
{    
    public function creating(Blog $model)
    {
        $slugStr = GreenPlacesHelpers::generateUniqueSlug( $model, $model->name  );
        $model->slug = $slugStr;
    }
  
    public function updating(Blog $model)
    {
        if ($model->isDirty('name')) { 
            $slugStr = GreenPlacesHelpers::generateUniqueSlug( $model, $model->name, $model->id  );
            $model->slug = $slugStr;
        }
    }    
}

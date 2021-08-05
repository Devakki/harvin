<?php

namespace App\Observers;

use App\Http\GreenPlacesHelpers;
use App\Models\BlogCategory;

class BlogCategoryObserver
{
    public function creating(BlogCategory $model)
    {
        $slugStr = GreenPlacesHelpers::generateUniqueSlug( $model, $model->name  );
        $model->slug = $slugStr;
    }
  
    public function updating(BlogCategory $model)
    {
        if ($model->isDirty('name')) { 
            $slugStr = GreenPlacesHelpers::generateUniqueSlug( $model, $model->name, $model->id  );
            $model->slug = $slugStr;
        }
    }     
}

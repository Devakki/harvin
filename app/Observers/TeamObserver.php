<?php

namespace App\Observers;

use App\Http\GreenPlacesHelpers;
use App\Models\Team;

class TeamObserver
{    
    public function creating(Team $model)
    {
        $slugStr = GreenPlacesHelpers::generateUniqueSlug( $model, $model->name  );
        $model->slug = $slugStr;
    }
  
    public function updating(Team $model)
    {
        if ($model->isDirty('name')) { 
            $slugStr = GreenPlacesHelpers::generateUniqueSlug( $model, $model->name, $model->id  );
            $model->slug = $slugStr;
        }
    }    
}

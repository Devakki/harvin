<?php

namespace App\Observers;

use App\Http\GreenPlacesHelpers;
use App\Models\Company;

class CompanyObserver
{    
    public function creating(Company $model)
    {
        $slugStr = GreenPlacesHelpers::generateUniqueSlug( $model, $model->name  );
        $model->slug = $slugStr;
    }
  
    public function updating(Company $model)
    {
        if ($model->isDirty('name')) { 
            $slugStr = GreenPlacesHelpers::generateUniqueSlug( $model, $model->name, $model->id  );
            $model->slug = $slugStr;
        }
    }    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\GreenPlacesHelpers;
use App\Observers\HashtagObserver;
use Carbon\Carbon;

class Hashtag extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $appends = ['formated_created_at'];
    protected $table = 'hashtags';

    protected static function boot()
    {    
        parent::boot();              
        static::observe(HashtagObserver::class);         
    }

    //formated_created_at
    public function getFormatedCreatedAtAttribute()
    {
        $data = "";
        if(!empty($this->created_at)) {
            $data = Carbon::parse($this->created_at)->setTimezone('America/New_York')->format('m/d/Y');
        }
        return $data;
    }
}

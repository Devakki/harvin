<?php
namespace App\Models;

use App\Http\GreenPlacesHelpers;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Badge extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $appends = ['formated_created_at', 'thumb_image_full_path'];

    protected $table = 'badge';

    protected static function boot()
    {      
        parent::boot();
        
    
        static::deleted(function($badge) {
            // delete image of badge
            $imageName = $badge->image;
            $deleteFileList = array();
            $deleteFileList[] =  config("greenplaces.path.doc.badge_image").$imageName;
            $deleteFileList[] =  config("greenplaces.path.doc.badge_image").'thumb/'.$imageName;
            GreenPlacesHelpers::deleteIfFileExist($deleteFileList);

        });
    }

    //thumb_image_full_path
    public function getThumbImageFullPathAttribute()
    {
        if (!empty($this->image)) {
            return Storage::url(config("greenplaces.path.url.badge_image") . "thumb/" . $this->image);
        }
        
        return asset('images/user-icon.svg');
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

    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'company_id', 'id');
    } 
}

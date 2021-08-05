<?php
namespace App\Models;

use App\Http\GreenPlacesHelpers;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Testimonial extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $appends = ['formated_created_at', 'thumb_image_full_path','image_full_path'];

    protected $table = 'testimonial';

    protected static function boot()
    {      
        parent::boot();
        
    
        static::deleted(function($testimonial) {
            // delete image of testimonial
            $imageName = $testimonial->image;
            $deleteFileList = array();
            $deleteFileList[] =  config("greenplaces.path.doc.testimonial_image").$imageName;
            $deleteFileList[] =  config("greenplaces.path.doc.testimonial_image").'thumb/'.$imageName;
            GreenPlacesHelpers::deleteIfFileExist($deleteFileList);

        });
    }

    //thumb_image_full_path
    public function getThumbImageFullPathAttribute()
    {
        if (!empty($this->image)) {
            return Storage::url(config("greenplaces.path.url.testimonial_image") . "thumb/" . $this->image);
        }
        
        return asset('images/user-icon.svg');
    }

    //thumb_image_full_path
    public function getImageFullPathAttribute()
    {
        if (!empty($this->image)) {
            return Storage::url(config("greenplaces.path.url.testimonial_image") .$this->image);
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

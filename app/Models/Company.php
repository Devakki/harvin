<?php
namespace App\Models;

use App\Http\GreenPlacesHelpers;
use App\Observers\CompanyObserver;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Company extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'company';
    protected $appends = ['formated_created_at', 'thumb_image_full_path'];

    protected static function boot()
    {      
        parent::boot();
        
        static::observe(CompanyObserver::class);
    
        static::deleted(function($company) {
            // delete image of company
            $imageName = $company->image;
            $deleteFileList = array();
            $deleteFileList[] =  config("greenplaces.path.doc.company_image").$imageName;
            $deleteFileList[] =  config("greenplaces.path.doc.company_image").'thumb/'.$imageName;
            GreenPlacesHelpers::deleteIfFileExist($deleteFileList);

        });
    }

    //thumb_image_full_path
    public function getThumbImageFullPathAttribute()
    {
        if (!empty($this->image)) {
            return Storage::url(config("greenplaces.path.url.company_image") . "thumb/" . $this->image);
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
    public function city()
    {
        return $this->belongsTo(City::Class, 'city_id', 'id');
    }   
    public function state()
    {
        return $this->belongsTo(State::Class, 'state_id', 'id');
    }   
    public function industry()
    {
        return $this->belongsTo(Industry::Class, 'industry_id', 'id');
    }  
}

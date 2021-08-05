<?php
namespace App\Models;

use App\Http\GreenPlacesHelpers;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Observers\PledgeObserver;

class Pledge extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $appends = ['formated_created_at', 'thumb_image_full_path', 'thumb_detail_image_full_path'];

    protected $table = 'pledge';

    protected static function boot()
    {      
        parent::boot();
        
        static::observe(PledgeObserver::class);
        static::deleted(function($pledge) {
            // delete image of pledge
            $imageName = $pledge->image;
            $deleteFileList = array();
            $deleteFileList[] =  config("greenplaces.path.doc.pledge_image").$imageName;
            $deleteFileList[] =  config("greenplaces.path.doc.pledge_image").'thumb/'.$imageName;
            GreenPlacesHelpers::deleteIfFileExist($deleteFileList);

        });
    }

    //thumb_image_full_path
    public function getThumbImageFullPathAttribute()
    {
        if (!empty($this->image)) {
            return Storage::url(config("greenplaces.path.url.pledge_image") . "thumb/" . $this->image);
        }
        
        return asset('images/user-icon.svg');
    }

    // thumb_detail_image_full_path
    public function getThumbDetailImageFullPathAttribute()
    {
        if (!empty($this->full_image)) {
            return Storage::url(config("greenplaces.path.url.pledge_full_image") . "thumb/" . $this->full_image);
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


    public function pledges()
    {
        return $this->hasMany('App\Models\Pledge', 'pledge_id', 'id');
    }

    public function companies()
    {
        return $this->belongsToMany('App\Models\Company', 'pledge_companies', 'pledge_id', 'company_id');      
    }

}

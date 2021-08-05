<?php
namespace App\Models;

use App\Http\GreenPlacesHelpers;
use App\Observers\BlogObserver;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Blog extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $appends = ['formated_created_at', 'thumb_image_full_path', 'display_created_at', 'thumb_detail_image_full_path'];

    protected $table = 'blog';

    protected static function boot()
    {      
        parent::boot();
        
        static::observe(BlogObserver::class);
    
        static::deleted(function($blog) {
            // delete image of blog
            $imageName = $blog->image;
            $deleteFileList = array();
            $deleteFileList[] =  config("greenplaces.path.doc.blog_image").$imageName;
            $deleteFileList[] =  config("greenplaces.path.doc.blog_image").'thumb/'.$imageName;
            GreenPlacesHelpers::deleteIfFileExist($deleteFileList);

        });
    }

    //thumb_image_full_path
    public function getThumbImageFullPathAttribute()
    {
        if (!empty($this->image)) {
            return Storage::url(config("greenplaces.path.url.blog_image") . "thumb/" . $this->image);
        }
        
        return asset('images/blog_default.png');
    }

    // thumb_detail_image_full_path
    public function getThumbDetailImageFullPathAttribute()
    {
        if (!empty($this->full_image)) {
            return Storage::url(config("greenplaces.path.url.blog_full_image") . "thumb/" . $this->full_image);
        }
        
        return asset('images/blog_default.png');
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

    //display in blog page
    public function getDisplayCreatedAtAttribute()
    {
        $data = "";
        if(!empty($this->created_at)) {
            $data = Carbon::parse($this->created_at)->setTimezone('America/New_York')->format('F d, Y');
        }
        return $data;
    } 

    public function category()
    {
        return $this->belongsTo('App\Models\BlogCategory', 'blog_category_id', 'id');
    } 

    public function blogHashtag()
    {
        return $this->hasMany('App\Models\BlogHashtag', 'blog_id', 'id');
    }

    public function hashtags()
    {
        return $this->belongsToMany('App\Models\Hashtag', 'blog_hashtag', 'blog_id', 'hashtag_id')->orderBy('hashtags.id', 'asc');      
    } 
}

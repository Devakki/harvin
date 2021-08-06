<?php

namespace App\Models;

use App\Http\GreenPlacesHelpers;
use App\Observers\BlogCategoryObserver;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BlogCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $appends = ['formated_created_at', 'thumb_image_full_path'];

    protected $table = 'blog_category';


    protected static function boot()
    {
        parent::boot();
        static::observe(BlogCategoryObserver::class);
    }

    /*protected static function booted()
    {
        static::deleted(function($topic_category) {
            foreach ($topic_category->topics() as $topic) {
                // delete image of topic
                $imageName = $topic->image;
                $deleteFileList = array();
                $deleteFileList[] =  config("dukesurgery.path.doc.topic_image").$imageName;
                $deleteFileList[] =  config("dukesurgery.path.doc.topic_image").'thumb/'.$imageName;
                DukeSurgeryHelpers::deleteIfFileExist($deleteFileList);

                $topic->guests()->delete();
                $topic->topicHosts()->delete();
            }
            $topic_category->topics()->delete();
        });
    }*/

    //thumb_image_full_path
    public function getThumbImageFullPathAttribute()
    {
        if (!empty($this->image)) {
            return Storage::url(config("greenplaces.path.url.blogcategory_image") . "thumb/" . $this->image);
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



}

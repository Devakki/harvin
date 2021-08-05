<?php
namespace App\Models;

use App\Http\GreenPlacesHelpers;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class PledgeCompany extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $appends = ['formated_created_at', 'thumb_image_full_path'];

    protected $table = 'pledge_companies';

    protected static function boot()
    {      
        parent::boot();
    }
    public function getThumbImageFullPathAttribute()
    {
        if (!empty($this->image)) {
            return Storage::url(config("greenplaces.path.url.pledge_image") . "thumb/" . $this->image);
        }
        
        return asset('images/user-icon.svg');
    }
    public function pledges()
    {
        return $this->belongsTo('App\Models\Pledge', 'pledge_id', 'id');
    }
    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'company_id', 'id');
    } 
}

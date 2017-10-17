<?php

namespace App;

use App\Http\Traits\Owned;
use App\Observers\CampaignObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campaign extends Model
{
    use Owned;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'description', 'template_id', 'bunch_id'
    ];

    public function template(){
        return $this->hasOne(Template::class, 'id', 'template_id');
    }

    public function bunch(){
        return $this->hasOne(Bunch::class, 'id', 'bunch_id');
    }

    public function scopeAvailable($query)
    {
        return $query->where('deleted_at', '=', null);
    }

    public static function boot()
    {
        parent::boot();
        parent::observe(new CampaignObserver());
    }
}

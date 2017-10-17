<?php

namespace App;

use App\Http\Traits\Owned;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bunch extends Model
{
    use Owned;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'description', 'created_by', 'updated_by',
    ];

    public function subscribers()
    {
        return $this->hasMany('App\Subscriber');
    }

    public function campaigns()
    {
        return $this->belongsTo('App\Campaign', 'bunch_id', 'id');
    }
}

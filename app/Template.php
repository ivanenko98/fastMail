<?php

namespace App;

use App\Http\Traits\Owned;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Template extends Model
{
    use Notifiable;
    use Owned;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'content', 'created_by', 'updated_by',
    ];

    public function campaigns()
    {
        return $this->belongsTo('App\Campaign', 'template_id', 'id');
    }
}

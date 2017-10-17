<?php

namespace App;

use App\Http\Traits\Owned;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use Owned;

    protected $fillable = [
        'name', 'email', 'created_by', 'updated_by',
    ];

    public function bunch()
    {
        return $this->belongsTo('App\Bunch');
    }

}

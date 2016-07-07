<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Profile extends Model
{
    protected $table = 'profiles';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'height', 'weight', 'units', 'dob', 'dob_format'];

    protected $dates = ['dob'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

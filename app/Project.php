<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'user_id', 'status'];

    protected $casts = [
        'status' => 'boolean'
    ];


    public function client () {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function digital_reports()
    {
        return $this->hasMany('App\DigitalReport', 'project_id');
    }

    public function smm_reports()
    {
        return $this->hasMany('App\SmmReport', 'project_id');
    }
}

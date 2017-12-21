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
        return $this->hasOne('App\User', 'project_id');
    }

    public function digital_reports()
    {
        return $this->hasMany('App\DigitalReport', 'project_id');
    }

    public function smm_reports()
    {
        return $this->hasMany('App\SmmReport', 'project_id');
    }

    public function instagram()
    {
        return $this->hasOne('App\Comment', 'project_id')->where('type', 'instagram');
    }

    public function facebook()
    {
        return $this->hasOne('App\Comment', 'project_id')->where('type', 'facebook');
    }

    public function youtube()
    {
        return $this->hasOne('App\Comment', 'project_id')->where('type', 'youtube');
    }

    public function vk()
    {
        return $this->hasOne('App\Comment', 'project_id')->where('type', 'vk');
    }

    
}

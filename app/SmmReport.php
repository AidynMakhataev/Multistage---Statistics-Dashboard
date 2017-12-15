<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmmReport extends Model
{
    protected $fillable = ['project_id', 'start', 'end', 'smm_overview', 'people_overview', 'country_report', 'video_link'];

    protected $casts = [
        'smm_overview' => 'json',
        'people_overview' => 'json',
        'country_report' => 'json'
    ];

    protected $dates = ['start', 'end'];

    public function project () {
        return $this->belongsTo('App\Project', 'project_id');
    }
}

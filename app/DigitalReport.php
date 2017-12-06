<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DigitalReport extends Model
{
    protected $fillable = ['project_id', 'start', 'end', 'actions_overview', 'people_overview', 'country_report'];

    protected $casts = [
        'actions_overview' => 'array',
        'people_overview' => 'array',
        'country_report' => 'array'
    ];

    protected $dates = ['start', 'end'];

    public function project () {
        return $this->belongsTo('App\Project', 'project_id');
    }
}

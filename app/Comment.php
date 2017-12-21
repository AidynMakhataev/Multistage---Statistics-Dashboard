<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = ['project_id', 'comments', 'views', 'reposts', 'likes' ,'type', 'link'];

    protected $casts = [
        'comments' => 'array'
    ];
    
    public function project ()
    {
        return $this->belongsTo('App\Project', 'project_id');
    }
}

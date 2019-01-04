<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunityGroupRequest extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function community()
    {
        return $this->belongsToMany(Community::class, 'communities_by_group_request', 'community_group_request_id', 'community_id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name', 'description'];

    public function users()
    {
        return $this->belongsToMany(\App\Models\User::class, 'group_user')->withTimestamps();
    }
}

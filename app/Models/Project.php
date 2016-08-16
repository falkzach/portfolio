<?php namespace falkzach\portfolio\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'description', 'legacy'];

    protected $dates = ['created_at', 'updated_at'];

    protected $casts = ['legacy'];
}

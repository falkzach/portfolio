<?php namespace falkzach\portfolio\Models;

use Illuminate\Database\Eloquent\Model;

class Image Extends Model
{
    protected $fillable = ['name', 'path', 'alt'];

    protected $dates = ['created_at', 'updated_at'];

    public function projects()
    {
        return $this->belongsToMany('falkzach\portfolio\Models\Project');
    }
}

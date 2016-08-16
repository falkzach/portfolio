<?php namespace falkzach\portfolio\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'description', 'legacy'];

    protected $dates = ['created_at', 'updated_at'];

    protected $casts = ['legacy'];

    public function links()
    {
        return $this->belongsToMany('falkzach\portfolio\Models\Link');
    }

    public function images()
    {
        return $this->belongsToMany('falkzach\portfolio\Models\Image');
    }
}

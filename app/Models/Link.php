<?php namespace falkzach\portfolio\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['name', 'url', 'css_class'];

    protected $dates = ['created_at', 'updated_at'];
}

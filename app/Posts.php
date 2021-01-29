<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categorias;
use App\Tags;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    use SoftDeletes;

    protected $fillable = ['titulo', 'caption', 'categorias_id', 'content', 'foto', 'slug', 'deleted_at', 'user_id', 'spotlight'];

    public function Categorias(){
        return $this->belongsTo('App\Categorias');
    }

    public function Tags(){
        return $this->belongsToMany('App\Tags');
    }

    public function Users(){
        return $this->belongsTo('App\User');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}

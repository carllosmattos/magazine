<?php

namespace App;
use App\Posts;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table = 'tags';
    
    public function Posts(){
        return $this->belongsTomany('App\Posts');
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeri';
    
    protected function albums(){
        return $this->belongsTo('App\Models\Album', 'id_album','id');
    }

    protected function users(){
        return $this->belongsTo('App\Models\User', 'id_user', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bag extends Model
{
    use HasFactory;
    protected $fillable =([
        'name','brand','founded','image'
    ]);

    // public function setFilenameAttribute($value){
    //     $this->attributes['filenames'] = json_encode($value);
    // }
}

<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cnic',
        'phone',
        'image',
        'address',
    ];

    public function setImageAttribute($value){

        if(is_string($value)){
	        $this->attributes['image'] = asset(ImageHelper::saveImageFromApi($value,'images/record')); 
	    }
	    else if(is_file($value)){
	        $this->attributes['image'] = asset(ImageHelper::saveImage($value,'images/record')); 
	    }
        
    }
    
    public function getImageAttribute($value){
        return asset($value);
    }

    public function record_detail(){
        return $this->hasMany(RecordDetail::class,'record_id');
    }
}

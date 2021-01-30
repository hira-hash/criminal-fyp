<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'record_id',
        'crime_detail',
    ];

    public function record(){
        return $this->belongsTo(Record::class);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function add_record(Request $request){
        
        $record = Record::create($request->all());

        return Api::setResponse('record', $record);

    }
}

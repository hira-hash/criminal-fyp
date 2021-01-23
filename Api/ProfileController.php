<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function update(Request $request){

        $admin = Admin::find(1);
        $admin->update($request->all());
        return Api::setResponse('admin', $admin);

    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Priority;

class UserDataController extends Controller
{
    public function departments()
    {
        $departments = Department::all();

        return response()->json($departments);
    }
}

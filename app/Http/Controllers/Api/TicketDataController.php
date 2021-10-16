<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketDataController extends Controller
{
    public function departments()
    {
        $departments = Department::with("name", '=', 'deept');

        return response()->json($departments);
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use Src\AppHumanResources\Attendance\Application\AttendanceService;

class AttendanceController extends Controller
{

    public function index() {

        return (new AttendanceService())->getAttendance();

    }

    public function store(Request $request)
    {
        return (new AttendanceService())->importAttendance();
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Imports\AttendanceImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function store(Request $request)
    {
        Excel::import(new AttendanceImport, $request->file);

        return response()->json([
            'status' => 200,
            'message' => 'Attendance data imported successfully.'
        ], 200);
    }
}

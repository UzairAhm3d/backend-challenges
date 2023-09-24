<?php

namespace App\Http\Controllers\API;

use App\Imports\AttendanceImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{

    public function index(Request $request) {

        $result = Attendance::select('employee_id', 'check_in', 'check_out', 'hours as total_working_hours', 'created_at')
                            ->where('employee_id', $request->id)
                            ->with(['employee' => function($query) {
                                $query->select('id', 'name');
                            }])
                            ->when($request->month, function($query, $month) {
                                $query->whereMonth('created_at', $month);
                            })
                            ->when($request->year, function($query, $year) {
                                $query->whereYear('created_at', $year);
                            })
                            ->get();

        if (count($result) > 0) {

            return response()->json([
                'status' => 200,
                'data' => $result
            ], 200);

        }else{

            return response()->json([
                'status' => 200,
                'message' => 'Oops! No record found.'
            ], 200);

        }
    }

    public function store(Request $request)
    {
        Excel::import(new AttendanceImport, $request->file);

        return response()->json([
            'status' => 200,
            'message' => 'Attendance data imported successfully.'
        ], 200);
    }
}

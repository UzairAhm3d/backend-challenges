<?php

namespace Src\AppHumanResources\Attendance\Application;

use Src\AppHumanResources\Attendance\Domain\Attendance;
use Illuminate\Support\Facades\Validator;
use App\Imports\AttendanceImport;
use Maatwebsite\Excel\Facades\Excel;
use Request;

class AttendanceService {

    private $request;

    public function __construct() {
        $this->request = Request::all();
    }

    public function getAllAttendanceData() {

        $result = Attendance::select('id', 'employee_id', 'check_in', 'check_out', 'hours as total_working_hours', 'created_at')
                            ->with(['employee' => function($query) {
                                $query->select('id', 'name');
                            }])
                            ->get();

        if (count($result) > 0) {

            return response()->json($result);

        }else{

            return response()->json([
                'status' => 200,
                'message' => 'Oops! No record found.'
            ], 200);

        }
    }

    public function getAttendanceByEmployeeId() {

        $result = (new Attendance())->getAttendanceByEmployeeId($this->request);

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

    public function importAttendance() {

        $validator = Validator::make($this->request, [
            'file' => 'required|mimes:xlsx'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        Excel::import(new AttendanceImport, $this->request['file']);

        return response()->json([
            'status' => 200,
            'message' => 'Attendance data imported successfully.'
        ], 200);

    }

}

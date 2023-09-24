<?php

namespace App\Imports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use App\Models\{
    Employee,
    Shift
};

class AttendanceImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $employee = Employee::where('name', $row[0])->first();
        $shift = Shift::where('title', $row[0])->first();

        if (isset($employee) && isset($shift)) {

            $check_in = Date::excelToTimestamp($row[2]);
            $check_out = Date::excelToTimestamp($row[3]);

            return new Attendance([
                'employee_id'   =>  $employee->id,
                'schedule_id'   =>  $shift->id,
                'check_in'   =>  gmdate("H:i:s", $check_in),
                'check_out'   =>  gmdate("H:i:s", $check_out),
                'hours'   =>  $row[4]
            ]);
        }
    }
}

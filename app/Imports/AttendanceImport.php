<?php

namespace App\Imports;

use Src\AppHumanResources\Attendance\Domain\Attendance;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use App\Models\{
    Employee,
    Schedule
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
        $schedule = Schedule::where('id', $row[1])->first();

        if (isset($employee) && isset($schedule)) {
            $check_in = Date::excelToTimestamp($row[2]);
            $check_out = Date::excelToTimestamp($row[3]);

            return new Attendance([
                'employee_id'   =>  $employee->id,
                'schedule_id'   =>  $schedule->id,
                'check_in'   =>  gmdate("H:i:s", $check_in),
                'check_out'   =>  gmdate("H:i:s", $check_out),
                'hours'   =>  $row[4]
            ]);

        }

    }
}

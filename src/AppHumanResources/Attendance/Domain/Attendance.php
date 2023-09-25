<?php

namespace Src\AppHumanResources\Attendance\Domain;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'schedule_id',
        'check_in',
        'check_out',
        'hours'
    ];

    public function employee() {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function schedule() {
        return $this->belongsTo(Schedule::class, 'schedule_id', 'id');
    }

    public function getAttendanceByEmployeeId($params) {

        return $this->select('employee_id', 'check_in', 'check_out', 'hours as total_working_hours', 'created_at')
            ->where('employee_id', $params['id'])
            ->with(['employee' => function($query) {
                $query->select('id', 'name');
            }])
            ->when($params['month'], function($query, $month) {
                $query->whereMonth('created_at', $month);
            })
            ->when($params['year'], function($query, $year) {
                $query->whereYear('created_at', $year);
            })
            ->get();

    }
}


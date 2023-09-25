<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fiilable = [
        'name',
        'email',
        'password'
    ];

    public function attendances() {
        return $this->hasMany(Attendance::class, 'employee_id', 'id');
    }
}

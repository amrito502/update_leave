<?php

namespace App\Models;

use App\Models\User;
use App\Models\Department;
use App\Models\Designation;
use Spatie\Permission\Models\Role;
use App\Models\EmployeeCertificate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_code', 'first_name', 'last_name', 'email', 'phone', 
        'dob', 'user_id', 'department_id', 'designation_id', 'role_id', 
        'date_of_joining', 'image'
    ];

    /**
     * Boot the model to automatically generate the employee_code.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($employee) {
            // Check if the employee_code already exists
            if (!$employee->employee_code) {
                $latestEmployee = self::latest('id')->first();
                $newEmployeeCode = 'EMP-' . str_pad((int)substr($latestEmployee->employee_code, 4) + 1, 3, '0', STR_PAD_LEFT);
                $employee->employee_code = $newEmployeeCode;
            }
        });
    }
    // protected $guarded = [];
    // protected $fillable = [
    //     'first_name',
    //     'last_name',
    //     'email',
    //     'phone',
    //     'address',
    //     'department_id',
    //     'designation_id',
    //     'joining_date',
    //     'salary',
    // ];

    /**
     * Get the department associated with the employee.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get the designation associated with the employee.
     */
    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function employeeCertificate()
    {
        return $this->hasMany(EmployeeCertificate::class);
    }
}

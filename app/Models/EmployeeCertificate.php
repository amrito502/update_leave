<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeCertificate extends Model
{
    use HasFactory;
    protected $table = 'employee_certificates';
    protected $fillable = [
        'employee_id',
        'document_name',
        'document_path',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class); 
    }

    public function getDocumentUrlAttribute()
    {
        return asset('storage/' . $this->document_path);
    }
}

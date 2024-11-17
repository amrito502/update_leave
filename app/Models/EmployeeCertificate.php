<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeCertificate extends Model
{
    use HasFactory;
    protected $table = 'employee_certificates';

    // Define which fields are mass assignable
    protected $fillable = [
        'employee_id',
        'document_name',
        'document_path',
    ];

    // Define the relationship with the Employee model
    public function employee()
    {
        return $this->belongsTo(Employee::class); // Assuming you have an Employee model
    }

    // Optional: Add a method to retrieve the full URL of the document
    public function getDocumentUrlAttribute()
    {
        return asset('storage/' . $this->document_path);
    }
}

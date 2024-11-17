<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['sid', 'name', 'email', 'phone','class','branch','shift','gender'];


    public static function generateUniqueId($gender, $branch, $class)
    {
        // Generate based on gender, branch, and class with a unique identifier
        $genderAbbreviation = strtoupper(substr($gender, 0, 1)); // M or F
        $uniqueId = $genderAbbreviation . '-' . strtoupper($branch) . '-' . strtoupper($class) . '-' . uniqid();

        return $uniqueId;
    }
}

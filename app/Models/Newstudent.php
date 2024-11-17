<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newstudent extends Model
{
    use HasFactory;

    protected $fillable = ['sid', 'name', 'email', 'phone','class','branch','shift','gender'];


    // public static function generateUniqueId($gender, $branch, $class)
    // {
    //     // Generate based on gender, branch, and class with a unique identifier
    //     $genderAbbreviation = strtoupper(substr($gender, 0, 1)); // M or F
    //     $uniqueId = $genderAbbreviation . '-' . strtoupper($branch) . '-' . strtoupper($class) . '-' . uniqid();

    //     return $uniqueId;
    // }

    public static function generateUniqueId($gender, $branch, $class)
    {
        // Get first letter of gender (M/F)
        $genderAbbreviation = strtoupper(substr($gender, 0, 1));

        // Get the first two letters of branch and class
        $branchAbbreviation = strtoupper(substr($branch, 0, 2));
        $classAbbreviation = strtoupper(substr($class, 6, 2));

        // Generate unique student ID in the format: Gender-Branch-Class-UniqueId
        $uniqueId = $genderAbbreviation . '-' . $branchAbbreviation . '-' . $classAbbreviation . '-' . uniqid();

        return $uniqueId;
    }
}

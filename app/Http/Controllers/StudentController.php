<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
class StudentController extends Controller
{
   
    public function showUploadForm()
    {
        $students = Student::all();
        return view('upload',compact("students"));
    }

    public function uploadCsv(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt'
        ]);

        $file = $request->file('csv_file');
        $fileHandle = fopen($file->getRealPath(), 'r');
        $isFirstRow = true;
        $sid = Student::generateUniqueId($request->gender, $request->branch, $request->class);
        while (($row = fgetcsv($fileHandle, 1000, ',')) !== false) {
            if ($isFirstRow) {
                $isFirstRow = false;
                continue;
            }
            
            $studentData = [
                'id' => $row[0],
                'sid' => trim($sid),
                'name' => $row[2],
                'email' => $row[3],
                'phone' => $row[4],
                'class' => $row[5],
                'branch' => $row[6],
                'shift' => $row[7],
                'gender' => $row[8],
            ];

            $studentExists = Student::where('id', $row[0])->exists();

            if (!$studentExists) {
                Student::create($studentData);
            }
        }

        fclose($fileHandle);
        return redirect()->back()->with('success', 'CSV Uploaded Successfully.');

    }
}

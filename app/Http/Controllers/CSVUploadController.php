<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Student;
use App\Models\Teacher;
use App\Models\Branch;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\ToModel;

class CSVUploadController extends Controller
{
    public function showUploadForm()
    {
        return view('csv_upload');
    }

    public function uploadCSV(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        $file = $request->file('csv_file');
        $path = $file->getRealPath();

        $data = array_map('str_getcsv', file($path));
        
        foreach ($data as $row) {
            // Assuming the CSV columns are in the order: Name, Class
            $branchName = $row[1];

            // Check if the class exists
            $branch = Branch::firstOrCreate(['name' => $branchName]);

            // Create student record
            Teacher::create([
                'name' => $row[0],
                'branch_id' => $branch->id,
            ]);
        }

        return redirect()->back()->with('success', 'CSV data uploaded successfully!');
    }
}

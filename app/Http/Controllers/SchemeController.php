<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Scheme;
use Illuminate\Http\Request;
use Spatie\SimpleExcel\SimpleExcelReader;
use Spatie\SimpleExcel\SimpleExcelWriter;

class SchemeController extends Controller
{
    //
    public function index() {
        $schemes = Scheme::paginate(10);
        return view('Schemes.index', compact('schemes'));
    }

    public function import(Request $request) {
        // Validate the file upload
        $request->validate([
            'file' => 'required|mimes:xlsx,xls|max:2048',
        ], [
            'file.required' => 'Please upload a file.',
            'file.mimes' => 'The file must be a valid Excel file (xlsx, xls).',
            'file.max' => 'The file may not be greater than 2 MB in size.',
        ]);
        

        // store the file before uploading the data into the database
        $fileName = null;
        if ($request->file('file')->isValid()) {
            $file = $request->file('file');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('public/files', $fileName); // store the file in public/files directory
        }

        // Import data from the uploaded Excel file
        if ($fileName) {
            $rows = SimpleExcelReader::create("storage/files/".$fileName)->getRows();
            $rows->each(function(array $row) {
                Scheme::updateOrCreate(
                    [
                        'scheme_code' => $row['scheme_code'],
                        'financial_year' => $row['fin_year'],
                    ], // Unique constraints
                    [
                        'scheme_name'           => $row['scheme_name'],
                        'central_state_scheme'  => $row['central_state_scheme'],
                        'state_disbursement'    => $row['state_disbursement'],
                        'central_disbursement'  => $row['central_disbursement'],
                        'total_disbursement'    => $row['total_disbursement'],
                    ]);
            });

            // Set success message in session
            return redirect()->back()->with(['icon' => 'success', 'message' => 'Data imported successfully.']);

        }

        // If file upload failed or no valid file found
        return redirect()->back()->withErrors(['file' => 'Failed to upload file. Please try again.']);

    }

    public function export() {

        //Fetch all schemes
        $schemes = Scheme::all();

        // create downloadable file
        $writer = SimpleExcelWriter::streamDownload('schemes.xlsx');
        foreach ( $schemes as $scheme ) {
            $writer->addRow([
                'id'                    => $scheme->id,
                'scheme_code'           => $scheme->scheme_code, 
                'scheme_name'           => $scheme->scheme_name,
                'central_state_scheme'  => $scheme->central_state_scheme,
                'fin_year'              => $scheme->financial_year,
                'state_disbursement'    => $scheme->state_disbursement,
                'central_disbursement'  => $scheme->central_disbursement,
                'total_disbursement'    => $scheme->total_disbursement,
            ]);
        }
        $writer->toBrowser();
    }
}

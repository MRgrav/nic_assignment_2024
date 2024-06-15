<?php

namespace App\Http\Controllers;

use App\Models\Scheme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        // Fetch data for chart (example: total disbursement by financial year)
        $data = Scheme::select(DB::raw('financial_year, SUM(total_disbursement) as total'))
                      ->groupBy('financial_year')
                      ->orderBy('financial_year')
                      ->get();

        // Prepare data for chart
        $labels = $data->pluck('financial_year');
        $values = $data->pluck('total');

        return view('test', compact('labels', 'values'));
    }
}

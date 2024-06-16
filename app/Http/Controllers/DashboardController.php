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
        // Fetch total number of schemes
        $totalSchemes = Scheme::distinct('scheme_code')->count('scheme_code');

        // Fetch latest financial_year
        $latestFinancialYear = Scheme::distinct('financial_year')->orderBy('financial_year', 'desc')
            ->select('financial_year')
            ->get();

        // Fetch MAX total disbursement
        $maxTotalDisbursement = Scheme::where('financial_year', $latestFinancialYear[0]->financial_year)->orderBy('total_disbursement', 'desc')->get();
        $oldTotalDisbursement = Scheme::where('financial_year', $latestFinancialYear[1]->financial_year)->orderBy('total_disbursement', 'desc')->get();

        // percentage change in disbursement
        $changeTotalDisbursement = ($maxTotalDisbursement[0]->total_disbursement - $oldTotalDisbursement[0]->total_disbursement)/$maxTotalDisbursement[0]->total_disbursement * 100;

        // Fetch MAX state disbursement
        $maxStateDisbursement = Scheme::where('financial_year', $latestFinancialYear[0]->financial_year)->orderBy('state_disbursement', 'desc')->get();
        $oldStateDisbursement = Scheme::where('financial_year', $latestFinancialYear[1]->financial_year)->orderBy('state_disbursement', 'desc')->get();

        // percentage change in disbursement
        $changeStateDisbursement = ($maxStateDisbursement[0]->state_disbursement - $oldStateDisbursement[0]->state_disbursement)/$maxStateDisbursement[0]->state_disbursement * 100;

        // Fetch MAX central disbursement
        $maxCentralDisbursement = Scheme::where('financial_year',$latestFinancialYear[0]->financial_year)->orderBy('central_disbursement', 'desc')->get();
        $oldCentralDisbursement = Scheme::where('financial_year', $latestFinancialYear[1]->financial_year)->orderBy('central_disbursement', 'desc')->get();

        // percentage change in disbursement
        $changeCentralDisbursement = ($maxCentralDisbursement[0]->central_disbursement - $oldCentralDisbursement[0]->central_disbursement)/$maxCentralDisbursement[0]->central_disbursement * 100;

        // Fetch data for bar chart (total disbursement by financial year, scheme code)
        $yearlyData = Scheme::select('financial_year', 'scheme_code', 'total_disbursement')
                            ->groupBy('financial_year', 'scheme_code', 'total_disbursement')
                            ->orderBy('financial_year')
                            ->get();

        // Fetch schemes and total disbursements for the latest financial year
        $schemesData = Scheme::select('scheme_code', DB::raw('SUM(total_disbursement) as total_disbursement'))
                            ->where('financial_year', $latestFinancialYear[0]->financial_year)
                            ->groupBy('scheme_code')
                            ->get();

        // Prepare data in the format needed for Chart.js
        $chartData = [];
            foreach ($schemesData as $schemeData) {
            $chartData[$schemeData->scheme_code] = $schemeData->total_disbursement;
        }

        // return the page with data
        return view('Dashboard.index', compact([
            'totalSchemes',
            'yearlyData',
            'maxTotalDisbursement',
            'maxStateDisbursement',
            'maxCentralDisbursement',
            'changeTotalDisbursement',
            'changeCentralDisbursement',
            'changeStateDisbursement',
            'chartData'
        ]));
    }

}

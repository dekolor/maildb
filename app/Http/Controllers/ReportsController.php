<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\SentCampaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportsController extends Controller
{
    //
    public function list()
    {
        return view('reports.list', [
            'newslettersSentCount' => SentCampaign::where('owner', Auth::user()->id)->count(),
            'newsletterCount' => Campaign::where('owner', Auth::user()->id)->count()
        ]);
    }
}

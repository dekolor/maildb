<?php

namespace App\Http\Controllers;

use App\Exports\CampaignsExport;
use App\Exports\EmailAddressesExport;
use App\Exports\SentCampaignsExport;
use App\Models\Campaign;
use App\Models\SentCampaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

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

    public function sentCampaigns()
    {
        return Excel::download(new SentCampaignsExport, 'sent_campaigns.xlsx');
    }

    public function campaigns()
    {
        return Excel::download(new CampaignsExport, 'campaigns.xlsx');
    }

    public function emailAddresses()
    {
        return Excel::download(new EmailAddressesExport, 'email_addresses.xlsx');
    }
}

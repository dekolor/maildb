<?php

namespace App\Exports;

use App\Models\SentCampaign;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class SentCampaignsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SentCampaign::where('owner', Auth::user()->id)->get();
    }
}

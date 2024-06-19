<?php

namespace App\Exports;

use App\Models\Campaign;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class CampaignsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Campaign::where('owner', Auth::user()->id)->get();
    }
}

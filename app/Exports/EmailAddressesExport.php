<?php

namespace App\Exports;

use App\Models\EmailAddress;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmailAddressesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return EmailAddress::where('owner', Auth::user()->id)->get();
    }
}

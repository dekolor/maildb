<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    //
    public function list() {
        return view('reports.list');
    }
}

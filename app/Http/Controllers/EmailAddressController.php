<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailAddressController extends Controller
{
    //
    public function list() {
        return view('address.list');
    }

    public function add() {
      return view('address.add');
    }
}

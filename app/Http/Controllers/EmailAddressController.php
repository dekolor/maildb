<?php

namespace App\Http\Controllers;

use App\Models\EmailAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailAddressController extends Controller
{
    //
    public function list() {
        return view('address.list', [
            'addressList' => EmailAddress::paginate(10)
        ]);
    }

    public function add() {
      return view('address.add');
    }

    public function store(Request $request) {

        $validated = $request->validate([
            'email' => 'required|email:rfc,dns',
            'category' => 'required',
            'remember' => 'required'
        ]);

        $emailAddress = new EmailAddress();
        $emailAddress->address = $validated['email'];
        $emailAddress->category = $validated['category'];
        $emailAddress->owner = Auth::id();

        $emailAddress->save();

        return redirect(route('address.list'));
    }
}

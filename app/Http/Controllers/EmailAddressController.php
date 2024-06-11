<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\EmailAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailAddressController extends Controller
{
    //
    public function list() {
        return view('address.list', [
            'addressList' => EmailAddress::orderBy('id', 'desc')->paginate(10)
        ]);
    }

    public function add() {
      return view('address.add', [
          'categoryList' => Category::all()
      ]);
    }

    public function store(Request $request) {

        $validated = $request->validate([
            'email' => 'required|email:rfc,dns',
            'category' => 'required|exists:categories,id',
            'remember' => 'required'
        ]);

        $emailAddress = new EmailAddress();
        $emailAddress->address = $validated['email'];
        $emailAddress->category_id = $validated['category'];
        $emailAddress->owner = Auth::id();

        $emailAddress->save();

        return redirect(route('address.list'));
    }

    public function patch(Request $request, EmailAddress $address) {
        $validated = $request->validate([
            'category' => 'required|exists:categories,id'
        ]);

        $emailAddress = EmailAddress::find($address->id);

        $emailAddress->category_id = $validated['category'];
        $emailAddress->save();

        return redirect(route('address.list'))->with('status', 'Category for email address ' . $address->address . ' was changed to  ' . Category::find($validated['category'])->name . '!');
    }

    public function update(EmailAddress $address) {
        return view('address.update', [
            'address' => $address,
            'categoryList' => Category::all()
        ]);
    }

    public function destroy(EmailAddress $address) {
        (new EmailAddress())->find($address->id)->delete();

        return redirect(route('address.list'))->with('status', 'Email address ' . $address->address . ' deleted!');
    }
}

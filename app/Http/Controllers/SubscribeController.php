<?php

namespace App\Http\Controllers;

use App\Models\EmailAddress;
use App\Models\Project;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function subscribe(Project $id) {
        return view("subscribe", [
            'project' => $id
        ]);
    }

    public function submit(Project $id, Request $request) {
        $validated = $request->validate([
            'email' => 'required|email:rfc,dns'
        ]);

        $emailAddress = new EmailAddress();
        $emailAddress->address = $validated['email'];
        $emailAddress->category_id = '1';
        $emailAddress->owner = $id->id;
        $emailAddress->save();

        return redirect(route('subscribe', $id->id))->with('status', 'You have successfully subscribed to our newsletters!');
    }
}

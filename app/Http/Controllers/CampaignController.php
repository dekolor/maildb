<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CampaignController extends Controller
{
    //
    public function list() {
        return view('campaign.list', [
            'campaignList' => Campaign::paginate(10)
        ]);
    }

    public function add() {
        return view('campaign.add', [
            'categoryList' => Category::all()
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'content' => 'required',
            'category' => 'required|exists:categories,id'
        ]);

        $campaign = new Campaign();
        $campaign->name = $validated['name'];
        $campaign->content = $validated['content'];
        $campaign->category_id = $validated['category'];
        $campaign->owner = Auth::id();

        $campaign->save();

        return redirect(route('campaign.list'));
    }

    public function send(Campaign $campaign) {
        $addresses = $campaign->category->addresses;

        foreach($addresses as $address) {
            Mail::to($address->address)->queue(new \App\Mail\Campaign($campaign->content, $campaign->name));
        }

        return redirect(route('campaign.list'))->with('status', 'Newsletter sent!');
    }
}

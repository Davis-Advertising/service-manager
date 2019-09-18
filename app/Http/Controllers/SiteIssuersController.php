<?php

namespace App\Http\Controllers;
use App\Site;
use App\Issuer;
use Illuminate\Http\Request;

class SiteIssuersController extends Controller
{
    public function index()
    {
        $issuers = Issuer::all()->sortBy('ssl_issuer');

        return view('issuers.index', compact('issuers'));
    }

    public function create()
    {
        return view('issuers.create');
    }

    public function show(Issuer $issuer) // Or include $issuer = Issuer::findOrFail($id);
    {

        return view('issuers.show', compact('issuer'));
    }

    public function edit(Issuer $issuer)
    {
        return view('issuers.edit', compact('issuer'));
    }

    public function update(Issuer $issuer)
    {
        $issuer->update(request(['ssl_issuer, ssl_duration']));

        return redirect('/sites');
    }

    public function destroy(Issuer $issuer)
    {
        $issuer->delete();

        return redirect('/sites');
    }

    public function store()
    {
        $attributes = request()->validate([
            'ssl_issuer' => ['required', 'min:3', 'max:255'],
            'ssl_duration' => 'required',
        ]);
        Issuer::create($attributes);

        return redirect('/issuers');

        /* Long version of the code above

        $issuer = new Issuer();

        $issuer->site_name = request('site_name');
        $issuer->site_url = request('site_url');
        $issuer->site_description = request('site_description');
        $issuer->client_status = request('client_status');
        $issuer->ssl_issuer = request('ssl_issuer');
        $issuer->ssl_duration = request('ssl_duration');
        $issuer->ssl_last_updated = request('ssl_last_updated');

        $issuer->save();*/

    }
    
}

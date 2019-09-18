<?php

namespace App\Http\Controllers;
use App\Issuer;
use App\Notification;
use App\Site;
use App\Service;
use App\Exports\SitesExport;
use App\Imports\SitesImport;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class SitesController extends Controller
{

    public function index()
    {
        $sites = Site::all()->sortBy('site_name');

        return view('sites.index', compact('sites'));
    }

    public function create()
    {

        return view('sites.create');
    }

    public function show(Site $site) // Or include $site = Site::findOrFail($id);
    {
        $notifications = Notification::all();

        date_default_timezone_set('America/New_York');
        $date = Carbon::now();

        return view('sites.show', compact('site', 'date'));
    }


    public function edit(Site $site)
    {

        return view('sites.edit', compact( 'site'));
    }

    public function update(Site $site, Request $request)
    {

        $site->update(request(['site_name', 'site_url', 'site_description', 'client_status']));

        //dd($site->notifications[0]->type);

        //dd($notification->type);

        $metaData= [];

        $parent = Site::findOrFail($site->id);
        $metaData= [];

        $domain_name = $request->input('domain_name');
        $certificate = $request->input('ssl_certificate');
        $webhosting = $request->input('web_hosting');

        /*foreach ($parent->notifications as $notification) {

            if ($domain_name) {
                if ($parent->notifications()->where([['site_id', '=', $notification->site_id], ['type', '=', 'domain name']] )->exists() ) {
                    $parent->notifications()->where([['site_id', '=', $notification->site_id], ['type', '=', 'domain name']])->update(['expiration' => $domain_name]);
                }
            }

            if ($certificate) {
                if ($parent->notifications()->where([['site_id', '=', $notification->site_id], ['type', '=', 'certificate']] )->exists() ) {
                    $parent->notifications()->where([['site_id', '=', $notification->site_id], ['type', '=', 'certificate']])->update(['expiration' => $certificate]);
                }
            }

            if ($webhosting) {
                if ($parent->notifications()->where([['site_id', '=', $notification->site_id], ['type', '=', 'web hosting']] )->exists() ) {
                    $parent->notifications()->where([['site_id', '=', $notification->site_id], ['type', '=', 'web hosting']])->update(['expiration' => $webhosting]);
                }
            }

        }*/

        //dd($parent->notifications[0]->type);


        foreach ($parent->notifications as $metaKey => $metaValue) {


            if ($parent->notifications()->where([['id', '=', $metaValue->id]] )->doesntExist() ) {
                dd($metaValue->type);

            }

            if ($parent->notifications()->where([['type', '=', $metaValue->type]] )->exists()) {

                if ($metaValue->type == 'domain name') {
                    $parent->notifications()->where([['id', '=', $metaValue->id], ['type', '=', 'domain name']])->update(['expiration' => $domain_name]);
                    //dd($domain_name);
                }

                if ($metaValue->type == 'certificate') {
                    $parent->notifications()->where([['id', '=', $metaValue->id], ['type', '=', 'certificate']])->update(['expiration' => $certificate]);
                }

                if ($metaValue->type == 'web hosting') {
                    $parent->notifications()->where([['id', '=', $metaValue->id], ['type', '=', 'web hosting']])->update(['expiration' => $webhosting]);
                    dd($metaValue->type);

                }


            } else {

                if ($domain_name) {
                    $metaData[] = [
                        'site_id' => $site->id,
                        'type' => 'domain name',
                        'expiration' => $domain_name
                    ];
                }

                if ($certificate) {
                    $metaData[] = [
                        'site_id' => $site->id,
                        'type' => 'domain name',
                        'expiration' => $certificate
                    ];
                }
                if ($webhosting) {
                    $metaData[] = [
                        'site_id' => $site->id,
                        'type' => 'domain name',
                        'expiration' => $webhosting
                    ];
                }

            }

        }

        DB::table('notifications')->insert($metaData);

        Log::channel('activity')->info('User has been created');

/*
        foreach ($site->notifications as $notification) {


            dd ($notification->expiration);



        }

        dd($site->notifications());

        if ($site->notifications()->where([['id', '=', $site->$notification[0]->id]] )->exists()) {

            $site->notifications()->where([['id', '=', $notification[0]->id]])->update(['expiration' => $notifications[0]->expiration]);

        } else {
            $expiration = $request->input('expiration');

            $metaData[] = [
                'site_id' => $notifications[0]->site_id,
                'type' => $notifications[0]->type,
                'expiration' => $expiration
            ];
        }

        DB::table('notifications')->insert($metaData);*/

        /*$notifications = array();
        $domain_name = $request->input('domain_name');
        $certificate = $request->input('ssl_certificate');
        $webhosting = $request->input('web_hosting');

        if ($domain_name) {
            array_push($notifications,
                array(
                    'site_id' => $site->id,
                    'type' => 'domain name',
                    'expiration' => $domain_name,
                    'verified' => 0
                )
            );
        }

        if ($certificate) {
            array_push($notifications,
                array(
                    'site_id' => $site->id,
                    'type' => 'certificate',
                    'expiration' => $certificate,
                    'verified' => 0
                )
            );
        }

        if ($webhosting) {
            array_push($notifications,
                array(
                    'site_id' => $site->id,
                    'type' => 'web hosting',
                    'expiration' => $webhosting,
                    'verified' => 0
                )
            );
        }*/

        //Notification::updateOrCreate($notifications);
        //DB::table('notifications')->update($notifications);

        return redirect('/sites')->with('alert', 'Site has been updated.');;
    }

    public function destroy(Site $site)
    {
        $site->delete();

        return redirect('/sites');
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
           'site_name' => ['required', 'min:3', 'max:255'],
           'site_url' => 'required',
           'client_status' => 'required'
        ]);
        $site = Site::create($attributes);

        $notifications = array();
        $domain_name = $request->input('domain_name');
        $certificate = $request->input('ssl_certificate');
        $webhosting = $request->input('web_hosting');

        if ($domain_name) {
            array_push($notifications,
                array(
                    'site_id' => $site->id,
                    'type' => 'domain name',
                    'expiration' => $domain_name,
                    'verified' => 0
                )
            );
        }

        if ($certificate) {
            array_push($notifications,
                array(
                    'site_id' => $site->id,
                    'type' => 'certificate',
                    'expiration' => $certificate,
                    'verified' => 0
                )
            );
        }

        if ($webhosting) {
            array_push($notifications,
                array(
                    'site_id' => $site->id,
                    'type' => 'web hosting',
                    'expiration' => $webhosting,
                    'verified' => 0
                )
            );
        }

        DB::table('notifications')->insert($notifications);


        //Notification::create();


        return redirect('/sites');

        /* Long version of the code above

        $site = new Site();

        $site->site_name = request('site_name');
        $site->site_url = request('site_url');
        $site->site_description = request('site_description');
        $site->client_status = request('client_status');
        $site->ssl_issuer = request('ssl_issuer');
        $site->ssl_duration = request('ssl_duration');
        $site->ssl_last_updated = request('ssl_last_updated');

        $site->save();*/

    }

    public function export()
    {
        //return Excel::download(new SitesExport, 'sites.xlsx');
        return (new SitesExport())->download('invoices.xlsx');
    }

    public function import()
    {
        Excel::import(new SitesImport, request()->file('import_file'));

        return redirect('/')->with('success', 'All good!');
    }

}

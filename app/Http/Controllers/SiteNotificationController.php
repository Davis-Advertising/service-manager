<?php

namespace App\Http\Controllers;

use App\Notification;
use App\Site;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class SiteNotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::all()->sortBy('expiration');
        $sites = Site::all();
        $services = Service::all();

        return view('notifications.index', compact('services', 'notifications', 'sites'));
    }

    public function create()
    {
        $sites = Site::all();
        $services = Service::all()->sortBy('name');


        return view('notifications.create', compact('services', 'sites') );
    }

    public function store(Request $request)
    {
        $notifications = Notification::all();
        /*    $n = array();
        foreach ($notifications as $notification) {
            $n[] = $notification->type . $notification->site_id;
        }

        dd($n);*/


        $attributes = request()->validate([
            'site_id' => 'required',
            'service_id' => ['required', function ($attribute, $value, $fail) {

                $site_id = request()->input('site_id');
                $service = request()->input('service_id');

                $notifications = DB::table('notifications')->where('site_id', $site_id)->get();

                foreach ($notifications as $notification) {

                    if ($service === $notification->service_id) {
                        $fail( ucwords($attribute) .' already selected for website');
                    };
                }

            },
            ],
            'expiration' => '',
            'notified' => ''
        ]);

        //dd($attributes);


        Notification::create($attributes);
        Log::info('Notification has been added.');

        return redirect('/notifications')->with('alert', 'Notification has been added.');

    }

    public function update(Notification $notification)
    {
        $notification->update(request(['site_id', 'type', 'expiration', 'notified']));
        Log::info('Notification has been updated.');

        return redirect('/notifications')->with('alert', 'Notification has been updated.');
    }

    public function show(Notification $notification)
    {
        return view('notifications.show', compact('notification'));
    }

    public function edit(Notification $notification)
    {
        $sites = Site::all();
        $services = Service::all();

        return view('notifications.edit', compact('services', 'sites', 'notification'));
    }

    public function destroy(Notification $notification)
    {
        $notification->delete();

        return redirect('/notifications');
    }

    public function updateExpirationDate(Notification $notification)
    {
        $notification->update(request(['site_id', 'expiration']));

        Log::info('Expiration Date has been updated.');
        return redirect('/')->with('alert', 'Expiration Date has been updated.');
    }





}

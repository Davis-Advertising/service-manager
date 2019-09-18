<?php

namespace App\Http\Controllers;

use App\Service;
use App\Site;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = DB::table('notifications')->get();

        $notification_id = array();

        foreach ($notifications as $notification) {
            $notification_id[] .= $notification->site_id;
        }

        $notification_id = array_unique( $notification_id );

        $sites = Site::findMany( $notification_id );

        $services = Service::all()->sortBy('name');

        return view('home', compact('sites', 'services', 'notifications'));
    }
}

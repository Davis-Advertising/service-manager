<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Mail;

class Notification extends Model
{
    protected $guarded = [];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function service() {
        return $this->belongsToMany(Service::class, 'notifications', 'site_id', 'service_id');
    }

    /*public function getExpirationAttribute($value)
    {
        return Carbon::parse($value)->formatLocalized('%B %d, %Y');
    }*/

    public static function sendUserNotifications() {

        date_default_timezone_set('America/New_York');

        $sites = Site::get();
        $services = Service::get();
        $date = Carbon::today();
        $notificationDate = $date->addDays(3);

        //dd($notificationDate);

        $notifications = Notification::where('expiration', '<=', $notificationDate )->where('verified', '=', 0)->get();

        //dd($notifications);

        /*$notifications = DB::table('notifications')
            ->join('sites', 'notifications.site_id', '=', 'sites.id')
            ->join('services', 'notifications.service_id', '=', 'services.id');*/




        $date = Carbon::now();
        $ids = array();
        
        //dd($ids);
        $current_date = date('Y-m-d H:i:s');
        $new_date = date('Y-m-d H:i:s');
        //$new_date = $new_date->addDays(30);

        /*$subset = $sites->map(function ($site) {
            return $site->only(['site_name', 'ssl_last_updated']);
        });*/
        //dd( $current_date);

        $mutable = Carbon::now();
        $mutable->addDays(2);
        //dd($mutable);
        //compact('sites');

        //dd($notifications);

        /*foreach ($notifications as $notification) {
            dd($notification);
        }*/

        if( sizeof($notifications) > 0 ) {

            Mail::send('emails.notification', compact( 'notifications', 'sites', 'services'),
                function($message) {
                    $message->to('hi@raylo.us', 'Ray Lo')
                        ->subject('Expiration Notification');
                }
            );

            foreach ($notifications as $notification) {

                $notification = Notification::find( $notification->id );
                $notification->verified = 1;
                $notification->save();

            }

        }

    }

}

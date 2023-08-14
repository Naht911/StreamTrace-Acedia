<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{
    function index()
    {
        return view('home.notification');
    }

    function getNotification(Request $request)
    {
        $user = $request->user();
        $notifications = $user->notifications()->orderBy('created_at', 'desc')->get();
        return response()->json($notifications);
    }

    function readNotification(Request $request)
    {
        $user = $request->user();
        $notification = Notification::find($request->id);
        if ($notification->user_id == $user->id) {
            $notification->is_read = true;
            $notification->save();
            return response()->json(['message' => 'success']);
        }
        return response()->json(['message' => 'fail']);
    }

    public static function checkAdnAddNoti($user_id)
    {
        $subscriptions = Subscription::where('user_id', $user_id)->get();
        $now = date('Y-m-d H:i:s');
        foreach ($subscriptions as $subscription) {
            //nếu subscription.is_remind = true
            //và notification.last_notify == null hoặc
            //tháng của notification.last_notify < tháng hiện tại
            if ($subscription->is_remind && ($subscription->last_notify == null || date('m', strtotime($subscription->last_notify)) < date('m', strtotime($now)))) {
                $notification = new Notification();
                $notification->title = 'Subscription Had Been Expired';
                $notification->content = 'Your subscription ' . ($subscription->custom_name ?? null) . ' had been expired';
                $notification->subscription_id = $subscription->id;
                $notification->user_id = $user_id;
                $notification->save();
                $subscription->last_notify = $now;
                $subscription->save();
                $name = $subscription->custom_name ?? null;
                NotificationController::sendEmail(User::find($user_id), $name);
            }
        }
    }

    public static function checkAdnAddNotiForAllUser()
    {
        $users = User::all();
        foreach ($users as $user) {
            NotificationController::checkAdnAddNoti($user->id);
        }
    }

    public static function sendEmail($user, $subscription_name)
    {



        $data = new \stdClass();
        $data->user = $user;
        $data->subscription_name = $subscription_name;

        Mail::send('emails.subscription_expired', ['user' => $user], function ($email) use ($data) {
            $email->subject('Acedia - Subscription Had Been Expired');
            $email->to($data->user->email);
        });
    }
}

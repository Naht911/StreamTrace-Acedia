<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Subscription;
use App\Models\StreamingServiceProvider;
use App\Models\TypePrice;

class ProfileController extends Controller
{

    public function show()
    {
        //danh sách các quan hệ
        $relations = ['subscription'];
        $user = Auth::user();
        $subscriptions = Subscription::where('user_id', $user->id)
            ->with('typePrice')
            ->with('streamingServiceProvider')
            ->get();
        $providers = StreamingServiceProvider::all();
        $type_price = TypePrice::all();
        $data = [
            'user' => $user,
            'subscriptions' => $subscriptions,
            'providers' => $providers,
            'type_price' => $type_price,
        ];

        return view('home.profile.index', $data);
    }
    public function store_subscription(Request $request)
    {
        if (!Auth::user()) {
            return response()->json([
                'status' => 0,
                'message' => 'This action is required logined user',
            ]);
        }
        $user = User::find(Auth::user()->id);
        if (!$user) {
            return response()->json([
                'status' => 0,
                'message' => 'Login session is expired. Please login again.',
            ]);
        }
        $custom_name = $request->custom_name ?? null; //optional
        $streaming_service_id  = $request->provider_id ?? null; //optional
        $subscription_url = $request->subscription_url ?? null; //optional
        $subscription_date = $request->subscription_date ?? null; //optional
        $expiration_date = $request->expiration_date ?? null; //optional. required if is_reminder = true
        //checkbox
        $is_reminder = $request->is_reminder ?? false; //optional
        $price = (int)$request->price ?? null; //optional. required if type_price_id != null
        $type_price_id  = $request->type_price ?? null; //optional
        $note = $request->note ?? null; //optional
        //check null

        if ($is_reminder && $expiration_date == null) {
            return response()->json([
                'status' => 0,
                'message' => 'Expiration date is required if you do not want to set reminder',
            ]);
        }
        //kiểm tra nếu ngày hết hạn bé hơn ngày đăng ký
        if ($expiration_date != null && $subscription_date != null) {
            if ($expiration_date < $subscription_date) {
                return response()->json([
                    'status' => 0,
                    'message' => 'Expiration date must be greater than subscription date',
                ]);
            }
        }
        //kiểm tra nếu ngày hết hạn bé hơn ngày hiện tại
        if ($expiration_date != null) {
            if ($expiration_date < date('Y-m-d')) {
                return response()->json([
                    'status' => 0,
                    'message' => 'Expiration date must be greater than today',
                ]);
            }
        }
        //nếu provider_id = null thì phải điền custom_name
        if ($streaming_service_id  == null && $custom_name == null) {
            return response()->json([
                'status' => 0,
                'message' => 'Custom name is required if you do not choose any provider',
            ]);
        }
        //nếu type_price_id = null thì phải điền price
        if ($type_price_id == null && $price == null) {
            return response()->json([
                'status' => 0,
                'message' => 'Price is required if you do not choose any type price',
            ]);
        }
        //giá tiền phải lớn hơn 0
        if ($price != null) {
            if ($price <= 0) {
                return response()->json([
                    'status' => 0,
                    'message' => 'Price must be greater than 0',
                ]);
            }
        }
        //note không được quá 255 ký tự
        if ($note != null) {
            if (strlen($note) > 255) {
                return response()->json([
                    'status' => 0,
                    'message' => 'Note must be less than 255 characters',
                ]);
            }
        }
        //kiểm tra xem provider_id có tồn tại không
        if ($streaming_service_id  != null) {
            $provider = StreamingServiceProvider::find($streaming_service_id);
            if (!$provider) {
                return response()->json([
                    'status' => 0,
                    'message' => 'Provider does not exist. Please choose another provider',
                ]);
            }
        }
        //kiểm tra xem type_price_id có tồn tại không
        if ($type_price_id != null) {
            $type_price = TypePrice::find($type_price_id);
            if (!$type_price) {
                return response()->json([
                    'status' => 0,
                    'message' => 'Type price does not exist. Please choose another type price',
                ]);
            }
        }


        //tạo subscription
        $subscription = new Subscription();
        $subscription->user_id = $user->id;
        $subscription->custom_name = $custom_name;
        $subscription->streaming_service_id  = $streaming_service_id;
        $subscription->subscription_url = $subscription_url;
        $subscription->subscription_date = $subscription_date;
        $subscription->expiration_date = $expiration_date;
        $subscription->is_remind = $is_reminder;
        $subscription->price = $price;
        $subscription->type_price_id = $type_price_id;
        $subscription->note = $note;
        $subscription->save();

        return response()->json([
            'status' => 1,
            'message' => 'Add subscription successfully.',
        ]);
    }

    public function edit_subscription(Request $request)
    {
        $subscription_id = $request->id;
        if ($subscription_id == null) {
            return redirect()->route('Profile')->with('error', 'Subscription does not exist.');
        }
        $subscription = Subscription::find($subscription_id);
        if (!$subscription) {
            return redirect()->route('Profile')->with('error', 'Subscription does not exist.');
        }
        $providers = StreamingServiceProvider::all();
        $type_price = TypePrice::all();
        $data = [
            'subscription' => $subscription,
            'providers' => $providers,
            'type_price' => $type_price,
        ];
        return view('home.profile.edit_subscription', $data);
    }

    public function update_subscription(Request $request)
    {
        $subscription_id = $request->id;
        if ($subscription_id == null) {
            return response()->json([
                'status' => 0,
                'message' => 'Subscription does not exist.',
            ]);
        }
        $subscription = Subscription::find($subscription_id);
        if (!$subscription) {
            return response()->json([
                'status' => 0,
                'message' => 'Subscription does not exist.',
            ]);
        }
        $user = User::find(Auth::user()->id);
        $custom_name = $request->input('custom_name');
        $streaming_service_id  = $request->provider_id ?? null; //optional
        $subscription_url = $request->subscription_url ?? null; //optional
        $subscription_date = $request->subscription_date ?? null; //optional
        $expiration_date = $request->expiration_date ?? null; //optional. required if is_reminder = true
        //checkbox
        $is_reminder = $request->is_reminder ?? false; //optional
        $price = (int)$request->price ?? null; //optional. required if type_price_id != null
        $type_price_id  = $request->type_price ?? null; //optional
        $note = $request->note ?? null; //optional
        //check null

        if ($is_reminder && $expiration_date == null) {
            return response()->json([
                'status' => 0,
                'message' => 'Expiration date is required if you do not want to set reminder',
            ]);
        }
        //kiểm tra nếu ngày hết hạn bé hơn ngày đăng ký
        if ($expiration_date != null && $subscription_date != null) {
            if ($expiration_date < $subscription_date) {
                return response()->json([
                    'status' => 0,
                    'message' => 'Expiration date must be greater than subscription date',
                ]);
            }
        }
        //kiểm tra nếu ngày hết hạn bé hơn ngày hiện tại
        if ($expiration_date != null) {
            if ($expiration_date < date('Y-m-d')) {
                return response()->json([
                    'status' => 0,
                    'message' => 'Expiration date must be greater than today',
                ]);
            }
        }
        //nếu provider_id = null thì phải điền custom_name
        if ($streaming_service_id  == null && $custom_name == null) {
            return response()->json([
                'status' => 0,
                'message' => 'Custom name is required if you do not choose any provider',
            ]);
        }
        //nếu type_price_id = null thì phải điền price
        if ($type_price_id == null && $price == null) {
            return response()->json([
                'status' => 0,
                'message' => 'Price is required if you do not choose any type price',
            ]);
        }
        //giá tiền phải lớn hơn 0
        if ($price != null) {
            if ($price <= 0) {
                return response()->json([
                    'status' => 0,
                    'message' => 'Price must be greater than 0',
                ]);
            }
        }
        //note không được quá 255 ký tự
        if ($note != null) {
            if (strlen($note) > 255) {
                return response()->json([
                    'status' => 0,
                    'message' => 'Note must be less than 255 characters',
                ]);
            }
        }
        //kiểm tra xem provider_id có tồn tại không
        if ($streaming_service_id  != null) {
            $provider = StreamingServiceProvider::find($streaming_service_id);
            if (!$provider) {
                return response()->json([
                    'status' => 0,
                    'message' => 'Provider does not exist. Please choose another provider',
                ]);
            }
        }
        //kiểm tra xem type_price_id có tồn tại không
        if ($type_price_id != null) {
            $type_price = TypePrice::find($type_price_id);
            if (!$type_price) {
                return response()->json([
                    'status' => 0,
                    'message' => 'Type price does not exist. Please choose another type price',
                ]);
            }
        }
        //check xem user sửa subscription của chính mình hay không
        if ($subscription->user_id != $user->id) {
            return response()->json([
                'status' => 0,
                'message' => 'You do not have permission to edit this subscription',
            ]);
        }
        //update subscription
        $subscription->custom_name = $custom_name;
        $subscription->streaming_service_id = $streaming_service_id;
        $subscription->subscription_url = $subscription_url;
        $subscription->subscription_date = $subscription_date;
        $subscription->expiration_date = $expiration_date;
        $subscription->is_remind = $is_reminder;
        $subscription->price = $price;
        $subscription->type_price_id = $type_price_id;
        $subscription->note = $note;
        $subscription->save();
        return response()->json([
            'status' => 1,
            'message' => 'Update subscription successfully',
        ]);

    }

    public function delete_subscription(Request $request)
    {
        if(!Auth::check()){
            return response()->json([
                'status' => 0,
                'message' => 'You must login to delete subscription.',
            ]);
        }
        $subscription_id = $request->id;
        if ($subscription_id == null) {
            return response()->json([
                'status' => 0,
                'message' => 'Subscription does not exist.',
            ]);
        }
        $subscription = Subscription::find($subscription_id);
        if (!$subscription) {
            return response()->json([
                'status' => 0,
                'message' => 'Subscription does not exist.',
            ]);
        }
        //check subscription có phải của user đang đăng nhập không
        if ($subscription->user_id != Auth::user()->id) {
            return response()->json([
                'status' => 0,
                'message' => 'You do not have permission to delete this subscription.',
            ]);
        }

        $subscription->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Delete subscription successfully',
        ]);
    }

    public function changeName(Request $request)
    {

        $user = User::find(Auth::user()->id);
        if(!$user){
            return response()->json([
                'status' => 0,
                'message' => 'Please login to do this action.',
            ]);
        }

        $newName = $request->input('new_name');

        $user->name = $newName;
        $user->save();

        return response()->json([
            'status' => 1,
            'message' => 'Update profile successfully.',
        ]);
    }

    public function changePassword(Request $request)
    {

        $user = User::find(Auth::user()->id);
        if(!$user){
            return response()->json([
                'status' => 0,
                'message' => 'Please login to do this action.',
            ]);
        }
        $currentPassword = $request->input('old_pass');
        $newPassword = $request->input('new_pass');
        $confirmNewPassword = $request->input('confirm_new_pass');
        //check định dạng password
        // if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $newPassword)) {
        //     return response()->json([
        //         'status' => 0,
        //         'message' => 'Password must be at least 8 characters, at least 1 uppercase letter, 1 lowercase letter and 1 number.',
        //     ]);
        // }
        if (!Hash::check($currentPassword, $user->password)) {
            return response()->json([
                'status' => 0,
                'message' => 'Current password is incorrect.',
            ]);
        }

        if ($newPassword !== $confirmNewPassword) {
            return response()->json([
                'status' => 0,
                'message' => '2 passwords are not the same.',
            ]);
        }

        $user->password = Hash::make($newPassword);
        $user->save();

        return response()->json([
            'status' => 1,
            'message' => 'Update password successfully.',
        ]);
    }
}

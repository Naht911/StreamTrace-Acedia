<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\MovieProvider;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // $movies = Movie::with('providers')->get();
        // foreach ($movies as $movie) {
        //     $providers = $movie->providers;
        //     echo $movie->title . "\n";
        //     echo '<pre>';
        //     foreach ($providers as $provider) {
        //         // Hiển thị tên của provider
        //         echo $provider->name . "\n";

        //         // Hiển thị giá của provider cho phim này
        //         // Bạn có thể truy cập vào các cột bổ sung trong bảng trung gian qua thuộc tính pivot của provider
        //         echo $provider->pivot->price . "\n";
        //         // dd($provider);
        //         // echo ($provider->pivot->resolution->name);
        //         // Hiển thị loại giá của provider cho phim này
        //         // Bạn có thể sử dụng quan hệ hasOne hoặc belongsTo để lấy dữ liệu từ bảng type_price
        //         // Bạn có thể khai báo quan hệ này trong model MovieProvider hoặc model StreamingServiceProvider
        //         // Ở đây, tôi giả sử bạn đã khai báo quan hệ này trong model MovieProvider với tên là typePrice
        //         echo $provider->pivot->typePrice->name . "\n";

        //         // // Hiển thị chất lượng phim của provider cho phim này
        //         // // Tương tự như trên, bạn có thể sử dụng quan hệ hasOne hoặc belongsTo để lấy dữ liệu từ bảng movie_resolution
        //         // // Bạn có thể khai báo quan hệ này trong model MovieProvider hoặc model StreamingServiceProvider
        //         // // Ở đây, tôi giả sử bạn đã khai báo quan hệ này trong model MovieProvider với tên là movieResolution
        //         echo $provider->pivot->resolution->name . "\n";

        //         // // Hiển thị url của provider cho phim này
        //         // echo $provider->pivot->url . "\n";
        //     }
        // }


        return view('dashboard.index');
    }


    // public function user_performance()
    // {
    //     $users = User::all();

    //     if ($users) {
    //         return view('dashboard.performance.user_performance')->with(
    //             [
    //                 'data' =>$users,
    //             ]
    //         );
    //     }
    // }

    public function user_performance(Request $request)
    {
        $year = $request->year ?? null;
        $users = User::whereYear('created_at', $year)->get();
        $data_user = [];
        foreach ($users as $user) {
            $month = $user->created_at->format('F');
            if (isset($data_user[$month])) {
                $data_user[$month]++;
            } else {
                $data_user[$month] = 1;
            }
        }
        $data_user = json_encode($data_user);
        $data = [
            'count' => $data_user,
            'users' => $users,
        ];

        return view('dashboard.performance.user_performance', $data);
    }

    public function list_user(Request $request)
    {
        //search filter
        $relations = [];
        $name = trim($request->name ?? null);
        // dd($name);
        $users = User::query()->with($relations);
        $per_page = $request->per_page ?? 10;
        if ($name && $name != null && $name != '' && !empty($name)) {

            $users = $users->where('name', 'like', '%' . $name . '%');
        }
        $users = $users->orderBy('id', 'DESC');


        $users = $users->paginate($per_page);
        //add query string to pagination links
        $users->appends(request()->query());
        $data = [
            'users' => $users,

        ];
        return view('dashboard.user.list_user', $data);
    }

    public function edit_user($id)
    {
        if (!$id) {
            return redirect()->route('dashboard.user.list_user');
        }
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('dashboard.user.list_user');
        }
        $data = [
            'user' => $user,
        ];
        return view('dashboard.user.edit_user', $data);
    }

    function update_user(Request $request, $id)
    {
        if ($id == null) {
            return response()->json([
                'status' => 0,
                'message' => 'User not found'
            ]);
        }

        $user = User::find($id);
        if ($user == null) {
            return response()->json([
                'status' => 0,
                'message' => 'User not found'
            ]);
        }
        $role = $request->role ?? null;
        if ($role == null) {
            return response()->json([
                'status' => 0,
                'message' => 'Please fill all fields!'
            ]);
        }
        $user->role = $role;
        $user->save();
        return response()->json([
            'status' => 1,
            'message' => 'Update user successfully'
        ]);
    }
}
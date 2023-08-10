<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\MovieProvider;

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
}

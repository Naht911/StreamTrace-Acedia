<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StreamingProviderController extends Controller
{
    function index()
    {
        return view('dashboard.streaming_provider.index');
    }
}

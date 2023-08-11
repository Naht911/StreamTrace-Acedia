<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StreamingServiceProvider;
use Illuminate\Validation\Validator;
use Intervention\Image\Facades\Image as Img;

class StreamingProviderController extends Controller
{
    function list_provider()
    {
        $per_page = 10;
        $providers = StreamingServiceProvider::query()->with('movies')->paginate($per_page);
        $data = [
            'providers' => $providers
        ];
        return view('dashboard.provider.index', $data);
    }

    function create_provider()
    {
        return view('dashboard.provider.create');
    }

    function store_provider(Request $request)
    {
        $name = $request->name ?? null;
        // $type = $request->type ?? null;
        $description = $request->description ?? null;
        $url = $request->url ?? null;
        $logo = $request->file('logo');
        $background = $request->file('background');
        // $main_color = $request->main_color ?? null; //hex

        if ($name == null  || $description == null || $url == null || $logo == null || $background == null) {
            return response()->json([
                'status' => 0,
                'message' => 'Please fill all fields'
            ]);
        }
        //check duplicate name
        $provider = StreamingServiceProvider::where('name', $name)->first();
        if ($provider != null) {
            return response()->json([
                'status' => 0,
                'message' => 'Provider name already exists'
            ]);
        }
        //check duplicate url
        $provider = StreamingServiceProvider::where('url', $url)->first();
        if ($provider != null) {
            return response()->json([
                'status' => 0,
                'message' => 'Provider url already exists'
            ]);
        }
        //upload logo
        $slug = to_slug($name);
        //name format: slug-logo-time().extension
        $logo_name = $slug . '-logo-' . time() . '.' . $logo->getClientOriginalExtension();
        $file_type = $logo->getMimeType();
        if ($file_type != 'image/jpeg' && $file_type != 'image/png' && $file_type != 'image/jpg') {
            return response()->json(array('status' => 0, 'message' => "Logo is not a valid image file!"));
        }
        $logo_path = 'uploads/images/providers/' . $logo_name;
        checkAndCreateFolder('uploads/images/providers');
        $image_resize = Img::make($logo->getRealPath());
        $image_resize->save($logo_path);
        //upload background
        $background_name = $slug . '-background-' . time() . '.' . $background->getClientOriginalExtension();
        $background_path = 'uploads/images/providers/' . $background_name;
        $file_type = $background->getMimeType();
        if ($file_type != 'image/jpeg' && $file_type != 'image/png' && $file_type != 'image/jpg') {
            return response()->json(array('status' => 0, 'message' => "Background is not a valid image file!"));
        }
        checkAndCreateFolder('uploads/images/providers');
        $image_resize = Img::make($background->getRealPath());
        $image_resize->save($background_path);

        //create provider
        $provider = new StreamingServiceProvider();
        $provider->name = $name;
        // $provider->type = $type;
        $provider->description = $description;
        $provider->url = $url;
        $provider->logo =  $logo_path;
        $provider->background = $background_path;
        // $provider->main_color = $main_color;
        $provider->save();
        return response()->json([
            'status' => 1,
            'message' => 'Create provider successfully'
        ]);
    }

    function edit_provider($id = null)
    {
        if ($id == null) {
            return abort(404);
        }

        $provider = StreamingServiceProvider::find($id);

        if ($provider == null) {
            return abort(404);
        }
        $data = [
            'provider' => $provider
        ];
        return view('dashboard.provider.edit', $data);
    }

    function update_provider(Request $request, $id = null)
    {
        if ($id == null) {
            return response()->json([
                'status' => 0,
                'message' => 'Provider not found'
            ]);
        }

        $provider = StreamingServiceProvider::find($id);
        if ($provider == null) {
            return response()->json([
                'status' => 0,
                'message' => 'Provider not found'
            ]);
        }
        $name = $request->name ?? null;
        $description = $request->description ?? null;
        $logo = $request->logo ?? null; //file
        $background = $request->background ?? null; //file
        // $main_color = $request->main_color ?? null; //hex
        $url = $request->url ?? null;
        if ($name == null || $description == null  || $url == null) {
            return response()->json([
                'status' => 0,
                'message' => 'Please fill all fields!'
            ]);
        }
        //check duplicate name
        $check_provider = StreamingServiceProvider::where('name', $name)->where('id', '!=', $id)->first();
        if ($check_provider != null) {
            return response()->json([
                'status' => 0,
                'message' => 'Provider name already exists'
            ]);
        }
        $provider->name = $name;
        $provider->description =  $description;
        $provider->save();
        if ($request->hasFile('logo')) {
            //upload logo
            $slug = to_slug($name);
            //name format: slug-logo-time().extension
            $logo_name = $slug . '-logo-' . time() . '.' . $logo->getClientOriginalExtension();
            $logo_path = 'uploads/images/providers/' . $logo_name;
            checkAndCreateFolder('uploads/images/providers');
            $image_resize = Img::make($logo->getRealPath());
            $image_resize->save($logo_path);
            $provider->logo = $logo_path;
            $provider->save();
        }
        if ($request->hasFile('background')) {
            //upload background
            $background_name = $slug . '-background-' . time() . '.' . $background->getClientOriginalExtension();
            $background_path = 'uploads/images/providers/' . $background_name;
            checkAndCreateFolder('uploads/images/providers');
            $image_resize = Img::make($background->getRealPath());
            $image_resize->save($background_path);
            $provider->background = $background_path;
            $provider->save();
        }
        return response()->json([
            'status' => 1,
            'message' => 'Update provider successfully'
        ]);
    }

    function delete_provider(Request $request)
    {
        $id = $request->id ?? null;
        if ($id == null) {
            return response()->json([
                'status' => 0,
                'message' => 'Provider not found'
            ]);
        }
        $provider = StreamingServiceProvider::find($id);
        if ($provider == null) {
            return response()->json([
                'status' => 0,
                'message' => 'Provider not found or deleted!'
            ]);
        }
        $provider->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Delete provider successfully'
        ]);
    }
}

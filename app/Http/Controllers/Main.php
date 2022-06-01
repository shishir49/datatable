<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Subscription;

class Main extends Controller
{
    public function index() {
        return view('admin.dashboard');
    }

    public function API() {
        $data['subscribers'] = Subscription::get();
        return response()->json($data,200);
    }

    public function SubscribeView() {
        return view('admin.subscribe');
    }

    public function Subscribe(Request $request) {
        $validation = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:subscriptions',
        ]);

        if(! $validation->fails()) {
            $insert = Subscription::create($request->all());
            return response()->json(200);
        }else{
            return response()->json(['errors' => $validation->errors()],401);
        }
        
    }
}

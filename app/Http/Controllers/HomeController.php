<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetectionLog;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function camera()
    {
        $cam = 1;

        return view('camera.index', compact('cam'));
    }

    public function getData()
    {
        return ["name"=>"rapuy"];
    }

    public function addData(Request $request)
    {
        $log = new DetectionLog();
        $log->detail = $request->detail;
        $result = $log->save();
        if ($result) {
            return ["result"=>"data has been saved"];
        }
        else {
            return ["result"=>"data failed to save"];
        }
    }
}

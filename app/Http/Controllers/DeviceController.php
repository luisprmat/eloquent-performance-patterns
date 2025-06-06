<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\View\View;

class DeviceController extends Controller
{
    public function index(): View
    {
        $devices = Device::query()
            ->orderBy('name')
            ->paginate();

        return view('devices.index', ['devices' => $devices]);
    }
}

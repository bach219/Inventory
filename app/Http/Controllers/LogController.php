<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Neo\PusherLogger\PusherLogger;

class LogController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'message' => 'required|string',
            'level' => 'required|string'
        ]);

        $dispatched = PusherLogger::log($data['message'], $data['level'])
            ->setChannel('log-channel')
            ->setEvent('log-event')
            ->setInterests(['log-interest'])
            ->send();

        return response()->json(['status' => $dispatched]);
    }
    public function demo()
    {
        return response()->json( \Carbon\Carbon::parse('2019-09-13 11:17:44')->diffInHours(\Carbon\Carbon::parse('2019-09-11 11:22:55')));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        require __DIR__ . '/vendor/autoload.php';

        $options = array(
            'cluster' => 'eu',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            '9d104eaa5b525f7268f4',
            'c645b09b2cae0ea6e54c',
            '751052',
            $options
        );

        $data['message'] = 'hello world';
        $pusher->trigger('my-channel', 'my-event', $data);
    }
}

<?php
//message
//messages
namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller
{

    public function index()
    {
<<<<<<< HEAD


        $messages = Message::all();
=======
        if (auth()->user()){
            $pubkey = auth()->user()->pubkey;
            $messages = Message::where('pubkey', '=', $pubkey)->latest()->get();
        }else{
            $messages = Message::all();
        }


>>>>>>> 9a32a3181afda9255fde32912cad9a62e537fce9

        return view('messages.index', compact('messages'));
    }

    public function filter()
    {
        $pubkeycen = str_replace("/", "", request('pubkey'));

<<<<<<< HEAD
        return redirect('messages/'.$pubkeycen);
=======
        return redirect('messages/' . $pubkeycen);
>>>>>>> 9a32a3181afda9255fde32912cad9a62e537fce9

    }

    public function showPubKey()
    {
<<<<<<< HEAD

        $pubkeycen = str_replace("/", "", request('pubkey'));
=======
>>>>>>> 9a32a3181afda9255fde32912cad9a62e537fce9

        $pubkeycen = str_replace("/", "", request('pubkey'));
        $messages = Message::where('pubkeycen', '=', $pubkeycen)->latest()->get();
        return view('messages.index', compact('messages'));
    }

    public function show(message $message)
    {
        return view('messages.show', compact('message'));
    }


    public function create()
    {
        $id = request('id');
        $pubkey = User::where('id', '=', $id)->value('pubkey');
        return view('messages.create', compact('pubkey'));
    }

    public function store()
    {
        
        if (request('reaction') == 'on') {
            $user = auth()->user();
            $reaction = 1;
            $sender_id = $user->id;
        } else {
            $reaction = 0;
            $sender_id = 0;
        }

        Message::create([
            'body' => request('message'),
            'sender_id' => $sender_id,
            'pubkey' => request('pubkey'),
            'reaction' => $reaction,
        ]);


        return redirect('/messages');
    }
}


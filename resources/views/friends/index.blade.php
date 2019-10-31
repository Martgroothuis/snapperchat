@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Berichten</div>
                    <div class="card-body">
                        @if( Auth::check() )
                            <div class="form-group ">



                                <div class="form-group row">
                                    <label for="passphrase" class="col-md-2 col-form-label text-md-right">{{ __('passphrase') }}</label>

                                    <div class="col-md-6">
                                        <input id="passphrase" class="form-control" type="password"
                                               name="passphrase"
                                               placeholder="passphrase">                                    </div>
                                </div>

                                <div class="form-group row mb-0">

                                    <div class="col-md-10 offset-md-2">
                                        <button id="decryptmessage" class="btn btn-primary" name="decryptmessage">
                                            decryptmessages
                                        </button>

                                    </div>
                                </div>


                            </div>
                        @else
                            <div class="form-group ">
                                <label for="pubkey">Zoeken op PubKey:</label>
                                <input id="input" class="form-control" type="text" name="pubkey" placeholder="PubKey">
                            </div>
                        @endif
                    </div>
                    <div id="myList" class="list-group list-group-flush">
                        @foreach($messages as $message)
                            <div class="list-group-item ">
                                <div class="form-group row">
                                    <div class="col-md-2">


                                            <a class=" col-form-label text-md-right btn btn-dark"
                                               href="/messages/create/">react</a>


                                            <a class=" col-form-label text-md-right"
                                               href="/messages/message/{{ $message->id }}">{{ __('This is for me!') }} </a>
                                            <label for="showpubkey">pubkey</label>

                                    </div>
                                    <div class="col-md-10">
                                    <textarea id="message{{ $message->id }}" type="text"
                                              class="form-control message"
                                              rows="3"
                                              name="showpubkey"
                                    >
                                        @if( Auth::check() )
                                            {{ $message->body }}
                                        @else
                                            {{ $message->pubkey }}
                                        @endif

                                    </textarea>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Messages</div>
                    <div class="card-body">
                        @if( Auth::check() )
                            <div class="form-group ">


                                <div class="form-group row">
                                    <label for="passphrase"
                                           class="col-md-2 col-form-label text-md-right">{{ __('PassPhrase') }}</label>

                                    <div class="col-md-10">
                                        <input id="passphrase" class="col-12 form-control" type="password"
                                               name="passphrase"
                                               placeholder="passphrase"></div>
                                </div>

                                <div class="form-group row mb-0">

                                    <div class="col-md-10 offset-md-2">
                                        <button id="decryptmessage" class="col-12 btn btn-outline-success btn-lg outline" name="decryptmessage">
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
<<<<<<< HEAD
                                    <a class="col-md-3 col-form-label text-md-right" href="/messages/message/{{ $message->id }}">{{ __('This is for me!') }} </a>

                                    <div class="col-md-9">
                                    <textarea id="message" type="text"
                                              class="form-control"
                                              rows="3"
                                              name="pubkey">{{ $message->pubkey }}</textarea>
                                    </div>

                                </div>

=======
                                    <div class="col-md-2">

                                        @if( Auth::check() )

                                            @if( $message->reaction == 1)
                                                <a class="col-12 col-form-label btn btn-outline-dark outline"
                                                   href="/messages/create/{{ $message->sender_id}}">react</a>
                                            @endif
>>>>>>> 9a32a3181afda9255fde32912cad9a62e537fce9

                                        @else
                                            <a class=" col-form-label text-md-right"
                                               href="/messages/message/{{ $message->id }}">{{ __('This is for me!') }} </a>
                                            <label for="showpubkey">pubkey</label>
                                        @endif
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

@section('scripts')
    @if( Auth::check() )


        <script>
            document.getElementById("decryptmessage").onclick = function () {
                console.log(document.getElementById('passphrase').value);

                var elements = document.getElementsByClassName("message");
                var messages = '';
                var ids = '';
                for (var i = 0; i < elements.length; i++) {
                    messages = elements[i].value;
                    ids = elements[i].id;
                    startdecrypting(ids, messages)
                }
            };


            function startdecrypting(id, message) {
                message = document.getElementById(id).innerHTML;
                passphrase = document.getElementById('passphrase').value;

                decryptresult = decryptMessage(message, passphrase);
                console.log(decryptresult);
                document.getElementById(id).value = decryptresult.plaintext;
            }
        </script>

        <script language="JavaScript" type="text/javascript"
                src="{{ asset('https://mart-groothuis.newdeveloper.nl/js/cryptico/jsbn.js') }}"></script>
        <script language="JavaScript" type="text/javascript"
                src="{{ asset('https://mart-groothuis.newdeveloper.nl/js/cryptico/random.js') }}"></script>
        <script language="JavaScript" type="text/javascript"
                src="{{ asset('https://mart-groothuis.newdeveloper.nl/js/cryptico/hash.js') }}"></script>
        <script language="JavaScript" type="text/javascript"
                src="{{ asset('https://mart-groothuis.newdeveloper.nl/js/cryptico/rsa.js') }}"></script>
        <script language="JavaScript" type="text/javascript"
                src="{{ asset('https://mart-groothuis.newdeveloper.nl/js/cryptico/aes.js') }}"></script>
        <script language="JavaScript" type="text/javascript"
                src="{{ asset('https://mart-groothuis.newdeveloper.nl/js/cryptico/api.js') }}"></script>
        <script language="JavaScript" type="text/javascript"
                src="{{ asset('https://mart-groothuis.newdeveloper.nl/js/cryptico.js') }}"></script>
    @else
        <script>
            $(document).ready(function () {
                $("#input").on("keyup", function () {
                    var value = $(this).val().toLowerCase();
                    $("#myList .list-group-item").filter(function () {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>

    @endif
@endsection
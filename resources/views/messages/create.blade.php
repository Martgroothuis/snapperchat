@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Send messages</div>

                    <div class="card-body">

                        <form id="form" method="post" action="/messages">
                            @csrf
                            <div class="form-group">
<<<<<<< HEAD
                                <label for="">{{ __('Message') }}</label>
                                <input class="form-control" type="text" name="message" id="message">
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('Send to PubKey') }}</label>
                                <input class="form-control" type="text" name="pubkey" id="pubkey">
=======
                                <label for="message">{{ __('Message') }}</label>
                                <input class="form-control" type="text" name="message" id="message">
                            </div>
                            <div class="form-group">
                                <label for="pubkey">{{ __('Send to PubKey') }}</label>
                                <input value="{{ $pubkey }}" class="form-control" type="text" name="pubkey" id="pubkey">
>>>>>>> 9a32a3181afda9255fde32912cad9a62e537fce9
                            </div>
                            @if( Auth::check() )
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="reaction"
                                                   id="reaction" checked>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Let the resever send a message back') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endif

<<<<<<< HEAD
                            <div class="form-group">
                                <input class="btn btn-primary" type="button" value="{{ __('Encypt message') }}" onclick="startencrypting()" name="submit">
                            </div>

                            <div class="form-group">
                                <label for="">{{ __('Encypting') }}</label>
                                <input disabled class="form-control" type="text" name="encrypting" id="encrypting">
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('Ciper') }}</label>
                                <input disabled class="form-control" type="text" name="body" id="cipher">
                            </div>
                            <div class="form-group d-none" id="submit">
                                <input class="btn btn-primary" type="submit"  name="submit">
=======

                            <div class="form-group">

                                <div class="form-group" id="submit">
                                    <input value="{{ __('Encypt and send message') }}" class="col-12 btn btn-outline-dark btn-lg outline"
                                           type="submit" name="submit">
                                </div>

>>>>>>> 9a32a3181afda9255fde32912cad9a62e537fce9
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('scripts')

    <script>
        $('#form').submit(function () {

            startencrypting();

            return true;
        });
    </script>

    <script>
        window.onload = function () {
            document.getElementById('message').value = "";

        };

        function startencrypting() {

            message = document.getElementById('message').value;
            pubkey = document.getElementById('pubkey').value;

            if (message && pubkey) {
<<<<<<< HEAD

                encryptresult = encryptMessage(pubkey, message);
                document.getElementById('encrypting').value = encryptresult;
                document.getElementById('cipher').value = encryptresult.cipher;
                document.getElementById('submit').classList.remove("d-none");
            }else {
                document.getElementById('submit').classList.add("d-none");

                document.getElementById('encrypting').value = "";
                document.getElementById('cipher').value = "";
=======
                encryptresult = encryptMessage(pubkey, message);
                document.getElementById('message').value = encryptresult.cipher;
>>>>>>> 9a32a3181afda9255fde32912cad9a62e537fce9
            }
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

@endsection



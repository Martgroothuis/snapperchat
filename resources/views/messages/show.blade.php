@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Decypt your message</div>
                    <div class="card-body">

                        <form>
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Encypted message') }}</label>

                                <div class="col-md-8">
                                    <textarea id="message" type="text"
                                              class="form-control"
                                              rows="5"
                                              name="message">{{ $message->body }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('PassPhrase') }}</label>

                                <div class="col-md-8">
                                    <input id="passphrase" type="password"
                                           class="form-control"
                                           name="email"
                                    placeholder="{{ __('PassPhrase') }}">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Decypt this message') }}</label>

                                <div class="col-md-6">
                                    <input type="button" value="{{ __('Decypt') }}" id="generatekeys"
                                           class="btn btn-primary" onclick="startdecrypting()">

                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<<<<<<< HEAD
=======



>>>>>>> 9a32a3181afda9255fde32912cad9a62e537fce9
    <script>
        function startdecrypting() {
            message = document.getElementById('message').innerHTML;
            passphrase = document.getElementById('passphrase').value;

            decryptresult = decryptMessage(message, passphrase);
            console.log(decryptresult);
            document.getElementById('message').value = decryptresult.plaintext;
        }
    </script>

<<<<<<< HEAD
    <script language="JavaScript" type="text/javascript" src="{{ asset('/js/cryptico/jsbn.js') }}"></script>
    <script language="JavaScript" type="text/javascript" src="{{ asset('/js/cryptico/random.js') }}"></script>
    <script language="JavaScript" type="text/javascript" src="{{ asset('/js/cryptico/hash.js') }}"></script>
    <script language="JavaScript" type="text/javascript" src="{{ asset('/js/cryptico/rsa.js') }}"></script>
    <script language="JavaScript" type="text/javascript" src="{{ asset('/js/cryptico/aes.js') }}"></script>
    <script language="JavaScript" type="text/javascript" src="{{ asset('/js/cryptico/api.js') }}"></script>

    <script language="JavaScript" type="text/javascript" src="{{ asset('/js/cryptico.js') }}"></script>

=======

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
>>>>>>> 9a32a3181afda9255fde32912cad9a62e537fce9
@endsection


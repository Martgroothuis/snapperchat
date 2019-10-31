@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register your PubKey') }}</div>

                    <div class="card-body">
                        <form id="register" method="POST" action="{{ route('register') }}">
                            @csrf
                            <p>Here you can register your PubKey or recover your account whith your passphase</p>

                            <div class="form-group row">
                                <label for="name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Nickname') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text"
                                           class="form-control"
                                           name="username" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="passphrase"
                                       class="col-md-4 col-form-label text-md-right">{{ __('PassPhrase') }}</label>

                                <div class="col-md-6">
                                    <input id="passphrase" type="password" class="form-control" name="passphrase"
                                           required>
                                </div>
                            </div>

                            <div class="form-group row d-none">
                                <label for="pubkey"
                                       class="col-md-4 col-form-label text-md-right">{{ __('pubkey') }}</label>

                                <div class="col-md-6">
                                    <input id="pubkey" type="text" class="form-control" name="pubkey">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="col-12 btn btn-outline-dark btn-lg outline">
                                        {{ __('Register') }}
                                    </button>
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
    <script language="JavaScript" type="text/javascript"
            src="{{ asset('https://mart-groothuis.newdeveloper.nl/js/app.js') }}"></script>

    <script>
        window.onload = function () {
            document.getElementById('username').value = "";
            document.getElementById('passphrase').value = "";
            document.getElementById('pubkey').value = "";

        };

        $('#register').submit(function () {

            var passPhrase = document.getElementById('passphrase').value;
            if (passPhrase) {
                var pubkey = generatePubKey(passPhrase);
                document.getElementById('pubkey').value = pubkey;

            } else {
                console.log(passPhrase);
            }


            return true; // return false to cancel form action
        });
    </script>
@endsection

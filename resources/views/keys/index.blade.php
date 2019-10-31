@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Generate your keys</div>

                    <div class="card-body">
                        <div class="row">
                            <label for="passphrase"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Instruction') }}</label>

                            <div class="col-md-8">
                                <p>Click generate keys to make a long random PassPhrase for you.<br>

                                    Or fill in your own PassPhrase, make shure its long enough.</p>

                            </div>
                        </div>
                        <form>
                            @csrf

                            <div class="form-group row">
                                <label for="passphrase"
                                       class="col-md-4 col-form-label text-md-right">{{ __('PassPhrase') }}</label>

                                <div class="col-md-8">
                                    <input id="passphrase" type="password"
                                           class="form-control"
                                           name="passphrase">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="pubkey"
                                       class="col-md-4 col-form-label text-md-right">{{ __('PubKey') }}</label>

                                <div class="col-md-8">
                                    <input id="pubkey" type="text"
                                           class="form-control"
                                           name="pubkey">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="generate"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Generate keys') }}</label>

                                <div class="col-md-8">
                                    <input type="button" value="{{ __('Generate keys') }}" name="generate"
                                           id="generatekeys"
                                           class="col-12 btn btn-outline-success btn-lg outline">

                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <label for="generate"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Download keys') }}</label>

                                <div class="col-md-8">
                                    <input type="button" value="{{ __('Download keys') }}"
                                           onclick="download(downloadkeys, 'keys.txt')"
                                           class="col-12 btn btn-outline-dark btn-lg outline"
                                           id="button">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="alert alert-danger">
                    <strong>Never</strong> share your PassPhrase!
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
    <script>
        document.getElementById("generatekeys").onclick = function () {
            downloadkeys = generatekeys();
        };
    </script>

<<<<<<< HEAD
    <script language="JavaScript" type="text/javascript" src="{{ asset('/js/cryptico.js') }}"></script>


    <script>

        document.getElementById("generatekeys").onclick = function () {
            downloadkeys = generatekeys();
        };

        function generatekeys() {
            if (document.getElementById('passphrase').value) {
                passphrase = document.getElementById('passphrase').value;
            } else {
                passphrase = generatePassphrase(1024);
            }
            document.getElementById('passphrase').value = passphrase;

            pubkey = generatePubKey(passphrase);
            document.getElementById('pubkey').value = pubkey;

            var downloadkeys = "pubkey: " + pubkey + "\r\npassphrase: " + passphrase + "\r\n\r\nnever share your passphrase!";


            return downloadkeys;
        }


        function generatePassphrase(length) {
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for (var i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            return result;
        }

=======
    <script language="JavaScript" type="text/javascript"
            src="{{ asset('https://mart-groothuis.newdeveloper.nl/js/app.js') }}"></script>
>>>>>>> 9a32a3181afda9255fde32912cad9a62e537fce9

    <script language="JavaScript" type="text/javascript"
            src="{{ asset('https://mart-groothuis.newdeveloper.nl/js/cryptico.js') }}"></script>


@endsection
@if( Auth::check() )
    @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <h2>Settings for
                            {{ Auth::user()->username }}
                        </h2>
                    </div>
                    <strong></strong>
                    <div class="card-body">

                        <h4>SnapperChat</h4>
                        <h5>Your PubKey</h5>

                        {{ Auth::user()->pubkey }}


                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
@endif

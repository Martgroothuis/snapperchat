@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <h2>Welcome</h2>
                    </div>
                    <strong></strong>
                    <div class="card-body">

                        @if (Auth::user() && Auth::user()->admin == 1)
                            <h4>SnapperChat</h4>
                        @endif
                        <h4>New in SnapperChat 1.3:</h4>
                        <ul>
                            <li>Friends and friends request</li>
                            <li>Update UI</li>
                            <li>Documentation</li>
                            <li>Search for other users</li>
                        </ul>
                        <h4>New in SnapperChat 1.2:</h4>
                        <ul>
                            <li>Encypted messages</li>
                            <li>Update UI</li>
                            <li>Keygenerator</li>
                        </ul>
                        <h4>New in SnapperChat 1.1:</h4>
                        <ul>
                            <li>New UI</li>
                            <li>send messages to other users</li>
                            <li>Login and register</li>
                        </ul>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

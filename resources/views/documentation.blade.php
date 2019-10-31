@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <h2>Documentation</h2>
                    </div>
                    <strong></strong>
                    <div class="card-body">

                        <h4>Setup and send a message</h4>
                        <p><strong>Step 1:</strong> Make a keypair, under keys in the menu.</p>
                        <p><strong>Step 2:</strong> Get someone elses PublicKey.</p>
                        <p><strong>Step 3:</strong> Enter that PubKey under messages/send massage and the message.</p>
                        <p><strong>Step 4:</strong> Press enter to submit the message.</p>
                        <p><strong>note:</strong> You can't edit messages after they have been send. only the person with the private key can decode the message.</p>

                        <h4>Register your PubKey</h4>
                        <p><strong>Step 1:</strong> Make a keypair, under keys in the menu.</p>
                        <p><strong>Step 2:</strong> Go to Account/Register.</p>
                        <p><strong>Step 3:</strong> Enter your PassPhase that you got from the keygen.</p>
                        <p><strong>Step 4:</strong> Enter your nickname and password for your account.</p>
                        <p><strong>note:</strong> Your PubKey will be visible for other unless you disable that in the settings.</p>

                        <h4>Recover your PubKey account</h4>
                        <p><strong>note:</strong> If you forgot your nickname or password (not to be confused whith PassPhase) then you can recover your account if you still have you PassPhase.</p>
                        <p><strong>Step 1:</strong> Go to Account/Register.</p>
                        <p><strong>Step 2:</strong> Enter your PassPhase that you got from the keygen.</p>
                        <p><strong>Step 3:</strong> Enter a new nickname and password for your account.</p>

                        <h4>Add friends</h4>
                        <p><strong>Step 1:</strong> Go to login</p>
                        <p><strong>Step 2:</strong> Login with your nickname and password</p>
                        <p><strong>Step 3:</strong> In the search menu click on the account you want to add and send a friend request</p>
                        <p><strong>note:</strong> After the request you will have to wait for the request to be accepted</p>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

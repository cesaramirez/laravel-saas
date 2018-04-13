@extends('account.layouts.default')

@section('account.content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cancel Subscription</div>

                <div class="card-body">
                    <form action="{{ route('account.subscription.cancel.store') }}" method="POST">
                        @csrf
                        <p>Confirm your subscription cancelled.</p>
                        <button class="btn btn-primary" type="submit">Cancel</button>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection

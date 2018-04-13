@extends('account.layouts.default')

@section('account.content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Resume Subscription</div>

                    <div class="card-body">
                        <form action="{{ route('account.subscription.resume.store') }}" method="POST">
                            @csrf
                            <p>Confirm to resume your subscription .</p>
                            <button class="btn btn-primary" type="submit">Resume</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
@endsection

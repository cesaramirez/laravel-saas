@extends('layouts.app') 

@section('content')
<div class="row flex justify-content-center">
    <div class="col-md-6">
        <ul class="list-group">
            @foreach($plans as $plan)
            <li class="list-group-item">
                <a href="">{{ $plan->name }} (${{ $plan->price }})</a>
            </li>
            @endforeach
            <li class="list-group-item">
                <a href="{{ route('plans.index') }}">User Plans</a>
            </li>
        </ul>
    </div>

</div>
@endsection
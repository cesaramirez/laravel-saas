@extends('account.layouts.default')

@section('account.content')
<div class="card">
        <div class="card-body">
            <form action="{{ route('account.subscription.team.update') }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="form-group{{ $errors->has('name') ? ' is-invalid' : '' }}">
                    <label for="name" class="control-label">Team name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $team->name) }}">

                    @if ($errors->has('name'))
                        <span class="is-invalid">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection

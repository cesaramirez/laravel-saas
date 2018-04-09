@extends('layouts.app')

@section('content')
    <div class="row flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Subscription
                </div>
                <div class="card-body">
                    <form
                        action="{{ route('subscription.store') }}"
                        method="POST"
                        class="form-horizontal container"
                        id="payment-form">
                        {{ csrf_field() }}

                        <div class="form-group row{{ $errors->has('plan') ? ' has-error' : '' }}">
                            <label for="plan" class="col-md-3 control-label">Plan</label>

                            <div class="col-md-9">
                                <select name="plan" id="plan" class="form-control custom-select">
                                    @foreach ($plans as $item)
                                        <option
                                            value="{{ $item->gateway_id }}"
                                            {{ $plan === $item->slug || old('plan') === $item->gateway_id ? 'selected' : '' }}>
                                            {{ $item->name }} (£{{ $item->price }})
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('plan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('plan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row{{ $errors->has('coupon') ? ' has-error' : '' }}">
                            <label for="coupon" class="col-md-3 control-label">Coupon code</label>

                            <div class="col-md-9">
                                <input type="text" name="coupon" id="coupon" class="form-control" value="{{ old('coupon') }}">

                                @if ($errors->has('coupon'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('coupon') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary" id="pay">Pay</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://checkout.stripe.com/checkout.js"></script>
    <script>
        let handler = StripeCheckout.configure({
            key: '{{ config('services.stripe.key') }}',
            locale: 'auto',
            token: function (token) {
                let form = $('#payment-form')

                $('#pay').prop('disabled', true)

                $('<input>').attr({
                    type: 'hidden',
                    name: 'token',
                    value: token.id
                }).appendTo(form)

                form.submit();
            }
        })

        $('#pay').click(function (e) {
            handler.open({
                name: 'Codecourse Ltd.',
                description: 'Membership',
                currency: 'gbp',
                key: '{{ config('services.stripe.key') }}',
                email: '{{ auth()->user()->email }}'
            })

            e.preventDefault();
        })
    </script>
@endsection

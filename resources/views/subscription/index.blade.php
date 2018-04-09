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

                        <div class="form-group row">
                            <label for="plan" class="col-md-3 control-label">Plan</label>

                            <div class="col-md-9">
                                <select
                                    name="plan"
                                    id="plan"
                                    class="form-control custom-select{{ $errors->has('coupon') ? ' is-invalid' : '' }}">
                                    @foreach ($plans as $item)
                                        <option
                                            value="{{ $item->gateway_id }}"
                                            {{ $plan === $item->slug || old('plan') === $item->gateway_id ? 'selected' : '' }}>
                                            {{ $item->name }} (£{{ $item->price }})
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('plan'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('plan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="coupon" class="col-md-3 control-label">Coupon code</label>

                            <div class="col-md-9">
                                <input
                                    type="text"
                                    name="coupon"
                                    id="coupon"
                                    class="form-control{{ $errors->has('coupon') ? ' is-invalid' : '' }}"
                                    value="{{ old('coupon') }}">

                                @if ($errors->has('coupon'))
                                    <span class="invalid-feedback">
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
        var handler = StripeCheckout.configure({
        key: '{{ config('services.stripe.key') }}',
        image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
        locale: 'auto',
        token: function(token) {
            let form = document.getElementById('payment-form')
            document.getElementById('pay').disabled = true
            console.log(token.id)
            let input = document.createElement('input')
            input.setAttribute('type', 'hidden')
            input.setAttribute('name', 'token')
            input.setAttribute('value', token.id)

            form.appendChild(input)

            form.submit()
        }
    });

        document.getElementById('pay').addEventListener('click', function(e) {
            handler.open({
                name: 'Codecourse Ltd.',
                description: 'Membership',
                currency: 'gbp',
                key: '{{ config('services.stripe.key') }}',
                email: '{{ auth()->user()->email }}'
            });
            e.preventDefault();
        });
    </script>
@endsection

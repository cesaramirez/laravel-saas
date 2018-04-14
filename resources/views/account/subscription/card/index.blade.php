@extends('account.layouts.default')

@section('account.content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Update payment</div>

                <div class="card-body">
                    <form action="{{ route('account.subscription.card.store') }}" method="POST" id="card-form">
                        @csrf
                        <p>Your new card will be used for future payments.</p>
                        <button class="btn btn-primary" id="update">Update card</button>
                    </form>
                </div>
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
            let form = document.getElementById('card-form')
            document.getElementById('update').disabled = true
            console.log(token.id)
            let input = document.createElement('input')
            input.setAttribute('type', 'hidden')
            input.setAttribute('name', 'token')
            input.setAttribute('value', token.id)

            form.appendChild(input)

            form.submit()
        }
    });

        document.getElementById('update').addEventListener('click', function(e) {
            handler.open({
                name: 'Acme Inc.',
                currency: 'usd',
                key: '{{ config('services.stripe.key') }}',
                email: '{{ auth()->user()->email }}',
                panelLabel: 'Update card'
            });
            e.preventDefault();
        });
    </script>
@endsection

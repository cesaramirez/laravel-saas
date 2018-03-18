@if(session()->has('success'))
    @component('layouts.partials.alerts._alerts_component', ['type' => 'success'])
        {{ session('success') }}
    @endcomponent
@endif

@if(session()->has('error'))
    @component('layouts.partials.alerts._alerts_component', ['type' => 'error'])
        {{ session('error') }}
    @endcomponent
@endif
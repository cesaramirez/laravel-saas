@if(session()->has('success'))
    @component('layouts.partials.alerts._alerts_component', ['type' => 'success'])
        {{ session('success') }}
    @endcomponent
@endif

@if(session()->has('danger'))
    @component('layouts.partials.alerts._alerts_component', ['type' => 'danger'])
        {{ session('danger') }}
    @endcomponent
@endif
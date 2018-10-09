@if (($msg = session()->get('message')) || ($msg = session()->get('status')) || ($msg = session()->get('info')))
    <alert-component type="Info" clsbtn="true">{{ $msg }}</alert-component>
@endif

@if ($msg = session()->get('success'))
    <alert-component type="Success" clsbtn="true">{{ $msg }}</alert-component>
@endif

@if ($msg = session()->get('warning'))
    <alert-component type="Warning" clsbtn="true">{{ $msg }}</alert-component>
@endif

@if ($msg = session()->get('error'))
    <alert-component type="Error" clsbtn="true">{{ $msg }}</alert-component>
@endif

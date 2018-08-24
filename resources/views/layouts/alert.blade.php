<div class="row">
    <div class="col-lg-12">
        {{-- <div class="alert alert-icon alert-primary">Sample Alert</div> --}}
        @if($message = session()->get('status'))
            <div class="alert alert-icon alert-primary">{{ $message }}</div>
        @endif
        @if($message = session()->get('info'))
            <div class="alert alert-icon alert-primary">{{ $message }}</div>
        @endif
        @if($message = session()->get('success'))
            <div class="alert alert-icon alert-success">{{ $message }}</div>
        @endif
        @if($message = session()->get('warning'))
            <div class="alert alert-icon alert-warning">{{ $message }}</div>
        @endif
        @if($message = session()->get('danger'))
            <div class="alert alert-icon alert-danger">{{ $message }}</div>
        @endif
    </div>
</div>

@if (Session::has('success'))
    <div class="alert alert-success">
        <strong>Thông báo:</strong> {{ Session::get('success') }}
    </div>
@endif

{{-- <div class="alert alert-warning">
    <strong>Warning!</strong> Better check yourself, you're not looking too good.
</div> --}}

@if (Session::has('error'))
    <div class="alert alert-danger">
        <strong>Thông báo:</strong> {{ Session::get('error') }}
    </div>
@endif

@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible alert-component">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong class="text-center">{{ session('success') }}</strong>
    </div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible alert-component">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong class="text-center">{{ session('error') }}</strong>
    </div>
@endif


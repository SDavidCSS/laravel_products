@if($successMessage = session()->get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $successMessage }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

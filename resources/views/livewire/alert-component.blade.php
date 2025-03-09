@if ($message)
    <div class="alert alert-{{ $type }} alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <script>
        setTimeout(() => {
            @this.set('message', ''); // Clear the alert after 3 seconds
        }, 3000);
    </script>
@endif

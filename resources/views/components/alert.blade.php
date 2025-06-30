<script>
    // Auto dismiss alert setelah 3 detik
    setTimeout(function() {
        const alert = document.getElementById('flash-alert');
        if (alert) {
            // Tambah animasi fade-out
            alert.classList.remove('show');
            alert.classList.add('fade');
            setTimeout(() => alert.remove(), 500); // Hapus elemen setelah fade out
        }
    }, 3000); // 3000ms = 3 detik
</script>
@if (session('status'))
    <div id="flash-alert" class="alert alert-success alert-dismissible fade show text-center font-bold" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div id="flash-alert" class="alert alert-danger alert-dismissible fade show text-center font-bold" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

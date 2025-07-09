<!-- Di halaman pengguna -->
<button class="btn btn-success text-white" onclick="exportData('xlsx')" data-export-url="/pengguna/export">
    Export ke Excel
</button>
<script>
    function exportData(type) {
        const button = event.currentTarget;
        const baseUrl = button.getAttribute('data-export-url');
        window.location.href = `${baseUrl}?type=${type}`;
    }
</script>

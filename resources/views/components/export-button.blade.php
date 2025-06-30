<button class="btn btn-secondary" id="excel" onclick="exportData('xlsx')" tabindex="10">
    Export ke Excel
</button>

<script>
    function exportData(type) {
        window.location.href = "/perabotan/export?type=" + type;
    }
</script>

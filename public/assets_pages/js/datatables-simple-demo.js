window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesSimple');
    const tabel_akses = document.getElementById('tabel_akses');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
    if (tabel_akses) {
        new simpleDatatables.DataTable(tabel_akses);
    }
});

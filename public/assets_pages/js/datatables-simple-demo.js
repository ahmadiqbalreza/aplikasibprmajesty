window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesSimple');
    const tabel_ = document.getElementsByClassName('tabell')[0];
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
    if (tabel_) {
        new simpleDatatables.DataTable(tabel_);
    }
});

document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('searchInput');
    const filterKategori = document.getElementById('filterKategori');
    const resultCount = document.getElementById('resultCount');
    const tbody = document.querySelector('tbody');
    const rows = Array.from(tbody.querySelectorAll('tr'));

    function filterTable() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        const kategori = filterKategori.value.toLowerCase();
        let visibleCount = 0;

        rows.forEach(row => {
            const namaBarang = row.querySelector('td[data-label="Nama Barang"]');
            const nama = namaBarang ? namaBarang.textContent.toLowerCase() : '';
            const rowKategori = (row.dataset.kategori || '').trim().toLowerCase();

            const matchSearch = !searchTerm || nama.includes(searchTerm);
            const matchKategori = !kategori || rowKategori.includes(kategori) || kategori.includes(rowKategori);

            if (matchSearch && matchKategori) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        if (searchTerm || kategori) {
            resultCount.textContent = `${visibleCount} dari ${rows.length} barang`;
        } else {
            resultCount.textContent = `${rows.length} barang`;
        }

        let noResults = document.querySelector('.no-results');
        if (visibleCount === 0) {
            if (!noResults) {
                noResults = document.createElement('div');
                noResults.className = 'no-results';
                noResults.textContent = 'Tidak ada barang yang ditemukan';
                tbody.closest('.table-wrapper').after(noResults);
            }
            noResults.style.display = '';
        } else if (noResults) {
            noResults.style.display = 'none';
        }
    }

    let debounceTimer;
    searchInput.addEventListener('input', () => {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(filterTable, 200);
    });

    filterKategori.addEventListener('change', filterTable);

    filterTable();
});

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data dan Harga Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1 class="page-title">Data dan Harga Barang</h1>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Keterangan</th>
                        <th>Kategori</th>
                        <th>Harga Laporan</th>
                        <th>Harga Toko (Nota)</th>
                        <th>Satuan</th>
                        <th>Suplier</th>
                        <th>No Kontak</th>
                        <th>Tanggal Terupdate</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- contoh data -->
                    <tr>
                        <td data-label="Nama Barang">Contoh Barang A</td>
                        <td data-label="Keterangan">Barang bagus</td>
                        <td data-label="Kategori">Elektronik</td>
                        <td data-label="Harga Laporan">Rp 50.000</td>
                        <td data-label="Harga Toko (Nota)">Rp 55.000</td>
                        <td data-label="Satuan">Pcs</td>
                        <td data-label="Suplier">Toko Jaya</td>
                        <td data-label="No Kontak">08123456789</td>
                        <td data-label="Tanggal Terupdate">2026-05-29</td>
                    </tr>
                    <tr>
                        <td data-label="Nama Barang">Contoh Barang B</td>
                        <td data-label="Keterangan">Stok terbatas</td>
                        <td data-label="Kategori">Alat Tulis</td>
                        <td data-label="Harga Laporan">Rp 10.000</td>
                        <td data-label="Harga Toko (Nota)">Rp 12.000</td>
                        <td data-label="Satuan">Lusin</td>
                        <td data-label="Suplier">Maju Mundur</td>
                        <td data-label="No Kontak">08987654321</td>
                        <td data-label="Tanggal Terupdate">2026-05-28</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<script src="script.js"></script>
</body>
</html>
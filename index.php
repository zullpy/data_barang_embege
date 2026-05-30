<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
$url = "https://docs.google.com/spreadsheets/d/e/2PACX-1vQb2esQ8DgKt1jcWJyuJOWsS85NxikOQQfV3HBAbKL9kQUhUU3npzo5_AE_QwUwvdwTGA71YxbiDQnF/pub?gid=598469512&single=true&output=csv";

$data = array_map(
    fn($line) => str_getcsv($line, ',', '"', '\\'),
    file($url)
);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data dan Harga Barang</title>
    <link rel="stylesheet" href="style.css">
    <link
        rel="stylesheet"
        type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css"
    />
    <link
        rel="stylesheet"
        type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css"
    />
</head>
<body>
    <div class="container">
        <h1 class="page-title">Daftar Harga Barang</h1>

        <div class="toolbar">
            <div class="search-box">
            <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path></svg>
            <input type="text" id="searchInput" placeholder="Cari nama barang..." autocomplete="off">
            </div>
            <div class="filter-box">
                <select id="filterKategori">
                    <option value="">Semua Kategori</option>
                    <option value="bahan baku">Bahan Baku</option>
                    <option value="bahan pangan olahan">Bahan Pangan Olahan</option>
                    <option value="buah-buahan">Buah-buahan</option>
                    <option value="bumbu">Bumbu</option>
                    <option value="lauk pauk">Lauk Pauk</option>
                    <option value="sayur">Sayuran</option>
                </select>
            </div>
            <span class="result-count" id="resultCount"></span>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Keterangan</th>
                        <th>Kategori</th>
                        <th>Harga Laporan</th>
                        <th>Satuan</th>
                        <th>Suplier</th>
                        <th>No Kontak</th>
                        <th>Stok Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach(array_slice($data, 3) as $row){
                            $kategori = !empty($row[3]) ? htmlspecialchars(trim($row[3])) : '-';
                            ?>
                                <tr data-kategori="<?= strtolower($kategori) ?>">
                                    <td data-label="Nama Barang" class="col-1"><?= !empty($row[1]) ? htmlspecialchars($row[1]) : '-' ?></td>
                                    <td data-label="Keterangan"><?= !empty($row[2]) ? htmlspecialchars($row[2]) : '-' ?></td>
                                    <td data-label="Kategori"><?= $kategori ?></td>
                                    <td data-label="Harga Laporan">
                                    <?= !empty($row[5])
                                        ? 'Rp ' . number_format((float) preg_replace('/[^0-9]/', '', $row[5]), 0, ',', '.')
                                        : '-' ?>
                                    </td>
                                    <td data-label="Satuan"><?= !empty($row[18]) ? htmlspecialchars($row[18]) : '-' ?></td>
                                    <td data-label="Supplier"><?= !empty($row[19]) ? htmlspecialchars($row[19]) : '-' ?></td>
                                    <td data-label="No Kontak">
                                    <?= !empty($row[20])
                                        ? nl2br(htmlspecialchars(str_replace('/', "\n", $row[20])))
                                        : '-' ?>
                                    </td>
                                    <td data-label="Stok Akhir"><?= !empty($row[24]) ? htmlspecialchars($row[24]) : '-' ?></td>
                                </tr>
                    <?php
                        }
                            ?>
                </tbody>
            </table>
        </div>
    </div>
<script src="script.js"></script>
</body>
</html>
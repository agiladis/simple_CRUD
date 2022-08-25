<html lang="en">


<?php
include 'inc/cek_session.php';
include 'inc/koneksi.php';
?>

<?php
if (isset($_GET['kategori'])) {
    $kategori = $_GET['kategori'];
    $query_cat = mysqli_query($koneksi, "SELECT * FROM inventaris WHERE kategori = '" . $kategori . "'");
    $row_query = mysqli_fetch_assoc($query_cat);
    $jumlah = mysqli_num_rows($query_cat);
}
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data - Inventaris</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <?php include 'inc/nav.php'; ?>
    </header>

    <main>
        <div id="content" class="container m-auto pt-4 pb-5">
            <a href="addEditData.php" class="btn btn-bronze mb-3">Tambah <i class="fa fa-plus"></i></a>
            <?php if ($jumlah == 0) : ?>
                <table class="table">
                    <thead class="btn-bronze">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Tanggal Datang</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Status</th>
                            <th scope="col">Harga Satuan</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="11" class="text-center">Sorry, Data empty</td>
                        </tr>
                    </tbody>
                </table>
            <?php else : ?>
                <table class="table">
                    <thead class="btn-bronze">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Tanggal Datang</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Status</th>
                            <th scope="col">Harga Satuan</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $total = 0;
                        do { ?>
                            <tr>
                                <th scope="row"><?php $no++; ?></th>
                                <td><?php echo $row_query['kode_barang']; ?></td>
                                <td><?php echo $row_query['nama_barang']; ?></td>
                                <td><?php echo $row_query['jumlah']; ?></td>
                                <td><?php echo $row_query['satuan']; ?></td>
                                <td><?php echo $row_query['tanggal_datang']; ?></td>
                                <td><?php echo $row_query['kategori']; ?></td>
                                <td><?php echo $row_query['status_barang']; ?></td>
                                <td><?php echo "Rp. " . number_format($row_query['harga']); ?></td>
                                <td>
                                    <?php
                                    echo "Rp. " . number_format($row_query['jumlah'] * $row_query['harga']);
                                    ?>
                                </td>
                                <td>
                                    <a href="addEditData.php?edit=<?php echo $row_query['kode_barang']; ?>" class="btn btn-warning" title="Ubah data"><i class="fa fa-edit"></i></a>
                                    <a href="addEditData.php?delete=<?php echo $row_query['kode_barang'] ?>" onclick="return confirm('Yakin ingin menghapus data ini ?')" class="btn btn-danger" title="Hapus Data"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php $total = $total + ($row_query['jumlah'] * $row_query['harga']);  ?>
                        <?php } while ($row_query = mysqli_fetch_assoc($query_cat)); ?>
                    </tbody>
                </table>
                <p class="font-weight-bold">Total Inventaris : <?php echo "Rp. " . number_format($total) ?></p>
            <?php endif ?>

        </div> <!-- end content -->
    </main>

    <footer id="footer-top" class="d-flex justify-content-between">
        <span class="m-0">&copy; Inventaris 2022</span>
        <div class="social-media">
            <a href="" class="mr-2"><i class="fa fa-instagram"></i></a>
            <a href=""><i class="fa fa-twitter"></i></a>
        </div> <!-- end social-media -->
    </footer>
    <script src="js/jquery-3.5.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
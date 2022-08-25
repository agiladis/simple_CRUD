<html lang="en">

<?php
include 'inc/cek_session.php';
include 'inc/koneksi.php';
?>
<?php
if (isset($_POST['submit'])) {
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $satuan = $_POST['satuan'];
    $tanggal_datang = $_POST['tanggal_datang'];
    $kategori = $_POST['kategori'];
    $status_barang = $_POST['status_barang'];
    $harga = $_POST['harga'];

    $query = mysqli_query($koneksi, "INSERT INTO inventaris(kode_barang, nama_barang, jumlah, satuan, tanggal_datang, kategori, status_barang, harga) VALUES('$kode_barang','$nama_barang','$jumlah','$satuan','$tanggal_datang', '$kategori', '$status_barang', '$harga')");

    if ($query) {
        header("Location: data.php?submit=berhasil");
    } else {
        header("Location: addEditData.php?submit=gagal");
    }
}

// EDIT DATA 
if (isset($_GET['edit'])) {
    // Ambil id dari url
    $kode = $_GET['edit'];

    // Ambil data dari db sesuai id
    $query_edit = mysqli_query($koneksi, "SELECT * FROM inventaris WHERE kode_barang = '" . $kode . "' ");
    $row_edit = mysqli_fetch_assoc($query_edit);
}
// Update hasil edit
if (isset($_POST['update'])) {
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $satuan = $_POST['satuan'];
    $tanggal_datang = $_POST['tanggal_datang'];
    $kategori = $_POST['kategori'];
    $status_barang = $_POST['status_barang'];
    $harga = $_POST['harga'];

    // Masukkan dalam tabel buku
    $query_update = mysqli_query($koneksi, "UPDATE inventaris SET kode_barang = '$kode_barang', nama_barang = '$nama_barang', jumlah = '$jumlah', satuan = '$satuan', tanggal_datang = '$tanggal_datang', kategori = '$kategori', status_barang = '$status_barang', harga = '$harga' WHERE kode_barang = '" . $kode . "'");
    //jika berhasil
    if ($query_update) {
        header("Location: data.php?edited=success");
    } else {
        header("Location: addEditData.php?edited=fail");
    }
}

// DELETE
if (isset($_GET['delete'])) {
    // Ambil id
    $kode = $_GET['delete'];

    // Drop row data dari db
    $query_delete = mysqli_query($koneksi, "DELETE FROM inventaris WHERE kode_barang = '" . $kode . "'");

    //jika berhasil
    if ($query_delete) {
        header("Location: data.php?delete=success");
    }
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
            <?php if (isset($_GET['edit'])) : ?>
                <form action="" method="POST">
                    <section>
                        <h5 align="center">Edit Data Inventaris</h5>
                        <hr>
                    </section>
                    <table class="addEdit w-50 m-auto">
                        <i class="text-center"><small>isi lah data ini dengan benar !</small></i>
                        <tr>
                            <td>Kode Barang</td>
                            <td>:</td>
                            <td><input type="text" name="kode_barang" class="form-control w-458 control" value="<?php echo $row_edit['kode_barang'] ?>" placeholder="Kode Barang" required=""></td>
                        </tr>
                        <tr>
                            <td>Nama Barang</td>
                            <td>:</td>
                            <td><input type="text" name="nama_barang" class="form-control w-458 control" value="<?php echo $row_edit['nama_barang'] ?>" placeholder="nama barang"></td>
                        </tr>
                        <tr>
                            <td>Jumlah</td>
                            <td>:</td>
                            <td><input type="text" name="jumlah" class="form-control w-458 control" value="<?php echo $row_edit['jumlah'] ?>" placeholder="Jumlah"></td>
                        </tr>
                        <tr>
                            <td>Satuan</td>
                            <td>:</td>
                            <td><input type="text" name="satuan" class="form-control w-458 control" value="<?php echo $row_edit['satuan'] ?>" placeholder="Satuan"></td>
                        </tr>
                        <tr>
                            <td>Tanggal Datang</td>
                            <td>:</td>
                            <td><input type="date" name="tanggal_datang" class="form-control w-458 control" value="<?php echo $row_edit['tanggal_datang'] ?>" placeholder="Tanggal datang"></td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td>:</td>
                            <td>
                                <div class="form-group">
                                    <select class="form-control" id="exampleFormControlSelect1" name="kategori">
                                        <option value="bangunan">Bangunan</option>
                                        <option value="kendaraan">Kendaraan</option>
                                        <option value="alat tulis kantor">Alat tulis kantor</option>
                                        <option value="elektronik">Elektronik</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td>
                                <input type="radio" name="status_barang" value="baik" required="" class=""> Baik
                                <input type="radio" name="status_barang" value="perawatan" required="" class="ml-3"> Perawatan
                                <input type="radio" name="status_barang" value="rusak" required="" class="ml-3"> Rusak
                            </td>
                        </tr>
                        <tr>
                            <td>Harga Satuan</td>
                            <td>:</td>
                            <td><input type="text" name="harga" class="form-control w-458 control" value="<?php echo $row_edit['harga'] ?>" placeholder="Harga Satuan"></td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="">
                                <div class="form-group row">
                                    <button name="update" type="submit" class="btn btn-success mr-3">Submit</button>
                                    <button class="btn btn-warning" type="reset">Reset</button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            <?php else : ?>
                <form action="" method="POST">
                    <section>
                        <h5 align="center">Tambah Data Inventaris</h5>
                        <hr>
                    </section>
                    <table class="addEdit w-50 m-auto">
                        <i class="text-center"><small>isi lah data ini dengan benar !</small></i>
                        <tr>
                            <td>Kode Barang</td>
                            <td>:</td>
                            <td><input type="text" name="kode_barang" class="form-control w-458 control" placeholder="Kode Barang" required=""></td>
                        </tr>
                        <tr>
                            <td>Nama Barang</td>
                            <td>:</td>
                            <td><input type="text" name="nama_barang" class="form-control w-458 control" placeholder="nama barang"></td>
                        </tr>
                        <tr>
                            <td>Jumlah</td>
                            <td>:</td>
                            <td><input type="text" name="jumlah" class="form-control w-458 control" placeholder="Jumlah"></td>
                        </tr>
                        <tr>
                            <td>Satuan</td>
                            <td>:</td>
                            <td><input type="text" name="satuan" class="form-control w-458 control" placeholder="Satuan"></td>
                        </tr>
                        <tr>
                            <td>Tanggal Datang</td>
                            <td>:</td>
                            <td><input type="date" name="tanggal_datang" class="form-control w-458 control" placeholder="Tanggal datang"></td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td>:</td>
                            <td>
                                <div class="form-group">
                                    <select class="form-control" id="exampleFormControlSelect1" name="kategori">
                                        <option value="bangunan">Bangunan</option>
                                        <option value="kendaraan">Kendaraan</option>
                                        <option value="alat tulis kantor">Alat tulis kantor</option>
                                        <option value="elektronik">Elektronik</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td>
                                <input type="radio" name="status_barang" value="baik" required="" class=""> Baik
                                <input type="radio" name="status_barang" value="perawatan" required="" class="ml-3"> Perawatan
                                <input type="radio" name="status_barang" value="rusak" required="" class="ml-3"> Rusak
                            </td>
                        </tr>
                        <tr>
                            <td>Harga Satuan</td>
                            <td>:</td>
                            <td><input type="text" name="harga" class="form-control w-458 control" placeholder="Harga Satuan"></td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="">
                                <div class="form-group row">
                                    <button name="submit" type="submit" class="btn btn-success mr-3">Submit</button>
                                    <button class="btn btn-warning" type="reset">Reset</button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
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
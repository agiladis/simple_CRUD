<nav>
    <div id="nav-top" class="p-2">
        <h3>DAFTAR INVENTARIS BARANG</h3>
        <h3>KANTOR SERBA ADA</h3>
    </div> <!-- end nav-top -->

    <div id="nav-bottom" class="navbar-bottom">
        <a href="home.php">Beranda</a>
        <a href="data.php">Daftar Inventaris</a>
        <div class="nav-dropdown">
            <button class="dropbtn">List per Kategori
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="dataKategori.php?kategori=bangunan">Bangunan</a>
                <a href="dataKategori.php?kategori=kendaraan">Kendaraan</a>
                <a href="dataKategori.php?kategori=alat tulis kantor">Alat Tulis Kantor</a>
                <a href="dataKategori.php?kategori=elektronik">Elektronik</a>
            </div>
        </div>
        <a href="logout.php" class="btn btn-cyan float-right mr-3">Logout <i class="fa fa-sign-out"></i></a>
    </div> <!-- end nav-bottom -->
</nav>
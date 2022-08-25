<?php
session_start();
//cek apakah session ada
if (!isset($_SESSION['username'])) {
    header("Location: index.php?alert=access_denied");
}

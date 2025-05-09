<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $params['title'] ?></title>
    <link rel="shortcut icon" href="/assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/sweetalert2.all.min.js"></script>
    <script src="/assets/js/owl.carousel.min.js"></script>
</head>

<body>
    <div class="header">
        <div class="header-title">
            <img class="img-responsive mw-100" src="/assets/img/logo.png" alt="DISDUKCAPIL TAPIN">
        </div>
        <div class="header-navbar d-flex justify-content-center">
            <nav class="navbar navbar-expand-lg d-flex justify-content-center">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">Menu</button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="/">
                                Beranda
                            </a>
                        </li>
                        <li class="nav-item dropdown mx-2">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Profil
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/profil/sejarah">Sejarah</a></li>
                                <li><a class="dropdown-item" href="/profil/visi-misi">Visi &amp; Misi</a></li>
                                <li><a class="dropdown-item" href="/profil/struktur-organisasi">Struktur Organisasi</a></li>
                                <li><a class="dropdown-item" href="/profil/profil-pegawai">Profil Pegawai</a></li>
                                <li><a class="dropdown-item" href="/profil/maklumat-pelayanan">Maklumat Pelayanan</a></li>
                                <li><a class="dropdown-item" href="/profil/kompensasi-sidatung">Kompensasi Sidatung</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown mx-2">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Pelayanan
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/pelayanan/kartu-keluarga">Kartu Keluarga</a></li>
                                <li><a class="dropdown-item" href="/pelayanan/ktp-elektronik">KTP Elektronik</a></li>
                                <li><a class="dropdown-item" href="/pelayanan/kartu-identitas-anak">Kartu Identitas Anak</a></li>
                                <li><a class="dropdown-item" href="/pelayanan/surat-pindah-datang">SKPWNI</a></li>
                                <li><a class="dropdown-item" href="/pelayanan/akta-kelahiran">Akta Kelahiran</a></li>
                                <li><a class="dropdown-item" href="/pelayanan/akta-kematian">Akta Kematian</a></li>
                                <li><a class="dropdown-item" href="/pelayanan/akta-perkawinan">Akta Perkawinan</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown mx-2">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Publikasi
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/publikasi/sp-sop">Standar Pelayanan &amp; SOP</a></li>
                                <li><a class="dropdown-item" href="/publikasi/undang-undang-adminduk">Undang-Undang Adminduk</a></li>
                                <li><a class="dropdown-item" href="/publikasi/sarana-prasarana">Sarana &amp; Prasarana</a></li>
                                <li><a class="dropdown-item" href="/publikasi/agregat">Data Agregat</a></li>
                                <li><a class="dropdown-item" href="/publikasi/formulir">Unduh Formulir</a></li>
                                <li><a class="dropdown-item" href="/publikasi/inovasi-kerjasama">Inovasi &amp; Kerjasama</a></li>
                                <li><a class="dropdown-item" href="/publikasi/laporan-pengaduan">Laporan Konsultasi & Pengaduan</a></li>
                                <li><a class="dropdown-item" href="/publikasi/laporan-hasil-skm">Laporan Hasil SKM</a></li>
                                <li><a class="dropdown-item" href="/publikasi/penilaian-pegawai">Penilaian Pegawai</a></li>
                                <li><a class="dropdown-item" href="https://wbs.dukcapil.tapinkab.go.id" target="_blank">Whistle Blowing System</a></li>
                            </ul>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="/publikasi/ppid">
                                PPID
                            </a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="https://survei.dukcapil.tapinkab.go.id" target="_blank">
                                Survei Kepuasan Masyarakat
                            </a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="https://lapor.go.id" target="_blank">
                                SP4N LAPOR
                            </a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="https://sippn.menpan.go.id/sektor-strategis/dasar/administrasi-kependudukan" target="_blank">
                                SIPPN - CARIYANLIK
                            </a>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-link btn-search">
                                <i class="bi bi-search"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="box-search d-flex justify-content-center">
            <div id="box-search" class="dropdown-menu col-md-6 col-sm-12 shadow">
                <input id="box-search-input" type="text" class="form-control" placeholder="Cari disini & tekan enter...">
                <div class="box-search-item my-2"></div>
            </div>
        </div>
    </div>
<div class="container-fluid content">
    <div class="row">
        <div class="col-md-8">
            <div class="d-none d-md-block">
                <div class="p-3 mb-2">
                    <span class="greet">Selamat Datang di Situs Resmi</span>
                    <span class="greet-sub d-block">Dinas Kependudukan dan Pencatatan Sipil Kabupaten Tapin</span>
                </div>
                <div class="motto">
                    "Tiada Hari Tanpa Peningkatan Mutu Pelayanan"
                </div>
            </div>
            <div class="box-short">
                <div class="p-3 mb-2">
                    <span class="fs-5">
                        Menu Layanan
                    </span>
                    <span class="d-block smaller">
                        Informasi dan Menu Pelayanan
                    </span>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="p-4 box-short-item shadow-sm mb-3 h-100">
                            <div>
                                <div class="d-flex justify-content-start">
                                    <div class="me-2">
                                        <img style="width:50px" src="/assets/img/ONLINE.png" alt="">
                                    </div>
                                    <div>
                                        <div>
                                            <a href="/publikasi/layanan-online" class="text-decoration-none fw-bold small">
                                                Layanan Online
                                            </a>
                                        </div>
                                        <div class="smaller text-secondary mt-2">
                                            Pelayanan administrasi kependudukan secara online (chat Whats)
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 box-short-item shadow-sm mb-3 h-100">
                            <div>
                                <div class="d-flex justify-content-start">
                                    <div class="me-2">
                                        <img style="width:50px" src="/assets/img/FORMULIR.png" alt="">
                                    </div>
                                    <div>
                                        <div>
                                            <a href="/publikasi/formulir" class="text-decoration-none fw-bold small">
                                                Unduh Formulir
                                            </a>
                                        </div>
                                        <div class="smaller text-secondary mt-2">
                                            Unduh formulir dan surat pernyataan untuk kelengkapan persyaratan
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 box-short-item shadow-sm mb-3 h-100">
                            <div>
                                <div class="d-flex justify-content-start">
                                    <div class="me-2">
                                        <img style="width:50px" src="/assets/img/IKD.png" alt="">
                                    </div>
                                    <div>
                                        <div>
                                            <a href="/publikasi/identitas-kependudukan-digital" class="text-decoration-none fw-bold small">
                                                Identitas Kependudukan Digital
                                            </a>
                                        </div>
                                        <div class="smaller text-secondary mt-2">
                                            Aplikasi dokumen kependudukan berbentuk digital
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-2 mt-3">
                <div class="p-3 mb-2">
                    <span class="fs-5">
                        Berita & Kegiatan
                    </span>
                    <span class="d-block smaller">
                        Informasi Seputar Disdukcapil Kab. Tapin
                    </span>
                </div>
                <div class="owl-carousel">
                    <?php
                    foreach ($params['data'] as $item) {
                        echo '<a href="' . $item['permalink'] . '" class="text-decoration-none" target="_blank">
                            <div>
                                <div class="image-container">
                                <img src="https://files.dukcapil.tapinkab.go.id/' . $item['cover'] . '" alt="Image description">
                                <div class="overlay">
                                <div class="caption">
                                <span class="d-block smaller">' . isDate($item['created']) . '</span>
                                <span class="d-block">' . $item['title'] . '</span>
                                </div>
                            </div></div></div></a>';
                    }

                    function isDate($dateString)
                    {
                        $date = new DateTime($dateString);
                        $months = [
                            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni',
                            7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
                        ];

                        $dayOfWeek = $date->format('N');
                        $month = (int) $date->format('n');

                        $daysOfWeek = [
                            1 => 'Senin', 2 => 'Selasa', 3 => 'Rabu', 4 => 'Kamis', 5 => 'Jumat', 6 => 'Sabtu', 7 => 'Minggu'
                        ];
                        $formattedDate = $daysOfWeek[$dayOfWeek] . ', ' . $date->format('d') . ' ' . $months[$month] . ' ' . $date->format('Y');
                        return $formattedDate;
                    }
                    ?>
                </div>
            </div>
        </div>
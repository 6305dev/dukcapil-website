<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DISDUKCAPIL TAPIN - PENILAIAN KINERJA PEGAWAI</title>
    <link rel="shortcut icon" href="/assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/sweetalert2.min.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");

        * {
            font-family: "Poppins", sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
        }

        body {
            background-color: aliceblue;
        }

        .container {
            min-height: 100vh;
            border-top: 4px #8735A5 solid;
        }

        #employee-images {
            aspect-ratio: 9 / 16;
            width: 100%;
            overflow: hidden;
            object-fit: cover;
        }

        .btn-primary {
            background-color: #8735A5 !important;
            border: #8735A5 1px solid !important;
        }

        .btn-primary:hover {
            background-color: #C96CEA !important;
        }

        #employee-form-name:disabled {
            background-color: transparent;
        }
    </style>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/sweetalert2.all.min.js"></script>
</head>

<body>
    <?php
    $items = json_decode($params);
    ?>
    <div class="container bg-white">
        <div class="p-3 fs-2">
            PENILAIAN KINERJA PEGAWAI
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="p-3">
                    <div class="mb-3">
                        <img id="employee-images" src="/files/<?= $items->images ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="p-3">
                    <div class="mb-4">
                        <div class="fs-3" id="employee-name"><?= $items->name ?></div>
                        <div class="fs-5" id="employee-job"><?= $items->job ?></div>
                    </div>
                    <div class="mb-5">
                        <div class="mb-3">Berikan Nilai</div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="employee-form-rate" value="5" checked>
                            <label class="form-check-label" for="rate">
                                Sangat Baik
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="employee-form-rate" value="4">
                            <label class="form-check-label" for="rate">
                                Baik
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="employee-form-rate" value="3">
                            <label class="form-check-label" for="rate">
                                Bagus
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="employee-form-rate" value="2">
                            <label class="form-check-label" for="rate">
                                Lumayan
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="employee-form-rate" value="1">
                            <label class="form-check-label" for="rate">
                                Kurang
                            </label>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="mb-3">Catatan Tambahan (Opsional)</div>
                        <textarea id="employee-form-note" class="form-control" spellcheck="false" style="height: 200px;"></textarea>
                    </div>
                    <div class="mb-5">
                        <button id="employee-form-submit" class="btn btn-primary w-100">KIRIM PENILAIAN</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $("#employee-form-submit").click(function() {
            var checkedValues = $('input[name="exampleRadios"]:checked').map(function() {
                return $(this).val();
            }).get();
            var rates = checkedValues[0];
            var note = $("#employee-form-note").val();

            $.ajax({
                type: "POST",
                url: "/rating",
                data: {
                    employee_id: "<?= $items->id ?>",
                    employee_rate: rates,
                    comment: note
                },
                success: function(data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Terimakasih!',
                        text: 'Penilaian anda telah kami terima.',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: false,
                        allowOutsideClick: false,
                        backdrop: `rgb(255, 255, 255)`
                    }).then(() => {
                        location.reload();
                    })
                }
            });
        })
    </script>
</body>

</html>
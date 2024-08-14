<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
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
    <div class="container">
        <div class="p-5 col-md-8">
            <div class="mb-3">
                <div class="mb-2 dropzone">
                    <label for="file-input" class="form-label small">Allowed file extension: jpg, jpeg, png & Max. size: 2 MB</label>
                    <input type="file" id="file-input" style="display: none;">
                </div>
                <div class="progress">
                    <div id="progressBar" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">0%</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(".progress").hide();
            $('#file-upload-button').click(function() {
                $('#file-input').click();
            });

            $('#file-input').change(function() {
                var file = $(this)[0].files[0];
                if (file) {
                    var fileName = file.name;
                    uploadFile(file)
                }
            });

            function uploadFile(file) {
                $(".progress").show();
                $("#progressBar").removeClass("bg-success");
                $("#progressBar").attr("aria-valuenow", 0);
                $("#progressBar").css("width", "0%");
                const formData = new FormData();
                formData.append('file', file);

                $.ajax({
                    url: '/upload',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = evt.loaded / evt.total * 100;
                                $("#progressBar").attr("aria-valuenow", percentComplete);
                                $("#progressBar").css("width", percentComplete + "%");
                                $("#progressBar").text(percentComplete.toFixed(0) + "%");
                            }
                        });
                        return xhr;
                    },
                    success: function(response) {
                        const item = JSON.parse(response);

                        if (item.status == "success") {
                            $("#progressBar").removeClass("bg-danger");
                            $("#progressBar").addClass("bg-success");
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: `${item.message}`,
                                toast: true,
                                position: 'bottom',
                                showConfirmButton: false,
                                timer: 5000,
                                timerProgressBar: true
                            })
                        } else {
                            $("#progressBar").addClass("bg-danger");
                            Swal.fire({
                                icon: 'warning',
                                title: 'Gagal!',
                                text: `${item.message}`,
                                toast: true,
                                position: 'bottom',
                                showConfirmButton: false,
                                timer: 5000,
                                timerProgressBar: true
                            })
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error(textStatus, errorThrown);
                    }
                });
            }
        });
    </script>
</body>

</html>
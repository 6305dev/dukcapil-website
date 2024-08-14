<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
    <div class="container-fluid">
        <div class="py-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-end">
                        <a href="/logout" class="btn btn-link">Sign Out</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="fs-5 mb-3">Posting</div>
                    <div class="box-form-article mb-5">
                        <div class="form-floating mb-2">
                            <input type="text" id="form-article-title" class="form-control" placeholder="Judul" autocomplete="off">
                            <label for="floatingInput">Title</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" id="form-article-permalink" class="form-control" placeholder="Permalink" autocomplete="off">
                            <label for="floatingInput">Permalink</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" id="form-article-cover" class="form-control" placeholder="Cover" autocomplete="off">
                            <label for="floatingInput">Cover</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" id="form-article-created" class="form-control" placeholder="Created" autocomplete="off">
                            <label for="floatingInput">Created</label>
                        </div>
                        <div id="form-article-image-upload">
                            <div class="dropzone">
                                <label for="file-input" class="form-label small">Extension: jpg, jpeg, png & Maxsize: 2 MB</label>
                                <input type="file" id="file-input" style="display: none;">
                            </div>
                            <div class="progress">
                                <div id="progressBar" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">0%</div>
                            </div>
                        </div>
                        <div class="form-floating my-2">
                            <textarea id="form-article-content" class="form-control" placeholder="Content" style="height: 250px;" spellcheck="false"></textarea>
                            <label for="floatingInput">Content</label>
                        </div>
                        <div class="mt-3">
                            <button id="btn-submit-article" class="btn btn-primary">Posting</button>
                            <button id="btn-update-article" class="btn btn-success disabled">Update</button>
                            <button id="btn-cancel" class="btn btn-secondary me-5">Cancel</button>
                            <button id="btn-remove-article" class="btn btn-danger ms-5">Remove</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="fs-5 mb-3">Articles</div>
                    <div class="articles-table table-responsive">
                        <table class="table table-hover">
                            <thead class="table-success" style="font-size: 9pt;">
                                <th>Title</th>
                                <th>Permalink</th>
                                <th>Created</th>
                            </thead>
                            <tbody style="font-size: 9pt;">
                                <?php
                                foreach ($params as $row) {
                                    echo  '<tr class="item-article" data-id="' . $row['id'] . '">
                                <td>' . $row['title'] . '</td>
                                <td>' . $row['permalink'] . '</td>
                                <td>' . $row['created'] . '</td>
                                </tr>';
                                };
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(".progress").hide();
            const dropZone = $('.dropzone');

            $('#file-upload-button').click(function() {
                $('#file-input').click();
            });

            $('#file-input').change(function() {
                var file = $(this)[0].files[0];
                if (file) {
                    uploadFile(file)
                }
            });

            dropZone.on('paste', function(event) {
                const clipboardData = event.originalEvent.clipboardData;
                const items = clipboardData.items;

                for (let i = 0; i < items.length; i++) {
                    const item = items[i];
                    if (item.kind === 'file') {
                        const file = item.getAsFile();
                        handleFiles([file]);
                    }
                }
            });

            dropZone.on('dragover', function(e) {
                e.preventDefault();
                e.stopPropagation();
                dropZone.addClass('dragover');
            });

            dropZone.on('dragleave', function(e) {
                e.preventDefault();
                e.stopPropagation();
                dropZone.removeClass('dragover');
            });

            dropZone.on('drop', function(e) {
                e.preventDefault();
                e.stopPropagation();
                dropZone.removeClass('dragover');

                const files = e.originalEvent.dataTransfer.files;
                handleFiles(files);
            });

            function handleFiles(files) {
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    uploadFile(file);
                }
            }

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

                        var fileName = item.message;
                        $("#form-article-cover").val(fileName);

                        if (item.status == "success") {
                            $("#progressBar").removeClass("bg-danger");
                            $("#progressBar").addClass("bg-success");
                            Swal.fire({
                                icon: 'success',
                                title: 'Image Uploaded!',
                                text: `${item.message}`,
                                toast: true,
                                position: 'bottom-end',
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

            $(".item-article").click(function() {
                $("#btn-update-article").removeClass("disabled");
                $("#btn-submit-article").addClass("disabled");
                const pid = $(this).data("id");
                $.get(`/admin/article/${pid}`, function(data) {
                    const items = JSON.parse(data)
                    $("#form-article-title").val(items.title)
                    $("#form-article-created").val(items.created)
                    $("#form-article-cover").val(items.cover)
                    $("#form-article-permalink").val(items.permalink)
                    $("#form-article-content").val(items.content)
                    $("#btn-update-article").data("id", pid)
                    $("#btn-remove-article").data("id", pid)

                    Swal.fire({
                        icon: 'success',
                        title: `${items.title}`,
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        toast: true,
                        position: 'bottom-end'
                    })
                })
            });

            $("#btn-submit-article").click(function() {
                const title = $("#form-article-title").val();
                const permalink = $("#form-article-permalink").val();
                const cover = $("#form-article-cover").val();
                const content = $("#form-article-content").val();

                $.ajax({
                    url: '/admin/article',
                    type: 'POST',
                    data: {
                        title,
                        permalink,
                        cover,
                        content
                    },
                    success: function(result) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Created!',
                            text: 'Article has been created',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: false,
                            allowOutsideClick: false,
                            backdrop: `rgb(255, 255, 255)`
                        }).then(() => {
                            location.reload();
                        })
                    },
                })
            });

            $("#btn-remove-article").click(function() {
                const pid = $(this).data("id")
                $.ajax({
                    url: `/admin/article/${pid}`,
                    type: 'DELETE',
                    success: function(result) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: 'Article has been deleted',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: false,
                            allowOutsideClick: false,
                            backdrop: `rgb(255, 255, 255)`
                        }).then(() => {
                            location.reload();
                        })
                    },
                    error: function(xhr, status, error) {
                        console.error("Error deleting user:", status, error);
                    }
                });
            })

            $("#btn-update-article").click(function() {
                const id = $(this).data("id")
                const title = $("#form-article-title").val();
                const permalink = $("#form-article-permalink").val();
                const cover = $("#form-article-cover").val();
                const content = $("#form-article-content").val();
                const created = $("#form-article-created").val();

                $.ajax({
                    url: `/admin/article`,
                    type: 'PUT',
                    data: {
                        id,
                        title,
                        permalink,
                        cover,
                        content,
                        created
                    },
                    success: function(result) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Updated!',
                            text: 'Article has been updated',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: false,
                            allowOutsideClick: false,
                            backdrop: `rgb(255, 255, 255)`
                        }).then(() => {
                            location.reload();
                        })
                    },
                })
            })

            $("#btn-cancel").click(function() {
                location.reload();
            })

            $("#form-article-title").on("input", function() {
                const slug = Slug($(this).val());
                $("#form-article-permalink").val(slug);
            });

            function Slug(str) {
                return str
                    .replace(/[^a-zA-Z0-9\s]/g, "")
                    .trim()
                    .replace(/\s+/g, "-")
                    .toLowerCase();
            }
        });
    </script>

</body>

</html>
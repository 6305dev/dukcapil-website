<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
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
    <div class="box-center">
        <form action="/sign" method="post">
            <div class="mb-3 form-floating">
                <input type="text" class="form-control" name="username" placeholder="username" autocomplete="off">
                <label for="username">Username</label>
            </div>
            <div class="mb-3 form-floating">
                <input type="password" class="form-control" name="password" placeholder="password">
                <label for="username">Password</label>
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text fs-4 text-primary">
                        <?php echo $captcha; ?>
                    </span>
                    <input type="text" class="form-control border-primary-subtle box-captcha" name="captcha">
                </div>
            </div>
            <div class="mb-4">
                <button class="btn btn-primary w-100" type="submit">Sign in</button>
            </div>
        </form>
    </div>
</body>

</html>
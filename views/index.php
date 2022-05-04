<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GASKIYA | Sign In</title>
    <link rel="stylesheet" href="public/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/site.css">
    <script src="public/bootstrap/js/bootstrap.min.js"></script>
</head>

<body class="h-100 d-flex">
    <main class="text-center col-12 col-md-4 col-lg-4 container">
        <form action="<?php echo $routes->get('signIn')->getPath(); ?>" method="POST">
            <img src="public/images/gascosa.jpg" class="mb-4" width="128" height="128" alt="">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            <?php if ($request->get('status') == "error") {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Invalid login details</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingEmail" name="email" placeholder="name@example.com" required>
                <label for="floatingEmail">Email address</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; GASKIYA 2022</p>
        </form>
    </main>
</body>

</html>
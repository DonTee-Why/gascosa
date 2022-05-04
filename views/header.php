<header class="p-2 bg-primary text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="<?php echo $routes->get('index')->getPath(); ?>" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <img src="public/images/gascosa.jpg" class="" width="64" height="64" alt="">
                <h3 class="m-0">&nbsp;GASKIYA</h3>
            </a>

            <div class="text-end ms-auto">
                <a href="<?php echo $routes->get('results')->getPath(); ?>" class="btn btn-outline-light">View Results</a>
                <a href="<?php echo $routes->get('logout')->getPath(); ?>" class="btn btn-outline-light">Logout</a>
            </div>
        </div>
    </div>
</header>
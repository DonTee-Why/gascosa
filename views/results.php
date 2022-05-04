<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GASKIYA Elections | Vote</title>
    <link rel="stylesheet" href="public/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/site.css">
    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/site.js"></script>
</head>

<body class="">
    <?php
    include 'header.php';
    ?>
    <main class="h-100 container-xl py-4">
        <h3>Results</h3>
        <hr>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-2 text-center mb-5">
            <div class="col">
                <div class="card">
                    <h5 class="card-header bg-secondary text-light">President</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <!-- <th scope="col">#</th> -->
                                        <th scope="col">Name</th>
                                        <th scope="col">Vote Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($pres_votes as $vote) {
                                    ?>
                                        <tr>
                                            <td><?php echo $vote["name"] ?></td>
                                            <td><?php echo $vote["vote_count"] ?></td>
                                        </tr>
                                    <?php
                                    }
                                    unset($vote);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <h5 class="card-header bg-secondary text-light">Vice President</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <!-- <th scope="col">#</th> -->
                                        <th scope="col">Name</th>
                                        <th scope="col">Vote Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($vicePress_votes as $vote) {
                                    ?>
                                        <tr>
                                            <td><?php echo $vote["name"] ?></td>
                                            <td><?php echo $vote["vote_count"] ?></td>
                                        </tr>
                                    <?php
                                    }
                                    unset($vote);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <h5 class="card-header bg-secondary text-light">General Secretary</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <!-- <th scope="col">#</th> -->
                                        <th scope="col">Name</th>
                                        <th scope="col">Vote Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($genSec_votes as $vote) {
                                    ?>
                                        <tr>
                                            <td><?php echo $vote["name"] ?></td>
                                            <td><?php echo $vote["vote_count"] ?></td>
                                        </tr>
                                    <?php
                                    }
                                    unset($vote);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <h5 class="card-header bg-secondary text-light">Assistant General Secretary</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <!-- <th scope="col">#</th> -->
                                        <th scope="col">Name</th>
                                        <th scope="col">Vote Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($asstGenSec_vote as $vote) {
                                    ?>
                                        <tr>
                                            <td><?php echo $vote["name"] ?></td>
                                            <td><?php echo $vote["vote_count"] ?></td>
                                        </tr>
                                    <?php
                                    }
                                    unset($vote);
                                    ?>
                                </tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <h5 class="card-header  bg-secondary text-light">Treasurer</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <!-- <th scope="col">#</th> -->
                                        <th scope="col">Name</th>
                                        <th scope="col">Vote Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($treasurer_vote as $vote) {
                                    ?>
                                        <tr>
                                            <td><?php echo $vote["name"] ?></td>
                                            <td><?php echo $vote["vote_count"] ?></td>
                                        </tr>
                                    <?php
                                    }
                                    unset($vote);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <h5 class="card-header  bg-secondary text-light">Financial Secretary</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <!-- <th scope="col">#</th> -->
                                        <th scope="col">Name</th>
                                        <th scope="col">Vote Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($finSec_vote as $vote) {
                                    ?>
                                        <tr>
                                            <td><?php echo $vote["name"] ?></td>
                                            <td><?php echo $vote["vote_count"] ?></td>
                                        </tr>
                                    <?php
                                    }
                                    unset($vote);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <h5 class="card-header  bg-secondary text-light">Auditor</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <!-- <th scope="col">#</th> -->
                                        <th scope="col">Name</th>
                                        <th scope="col">Vote Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($auditor_vote as $vote) {
                                    ?>
                                        <tr>
                                            <td><?php echo $vote["name"] ?></td>
                                            <td><?php echo $vote["vote_count"] ?></td>
                                        </tr>
                                    <?php
                                    }
                                    unset($vote);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <h5 class="card-header  bg-secondary text-light">Social Secretary</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <!-- <th scope="col">#</th> -->
                                        <th scope="col">Name</th>
                                        <th scope="col">Vote Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($sosSec_vote as $vote) {
                                    ?>
                                        <tr>
                                            <td><?php echo $vote["name"] ?></td>
                                            <td><?php echo $vote["vote_count"] ?></td>
                                        </tr>
                                    <?php
                                    }
                                    unset($vote);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <h5 class="card-header  bg-secondary text-light">Media & Publicity Secretary</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <!-- <th scope="col">#</th> -->
                                        <th scope="col">Name</th>
                                        <th scope="col">Vote Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($medPubSec_vote as $vote) {
                                    ?>
                                        <tr>
                                            <td><?php echo $vote["name"] ?></td>
                                            <td><?php echo $vote["vote_count"] ?></td>
                                        </tr>
                                    <?php
                                    }
                                    unset($vote);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h3>Voters</h3>
        <hr />
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-xl-6 text-center">
            <?php
            foreach ($voters as $voter) {
            ?>
                <div class="col">
                    <figure class="figure">
                        <img src="<?php echo 'public/uploads/' . $voter["pic"] ?>" class="figure-img voters-img rounded-circle border border-2 border-primary" alt="...">
                        <figcaption class="text-center mt-auto"><strong><?php echo ucwords(strtolower($voter["name"])) ?></strong></figcaption>
                    </figure>
                </div>
            <?php } ?>
        </div>
    </main>
    <footer class="mt-4 p-3 bg-secondary text-light">
        <p class="m-0">&copy; GASKIYA 2022</p>
    </footer>
</body>

</html>
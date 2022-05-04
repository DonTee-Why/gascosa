<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GACOSCA Elections | Vote</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
        crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/site.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" 
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" 
        crossorigin="anonymous">
    </script>
    <script src="public/js/site.js"></script>
</head>

<body class="">
    <?php
    include 'header.php';
    ?>
    <main class="h-100 container py-4">
        <h3>Vote for your preferred candidates</h3>
        <hr>
        <form action="<?php echo $routes->get('voteAction')->getPath(); ?>" method="POST" enctype="multipart/form-data">
            <div class="row g-3 mt-2 justify-content-around">
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-header">Please upload your picture</div>
                        <div class="card-body">
                            <img src="public/images/person.svg" class="w-75 img" id="prevImgpic" alt="Image Placeholder" />
                            <input class="form-control mt-3" type="file" accept="image/*" name="pic" id="pic" onchange="ShowImgPreview(this)" required>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-8 text-start">
                    <div class="card mb-4">
                        <h5 class="card-header">Presidential Candidates</h5>
                        <div class="card-body">
                            <?php
                            foreach ($president as &$candidate) {
                            ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="presidentialRadio" id="<?php echo 'presidentialRadio' . $candidate['id']; ?>" value="<?php echo $candidate['id']; ?>" required>
                                    <label class="form-check-label" for="<?php echo 'presidentialRadio' . $candidate['id']; ?>">
                                        <?php echo $candidate['name']; ?>
                                    </label>
                                </div>
                            <?php
                            }
                            unset($candidate);
                            ?>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <h5 class="card-header">Vice Presidential Candidates</h5>
                        <div class="card-body">
                            <?php
                            foreach ($vicePresident as &$candidate) {
                            ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="vicePresRadio" id="<?php echo 'vicePresRadio' . $candidate['id']; ?>" value="<?php echo $candidate['id']; ?>" required>
                                    <label class="form-check-label" for="<?php echo 'vicePresRadio' . $candidate['id']; ?>">
                                        <?php echo $candidate['name']; ?>
                                    </label>
                                </div>
                            <?php
                            }
                            unset($candidate);
                            ?>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <h5 class="card-header">General Secretary Candidates</h5>
                        <div class="card-body">
                            <?php
                            foreach ($genSec as &$candidate) {
                            ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="genSecRadio" id="<?php echo 'genSecRadio' . $candidate['id'] ?>" value="<?php echo $candidate['id']; ?>" required>
                                    <label class="form-check-label" for="<?php echo 'genSecRadio' . $candidate['id'] ?>">
                                        <?php echo $candidate['name']; ?>
                                    </label>
                                </div>
                            <?php
                            }
                            unset($candidate);
                            ?>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <h5 class="card-header">Assistant General Secretary Candidates</h5>
                        <div class="card-body">
                            <?php
                            foreach ($asstGenSec as &$candidate) {
                            ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="asstGenSecRadio" id="<?php echo 'asstGenSecRadio' . $candidate['id'] ?>" value="<?php echo $candidate['id']; ?>" required>
                                    <label class="form-check-label" for="<?php echo 'asstGenSecRadio' . $candidate['id'] ?>">
                                        <?php echo $candidate['name']; ?>
                                    </label>
                                </div>
                            <?php
                            }
                            unset($candidate);
                            ?>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <h5 class="card-header">Treasurer</h5>
                        <div class="card-body">
                            <?php
                            foreach ($treasurer as &$candidate) {
                            ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required="true" name="treasurerRadio" id="<?php echo 'treasurerRadio' . $candidate['id'] ?>" value="<?php echo $candidate['id']; ?>" required>
                                    <label class="form-check-label" for="<?php echo 'treasurerRadio' . $candidate['id'] ?>">
                                        <?php echo $candidate['name'] ?>
                                    </label>
                                </div>
                            <?php
                            }
                            unset($candidate);
                            ?>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <h5 class="card-header">Financial Secretary Candidates</h5>
                        <div class="card-body">
                            <?php
                            foreach ($finSec as &$candidate) {
                            ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="finSecRadio" id="<?php echo 'finSecRadio' . $candidate['id']; ?>" value="<?php echo $candidate['id']; ?>" required>
                                    <label class="form-check-label" for="<?php echo 'finSecRadio' . $candidate['id']; ?>">
                                        <?php echo $candidate['name']; ?>
                                    </label>
                                </div>
                            <?php
                            }
                            unset($candidate);
                            ?>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <h5 class="card-header">Auditor</h5>
                        <div class="card-body">
                            <?php
                            foreach ($auditor as &$candidate) {
                            ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="auditorRadio" id="<?php echo 'auditorRadio' . $candidate['id']; ?>" value="<?php echo $candidate['id']; ?>" required>
                                    <label class="form-check-label" for="<?php echo 'auditorRadio' . $candidate['id']; ?>">
                                        <?php echo $candidate['name']; ?>
                                    </label>
                                </div>
                            <?php
                            }
                            unset($candidate);
                            ?>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <h5 class="card-header">Social Secretary</h5>
                        <div class="card-body">
                            <?php
                            foreach ($sosSec as &$candidate) {
                            ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="socialSecRadio" id="<?php echo 'socialSecRadio' . $candidate['id']; ?>" value="<?php echo $candidate['id']; ?>" required>
                                    <label class="form-check-label" for="<?php echo 'socialSecRadio' . $candidate['id']; ?>">
                                        <?php echo $candidate['name']; ?>
                                    </label>
                                </div>
                            <?php
                            }
                            unset($candidate);
                            ?>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <h5 class="card-header">Media & Publicity Secretary</h5>
                        <div class="card-body">
                            <?php
                            foreach ($medPubSec as &$candidate) {
                            ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="medPubSecRadio" id="<?php echo 'medPubSecRadio' . $candidate['id']; ?>" value="<?php echo $candidate['id']; ?>" required>
                                    <label class="form-check-label" for="<?php echo 'medPubSecRadio' . $candidate['id']; ?>">
                                        <?php echo $candidate['name']; ?>
                                    </label>
                                </div>
                            <?php
                            }
                            unset($candidate);
                            ?>
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary btn-lg col-12 col-md-4 mx-auto">Cast Vote</button>
            </div>
        </form>
    </main>
    <footer class="mt-4 p-3 bg-secondary text-light">
        <p class="m-0">&copy; GASKIYA 2022</p>
    </footer>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GASCOSA Elections | Vote</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/site.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/site.js"></script>
</head>

<body class="">
    <?php
        include 'header.php';
    ?>
    <main class="h-100 container py-4">
        <h3>Vote for your preferred candidates</h3>
        <hr>
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="row g-3 mt-2 justify-content-around">
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-header">Please upload your picture</div>
                        <div class="card-body">
                            <img src="assets/images/person.svg" class="img-fluid w-75" id="prevImgpic" alt="Image Placeholder" />
                            <input asp-for="Picture" class="form-control mt-3" type="file" id="pic" onchange="ShowImgPreview(this)">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-8 text-start">
                    <div class="card mb-4">
                        <h5 class="card-header">Presidential Candidates</h5>
                        <div class="card-body">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="presidentialRadio" id="presidentialRadio1" value="Raymond Eze">
                                <label class="form-check-label" for="presidentialRadio1">
                                    Raymond Eze
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="presidentialRadio" id="presidentialRadio2">
                                <label class="form-check-label" for="presidentialRadio2">
                                    Selepreye Koin
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <h5 class="card-header">Vice Presidential Candidates</h5>
                        <div class="card-body">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="vicePresRadio" id="vicePresRadio1">
                                <label class="form-check-label" for="vicePresRadio1">
                                    Adepemi Davies
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="vicePresRadio" id="vicePresRadio2">
                                <label class="form-check-label" for="vicePresRadio2">
                                    Dr. Valentine Osigbeme
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <h5 class="card-header">General Secretary Candidates</h5>
                        <div class="card-body">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="genSecRadio" id="genSecRadio1">
                                <label class="form-check-label" for="genSecRadio1">
                                    Samuel Nwokeke
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="genSecRadio" id="genSecRadio2">
                                <label class="form-check-label" for="genSecRadio2">
                                    Waliu Ademole Akinola
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <h5 class="card-header">Assistant General Secretary Candidates</h5>
                        <div class="card-body">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="asstGenSecRadio" id="asstGenSecRadio1">
                                <label class="form-check-label" for="asstGenSecRadio1">
                                    Bukola Titilayo Olayinka
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="asstGenSecRadio" id="asstGenSecRadio2">
                                <label class="form-check-label" for="asstGenSecRadio2">
                                    Ewomazino S. Udu
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <h5 class="card-header">Treasurer Candidates</h5>
                        <div class="card-body">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="treasurerRadio" id="treasurerRadio1">
                                <label class="form-check-label" for="treasurerRadio1">
                                    Mueenat Oriyomi Fasasi
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="treasurerRadio" id="treasurerRadio2">
                                <label class="form-check-label" for="treasurerRadio2">
                                    Winifred Mark
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <h5 class="card-header">Financial Secretary Candidates</h5>
                        <div class="card-body">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="finSecRadio" id="finSecRadio1">
                                <label class="form-check-label" for="finSecRadio1">
                                    Gladys Obeten
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="finSecRadio" id="finSecRadio2">
                                <label class="form-check-label" for="finSecRadio2">
                                    Elizabeth Idemudia Ubah
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <h5 class="card-header">Auditor Candidates</h5>
                        <div class="card-body">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="auditorRadio" id="auditorRadio1">
                                <label class="form-check-label" for="auditorRadio1">
                                    Rebecca Adewunmi
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="auditorRadio" id="auditorRadio2">
                                <label class="form-check-label" for="auditorRadio2">
                                    Apanishile Oladimeji Babatunde
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <h5 class="card-header">Social Secretary Candidates</h5>
                        <div class="card-body">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="socialSecRadio" id="socialSecRadio1">
                                <label class="form-check-label" for="socialSecRadio1">
                                    Benedicta Jamal Ezeugwu
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="socialSecRadio" id="socialSecRadio2">
                                <label class="form-check-label" for="socialSecRadio2">
                                    Goergette Okeke
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <h5 class="card-header">Media & Publicity Secretary Candidates</h5>
                        <div class="card-body">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="medPubSecRadio" id="medPubSecRadio1">
                                <label class="form-check-label" for="medPubSecRadio1">
                                    Abosede Famakinwa
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="medPubSecRadio" id="medPubSecRadio2">
                                <label class="form-check-label" for="medPubSecRadio2">
                                    Kafayat Morenikeji Raufu
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
                <button type="button" class="btn btn-primary col-12">Cast Vote</button>
            </div>
        </form>
    </main>
    <footer class="mt-4 p-3 bg-secondary text-light">
        <p class="m-0">&copy; GASCOSA 2022</p>
    </footer>
</body>

</html>
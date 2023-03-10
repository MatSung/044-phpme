<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<style>
    body {
        margin-top: 20px;
    }
</style>

<body>
    <div class="container">
        <div class="card my-2">
            <div class="card-header">
                Fill this in
            </div>
            <div class="card-body">
                <form action="app.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="name-input" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" placeholder="Rudolph" class="form-control" id="name-input">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="surname-input" class="col-sm-2 col-form-label">Surname</label>
                        <div class="col-sm-10">
                            <input type="text" name="surname" placeholder="Fitzgerald" class="form-control" id="surname-input">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="image-input" class="col-sm-2 col-form-label">Picture .png, .jpg, .jpeg</label>
                        <div class="col-sm-10">
                            <input type="file" name="picture" class="form-control" id="image-input" accept=".jpg, .png, .jpeg">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="image-input" class="col-sm-2 col-form-label">Languages</label>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="php" id="php-checkbox" name="languages[]">
                                <label class="form-check-label" for="php-checkbox">
                                    PHP
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="python" id="python-checkbox" name="languages[]">
                                <label class="form-check-label" for="python-checkbox">
                                    Python
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="c" id="c-checkbox" name="languages[]">
                                <label class="form-check-label" for="c-checkbox">
                                    C
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" id="submit-button" type="button">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr>
    <div id="single-image-container" class="container" hidden>
        <img src="" alt="your profile image">
    </div>

    <div id="multiple-image-container" class="container">
        <div id="fetching" hidden>
            Fetching
        </div>
        <div id="carousel" class="carousel slide" hidden>
            <div id="carousel-inner" class="carousel-inner">

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <script src="?page=image-alter.js"></script>
</body>

</html>
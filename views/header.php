<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-2 link-secondary">Посты</a></li>
                <li><a href="/create-post" class="nav-link px-2 link-dark">Добавить пост</a></li>
                <li><a href="/users" class="nav-link px-2 link-dark">Пользователи</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">About</a></li>
            </ul>

            <div class="col-md-3 text-end">
                <?php

                    if (!empty($_SESSION)) {
                    ?>
                        <span><?=$_SESSION['name'] ?></span>
                        <a href="/logout" class="btn btn-outline-primary me-2">Выйти</a>
                <?php
                    } else {
                        ?>
                        <a href="/login" class="btn btn-outline-primary me-2">Войти</a>
                        <a href="/registration" class="btn btn-primary">Регистрация</a>
                    <?php
                    }
                ?>

            </div>
        </header>
    </div>
    <main>

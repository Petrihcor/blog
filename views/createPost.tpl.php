<?php
require_once __DIR__ . "/header.php";
?>

    <div class="container">
        <h1>Добавить пост</h1>
        <form method="post" action="/add-post">
            <input type="hidden" class="form-control" name="author_id" value="<?= $_SESSION['id'] ?>">
            <div class="mb-3">
                <label for="title" class="form-label">Название</label>
                <input type="text" class="form-control" id="title" name="title" >
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Контент</label>
                <textarea name="content" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
<?php
require_once __DIR__ . "/footer.php";


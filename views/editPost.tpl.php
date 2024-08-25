<?php
/**
 * @var \Src\classes\Post $post
 *
 **/
require_once __DIR__ . "/header.php";
if ($_SESSION['id'] == $post->getAuthor()) {
?>

    <div class="container">
        <h1>Добавить пост</h1>
        <form method="post" action="/edit-post">
            <input type="hidden" class="form-control" name="id" value="<?= $post->getId(); ?>">
            <div class="mb-3">
                <label for="title" class="form-label">Название</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= $post->getTitle(); ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Контент</label>
                <textarea name="content" class="form-control" ><?= $post->getContent(); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
<?php
} else {
    echo "вы не автор поста";
}
require_once __DIR__ . "/footer.php";


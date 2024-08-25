<?php
    /**
     * @var \Src\classes\Post $post
     *
     **/


    require_once __DIR__ . "/header.php";
?>
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
               <?= $post->getUpdate(); ?>
            </div>
            <div class="card-body">
                <p class="card-text"><?= $post->getContent(); ?></p>
                <p class="card-text"><?= $post->getAuthor(); ?></p>
                <a href="/post/<?= $post->getId(); ?>/edit"><p class="card-title">Редактировать</p></a>
                <div class="d-grid gap-2 d-sm-flex">
                </div>
            </div>
        </div>
    </div>
<?php
require_once __DIR__ . "/footer.php";

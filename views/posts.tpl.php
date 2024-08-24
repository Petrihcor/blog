<?php
    /**
     * @var array $posts
     * @var \Src\classes\Post $post
     *
     **/


    require_once __DIR__ . "/header.php";
?>
    <div class="container">
<?php
    foreach ($posts as $post) {
        ?>
        <div class="card mt-4">
            <div class="card-header">
               <?= $post->getUpdate(); ?>
            </div>
            <div class="card-body">
                <a href="/post/<?= $post->getId(); ?>"><h5 class="card-title"><?=$post->getTitle(); ?></h5></a>
                <p class="card-text"><?= $post->getContent(); ?></p>
                <p class="card-text"><?= $post->getAuthor(); ?></p>
                <div class="d-grid gap-2 d-sm-flex">
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    </div>
<?php
require_once __DIR__ . "/footer.php";

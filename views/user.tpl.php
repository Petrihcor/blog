<?php
    /**
     * @var \Src\classes\User $user
     *  @var \Src\classes\Post $post
     *  @var array $posts
     **/


    require_once __DIR__ . "/header.php";
?>
    <div class="container mt-4">
        <div class="row g-0">
            <ul class="list-group">
                <li class="list-group-item">Имя: <?=$user->getName(); ?></li>
                <li class="list-group-item">Почта: <?= $user->getEmail(); ?></li>
                <li class="list-group-item"></li>
            </ul>
        </div>
    </div>
<?php
    if (!empty($posts)) {
        foreach ($posts as $post) {
            ?>
            <div class="card mt-4">
                <div class="card-header">
                    <?= $post->getUpdate(); ?>
                </div>
                <div class="card-body">
                    <a href="/post/<?= $post->getId(); ?>"><h5 class="card-title"><?=$post->getTitle(); ?></h5></a>
                    <p class="card-text"><?= $post->getContent(); ?></p>
                    <div class="d-grid gap-2 d-sm-flex">
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>
<?php
require_once __DIR__ . "/footer.php";

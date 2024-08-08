<?php
    /**
     * @var array $users
     * @var \Src\classes\User $user
     *
     **/


    require_once __DIR__ . "/header.php";
?>
    <div class="container">
<?php
    foreach ($users as $user) {
        ?>
        <div class="card mt-4">
            <div class="card-header">
                <?php
                if (isset($_SESSION['id']) && $_SESSION['id'] == $user->getId()) {
                    echo "Это вы";
                }
                ?>
            </div>
            <div class="card-body">
                <a href="/user?id=<?=$user->getId(); ?>"><h5 class="card-title"><?=$user->getName(); ?></h5></a>
                <p class="card-text"><?=$user->getEmail() ?></p>

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

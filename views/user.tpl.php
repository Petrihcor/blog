<?php
    /**
     * @var \Src\classes\User $user
     *
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
    ?>
<?php
require_once __DIR__ . "/footer.php";

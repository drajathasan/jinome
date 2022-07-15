<?php
use Jinome\Supports\{Component,Config};
?>
<body class="min-h-screen overflow-hidden" style="background-image: <?= jinomeBackground(Config::get('jinomeBackground')['type']??'') ?>;">
    <?php Component::render('header') ?>
    <main class="flex flex-col items-center content-center min-h-screen">
        <?php Component::render('searchbox') ?>
        <?php Component::render('mini-module', ['dbs' => $dbs, 'sysconf' => $sysconf]) ?>
        <?php Component::render('windows', ['dbs' => $dbs, 'sysconf' => $sysconf]) ?>
    </main>
</body>
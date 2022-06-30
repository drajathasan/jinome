<?php
use Jinome\Supports\Component;
?>
<body class="min-h-screen overflow-hidden" style="background-image: linear-gradient(180deg,rgb(57 57 57 / 0%) 0,rgba(63,71,74,.8)),url(<?= jinomeUrlStatic('images/' . rand(1,5) . '.jpg') ?>);">
    <?php Component::render('header') ?>
    <main class="flex flex-col items-center content-center min-h-screen">
        <?php Component::render('searchbox') ?>
        <?php Component::render('mini-module') ?>
        <?php Component::render('windows') ?>
    </main>
</body>
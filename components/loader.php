<?php
use Jinome\Supports\Component;
?>
<body>
    <div class="loader">
        <?php Component::render('wave') ?>
    </div>
    <?php Component::render('submenu', ['module' => $module]) ?>
    <?php Component::render('submenu-trigger') ?>
    <div class="w-full pb-32" id="mainContent"></div>
    <script>
        $(document).ready(function() {$('#mainContent').simbioAJAX('<?= AWB . 'modules/'. $module . '/index.php' ?>');});
    </script>
    <iframe name="blindSubmit" class="hidden"></iframe>
    <iframe name="submitExec" class="hidden"></iframe>
</body>
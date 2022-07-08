<?php
use Jinome\Supports\Component;
$mainModule = $module !== 'othermodule';

$moduleUrl = AWB . 'modules/'. $module . '/index.php';
if (!$mainModule):
    $moduleUrl = jinomeUrl('modules/' . $module . '.php');
endif;
?>
<body>
    <div class="loader">
        <?php Component::render('wave') ?>
    </div>
    <?php if ($mainModule): ?>
    <?php Component::render('submenu', ['module' => $module]) ?>
    <?php Component::render('submenu-trigger') ?>
    <?php endif; ?>
    <div class="w-full pb-32" id="mainContent"></div>
    <script>
        $(document).ready(function() {$('#mainContent').simbioAJAX('<?= $moduleUrl ?>');});
    </script>
    <iframe name="blindSubmit" class="hidden"></iframe>
    <iframe name="submitExec" class="hidden"></iframe>
</body>
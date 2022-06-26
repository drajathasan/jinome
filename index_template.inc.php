<?php
/**
 * @author Drajat Hasan
 * @email drajathasan20@gmail.com
 * @create date 2022-06-26 01:12:38
 * @modify date 2022-06-26 23:19:45
 * @license GPLv3
 * @desc [description]
 */

use Jinome\Supports\Component;

include __DIR__ . '/lib/autoload.php';
?>
<!DOCTYPE Html>
<html>
    <head>
        <title><?= $page_title ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, post-check=0, pre-check=0" />
        <meta http-equiv="Expires" content="Sat, 26 Jul 1997 05:00:00 GMT" />

        <link rel="icon" href="<?php echo SWB; ?>webicon.ico" type="image/x-icon" />
        <link href="<?php echo SWB; ?>css/bootstrap.min.css?<?php echo date('this') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo SWB; ?>css/core.css?<?php echo date('this') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo JWB; ?>colorbox/colorbox.css?<?php echo date('this') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo JWB; ?>chosen/chosen.css?<?php echo date('this') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo JWB; ?>toastr/toastr.min.css?<?php echo date('this') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo JWB; ?>jquery.imgareaselect/css/imgareaselect-default.css" rel="stylesheet" type="text/css" />
        <link href="<?= AWB . str_replace('style.css', 'dist/app.css', $sysconf['admin_template']['css']) ?>" rel="stylesheet">

        <script type="text/javascript" src="<?php echo JWB; ?>jquery.js"></script>
        <script type="text/javascript" src="<?php echo JWB; ?>updater.js"></script>
        <script type="text/javascript" src="<?php echo JWB; ?>gui.js?"></script>
        <script type="text/javascript" src="<?php echo JWB; ?>form.js"></script>
        <script type="text/javascript" src="<?php echo JWB; ?>calendar.js?v=<?php echo date('this') ?>"></script>
        <script type="text/javascript" src="<?php echo JWB; ?>chosen/chosen.jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo JWB; ?>chosen/ajax-chosen.min.js"></script>
        <script type="text/javascript" src="<?php echo JWB; ?>ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="<?php echo JWB; ?>tooltipsy.js"></script>
        <script type="text/javascript" src="<?php echo JWB; ?>colorbox/jquery.colorbox-min.js"></script>
        <script type="text/javascript" src="<?php echo JWB; ?>jquery.imgareaselect/scripts/jquery.imgareaselect.pack.js"></script>
        <script type="text/javascript" src="<?php echo JWB; ?>webcam.js"></script>
        <script type="text/javascript" src="<?php echo JWB; ?>scanner.js"></script>
        <script type="text/javascript" src="<?php echo SWB; ?>js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo SWB; ?>js/popper.min.js"></script>
        <script type="text/javascript" src="<?php echo JWB; ?>toastr/toastr.min.js"></script>
    </head>
    <body class="min-h-screen overflow-hidden" style="background-image: linear-gradient(180deg,rgb(57 57 57 / 0%) 0,rgba(63,71,74,.8)),url(<?= jinomeUrlStatic('images/' . rand(1,5) . '.jpg') ?>);">
        <header class="fixed flex flex-row-reverse gap-5 w-full text-white p-3 cursor-pointer font-bold">
            <svg onclick="window.location = 'logout.php'" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="fullscreen" viewBox="0 0 16 16">
                <path id="fullscreenIcon" d="M1.5 1a.5.5 0 0 0-.5.5v4a.5.5 0 0 1-1 0v-4A1.5 1.5 0 0 1 1.5 0h4a.5.5 0 0 1 0 1h-4zM10 .5a.5.5 0 0 1 .5-.5h4A1.5 1.5 0 0 1 16 1.5v4a.5.5 0 0 1-1 0v-4a.5.5 0 0 0-.5-.5h-4a.5.5 0 0 1-.5-.5zM.5 10a.5.5 0 0 1 .5.5v4a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 0 14.5v-4a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v4a1.5 1.5 0 0 1-1.5 1.5h-4a.5.5 0 0 1 0-1h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 1 .5-.5z"/>
                <path id="closefullscreenIcon" class="hidden" d="M5.5 0a.5.5 0 0 1 .5.5v4A1.5 1.5 0 0 1 4.5 6h-4a.5.5 0 0 1 0-1h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 1 .5-.5zm5 0a.5.5 0 0 1 .5.5v4a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 10 4.5v-4a.5.5 0 0 1 .5-.5zM0 10.5a.5.5 0 0 1 .5-.5h4A1.5 1.5 0 0 1 6 11.5v4a.5.5 0 0 1-1 0v-4a.5.5 0 0 0-.5-.5h-4a.5.5 0 0 1-.5-.5zm10 1a1.5 1.5 0 0 1 1.5-1.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 0-.5.5v4a.5.5 0 0 1-1 0v-4z"/>
            </svg>
        </header>
        <main class="flex flex-col items-center content-center min-h-screen">
            <section class="flex flex-col items-center mt-48 w-9/12 animate__animated animate__fadeIn">
                <h1 class="text-3xl w-max font-bold text-gray-100 px-2 py-1 rounded-xl">
                    Hi, <?= $_SESSION['realname']?>
                </h1>
                <input type="text" class="font-bold w-6/12 outline-none px-3 py-2 my-3 rounded-xl text-lg" placeholder="Cari menu?"/>
            </section>
            <?php Component::render('mini-module') ?>
            <!-- Windows -->
            <div id="windows" class="w-full h-auto absolute">
            </div>
        </main>
    </body>
    <script src="<?= AWB . str_replace('style.css', 'dist/app.js', $sysconf['admin_template']['css']) ?>"></script>
</html>
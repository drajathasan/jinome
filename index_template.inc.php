<?php
/**
 * @author Drajat Hasan
 * @email drajathasan20@gmail.com
 * @create date 2022-06-26 01:12:38
 * @modify date 2022-06-26 02:13:44
 * @license GPLv3
 * @desc [description]
 */
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
            <main class="flex flex-col items-center content-center min-h-screen">
                <section class="flex flex-col items-center mt-48 w-9/12 animate__animated animate__fadeIn">
                    <h1 class="text-3xl w-max font-bold text-gray-100 px-2 py-1 rounded-xl">
                        Hi, <?= $_SESSION['realname']?>
                    </h1>
                    <input type="text" class="font-bold w-6/12 outline-none px-3 py-2 my-3 rounded-xl text-lg" placeholder="Cari menu?"/>
                </section>
                <section class="flex flex-row gap-3 animate__animated animate__bounceInUp">
                    <div class="flex flex-col items-center">
                        <div class="flex items-center justify-center bg-blue-700 w-16 h-16 my-2 text-white rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
                                <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z"/>
                                <path d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z"/>
                            </svg>
                        </div>
                        <label class="text-white">Bibliography</label>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="flex items-center justify-center bg-green-700 w-16 h-16 my-2 text-white rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z"/>
                            </svg>
                        </div>
                        <label class="text-white">Circulation</label>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="flex items-center justify-center bg-purple-700 w-16 h-16 my-2 text-white rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                                <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                            </svg>
                        </div>
                        <label class="text-white">Membership</label>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="flex items-center justify-center bg-teal-700 w-16 h-16 my-2 text-white rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
                                <path d="M12 0H4a2 2 0 0 0-2 2v4h12V2a2 2 0 0 0-2-2zm2 7H6v2h8V7zm0 3H6v2h8v-2zm0 3H6v3h6a2 2 0 0 0 2-2v-1zm-9 3v-3H2v1a2 2 0 0 0 2 2h1zm-3-4h3v-2H2v2zm0-3h3V7H2v2z"/>
                            </svg>
                        </div>
                        <label class="text-white">Reporting</label>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="flex items-center justify-center bg-slate-700 w-16 h-16 my-2 text-white rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
                                <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
                            </svg>
                        </div>
                        <label class="text-white">System</label>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="flex items-center justify-center bg-zinc-500 w-16 h-16 my-2 text-white rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
                                <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                            </svg>
                        </div>
                        <label class="text-white">Other Module</label>
                    </div>
                </section>
            </main>
    </body>
</html>
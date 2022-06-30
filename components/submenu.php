<div id="submenu" class="flex flex-col hidden">
        <div class="flex items-center justify-center text-white font-bold h-40" style="background-image: linear-gradient(180deg,rgb(57 57 57 / 0%) 0,rgba(63,71,74,.8)),url(<?= jinomeUrlStatic('images/' . rand(1,5) . '.jpg') ?>);">
            <h1 class="text-2xl"><?= ucwords(__($module)) ?></h1>
        </div>
        <?php
        if (file_exists($submenu = MDLBS . $module . DS . 'submenu.php'))
        {
            include $submenu;

            $privilegesMenu = $_SESSION['priv'][$module]['menus']??[];
            $menus = array_merge($menu, [['Header', 'Plugin']], \SLiMS\Plugins::getInstance()->getMenus($module));

            $html = [];
            $headerKey = 0;
            foreach ($menus as $list) {
                $headerLabel = __($list[1]);
                if ($list[0] === 'Header'):
                    $headerKey++;
                    $html[$headerKey] = [];
                    $html[$headerKey][] = <<<HTML
                        <h3 class="text-lg font-bold col-span-3 w-full">{$headerLabel}</h3>
                    HTML;
                else:
                    if (!isset($list[2])) $list[2] = '';
                    list($label, $url, $title) = $list;
                    if ($_SESSION['uid'] == 1):
                        $html[$headerKey][] = trim(<<<HTML
                            <a href="{$url}" class="col-span-1 w-3/12 px-3 py-2 font-bold hover:bg-gray-200 loadContent" title="{$title}">{$label}</a>
                        HTML);
                    elseif (in_array(md5($url), $privilegesMenu)):
                        $html[$headerKey][] = trim(<<<HTML
                            <a href="{$url}" class="col-span-1 w-3/12 px-3 py-2 font-bold hover:bg-gray-200 loadContent" title="{$title}">{$label}</a>
                        HTML);
                    else:
                        // echo md5($url) . '<br>';
                    endif;
                    if ($headerKey > 0 && isset($html[$headerKey]) && count($html[$headerKey]) == 1) unset($html[$headerKey]);
                endif;
            }
            $prefix = '<div class="flex flex-wrap gap-1 mt-4 px-5">';
            $suffix = '</div>';
            
            foreach ($html as $list) {
                $group = implode($list);
                echo $prefix . $group . $suffix;
            }
        }
        ?>
    </div>
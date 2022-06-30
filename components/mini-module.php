<?php
/**
 * @author Drajat Hasan
 * @email drajathasan20@gmail.com
 * @create date 2022-06-26 17:16:26
 * @modify date 2022-06-29 08:06:40
 * @license GPLv3
 * @desc [description]
 */

defined('INDEX_AUTH') or die('No direect access!');

$modules = [
    'bibliography' => [
        'color' => 'bg-blue-700 hover:bg-blue-800',
        'icon' => '<path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z"/><path d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z"/>',
    ],
    'circulation' => [
        'color' => 'bg-green-700 hover:bg-green-800',
        'icon' => '<path fill-rule="evenodd" d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z"/>'
    ],
    'membership' => [
        'color' => 'bg-purple-700 hover:bg-purple-800',
        'icon' => '<path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/><path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/><path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>'
    ],
    'reporting' => [
        'color' => 'bg-teal-700 hover:bg-teal-800',
        'icon' => '<path d="M12 0H4a2 2 0 0 0-2 2v4h12V2a2 2 0 0 0-2-2zm2 7H6v2h8V7zm0 3H6v2h8v-2zm0 3H6v3h6a2 2 0 0 0 2-2v-1zm-9 3v-3H2v1a2 2 0 0 0 2 2h1zm-3-4h3v-2H2v2zm0-3h3V7H2v2z"/>'
    ],
    'system' => [
        'color' => 'bg-slate-700  hover:bg-slate-800',
        'icon' => '<path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>'
    ]
];
?>
<section class="flex flex-row gap-3 animate__animated animate__bounceInUp">
    <?php foreach($modules as $module => $attribute): ?>
        <?php if (isset($_SESSION['priv'][$module])): ?>
        <div class="flex flex-col items-center cursor-pointer openDragWindow" data-module="<?= $module ?>" data-label="<?= ucwords(__($module)) ?>">
            <div class="flex items-center justify-center <?= $attribute['color'] ?> w-16 h-16 my-2 text-white rounded-xl  cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
                    <?= $attribute['icon'] ?>
                </svg>
            </div>
            <label class="text-white"><?= ucwords(__($module)) ?></label>
        </div>
        <?php endif; ?>
    <?php endforeach; ?>
    <div class="flex flex-col items-center">
        <div class="flex items-center justify-center bg-zinc-500 hover:bg-zinc-600 w-16 h-16 my-2 text-white rounded-xl cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
                <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
            </svg>
        </div>
        <label class="text-white">Other Module</label>
    </div>
</section>
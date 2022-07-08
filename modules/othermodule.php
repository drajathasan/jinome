<?php
/**
 * @author Drajat Hasan
 * @email drajathasan20@gmail.com
 * @create date 2022-07-07 20:14:25
 * @modify date 2022-07-08 09:57:57
 * @license GPLv3
 * @desc [description]
 */

use Jinome\Supports\Component;

// key to authenticate
define('INDEX_AUTH', '1');

// required file
require __DIR__ . '/../../../../sysconfig.inc.php';
// IP based access limitation
require LIB.'ip_based_access.inc.php';
do_checkIP('smc');
// start the session
require SB.'admin/default/session.inc.php';
// session checking
require SB.'admin/default/session_check.inc.php';
include __DIR__ . DS . '..' . DS . 'lib' . DS . 'autoload.php';

$page_title = 'Other Module';

$defaultModules = [
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

$otherModules = [
    'master_file' => [
        'color' => 'bg-lime-700 hover:bg-lime-800',
        'icon' => '<path d="M13 0H6a2 2 0 0 0-2 2 2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 13V4a2 2 0 0 0-2-2H5a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1zM3 4a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4z"/>',
    ],
    'stock_take' => [
        'color' => 'bg-cyan-700 hover:bg-cyan-800',
        'icon' => '<path d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z"/>'
    ],
    'serial_control' => [
        'color' => 'bg-orange-700 hover:bg-orange-800',
        'icon' => '<path d="M2 10h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1zm9-9h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-3a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zm0 9a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-3zm0-10a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h3a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2h-3zM2 9a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h3a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H2zm7 2a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-3a2 2 0 0 1-2-2v-3zM0 2a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm5.354.854a.5.5 0 1 0-.708-.708L3 3.793l-.646-.647a.5.5 0 1 0-.708.708l1 1a.5.5 0 0 0 .708 0l2-2z"/>'
    ]
];

$fullModules = array_merge($defaultModules, $otherModules);

ob_start();
?>

<button class="btn btn-primary float-right mx-3 mt-5">Simpan</button>
<h3 class="px-5 pt-5 text-2xl">Daftar Modul Utama</h3>
<section class="flex flex-row gap-5 animate__animated animate__fadeIn mx-5 mt-3">
    <?php foreach($fullModules as $module => $attribute): ?>
        <?php if (isset($_SESSION['priv'][$module])): ?>
        <div id="main-<?= $module ?>" class="<?= (in_array($module, array_keys($defaultModules)) ? 'mainmodule' : '') ?> flex flex-col items-center w-32 cursor-pointer <?= (!in_array($module, array_keys($defaultModules)) ? 'hidden' : '') ?>" data-module="<?= $module ?>" data-label="<?= ucwords(__($module)) ?>">
            <input id="input-<?= $module ?>" type="hidden" name="<?= (!in_array($module, array_keys($defaultModules)) ? 'hidden[]' : 'main[]') ?>" value="<?= $module ?>"/>
            <div class="flex items-center justify-center <?= $attribute['color'] ?> w-16 h-16 my-2 text-white rounded-xl  cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
                    <?= $attribute['icon'] ?>
                </svg>
            </div>
            <label class="text-gray-800"><?= __(ucwords(str_replace('_', ' ', $module))) ?></label>
            <button data-hide-for="<?= $module ?>" class="hideModule btn btn-sm btn-outline-danger w-full">Hapus</button>
        </div>
        <?php endif; ?>
    <?php endforeach; ?>
</section>
<h3 class="px-5 pt-5 text-2xl">Daftar Modul Lain</h3>
<section class="flex flex-row gap-5 animate__animated animate__fadeIn mx-5 mt-3">
    <?php foreach($fullModules as $module => $attribute): ?>
        <?php if (isset($_SESSION['priv'][$module])): ?>
        <div id="available-<?= $module ?>" class="availmodule flex flex-col items-center w-32 cursor-pointer <?= (in_array($module, array_keys($defaultModules)) ? 'hidden' : '') ?>" data-module="<?= $module ?>" data-label="<?= ucwords(__($module)) ?>">
            <div class="flex items-center justify-center <?= $attribute['color'] ?> w-16 h-16 my-2 text-white rounded-xl  cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
                    <?= $attribute['icon'] ?>
                </svg>
            </div>
            <label class="text-gray-800"><?= substr(__(ucwords(str_replace('_', ' ', $module))), 0,20) ?></label>
            <button data-show-for="<?= $module ?>" class="btn btn-sm btn-outline-success w-full showModule" title="Tambah sebagai module utama">Tambah</button>
        </div>
        <?php endif; ?>
    <?php endforeach; ?>
</section>
<?php
$jinomeContent = ob_get_clean();

utility::loadUserTemplate($dbs,$_SESSION['uid']);

require __DIR__ . DS . '..' . DS . 'index_template.inc.php';

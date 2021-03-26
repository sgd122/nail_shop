<?php
if (!defined('_EYOOM_IS_ADMIN_')) exit;

/**
 * 관리자 메뉴 구성
 */
$_dirname = array(
    '100' => 'config',
    '200' => 'member',
    '300' => 'board',
    '400' => 'shop',
    '500' => 'shopetc',
    '600' => '',
    '700' => '',
    '900' => 'sms',
    '999' => 'theme',
);

$dir_icon = array(
    'config'    => 'fa-sliders-h',
    'member'    => 'fa-user',
    'board'     => 'fa-list-alt',
    'shop'      => 'fa-shopping-cart',
    'shopetc'   => 'fa-chart-pie',
    'sms'       => 'fa-mobile',
    'theme'     => 'fa-puzzle-piece',
);

/**
 * 메뉴 예외처리
 */
$except_menu = array('cf_theme', 'cf_menu', 'cf_service', 'scf_write_count', 'scf_item_type', 'shop_index');
if (!$is_youngcart) $except_menu[] = 'eyb_shopmenu';

/**
 * phpinfo
 */
$extra_url = array(
    'cf_phpinfo' => EYOOM_ADMIN_CORE_URL . '/config/phpinfo.php',
);

$i = 0;
foreach ($amenu as $key => $value) {
    if (!$is_youngcart && ($key == 400 || $key == 500)) continue;

    if (!isset($_dirname[$key]) || !isset($menu['menu'.$key][0][2])) continue;
    else {
        $_dir = $_dirname[$key];
        $tmp  = explode('/',$menu['menu'.$key][0][2]);
        $file = $tmp[count($tmp)-1];
        $_pid = substr($file, 0, -4);
        $admmenu[$i]['href']    = G5_ADMIN_URL . "/?dir={$_dir}&amp;pid={$_pid}";
        $admmenu[$i]['menu']    = $menu['menu'.$key][0][1];
        $admmenu[$i]['active']  = $_dir == $dir ? 'active': '';
        $admmenu[$i]['fa_icon'] = $dir_icon[$_dir];

        $loop1 = &$admmenu[$i]['submenu'];

        $subkey = 'menu'.$key;
        for($j=1; $j<count((array)$menu[$subkey]); $j++) {
            if ($is_admin != 'super' &&
                (!array_key_exists($menu[$subkey][$j][0],$auth) ||
                !strstr($auth[$menu[$subkey][$j][0]], 'r'))
            ) continue;

            if (in_array($menu[$subkey][$j][3], $except_menu)) continue;

            $subtmp  = explode('/',$menu[$subkey][$j][2]);
            $subfile = $subtmp[count($subtmp)-1];
            $_subpid = substr($subfile, 0, -4);

            if (array_key_exists($menu[$subkey][$j][3], $extra_url)) {
                $href = $extra_url[$menu[$subkey][$j][3]];
                $loop1[$j]['target'] = 'target="_blank"';
            } else {
                $href = G5_ADMIN_URL . "/?dir={$_dir}&amp;pid={$_subpid}";
            }

            if (!$menu[$subkey][$j][0]) {
                switch($menu[$subkey][$j][3]) {
                    case 'cf_basic': $skey = '100100'; break;
                    case 'cf_auth': $skey = '100200'; break;
                }
            } else {
                $skey = $menu[$subkey][$j][0];
            }

            $loop1[$j]['href']  = $href;
            $loop1[$j]['skey']  = $skey;
            $loop1[$j]['menu']  = $menu[$subkey][$j][1];

            $auth_menu[$menu[$subkey][$j][0]] = $menu[$subkey][$j][1];
        }
        $i++;
    }
}
unset($menu);
unset($amenu);
<?php
/**
 * @file    /adm/eyoom_admin/core/cpannel/layout_update.php
 */
if (!defined('_EYOOM_IS_ADMIN_')) exit;

check_demo();

auth_check_menu($auth, $sub_menu, "w");

check_admin_token();

unset($theme);
$theme = isset($_POST['theme']) ? clean_xss_tags(trim($_POST['theme'])) : 'eb4_basic';

/**
 * $eyoom 변수파일 재정의
 */
unset($eyoom);
$eyoom_config_file = G5_DATA_PATH . '/eyoom.'.$theme.'.config.php';
include($eyoom_config_file);

foreach ($_POST as $key => $skin) {
    if ($key == 'token' || $key == 'theme') continue;
    $eyoom[$key] = $skin;
}

/**
 * 설정정보 업데이트
 */
$qfile->save_file('eyoom', $eyoom_config_file, $eyoom);

?>
<script>
parent.document.location.reload();
</script>
<?php
/**
 * core file : /eyoom/core/mypage/starpost.php
 */
if (!defined('_EYOOM_')) exit;

/**
 * 회원체크
 */
if (!$is_member) alert('회원만 접근하실 수 있습니다.',G5_URL);

/**
 * 목록보기 권한 체크
 */
$bo_info = $bbs->list_possible_board($member['mb_level']);
$bo_possible = $bo_info['bo_possible'];
$board_info = $bo_info['board_info'];

$page = (int)$_GET['page'];
if (!$page) $page = 1;
if (!$page_rows) $page_rows = 20;
$from_record = ($page - 1) * $page_rows; // 시작 열을 구함

$sql = "select * from {$g5['eyoom_rating']} where (1) and mb_id='{$member['mb_id']}' and find_in_set(bo_table,'".implode(',',$bo_possible)."') order by rt_datetime desc limit $from_record, $page_rows";
$result = sql_query($sql, false);
$k=0;
$list = array();
for ($i=0; $row=sql_fetch_array($result); $i++) {
    /**
     * 게시글 정보
     */
    $record = $bbs->board_latest_record($row, $board_info, 'rt_datetime');
    if ($record) {
        $list[$k] = $record;
        $k++;
    }
}
$count = count($list);

/**
 * 사용자 프로그램
 */
@include_once(EYOOM_USER_PATH.'/mypage/starpost.php');

/**
 * HTML 출력
 */
include_once($eyoom_skin_path['mypage'].'/starpost.skin.html.php');
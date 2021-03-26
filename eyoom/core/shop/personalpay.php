<?php
/**
 * core file : /eyoom/core/shop/personalpay.php
 */
if (!defined('_EYOOM_')) exit;

$g5['title'] = '개인결제 리스트';
include_once('./_head.php');

/**
 * 리스트 유형별로 출력
 */
$list_file = $skin_dir.'/personalpay.skin.php';
if (file_exists($list_file)) {

    $list_mod   = 4;
    $list_row   = 5;
    $img_width  = 230;
    $img_height = 230;

    $sql_common = " from {$g5['g5_shop_personalpay_table']}
                    where pp_use = '1'
                      and pp_tno = '' ";

    /**
     * 총몇개 = 한줄에 몇개 * 몇줄
     */
    $items = $list_mod * $list_row;

    $sql = "select COUNT(*) as cnt $sql_common ";
    $row = sql_fetch($sql);
    $total_count = $row['cnt'];

    /**
     * 전체 페이지 계산
     */
    $total_page  = ceil($total_count / $items);
    
    /**
     * 페이지가 없으면 첫 페이지 (1 페이지)
     */
    if ($page < 1) $page = 1;
    
    /**
     * 시작 레코드 구함
     */
    $from_record = ($page - 1) * $items;

    $sql = " select *
                $sql_common
                order by pp_id desc
                limit $from_record, $items";
    $result = sql_query($sql);

    include $list_file;
}

include_once('./_tail.php');
<?php
/**
 * @file    /adm/eyoom_admin/core/shop/itemqalist.php
 */
if (!defined('_EYOOM_IS_ADMIN_')) exit;

$sub_menu = "400660";

$action_url1 = G5_ADMIN_URL . '/?dir=shop&amp;pid=itemqalistupdate&amp;smode=1';

auth_check_menu($auth, $sub_menu, "r");

$fr_date = isset($_GET['fr_date']) ? trim($_GET['fr_date']) : '';
$to_date = isset($_GET['to_date']) ? trim($_GET['to_date']) : '';
$sfl = (isset($_GET['sfl']) && in_array($_GET['sfl'], array('a.it_id', 'it_name')) ) ? $_GET['sfl'] : 'it_name';
$stx = isset($_GET['stx']) ? get_search_string($_GET['stx']) : '';
$sst = (isset($_GET['sst']) && in_array($_GET['sst'], array('a.it_id', 'it_name'))) ? $_GET['sst'] : 'a.it_id';
$sod = (isset($_GET['sod']) && in_array($_GET['sod'], array('desc', 'asc'))) ? $_GET['sod'] : 'desc';

$cate_a = isset($_GET['cate_a']) ? clean_xss_tags($_GET['cate_a']) : '';
$cate_b = isset($_GET['cate_b']) ? clean_xss_tags($_GET['cate_b']) : '';
$cate_c = isset($_GET['cate_c']) ? clean_xss_tags($_GET['cate_c']) : '';

/**
 * 1차 상품 분류 가져오기
 */
$fields = " ca_id, ca_name ";
$cate1 = $shop->get_goods_cate1($fields);
if (!$cate1) $cate1 = array();

$where = " where ";
$sql_search = "";
if ($stx != "") {
    if ($sfl != "") {
        $sql_search .= " $where $sfl like '%$stx%' ";
        $where = " and ";
    }
    if ($save_stx != $stx)
        $page = 1;
}

if ($sca != "") {
    $sql_search .= " and ca_id like '$sca%' ";
}

// 기간검색이 있다면
if(! preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $fr_date) ) $fr_date = '';
if(! preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $to_date) ) $to_date = '';

if ($sdt == 'it_time') {
    $sdt_target = 'it_time';
} else if ($sdt == 'it_update_time') {
    $sdt_target = 'it_update_time';
}

if ($sdt_target && $fr_date && $to_date) {
    $sql_search .= " and $sdt_target between '$fr_date 00:00:00' and '$to_date 23:59:59' ";
    $qstr .= "&amp;sdt={$sdt_target}&amp;fr_date={$fr_date}&amp;to_date={$to_date}";
}

/**
 * 서브 카테고리
 */
$cate2 = $cate3 = $cate4 = array();
if ($cate_a) {
    $sql_cate = " and (b.ca_id like '{$cate_a}%' or b.ca_id2 like '{$cate_a}%' or b.ca_id3 like '{$cate_a}%') ";
    $w = " (1) and ca_id like '{$cate_a}%' and length(ca_id)=4";
    $cate2 = $shop->get_goods_category($fields, $w);
}
if ($cate_a && $cate_b) {
    $sql_cate = " and (b.ca_id like '{$cate_b}%' or b.ca_id2 like '{$cate_b}%' or b.ca_id3 like '{$cate_b}%') ";
    $w = " (1) and ca_id like '{$cate_b}%' and length(ca_id)=6";
    $cate3 = $shop->get_goods_category($fields, $w);
}
if ($cate_a && $cate_b && $cate_c) {
    $sql_cate = " and (b.ca_id like '{$cate_c}%' or b.ca_id2 like '{$cate_c}%' or b.ca_id3 like '{$cate_c}%') ";
    $w = " (1) and ca_id like '{$cate_c}%' and length(ca_id)=8";
    $cate4 = $shop->get_goods_category($fields, $w);
}

$sql_search .= $sql_cate;

if ($sfl == "")  $sfl = "it_name";
if (!$sst) {
    $sst = "iq_id";
    $sod = "desc";
}

$sql_common = "  from {$g5['g5_shop_item_qa_table']} a
                 left join {$g5['g5_shop_item_table']} b on (a.it_id = b.it_id)
                 left join {$g5['member_table']} c on (a.mb_id = c.mb_id) ";
$sql_common .= $sql_search;

// 테이블의 전체 레코드수만 얻음
$sql = " select count(*) as cnt " . $sql_common;
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql  = " select *
          $sql_common
          order by $sst $sod, iq_id desc
          limit $from_record, $rows ";
$result = sql_query($sql);

//$qstr = 'page='.$page.'&amp;sst='.$sst.'&amp;sod='.$sod.'&amp;stx='.$stx;
$qstr .= ($qstr ? '&amp;' : '').'sca='.$sca.'&amp;save_stx='.$stx;
$list = array();
for ($i=0; $row=sql_fetch_array($result); $i++) {
    $list[$i] = $row;
    $list[$i]['it_name'] = preg_replace('/\r\n|\r|\n/', '', $row['it_name']);
    $list[$i]['iq_subject'] = cut_str($row['iq_subject'], 30, "...");
    $list[$i]['href'] = shop_item_url($row['it_id']);;
    $list[$i]['image'] = str_replace("\"","'",get_it_image($row['it_id'], 160, 160));
    //$list[$i]['name'] = get_sideview($row['mb_id'], get_text($row['iq_name']), $row['mb_email'], $row['mb_homepage']);
    $list[$i]['answer'] = $row['iq_answer'] ? 'Y' : '&nbsp;';
    $list[$i]['iq_question'] = get_view_thumbnail(conv_content(str_replace(array("\n","\r"),"",$row['iq_question']), 1), 300);
    $list[$i]['iq_answer'] = $row['iq_answer'] ? get_view_thumbnail(conv_content(str_replace(array("\n","\r"),"",$row['iq_answer']), 1), 300) : "답변이 등록되지 않았습니다.";

    $list_num = $total_count - ($page - 1) * $rows;
    $list[$i]['num'] = $list_num - $k;
    $k++;
}

/**
 * 페이징
 */
$paging = $eb->set_paging('admin', $dir, $pid, $qstr);

/**
 * 검색버튼
 */
$frm_submit  = ' <div class="text-center margin-top-10 margin-bottom-10"> ';
$frm_submit .= ' <input type="submit" value="검색" class="btn-e btn-e-lg btn-e-dark" accesskey="s">' ;
$frm_submit .= '</div>';